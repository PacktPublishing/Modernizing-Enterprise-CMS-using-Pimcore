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

pimcore.registerNS("pimcore.object.classes.data.data");
pimcore.object.classes.data.data = Class.create({

    invalidFieldNames: false,
    forbiddenNames: [
        "id", "key", "path", "type", "index", "classname", "creationdate", "userowner", "value", "class", "list",
        "fullpath", "childs", "values", "cachetag", "cachetags", "parent", "published", "valuefromparent",
        "userpermissions", "dependencies", "modificationdate", "usermodification", "byid", "bypath", "data",
        "versions", "properties", "permissions", "permissionsforuser", "childamount", "apipluginbroker", "resource",
        "parentClass", "definition", "locked", "language", "omitmandatorycheck", "idpath", "object", "fieldname",
        "property", "localizedfields", "parentid", "children", "scheduledtasks"
    ],

    /**
     * define where this datatype is allowed
     */
    allowIn: {
        object: false,
        objectbrick: false,
        fieldcollection: false,
        localizedfield: false,
        classificationstore : false
    },


    initData: function (d) {
        this.datax = {
            name: "",
            datatype: "data",
            fieldtype: this.getType()
        };

        if (d) {
            if (d.datatype && d.fieldtype && d.name) {
                var keys = Object.keys(d);
                for (var i = 0; i < keys.length; i++) {
                    this.datax[keys[i]] = d[keys[i]];
                }
            }
        }

        // per default all settings are available
        this.availableSettingsFields = ["name", "title", "tooltip", "mandatory", "noteditable", "index", "invisible",
            "visibleGridView", "visibleSearch", "style"];
    },

    getGroup: function () {
        return "other";
    },

    getType: function () {
        return this.type;
    },

    getLayout: function () {

        var niceName = (this.getTypeName() ? this.getTypeName() : t(this.getType()));

        this.specificPanel = new Ext.form.FormPanel({
            title: t("specific_settings"),
            bodyStyle: "padding: 10px;",
            style: "margin: 10px 0 10px 0",
            items: [],
            defaults: {
                labelWidth: 140
            }
        });

        this.indexCheckbox = new Ext.form.field.Checkbox({
            fieldLabel: t("index"),
            name: "index",
            itemId: "index",
            checked: this.datax.index,
            disabled: !in_array("index",this.availableSettingsFields),
            hidden: true
        });

        this.mandatoryCheckbox = new Ext.form.field.Checkbox({
            fieldLabel: t("mandatoryfield"),
            name: "mandatory",
            itemId: "mandatory",
            checked: this.datax.mandatory,
            disabled: !in_array("mandatory",this.availableSettingsFields) || this.isInCustomLayoutEditor()
        });

        var standardSettings = [
            {
                xtype: "textfield",
                fieldLabel: t("name"),
                name: "name",
                width: 540,
                maxLength: 70,
                itemId: "name",
                autoCreate: {tag: 'input', type: 'text', maxlength: '70', autocomplete: 'off'},
                enableKeyEvents: true,
                value: this.datax.name,
                disabled: !in_array("name", this.availableSettingsFields) || this.inCustomLayoutEditor,
                listeners: {
                    keyup: function (el) {
                        // autofill title field if untouched and empty
                        var title = el.ownerCt.getComponent("title");
                        if (title["_autooverwrite"] === true) {
                            el.ownerCt.getComponent("title").setValue(el.getValue());
                        }
                    }
                }
            },
            {
                xtype: "textfield",
                fieldLabel: t("title") + " (" + t("label") + ")",
                name: "title",
                itemId: "title",
                width: 540,
                value: this.datax.title,
                disabled: !in_array("title",this.availableSettingsFields),
                enableKeyEvents: true,
                listeners: {
                    keyup: function (el) {
                        el["_autooverwrite"] = false;
                    },
                    afterrender: function (el) {
                        if(el.getValue().length < 1) {
                            el["_autooverwrite"] = true;
                        }
                    }
                }
            },
            {
                xtype: "textarea",
                fieldLabel: t("tooltip"),
                name: "tooltip",
                width: 540,
                height: 100,
                value: this.datax.tooltip,
                disabled: !in_array("tooltip",this.availableSettingsFields)
            },
            this.mandatoryCheckbox,
            this.indexCheckbox,
        ];

        if (this.supportsUnique()) {
            this.uniqueCheckbox = new Ext.form.field.Checkbox({
                fieldLabel: t("unique"),
                name: "unique",
                itemId: "unique",
                checked: this.datax.unique,
                autoEl: {
                    tag: 'div',
                    'data-qtip': t('unique_qtip')
                },
                disabled: this.isInCustomLayoutEditor()
            });
            standardSettings.push(this.uniqueCheckbox);
        }

        standardSettings.push({
            xtype: "checkbox",
            fieldLabel: t("not_editable"),
            name: "noteditable",
            itemId: "noteditable",
            checked: this.datax.noteditable,
            disabled: !in_array("noteditable", this.availableSettingsFields)
        });

        standardSettings.push({
            xtype: "checkbox",
            fieldLabel: t("invisible"),
            name: "invisible",
            itemId: "invisible",
            checked: this.datax.invisible,
            disabled: !in_array("invisible", this.availableSettingsFields)
        });


        if (!this.inCustomLayoutEditor) {
            standardSettings.push(            {
                xtype: "checkbox",
                fieldLabel: t("visible_in_gridview"),
                name: "visibleGridView",
                itemId: "visibleGridView",
                checked: this.datax.visibleGridView,
                disabled: !in_array("visibleGridView",this.availableSettingsFields)
            });

            standardSettings.push({
                xtype: "checkbox",
                fieldLabel: t("visible_in_searchresult"),
                name: "visibleSearch",
                itemId: "visibleSearch",
                checked: this.datax.visibleSearch,
                disabled: !in_array("visibleSearch",this.availableSettingsFields)
            });

            this.indexCheckbox.setHidden(false);
        }

        var layoutSettings = [
            {
                xtype: "textfield",
                fieldLabel: t("css_style") + " (float: left; margin:10px; ...)",
                name: "style",
                itemId: "style",
                value: this.datax.style,
                width: 740,
                disabled: !in_array("style",this.availableSettingsFields)
            }
        ];

        this.standardSettingsForm = new Ext.form.FormPanel(
            {
                bodyStyle: "padding: 10px;",
                style: "margin: 0 0 10px 0",
                defaults: {
                    labelWidth: 140
                },
                itemId: "standardSettings",
                items: standardSettings
            }
        );

        this.layoutSettingsForm = new Ext.form.FormPanel(
            {
                title: t("layout_settings"),
                bodyStyle: "padding: 10px;",
                style: "margin: 10px 0 10px 0",
                defaults: {
                    labelWidth: 230
                },
                items: layoutSettings
            }
        );


        this.layout = new Ext.Panel({
            title: '<b>' + this.datax.name + " (" + t("type") + ": " + niceName + ")</b>",
            bodyStyle: 'padding: 10px;',
            items: [
                this.standardSettingsForm,
                this.layoutSettingsForm,
                this.specificPanel
            ]
        });

        this.layout.on("render", this.layoutRendered.bind(this));

        return this.layout;
    },

    layoutRendered: function (layout) {

        var items = this.layout.queryBy(function() {
            return true;
        });

        for (var i = 0; i < items.length; i++) {
            if (items[i].name == "name") {
                items[i].on("keyup", this.updateName.bind(this));
                break;
            }
        }
    },

    updateName: function () {

        var items = this.layout.queryBy(function() {
            return true;
        });

        if (this.treeNode) {
            for (var i = 0; i < items.length; i++) {
                if (items[i].name == "name") {
                    this.treeNode.set("text", items[i].getValue());
                    break;
                }
            }
        }
    },

    getData: function () {
        return this.datax;
    },

    isValid: function () {

        var data = this.getData();
        data.name = trim(data.name);

        var isValidName = /^[a-zA-Z][a-zA-Z0-9_]*$/;
        var isForbiddenName = in_arrayi(data.name, this.forbiddenNames);

        if (data.name.length > 1 && isValidName.test(data.name) && !isForbiddenName) {
            return true;
        }

        if (isForbiddenName) {
            this.invalidFieldNames = true;
        }

        return false;
    },

    applyData: function () {

        if (!this.layout) {
            return;
        }

        var items = this.layout.queryBy(function() {
            return true;
        });

        for (var i = 0; i < items.length; i++) {
            if (typeof items[i].getValue == "function") {
                this.datax[items[i].name] = items[i].getValue();
            }
        }

        this.datax.fieldtype = this.getType();
        this.datax.datatype = "data";
    },

    setInCustomLayoutEditor: function(inCustomLayoutEditor) {
        this.inCustomLayoutEditor = inCustomLayoutEditor;
    },

    isInCustomLayoutEditor: function() {
        return this.inCustomLayoutEditor;
    },

    setInClassificationStoreEditor: function(inClassificationStoreEditor) {
        this.inClassificationStoreEditor = inClassificationStoreEditor;
    },

    isInClassificationStoreEditor: function() {
        return this.inClassificationStoreEditor;
    },

    applySpecialData: function(source) {

    },

    setContext: function(context) {
        this.context = context;
    },

    getContext: function () {
        return this.context;
    },

    supportsUnique: function () {
        return false;
    }
});
