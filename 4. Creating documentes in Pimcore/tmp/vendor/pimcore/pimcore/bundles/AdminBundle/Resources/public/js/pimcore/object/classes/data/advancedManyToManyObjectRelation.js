/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright  Copyright (c) 2009-2013 pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

pimcore.registerNS("pimcore.object.classes.data.advancedManyToManyObjectRelation");
pimcore.object.classes.data.advancedManyToManyObjectRelation = Class.create(pimcore.object.classes.data.data, {

    type: "advancedManyToManyObjectRelation",
    /**
     * define where this datatype is allowed
     */
    allowIn: {
        object: true,
        objectbrick: true,
        fieldcollection: true,
        localizedfield: true,
        classificationstore : false,
        block: true
    },

    initialize: function (treeNode, initData) {
        this.type = "advancedManyToManyObjectRelation";

        this.initData(initData);

        // overwrite default settings
        this.availableSettingsFields = ["name","title","tooltip","mandatory","noteditable","invisible",
            "visibleGridView","visibleSearch","style"];

        this.treeNode = treeNode;
    },

    getGroup: function () {
        return "relation";
    },

    getTypeName: function () {
        return t("advanced_many_to_many_object_relation");
    },

    getIconClass: function () {
        return "pimcore_icon_advancedManyToManyObjectRelation";
    },

    getLayout: function ($super) {

        $super();

        this.specificPanel.removeAll();

        this.specificPanel.removeAll();
        this.specificPanel.add([
            {
                xtype: "numberfield",
                fieldLabel: t("width"),
                name: "width",
                value: this.datax.width
            },
            {
                xtype: "numberfield",
                fieldLabel: t("height"),
                name: "height",
                value: this.datax.height
            },{
                xtype: "numberfield",
                fieldLabel: t("maximum_items"),
                name: "maxItems",
                value: this.datax.maxItems,
                disabled: this.isInCustomLayoutEditor(),
                minValue: 0
            },
            {
                xtype: 'textfield',
                width: 600,
                fieldLabel: t("path_formatter_service"),
                name: 'pathFormatterClass',
                value: this.datax.pathFormatterClass
            }
        ]);

        this.classCombo = new Ext.form.ComboBox({
            typeAhead: true,
            triggerAction: 'all',
            width: 600,
            store: pimcore.globalmanager.get("object_types_store"),
            valueField: 'text',
            editable: true,
            displayField: 'text',
            fieldLabel: t('objectsMetadata_allowed_class'),
            name: 'allowedClassId',
            value: this.datax.allowedClassId,
            forceSelection:true,
            listeners: {
                change: function(field, classNamevalue, oldValue) {
                    this.datax.allowedClassId = classNamevalue;
                    if (this.datax.allowedClassId != null) {
                        this.fieldStore.load({params:{name:this.datax.allowedClassId}});
                    }
                }.bind(this)
            }

        });

        this.specificPanel.add(this.classCombo);

        this.fieldStore = new Ext.data.Store({
            proxy: {
                type: 'ajax',
                url: Routing.generate('pimcore_admin_dataobject_dataobjecthelper_gridgetcolumnconfig'),
                extraParams: {
                    no_brick_columns: "true",
                    gridtype: 'all',
                    name: this.datax.allowedClassId
                },
                reader: {
                    type: 'json',
                    rootProperty: "availableFields"
                }
            },
            fields: ['key', 'label'],
            autoLoad: false,
            forceSelection:true,
            listeners: {
                load: function() {
                    this.fieldSelect.setValue(this.datax.visibleFields);
                }.bind(this)

            }
        });
        this.fieldStore.load();

        this.fieldSelect = new Ext.ux.form.MultiSelect({
            name: "visibleFields",
            triggerAction: "all",
            editable: false,
            fieldLabel: t("objectsMetadata_visible_fields"),
            store: this.fieldStore,
            value: this.datax.visibleFields,
            displayField: "key",
            valueField: "key",
            width: 400,
            height: 300
        });
        this.specificPanel.add(this.fieldSelect);


        this.stores = {};
        this.grids = {};
        this.specificPanel.add(this.getGrid("cols", this.datax.columns, true));

        this.specificPanel.add({
            xtype: "checkbox",
            boxLabel: t("enable_batch_edit_columns"),
            name: "enableBatchEdit",
            value: this.datax.enableBatchEdit
        });

        this.specificPanel.add({
            xtype: "checkbox",
            boxLabel: t("allow_multiple_assignments"),
            name: "allowMultipleAssignments",
            value: this.datax.allowMultipleAssignments
        });

        if(this.context == 'class') {
            this.specificPanel.add({
                xtype: "checkbox",
                boxLabel: t("enable_admin_async_load"),
                name: "optimizedAdminLoading",
                value: this.datax.optimizedAdminLoading
            });
            this.specificPanel.add({
                xtype: "displayfield",
                hideLabel: true,
                value: t('async_loading_warning_block'),
                cls: "pimcore_extra_label_bottom"
            });
        }

        return this.layout;
    },


    getGrid: function (title, data, hasType) {

        var fields = [
            'position',
            'key',
            'label'
        ];

        if(hasType) {
            fields.push('type');
            fields.push('value');
            fields.push('width');
        }

        this.stores[title] = new Ext.data.JsonStore({
            autoDestroy: false,
            autoSave: false,
            idIndex: 1,
            fields: fields
        });

        if(!data || data.length < 1) {
            data = [];
        }

        if(data) {
            this.stores[title].loadData(data);
        }

        var keyTextField = new Ext.form.TextField({
            //validationEvent: false,
            validator: function(value) {
                value = trim(value);
                var regresult = value.match(/[a-zA-Z0-9_]+/);

                if (value.length > 1 && regresult == value
                    && in_array(value.toLowerCase(), ["id","key","path","type","index","classname",
                    "creationdate","userowner","value","class","list","fullpath","childs","values","cachetag",
                    "cachetags","parent","published","valuefromparent","userpermissions","dependencies",
                    "modificationdate","usermodification","byid","bypath","data","versions","properties",
                    "permissions","permissionsforuser","childamount","apipluginbroker","resource",
                    "parentClass","definition","locked","language"]) == false) {
                    return true;
                } else {
                    return t("objectsMetadata_invalid_key");
                }
            }
        });


        var typesColumns = [
            {text: t("position"), width: 65, sortable: true, dataIndex: 'position',
                editor: new Ext.form.NumberField({})},
            {text: t("key"), flex: 40, sortable: true, dataIndex: 'key', editor: keyTextField},
            {text: t("label"), flex: 40, sortable: true, dataIndex: 'label', editor: new Ext.form.TextField({})}
        ];

        if(hasType) {
            var types = {
                number: t("objectsMetadata_type_number"),
                text: t("objectsMetadata_type_text"),
                select: t("objectsMetadata_type_select"),
                bool: t("objectsMetadata_type_bool"),
                multiselect: t("objectsMetadata_type_multiselect")
            };

            var typeComboBox = new Ext.form.ComboBox({
                triggerAction: 'all',
                allowBlank: false,
                lazyRender: true,
                mode: 'local',
                editable: false,
                store: new Ext.data.ArrayStore({
                    id: 'value',
                    fields: [
                        'value',
                        'label'
                    ],
                    data: [['number', types.number], ['text', types.text], ['select', types.select],
                        ['bool', types.bool], ['multiselect', types.multiselect]]
                }),
                valueField: 'value',
                displayField: 'label'
            });

            typesColumns.push({text: t("type"), width: 100, sortable: true, dataIndex: 'type', editor: typeComboBox,
                renderer: function(value) {
                    return types[value];
                }});
            typesColumns.push({text: t("value"), flex: 80, sortable: true, dataIndex: 'value',
                editor: new Ext.form.TextField({})});
            typesColumns.push({text: t("width"), width: 80, sortable: true, dataIndex: 'width',
                editor: new Ext.form.NumberField({})});


        }

        this.cellEditing = Ext.create('Ext.grid.plugin.CellEditing', {
            clicksToEdit: 1
        });


        this.grids[title] = Ext.create('Ext.grid.Panel', {
            title: t(title),
            autoScroll: true,
            autoDestroy: false,
            store: this.stores[title],
            height: 200,
            columns : typesColumns,
            selModel: Ext.create('Ext.selection.RowModel', {}),
            plugins: [
                this.cellEditing
            ],
            columnLines: true,
            name: title,
            tbar: [
                {
                    text: t('add'),
                    handler: this.onAdd.bind(this, this.stores[title], hasType),
                    iconCls: "pimcore_icon_add"
                },
                '-',
                {
                    text: t('delete'),
                    handler: this.onDelete.bind(this, this.stores[title], title),
                    iconCls: "pimcore_icon_delete"
                },
                '-'
            ],
            viewConfig: {
                forceFit: true
            }
        });

        return this.grids[title];
    },

    onAdd: function (store, hasType, btn, ev) {
        var u = {};
        if(hasType) {
            u.type = "text";
        }
        u.position = store.getCount() + 1;
        u.key = "name";
        store.add(u);
    },

    onDelete: function (store, title) {
        if(store.getCount() > 0) {
            var selections = this.grids[title].getSelectionModel().getSelected();
            if (!selections || selections.getCount() == 0) {
                return false;
            }
            var rec = selections.getAt(0);
            store.remove(rec);
        }
    } ,

    getData: function () {
        if(this.grids) {
            var cols = [];
            this.stores.cols.each(function(rec) {
                cols.push(rec.data);
                rec.commit();
            });
            this.datax.columns = cols;
        }

        return this.datax;
    },

    applySpecialData: function(source) {
        if (source.datax) {
            if (!this.datax) {
                this.datax =  {};
            }
            Ext.apply(this.datax,
                {
                    width: source.datax.width,
                    height: source.datax.height,
                    maxItems: source.datax.maxItems,
                    relationType: source.datax.relationType,
                    allowedClassId: source.datax.allowedClassId,
                    visibleFields: source.datax.visibleFields,
                    columns: source.datax.columns,
                    remoteOwner: source.datax.remoteOwner,
                    classes: source.datax.classes,
                    enableBatchEdit: source.datax.enableBatchEdit,
                    allowMultipleAssignments: source.datax.allowMultipleAssignments,
                    optimizedAdminLoading: source.datax.optimizedAdminLoading,
                    pathFormatterClass: source.datax.pathFormatterClass
                });
        }
    }

});

// @TODO BC layer, to be removed in v7.0
pimcore.object.classes.data.objectsMetadata = pimcore.object.classes.data.advancedManyToManyObjectRelation;
