/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

pimcore.registerNS("pimcore.object.helpers.customLayoutEditor");
pimcore.object.helpers.customLayoutEditor = Class.create({

    uploadRoute: 'pimcore_admin_dataobject_class_importcustomlayoutdefinition',
    exportRoute: 'pimcore_admin_dataobject_class_exportcustomlayoutdefinition',

    data: {},

    showFieldName: false,

    layoutDraggable: true,

    layoutConfigurationMode: true,

    currentLayoutId: 0,

    initialize: function (klass) {

        this.klass = klass;

        this.classTreeHelper = this;
        this.showFieldName = true;

        this.saveButton = new Ext.Button(
            {
                text: t("save"),
                iconCls: "pimcore_icon_apply",
                disabled: true,
                handler: function () {
                    this.save();
                }.bind(this)
            }
        );

        this.exportButton = new Ext.Button(
            {
                text: t("export"),
                iconCls: "pimcore_icon_class pimcore_icon_overlay_download",
                disabled: true,
                handler: function() {
                    pimcore.helpers.download(this.getExportUrl());
                }.bind(this)
            }
        );

        this.importButton = new Ext.Button(
            {
                text: t("import"),
                iconCls: "pimcore_icon_class pimcore_icon_overlay_upload",
                disabled: true,
                handler: this.upload.bind(this)
            }
        );

        this.configPanel = new Ext.Panel({
            layout: "border",
            items: [this.getLayoutSelection(), this.getSelectionPanel(), this.getClassDefinitionPanel(), this.getEditPanel()],
            bbar: [
                "->",
                this.importButton,
                this.exportButton,
                '-',
                {
                    xtype: 'button',
                    text: t('cancel'),
                    iconCls: 'pimcore_icon_cancel',
                    handler: function () {
                        this.window.close();
                    }.bind(this)
                },

                this.saveButton
            ]
        });

        this.window = new Ext.Window({
            width: 1200,
            height: 700,
            modal: true,
            title: t('custom_layout_definition'),
            layout: "fit",
            items: [this.configPanel]
        });

        this.window.show();
    },

    getUploadUrl: function(){
        return Routing.generate(this.uploadRoute, {id: this.data.id});
    },

    getExportUrl: function() {
        return Routing.generate(this.exportRoute, {id: this.data.id});
    },

    getNodeData: function (node) {
        var data = {};

        if (node.data.editor) {
            if (typeof node.data.editor.getData == "function") {
                data = node.data.editor.getData();

                data.name = trim(data.name);

                // field specific validation
                var fieldValidation = true;
                if(typeof node.data.editor.isValid == "function") {
                    fieldValidation = node.data.editor.isValid();
                }

                var view = this.selectionPanel.getView();
                var nodeEl = Ext.fly(view.getNodeByRecord(node));

                var containerAwareDataName = data.name;
                var parentNode = node.parentNode;
                while (parentNode) {
                    if (parentNode.data.editor && Ext.isFunction(parentNode.data.editor.getData)) {
                        var parentData = parentNode.data.editor.getData();
                        if (parentData.datatype == "data" && parentNode.data.editor.type == "block") {
                            containerAwareDataName = "block-" + parentData.name + "-" + containerAwareDataName;
                            break;
                        }
                    }

                    parentNode = parentNode.parentNode;
                }

                // check if the name is unique, localizedfields can be used more than once
                if ((fieldValidation && in_arrayi(containerAwareDataName,this.usedFieldNames) == false) || data.name == "localizedfields") {

                    if(data.datatype == "data") {
                        this.usedFieldNames.push(containerAwareDataName);
                    }

                    if (nodeEl) {
                        nodeEl.removeCls("tree_node_error");
                    }
                }
                else {
                    console.log("error");
                    if (nodeEl) {
                        nodeEl.removeCls("tree_node_error");
                    }

                    var invalidFieldsText = '';

                    if(node.data.editor.invalidFieldNames){
                        invalidFieldsText = t("reserved_field_names_error")
                            +(implode(',',node.data.editor.forbiddenNames));
                    }

                    invalidFieldsText += containerAwareDataName;
                    pimcore.helpers.showNotification(t("error"), t("some_fields_cannot_be_saved"), "error",
                        invalidFieldsText);

                    this.getDataSuccess = false;
                    return false;
                }
            }
        }

        data.childs = null;
        if (node.childNodes.length > 0) {
            data.childs = [];

            for (var i = 0; i < node.childNodes.length; i++) {
                data.childs.push(this.getNodeData(node.childNodes[i]));
            }
        }

        return data;
    },

    getData: function () {
        this.getDataSuccess = true;

        this.usedFieldNames = [];

        var rootNode = this.selectionPanel.getRootNode();
        var nodeData = this.getNodeData(rootNode);

        return nodeData;
    },

    getLayoutSelection: function () {
        this.layoutComboStore = new Ext.data.Store({
            proxy: {
                type: 'ajax',
                url: Routing.generate('pimcore_admin_dataobject_class_getcustomlayoutdefinitions'),
                extraParams: {
                    classId: this.klass.id
                },
                reader: {
                    type: 'json',
                    rootProperty: 'data'
                }
            },
            fields: ['id', 'name'],
            forceSelection:true,
            listeners: {
                load: function() {
                    this.layoutChangeCombo.setValue(this.currentLayoutId);
                }.bind(this)
            }
        });

        this.layoutChangeCombo = new Ext.form.ComboBox({
            fieldLabel: t("layout"),
            triggerAction: "all",
            selectOnFocus: true,
            forceSelection: true,
            store: this.layoutComboStore,
            displayField: 'name',
            valueField: 'id' ,
            disableKeyFilter: "true",
            valueNotFoundText: "",
            editable: true,
            listeners: {
                focus: function(){
                    this.layoutComboStore.load();
                }.bind(this),
                select: function(field, fieldname) {
                    var layoutId = field.value;
                    this.editPanel.removeAll();
                    Ext.Ajax.request({
                        url: Routing.generate('pimcore_admin_dataobject_class_getcustomlayout'),
                        params: {
                            id: layoutId
                        },
                        success: function(response) {
                            this.setCurrentNode("root");
                            this.editPanel.removeAll();
                            this.initLayoutFields(true, response);
                            this.classDefinitionPanel.enable();
                            this.enableButtons();
                            this.currentLayoutId = layoutId;
                        }.bind(this)

                    });
                }.bind(this)
            }
        });

        var compositeConfig = {
            xtype: "fieldset",
            layout: 'hbox',
            border: false,
            style: "border-top: none !important;",
            items: [this.layoutChangeCombo,
                {
                    xtype: "button",
                    text: t("add_layout"),
                    iconCls: "pimcore_icon_add",
                    handler: this.suggestIdentifier.bind(this)
                },
                {
                    xtype: "button",
                    text: t("delete_layout"),
                    iconCls: "pimcore_icon_delete",
                    disabled: false,
                    handler: this.deleteLayout.bind(this)
                }
            ]
        };

        if(!this.languagePanel) {
            this.languagePanel = new Ext.form.FormPanel({
                region: "north",
                height: 43,
                items: [compositeConfig]
            });
        }

        return this.languagePanel;
    },

    getSelectionPanel: function () {
        if(!this.selectionPanel) {

            this.selectionPanel = Ext.create('Ext.tree.Panel', {
                rootVisible: true,
                region:'center',
                title: t('custom_layout'),
                layout:'fit',
                width: 428,
                split:true,
                autoScroll:true,
                disabled: true,
                listeners:{
                    itemcontextmenu: this.onTreeNodeContextmenu.bind(this),
                    itemclick: this.onTreeNodeClick.bind(this)

                },
                viewConfig: {
                    plugins: {
                        ptype: 'treeviewdragdrop',
                        ddGroup: "columnconfigelement"
                    }
                }
            });
        }

        this.selectionPanel.getView().on({
            beforedrop: {
                fn: function (node, data, overModel, dropPosition, dropHandlers, eOpts) {
                    var target = overModel.getOwnerTree().getView();
                    var source = data.view;

                    if (target != source) {
                        var record = data.records[0];
                        if (record.data.type != "layout"
                            && this.selectionPanel.getRootNode().findChild("key", record.data.key)) {
                            dropHandlers.cancelDrop();
                        } else {
                            var copy = this.recursiveCloneNode(record);
                            data.records = [copy]; // assign the copy as the new dropNode
                        }
                    }
                }.bind(this),
                options: {
                    target: this.selectionPanel
                }
            }
        });



        return this.selectionPanel;
    },

    saveCurrentNode: function () {
        if (this.currentNode) {
            if (this.currentNode != "root") {
                this.currentNode.applyData();
            } else {
                // save root node data
                if (this.rootPanel) {
                    var panel = this.rootPanel;
                    var items = panel.queryBy(function() {
                        return true;
                    });

                    for (var i = 0; i < items.length; i++) {
                        if (typeof items[i].getValue == "function") {
                            this.data[items[i].name] = items[i].getValue();
                        }
                    }
                }
            }
        }
    },

    recursiveCloneNode: function(n) {
        var config =  // copy it
            Ext.apply({}, n.data);

        var copy = n.createNode(config);

        if (n.hasChildNodes()) {
            var childs = n.childNodes;
            var i;
            for (i = 0; i < childs.length; i++) {
                copy.appendChild(this.recursiveCloneNode(childs[i]));
            }
        }

        return copy;
    },

    onTreeNodeContextmenu: function (tree, record, item, index, e, eOpts ) {
        e.stopEvent();
        tree.select();

        var menu = new Ext.menu.Menu();

        var allowedTypes = pimcore.object.helpers.layout.getAllowedTypes(this);

        var parentType = "root";

        if (record.data.object) {
            parentType = record.data.type;
        }

        var childsAllowed = false;
        if (allowedTypes[parentType] && allowedTypes[parentType].length > 0) {
            childsAllowed = true;
        }

        if (childsAllowed) {
            // get available layouts
            var layoutMenu = [];
            var layouts = Object.keys(pimcore.object.classes.layout);

            for (var i = 0; i < layouts.length; i++) {
                if (layouts[i] != "layout") {
                    if (in_array(layouts[i], allowedTypes[parentType])) {
                        layoutMenu.push({
                            text: pimcore.object.classes.layout[layouts[i]].prototype.getTypeName(),
                            iconCls: pimcore.object.classes.layout[layouts[i]].prototype.getIconClass(),
                            handler: this.addLayoutChild.bind(this, record, layouts[i], null, true)
                        });
                    }
                }
            }

            if (layoutMenu.length > 0) {
                menu.add(new Ext.menu.Item({
                    text: t('add_layout_component'),
                    iconCls: "pimcore_icon_add",
                    hideOnClick: false,
                    menu: layoutMenu
                }));
            }
        }

        var dataMenu = [];
        dataMenu.push({
            text: pimcore.object.classes.data.localizedfields.prototype.getTypeName(),
            iconCls: pimcore.object.classes.data.localizedfields.prototype.getIconClass(),
            handler: this.addDataChild.bind(this, record, "localizedfields", {name: "localizedfields"},
                null, true, true)
        });

        menu.add(new Ext.menu.Item({
            text: t('add_data_component'),
            iconCls: "pimcore_icon_add",
            hideOnClick: false,
            menu: dataMenu
        }));

        if (this.id != 0) {
            menu.add(new Ext.menu.Item({
                text: t('delete'),
                iconCls: "pimcore_icon_delete",
                handler: function(record) {
                    record.remove();
                }.bind(this, record)
            }));
        }

        menu.showAt(e.pageX, e.pageY);
    },


    getClassDefinitionPanel: function () {
        if (!this.classDefinitionPanel) {
            this.classDefinitionPanel = this.getClassTree(Routing.generate('pimcore_admin_dataobject_class_get'), this.klass.id);
        }

        return this.classDefinitionPanel;
    },

    getEditPanel: function () {
        if (!this.editPanel) {
            this.editPanel = new Ext.Panel({
                region: "east",
                autoScroll: true,
                width: 700,
                split: true
            });

            this.setCurrentNode("root");
        }

        return this.editPanel;
    },

    getRootPanel: function() {

        this.rootPanel = new Ext.form.Panel({
            title: t("general_settings"),
            bodyStyle: "padding: 10px;",
            defaults: {
                labelWidth: 200
            },
            items: [
                {
                    xtype: "textfield",
                    fieldLabel: t("name"),
                    name: "name",
                    width: 500,
                    value: this.data.name
                },
                {
                    xtype: "checkbox",
                    fieldLabel: t("default_layout"),
                    name: "default",
                    uncheckedValue : 0,
                    checked: this.data.default,
                },
                {
                    xtype: "textarea",
                    fieldLabel: t("description"),
                    name: "description",
                    width: 500,
                    value: this.data.description
                }
            ]
        });
        return this.rootPanel;


    },

    getClassTree: function(url, id) {
        var tree = Ext.create('Ext.tree.Panel', {
            width: 200,
            title: t('class'),
            region: "west",
            autoScroll: true,
            split: true,
            disabled: true,
            root: {
                id: "0",
                root: true,
                text: t("base"),
                allowDrag: false
            },
            viewConfig: {
                plugins: {
                    ptype: 'treeviewdragdrop',
                    enableDrag: true,
                    enableDrop: false,
                    ddGroup: "columnconfigelement"
                }
            }
        });

        Ext.Ajax.request({
            url: url,
            params: {
                id: id
            },
            success: this.initLayoutFields.bind(this, false)
        });

        return tree;
    },

    initLayoutFields: function (isCustom, response) {
        var data = Ext.decode(response.responseText);
        if (isCustom) {
            data = data.data;
        }
        this.data = data;

        var rootNode;
        rootNode = {
            id: "0",
            root: true,
            text: t("base"),
            leaf: false,
            isTarget: true,
            expanded: true,
            allowDrag: false
        };

        if (isCustom) {
            this.selectionPanel.setRootNode(rootNode);
            this.selectionPanel.setDisabled(false);
            this.editPanel.add(this.getRootPanel());
            this.editPanel.updateLayout();
            rootNode = this.selectionPanel.getRootNode();
        } else {
            this.classDefinitionPanel.setRootNode(rootNode);
            rootNode = this.classDefinitionPanel.getRootNode();
        }


        var baseNode = rootNode;

        if (data.layoutDefinitions) {
            if (data.layoutDefinitions.childs) {
                for (var i = 0; i < data.layoutDefinitions.childs.length; i++) {
                    var attributePrefix = "";
                    var child = this.data.layoutDefinitions.childs[i];

                    var text = t(child.name);
                    if(child.nodeType == "objectbricks") {
                        text = t(child.title) + " " + t("columns");
                        attributePrefix = child.title;
                    }

                    baseNode.appendChild(this.recursiveAddNode(child, baseNode, attributePrefix, isCustom));
                }
                rootNode.expand();
                baseNode.expand();
            }
        }
    },

    recursiveAddNode: function (con, scope, attributePrefix, addListener) {

        var fn = null;
        var newNode = null;

        if (con.datatype == "layout") {
            fn = this.addLayoutChild.bind(this, scope, con.fieldtype, con, addListener);
        }
        else if (con.datatype == "data") {
            fn = this.addDataChild.bind(this, scope, con.fieldtype, con, attributePrefix, this.showFieldName, addListener);
        }

        newNode = fn();

        if (con.childs) {
            for (var i = 0; i < con.childs.length; i++) {
                this.recursiveAddNode(con.childs[i], newNode, attributePrefix, addListener);
            }
        }

        return newNode;
    },

    suggestIdentifier: function() {
        Ext.Ajax.request({
            url: Routing.generate('pimcore_admin_dataobject_class_suggestcustomlayoutidentifier'),
            params: {
                classId: this.klass.id,
            },
            success: function (response) {
                var layouts = Ext.decode(response.responseText);
                this.addLayout(layouts);
            }.bind(this)
        });

    },

    addLayoutChild: function (record, type, initData, addListener) {

        var nodeLabel = t(type);

        if (initData) {
            if (initData.title) {
                nodeLabel = initData.title;
            } else if (initData.name) {
                nodeLabel = initData.name;
            }
        }

        var newNode = {
            type: "layout",
            allowDrag: this.layoutDraggable,
            iconCls: "pimcore_icon_" + type,
            text: nodeLabel,
            expanded: true,
            expandable: false,
            leaf: false
        };


        newNode = record.appendChild(newNode);

        //to hide or show the expanding icon depending if childs are available or not
        newNode.addListener('remove', function(node, removedNode, isMove) {
            if(!node.hasChildNodes()) {
                node.set('expandable', false);
            }
        });
        newNode.addListener('append', function(node) {
            node.set('expandable', true);
        });

        newNode.data.editor = new pimcore.object.classes.layout[type](newNode, initData);

        record.expand();

        return newNode;
    },

    addDataChild: function (record, type, initData, attributePrefix, showFieldname, addListener) {

        var isLeaf = true;
        var draggable = true;
        var expanded = false;

        // localizedfields can be a drop target
        if(type == "localizedfields") {
            isLeaf = false;
            expanded = true;
        }

        var key = initData.name;
        if(attributePrefix) {
            key = attributePrefix + "~" + key;
        }

        var text = t(initData.title);
        if(showFieldname) {
            text = text + " (" + key.replace("~", ".") + ")";
        }
        var newNode = {
            text: text,
            key: key,
            type: "data",
            layout: initData,
            leaf: isLeaf,
            allowDrag: draggable,
            expanded: expanded,
            dataType: type,
            iconCls: "pimcore_icon_" + type
        };

        newNode = record.appendChild(newNode);
        newNode.data.editor = new pimcore.object.classes.data[type](newNode, initData);

        if(this.rendered) {
            record.expand();
        }

        return newNode;
    },

    onTreeNodeClick: function (tree, record, item, index, e, eOpts ) {
        try {

            this.saveCurrentNode();
            this.editPanel.removeAll();

            if (record.data.editor) {

                if (record.data.editor.datax.locked) {
                    return;
                }

                if (typeof(record.data.editor.setInCustomLayoutEditor) == "function") {
                    record.data.editor.setInCustomLayoutEditor(true);
                }
                this.editPanel.add(record.data.editor.getLayout());
                this.setCurrentNode(record.data.editor);
            }

            if (record.data.root) {
                var rootPanel = this.getRootPanel();
                this.editPanel.add(rootPanel);
                this.setCurrentNode("root");
            }

            this.editPanel.updateLayout();
        } catch (e) {
            console.log(e);
        }
    },

    setCurrentNode: function (cn) {
        this.currentNode = cn;
    },

    save: function () {
        this.saveCurrentNode();
        var regresult = this.data["name"].match(/[a-zA-Z _][a-zA-Z0-9 _]+/);

        if (this.data["name"].length > 2 && this.data["name"].length < 64 && regresult == this.data["name"]) {
            delete this.data.layoutDefinitions;

            var m = Ext.encode(this.getData());
            var n = Ext.encode(this.data);

            if (this.getDataSuccess) {
                Ext.Ajax.request({
                    url: Routing.generate('pimcore_admin_dataobject_class_savecustomlayout'),
                    method: "PUT",
                    params: {
                        configuration: m,
                        values: n,
                        id: this.data.id
                    },
                    success: this.saveOnComplete.bind(this),
                    failure: this.saveOnError.bind(this)
                });
            }
        } else {
            Ext.Msg.alert(' ', t('invalid_name'));
        }
    },

    saveOnComplete: function (response) {
        try {
            var res = Ext.decode(response.responseText);
            if(res.success) {
                pimcore.helpers.showNotification(t("success"), t("saved_successfully"), "success");
                this.layoutComboStore.reload();
                this.data = res.data;
            } else {
                Ext.Msg.alert(t('error'), t(res.msg));
            }
        } catch (e) {
            this.saveOnError();
        }
    },

    saveOnError: function () {
        pimcore.helpers.showNotification(t("error"), t("saving_failed"), "error");
    },

    addLayout: function (layouts) {
        var suggestedIdentifier = layouts["suggestedIdentifier"];
        var nameField = new Ext.form.field.Text(
            {
                fieldLabel: t('name'),
                labelWidth: 200
            }
        );

        var identifierField = new Ext.form.field.Text({
            fieldLabel: t('unique_identifier'),
            labelWidth: 200,
            maxLength: 20,
            value: suggestedIdentifier
        });

        this.win = new Ext.Window({
            title: t('add_layout'),
            width: 400,
            height: 250,
            draggable: false,
            border: false,
            modal: true,
            bodyStyle: "padding: 10px;",
            resizable: true,
            buttonAlign: 'center',
            items: [
                nameField,
                identifierField, {
                    xtype: 'panel',
                    html: t('identifier_warning')
                }
            ],
            buttons: [
                {
                    xtype: 'button',
                    text: t('cancel'),
                    iconCls: 'pimcore_icon_cancel',
                    handler: function () {
                        this.win.close();

                    }.bind(this)
                },
                {
                    xtype: 'button',
                    text: t('OK'),
                    iconCls: 'pimcore_icon_save',
                    handler: function ( nameField, identifierField, layouts, button) {
                        if (this.addLayoutComplete(nameField.getValue(), identifierField.getValue(), layouts)) {
                            this.win.close();
                        }
                    }.bind(this, nameField, identifierField, layouts)
                }
            ]
        })
        this.win.show();
        nameField.focus();
    },

    addLayoutComplete: function (layoutName, layoutIdentifier, layouts) {

        var layoutNameRegresult = layoutName.match(/[a-zA-Z ][a-zA-Z0-9 ]+/);

        if (layoutName.length <= 2 || layoutNameRegresult != layoutName) {
            Ext.Msg.alert(' ', t('invalid_name'));
            return false;
        }

        if (in_arrayi(layoutName, layouts["existingNames"])) {
            Ext.Msg.alert(' ', t('name_already_in_use'));
            return false;
        }

        var layoutIdentifierRegresult = layoutIdentifier.match(/[a-zA-Z0-9]+/);

        if (layoutIdentifier.length < 1 || layoutIdentifierRegresult != layoutIdentifier) {
            Ext.Msg.alert(' ', t('invalid_identifier'));
            return false;
        }

        if (in_arrayi(layoutIdentifier, layouts["existingIds"])) {
            Ext.Msg.alert(' ', t('identifier_already_exists'));
            return false;
        }

        Ext.Ajax.request({
            url: Routing.generate('pimcore_admin_dataobject_class_addcustomlayout'),
            method: 'POST',
            params: {
                layoutName: layoutName,
                layoutIdentifier: layoutIdentifier,
                classId: this.klass.id
            },
            success: function (response) {

                var data = Ext.decode(response.responseText);
                if(data && data.success) {
                    this.setCurrentNode("root");
                    this.editPanel.removeAll();
                    this.classDefinitionPanel.enable();
                    this.enableButtons();
                    this.layoutComboStore.reload();
                    this.currentLayoutId = data.id;
                    this.layoutChangeCombo.setValue(data.id);
                    this.initLayoutFields(true, response);
                } else {
                    Ext.Msg.alert(t('error'), t('saving_failed'));
                }
            }.bind(this)
        });

        return true;
    },


    clearSelectionPanel: function() {
        this.selectionPanel.getStore().setDisabled(false);
        this.selectionPanel.setRootNode(new Ext.tree.TreeNode({}));
    },


    deleteLayout: function () {
        var id = this.layoutChangeCombo.getValue();

        Ext.Msg.confirm(t('delete'), t('delete_message'), function(btn){
            if (btn == 'yes'){
                Ext.Ajax.request({
                    url: Routing.generate('pimcore_admin_dataobject_class_deletecustomlayout'),
                    method: 'DELETE',
                    params: {
                        id: id
                    }
                });

                this.layoutComboStore.reload();
                this.currentLayoutId = 0;
                this.layoutChangeCombo.setValue(this.currentLayoutId);

                this.editPanel.removeAll();
                this.clearSelectionPanel();
                this.classDefinitionPanel.disable();
                this.saveButton.disable();
                this.importButton.disable();
                this.exportButton.disable();
                this.rootPanel = null;
            }
        }.bind(this));
    },

    upload: function() {

        pimcore.helpers.uploadDialog(this.getUploadUrl(), "Filedata", function() {
            var layoutId = this.data.id;
            Ext.Ajax.request({
                url: Routing.generate('pimcore_admin_dataobject_class_getcustomlayout'),
                params: {
                    id: layoutId
                },
                success: function(response) {
                    this.editPanel.removeAll();
                    this.initLayoutFields(true, response);
                    this.classDefinitionPanel.enable();
                    this.enableButtons();
                    this.currentLayoutId = layoutId;
                }.bind(this)

            });
        }.bind(this), function () {
            Ext.MessageBox.alert(t("error"), t("error"));
        });
    },

    enableButtons: function() {
        this.saveButton.enable();
        this.importButton.enable();
        this.exportButton.enable();
    }

});
