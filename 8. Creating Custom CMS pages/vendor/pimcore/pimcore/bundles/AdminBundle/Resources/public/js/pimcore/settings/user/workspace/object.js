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


pimcore.registerNS("pimcore.settings.user.workspace.object");
pimcore.settings.user.workspace.object = Class.create({

    initialize: function (parent) {
        this.parent = parent;

        if(typeof this.parent.data["user"] != "undefined") {
            this.data = this.parent.data.user;
        } else if(typeof this.parent.data["role"] != "undefined") {
            this.data = this.parent.data.role;
        }
    },

    getPanel: function () {

        var availableRights = ["list","view","save","publish","unpublish","delete","rename","create","settings",
                                                                "versions","properties"];

        var gridPlugins = [];
        var storeFields = ["path"];

        var typesColumns = [
            {text: t("path"), width: 200, sortable: false, dataIndex: 'path',
                                editor: new Ext.form.TextField({}),
                                tdCls: "pimcore_property_droptarget"
            }
        ];

        var check;
        for (var i=0; i<availableRights.length; i++) {

            // columns
            check = new Ext.grid.column.Check({
                text: t(availableRights[i]),
                dataIndex: availableRights[i],
                width: 50,
                flex: 1
            });

            typesColumns.push(check);
            gridPlugins.push(check);

            // store fields
            storeFields.push({name:availableRights[i], type: 'bool'});
        }

        storeFields.push({name: "lEdit", type: 'string'});
        storeFields.push({name: "lView", type: 'string'});
        storeFields.push({name: "layouts", type: 'string'});

        typesColumns.push({
            xtype: 'actioncolumn',
            text: t('special_settings'),
            menuText: t('special_settings'),
            width: 40,
            items: [{
                tooltip: t('special_settings_tooltip'),
                icon: "/bundles/pimcoreadmin/img/flat-color-icons/settings.svg",
                handler: function (grid, rowIndex) {
                    var data = grid.getStore().getAt(rowIndex);
                    var callback = this.applySpecialConfigs.bind(this, data, "special");
                    var specialData = {
                        lView: data.data.lView,
                        lEdit: data.data.lEdit,
                        layouts: data.data.layouts,
                        path: data.data.path
                    };

                    var dialog = new pimcore.settings.user.workspace.special(callback, specialData, data.data.path);
                    dialog.show();
                }.bind(this)
            }]
        });



        typesColumns.push({
            xtype: 'actioncolumn',
            menuText: t('delete'),
            width: 40,
            items: [{
                tooltip: t('delete'),
                icon: "/bundles/pimcoreadmin/img/flat-color-icons/delete.svg",
                handler: function (grid, rowIndex) {
                    grid.getStore().removeAt(rowIndex);
                    this.updateRows();
                }.bind(this)
            }]
        });

        this.store = new Ext.data.JsonStore({
           autoDestroy: true,
            proxy: {
                type: 'memory',
                reader: {

                    rootProperty: 'workspacesObject'
                }
            },
           fields: storeFields,
           data: this.data
       });


        this.cellEditing = Ext.create('Ext.grid.plugin.CellEditing', {
            clicksToEdit: 1
        });

        this.grid = Ext.create('Ext.grid.Panel', {
            frame: false,
            autoScroll: true,
            store: this.store,
            columns : typesColumns,
            trackMouseOver: true,
            columnLines: true,
            stripeRows: true,
            autoExpandColumn: "path",
            autoHeight: true,
            style: "margin-bottom:20px;",
            plugins: [
                this.cellEditing
            ],
            tbar: [
                {
                    xtype: "tbtext",
                    text: "<b>" + t("data_objects") + "</b>"
                },
                "-","-",
                {
                    iconCls: "pimcore_icon_add",
                    text: t("add"),
                    handler: this.onAdd.bind(this)
                }
            ],
            viewConfig: {
                forceFit: true,
                listeners: {
                    rowupdated: this.updateRows.bind(this),
                    refresh: this.updateRows.bind(this)
                }
            }
        });

        this.store.on("update", this.updateRows.bind(this));
        this.grid.on("viewready", this.updateRows.bind(this));


        return this.grid;
    },

    updateRows: function () {

        var rows = Ext.get(this.grid.getEl().dom).query(".x-grid-row");

        for (var i = 0; i < rows.length; i++) {

            var dd = new Ext.dd.DropZone(rows[i], {
                ddGroup: "element",

                getTargetFromEvent: function(e) {
                    return this.getEl();
                },

                onNodeOver : function(target, dd, e, data) {
                    if (data.records.length == 1 && data.records[0].data.elementType == "object") {
                        return Ext.dd.DropZone.prototype.dropAllowed;
                    }
                },

                onNodeDrop : function(myRowIndex, target, dd, e, data) {
                    if (pimcore.helpers.dragAndDropValidateSingleItem(data)) {
                        try {
                            var record = data.records[0];
                            var data = record.data;

                            // check for duplicate records
                            var index = this.grid.getStore().findExact("path", data.path);
                            if (index >= 0) {
                                return false;
                            }

                            if (data.elementType != "object") {
                                return false;
                            }

                            var rec = this.grid.getStore().getAt(myRowIndex);
                            rec.set("path", data.path);

                            this.updateRows();

                            return true;
                        } catch (e) {
                            console.log(e);
                        }
                    }
                }.bind(this, i)
            });
        }

    },

    onAdd: function (btn, ev) {
        this.grid.store.insert(0, {
            path: ""
        });

        this.updateRows();
    },

    getValues: function () {

        var values = [];
        this.store.commitChanges();

        var records = this.store.getRange();
        for (var i = 0; i < records.length; i++) {
            var currentData = records[i];
            if (currentData) {
                    values.push(currentData.data);
            }
        }

        return values;
    },

    applySpecialConfigs: function(rec, column, value) {
        rec.set("lView", value["lView"]);
        rec.set("lEdit", value["lEdit"]);
        rec.set("layouts", value["layouts"]);
    }

});