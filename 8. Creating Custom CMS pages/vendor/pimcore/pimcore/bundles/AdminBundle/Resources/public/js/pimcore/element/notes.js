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

pimcore.registerNS("pimcore.element.notes");
pimcore.element.notes = Class.create({

    initialize: function(element, type) {

        this.inElementContext = false;

        if(element && type) {
            // in element context
            this.element = element;
            this.type = type;
            this.inElementContext = true;
        } else {
            // global view
            var tabPanel = Ext.getCmp("pimcore_panel_tabs");
            tabPanel.add(this.getLayout());
            tabPanel.setActiveTab(this.getLayout());

            this.getLayout().on("destroy", function () {
                pimcore.globalmanager.remove("notes");
            });

            pimcore.layout.refresh();
        }
    },

    activate: function () {
        var tabPanel = Ext.getCmp("pimcore_panel_tabs");
        tabPanel.setActiveTab(this.getLayout());
    },

    getLayout: function () {

        if (this.layout == null) {

            var itemsPerPage = pimcore.helpers.grid.getDefaultPageSize();
            this.store = pimcore.helpers.grid.buildDefaultStore(
                Routing.generate('pimcore_admin_element_notelist'),
                ['id', 'type', 'title', 'description',"user","date","data","cpath","cid","ctype"],
                itemsPerPage,
                {autoLoad: false, remoteFilter: false}
            );

            // only when used in element context
            if(this.inElementContext) {
                var proxy = this.store.getProxy();
                proxy.extraParams["cid"] = this.element.id;
                proxy.extraParams["ctype"] = this.type;
            } else {

            }

            this.filterField = new Ext.form.TextField({
                xtype: "textfield",
                width: 200,
                style: "margin: 0 10px 0 0;",
                enableKeyEvents: true,
                listeners: {
                    "keydown" : function (field, key) {
                        if (key.getKey() == key.ENTER) {
                            var input = field;
                            var proxy = this.store.getProxy();
                            proxy.extraParams.filterText = input.getValue();

                            this.store.load();
                        }
                    }.bind(this)
                }
            });

            this.pagingtoolbar = pimcore.helpers.grid.buildDefaultPagingToolbar(this.store);


            var tbarItems = [
                "->",
                {
                    text: t("filter") + "/" + t("search"),
                    xtype: "tbtext",
                    style: "margin: 0 10px 0 0;"
                },
                this.filterField
            ];

            // only when used in element context
            if(this.inElementContext) {
                tbarItems.unshift({
                    text: t('add'),
                    handler: this.onAdd.bind(this),
                    iconCls: "pimcore_icon_add"
                });
            }

            var tbar = Ext.create('Ext.Toolbar', {
                cls: this.inElementContext ? '' : 'pimcore_main_toolbar',
                items: tbarItems
            });

            var columns = [
                {text: "ID", sortable: true, dataIndex: 'id', hidden: true, filter: 'numeric', flex: 60},
                {text: t("type"), sortable: true, dataIndex: 'type', filter: 'string', flex: 60},
                {text: t("element"), sortable: false, dataIndex: 'cpath', flex: 200,
                    hidden: this.inElementContext,
                    renderer: function(value, metaData, record, rowIndex, colIndex, store) {
                        if(record.get("cid")) {
                            return t(record.get("ctype")) + ": " + record.get("cpath");
                        }
                        return "";
                    }
                },
                {text: t("title"), sortable: true, dataIndex: 'title', filter: 'string', flex: 200, renderer: Ext.util.Format.htmlEncode},
                {text: t("description"), sortable: true, dataIndex: 'description', filter: 'string', renderer: Ext.util.Format.htmlEncode},
                {text: t("fields"), sortable: false, dataIndex: 'data', renderer: function(v) {
                    if(v) {
                        return v.length;
                    }
                    return "";
                }},
                {text: t("user"), sortable: true, dataIndex: 'user', flex: 100, filter: 'string', renderer: function(v) {
                    if(v && v["name"]) {
                        return v["name"];
                    }
                    return "";
                }},
                {text: t("date"), sortable: true, dataIndex: 'date', flex: 100, filter: 'date', renderer: function(d) {
                    var date = new Date(d * 1000);
                    return Ext.Date.format(date, "Y-m-d H:i:s");
                }}
            ];

            if (!this.inElementContext) {
                columns.push(
                    {
                        xtype: 'actioncolumn',
                        menuText: t('click_to_open'),
                        width: 30,
                        items: [{
                            tooltip: t('click_to_open'),
                            iconCls: "pimcore_icon_open",
                            handler: function (grid, rowIndex, event) {
                                var record = this.store.getAt(rowIndex);
                                var id = record.get("cid");
                                var type = record.get("ctype");
                                pimcore.helpers.openElement(id, type, null);
                            }.bind(this)
                        }]
                    }
                );
            }

            columns.push({
                xtype: 'actioncolumn',
                menuText: t('details'),
                width: 30,
                items: [{
                    tooltip: t('details'),
                    icon: "/bundles/pimcoreadmin/img/flat-color-icons/info.svg",
                    handler: function (grid, rowIndex, event) {
                        this.showDetailedData(grid, rowIndex, event);
                    }.bind(this)
                }]
            });

            var plugins = ['pimcore.gridfilters'];

            this.grid = new Ext.grid.GridPanel({
                store: this.store,
                region: "center",
                columns: columns,
                columnLines: true,
                bbar: this.pagingtoolbar,
                tbar: tbar,
                autoExpandColumn: "description",
                stripeRows: true,
                autoScroll: true,
                plugins: plugins,
                viewConfig: {
                    forceFit: true
                },
                listeners: {
                    rowdblclick : function(grid, record, tr, rowIndex, e, eOpts ) {
                        this.showDetailedData(grid, rowIndex, event);
                    }.bind(this),
                    beforerender: function () {
                        this.store.setRemoteFilter(true);
                    }.bind(this)

                }
            });
            this.grid.on("rowclick", this.showDetail.bind(this));

            this.detailView = new Ext.Panel({
                region: "east",
                minWidth: 350,
                width: 350,
                split: true,
                layout: "fit"
            });

            var layoutConf = {
                tabConfig: {
                    tooltip: t('notes_events')
                },
                iconCls: this.inElementContext ? 'pimcore_material_icon_notes pimcore_material_icon' : "pimcore_icon_notes",
                items: [this.grid, this.detailView],
                layout: "border",
                closable: !this.inElementContext
            };

            if(!this.inElementContext) {
                layoutConf["title"] = t('notes_events');
            }

            this.layout = new Ext.Panel(layoutConf);

            this.layout.on("activate", function () {
                this.store.load();
            }.bind(this));
        }

        return this.layout;
    },

    showDetail: function (grid, record, tr, rowIndex, e, eOpts ) {
        var rec = this.store.getAt(rowIndex);

        var keyValueStore = new Ext.data.Store({
            proxy: {
                type: 'memory',
                reader: {
                    type: 'json',
                    rootProperty: 'data'
                }
            },
            autoDestroy: true,
            data: rec.data,
            fields: ['data', 'name', 'type']
        });

        var keyValueGrid = new Ext.grid.GridPanel({
            store: keyValueStore,
            title: t("details_for_selected_event") + " (" + rec.get("id") + ")",
            columns: [
                {text: t("name"), sortable: true, dataIndex: 'name', flex: 60},
                {text: t("type"), sortable: true, dataIndex: 'type', flex: 30,
                    renderer: function(value, metaData, record, rowIndex, colIndex, store) {
                        return t(value);
                    }
                },
                {text: t("value"), sortable: true, dataIndex: 'data', flex: 60,
                    renderer: function(value, metaData, record, rowIndex, colIndex, store) {
                        if(record.get("type") == "document" || record.get("type") == "asset"
                            || record.get("type") == "object") {
                            if(value && value["path"]) {
                                return value["path"];
                            }
                        } else if (record.get("type") == "date") {
                            if(value) {
                                var date = new Date(value * 1000);
                                return Ext.Date.format(date, "Y-m-d H:i:s");
                            }
                        }

                        return value;
                    }
                },
                {
                    xtype: 'actioncolumn',
                    menuText: t('open'),
                    width: 30,
                    items: [{
                        tooltip: t('open'),
                        icon: "/bundles/pimcoreadmin/img/flat-color-icons/open_file.svg",
                        handler: function (grid, rowIndex) {
                            var rec = grid.getStore().getAt(rowIndex);
                            if(rec.get("type") == "document" || rec.get("type") == "asset"
                                || rec.get("type") == "object") {
                                if(rec.get("data") && rec.get("data")["id"]) {
                                    pimcore.helpers.openElement(rec.get("data").id,
                                        rec.get("type"),rec.get("data").type);
                                }
                            }
                        }.bind(this),
                        getClass: function(v, meta, rec) {  // Or return a class from a function
                            if(rec.get('type') != "object"
                                && rec.get('type') != "document" && rec.get('type') != "asset") {
                                return "pimcore_hidden";
                            }
                        }
                    }]
                }
            ],
            columnLines: true,
            stripeRows: true,
            autoScroll: true,
            viewConfig: {
                forceFit: true
            }
        });

        this.detailView.removeAll();
        this.detailView.add(keyValueGrid);
        this.detailView.updateLayout();
    },

    onAdd: function () {

        var noteTypesStore = new Ext.data.Store({
            fields: ["name"],
            proxy: {
                type: 'ajax',
                url: Routing.generate('pimcore_admin_element_notetypes', {ctype: this.type}),
                reader: {
                    type: 'json',
                    rootProperty: "noteTypes"
                }
            }
        });

        var formPanel = new Ext.form.FormPanel({
            bodyStyle: "padding:10px;",
            items: [{
                xtype: "combo",
                fieldLabel: t('type'),
                name: "type",
                editable: true,
                displayField: 'name',
                valueField: 'name',
                store: noteTypesStore,
                mode: "local",
                triggerAction: "all",
                width: 250
            },{
                xtype: "textfield",
                fieldLabel: t("title"),
                name: "title",
                width: 450
            }, {
                xtype: "textarea",
                fieldLabel: t("description"),
                name: "description",
                width: 450
            },{
                xtype: "hidden",
                name: "cid",
                value: this.element.id
            },{
                xtype: "hidden",
                name: "ctype",
                value: this.type
            }]
        });

        var addWin = new Ext.Window({
            modal: true,
            width: 500,
            height: 280,
            closable: true,
            items: [formPanel],
            buttons: [{
                text: t("save"),
                iconCls: "pimcore_icon_accept",
                handler: function () {
                    var values = formPanel.getForm().getFieldValues();

                    Ext.Ajax.request({
                        url: Routing.generate('pimcore_admin_element_noteadd'),
                        method: "post",
                        params: values
                    });

                    addWin.close();
                    this.store.reload();
                }.bind(this)
            }]
        });

        addWin.show();
    },

    showDetailedData: function(grid, rowIndex, event) {
        var data = this.store.getAt(rowIndex);
        new pimcore.element.note_details(data.data);
    }

});
