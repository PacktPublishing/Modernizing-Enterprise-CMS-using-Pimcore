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

pimcore.registerNS("pimcore.object.helpers.import.reportTab");
pimcore.object.helpers.import.reportTab = Class.create({

    initialize: function (config, callback) {
        this.config = config;
        this.callback = callback;
    },

    getPanel: function () {
        if (!this.reportPanel) {
            var data = this.config;

            this.dataStore = new Ext.data.JsonStore({
                autoDestroy: true,
                data: data,
                proxy: {
                    type: 'memory',
                    reader: {
                        type: 'json'
                    }
                },
                fields: [
                    "rowId", "message", "success", "objectId"
                ]
            });

            var dataGridCols = [];
            dataGridCols.push({text: t("row"), sortable: true, dataIndex: "rowId", width: 80, filter: 'numeric'});
            dataGridCols.push({
                    text: t("preview"),
                    menuText: t("preview"),
                    xtype: 'actioncolumn',
                    width: 80,
                    tooltip: t('preview'),
                    items: [
                        {
                            getClass: function (v, meta, rec, rowIndex) {
                                if (!rec.get("success")) {
                                    return 'pimcore_icon_search';
                                }
                            }.bind(this),

                            handler: function (grid, rowIndex, colIndex) {
                                var rec = this.dataStore.getAt(rowIndex);
                                if (!rec.get("success")) {
                                    var rowIdx = rec.get("rowId") - 1;
                                    this.callback.preview(rowIdx);
                                }
                            }.bind(this)
                        }
                    ]
                }
            );

            dataGridCols.push(
                {
                    xtype: 'actioncolumn',
                    text: t("open"),
                    menuText: t("open"),
                    tooltip: t('open'),
                    width: 80,
                    items: [
                        {
                            getClass: function (v, meta, rec, rowIndex) {
                                if (rec.get("success")) {
                                    return 'pimcore_icon_open';
                                }
                            }.bind(this),

                            handler: function (grid, rowIndex, colIndex) {
                                var rec = this.dataStore.getAt(rowIndex);
                                if (rec.get("success")) {
                                    pimcore.helpers.openObject(rec.get("objectId"), "object");
                                }
                            }.bind(this)
                        }
                    ]
                });

            dataGridCols.push({
                text: t("success"), width: 80, sortable: true, dataIndex: 'success',
                renderer: function (value, metaData, record, rowIndex, colIndex, store) {
                    var status = "error";
                    if (record.get('success')) {
                        status = "success";
                    } else if (record.get('messageType') == 'warning') {
                        status = "import_warning";
                    }

                    return '<div style="height: 16px;" class="pimcore_icon_' + status + '">&nbsp;</div>';
                },
                filter: 'boolean'
            });


            dataGridCols.push({
                text: t("log_message"),
                sortable: true,
                dataIndex: "message",
                flex: 80,
                filter: 'string'
            });

            var dataGrid = new Ext.grid.Panel({
                store: this.dataStore,
                columns: dataGridCols,
                plugins: ['gridfilters'],
                viewConfig: {
                    forceFit: false
                },
                autoScroll: true
            });

            this.importProgressBar = new Ext.ProgressBar({
                text: t('initializing'),
                style: "margin: 10px;",
                width: 500,
                height: 25
            });

            this.stopButton = new Ext.button.Button(
                        {
                            text: t("stop"),
                            iconCls: "pimcore_icon_stop",
                            handler: function () {
                                this.callback.stopIt = true;
                            }.bind(this)
                        }
            );

            this.statusBar = new Ext.form.FieldContainer(
                {
                    layout: {
                        type: "hbox",
                        align: 'middle'
                    },
                    items: [this.importProgressBar, this.stopButton]
                });

            this.reportPanel = new Ext.panel.Panel({
                disabled: true,
                autoScroll: true,
                title: t("import_report"),
                iconCls: 'pimcore_icon_import_report',
                items: [this.statusBar, dataGrid],
                overflowY: 'scroll'
            });
        }

        return this.reportPanel;
    },


    clearData: function () {
        this.dataStore.removeAll();
    },

    logData: function (data) {
        this.dataStore.insert(0, {
                rowId: data.rowId,
                message: data.message,
                success: data.success,
                objectId: data.objectId,
                messageType: data.messageType,
            }
        );
    }
});
