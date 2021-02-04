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

pimcore.registerNS("pimcore.object.helpers.import.csvPreviewTab");
pimcore.object.helpers.import.csvPreviewTab = Class.create({

    initialize: function (config, callback) {

        this.config = config;
        this.callback = callback;

    },

    getPanel: function () {

        this.previewPanel = new Ext.panel.Panel({
            title: t("csv_file_preview"),
            iconCls: 'pimcore_icon_preview',
            items: []
        });

        this.rebuildPanel();

        return this.previewPanel;
    },

    rebuildPanel: function() {
        this.previewPanel.removeAll();

        var data = this.config;

        var dataStore = new Ext.data.JsonStore({
            autoDestroy: true,
            data: data,
            proxy: {
                type: 'memory',
                reader: {
                    type: 'json',
                    rootProperty: 'dataPreview'
                }
            },
            fields: data.dataFields
        });

        var renderer = function (value, metaData, record, rowIndex, colIndex, store) {
            if (this.hasHeadline.getValue() && rowIndex == 0) {
                metaData.tdCls += ' pimcore_import_headline';
            }
            return value
        }.bind(this);

        var dataGridCols = [];
        dataGridCols.push({
            text: t("row"), sortable: false, dataIndex: "rowId", flex: 1, filter: 'numeric',
            renderer: function (value, metaData, record, rowIndex, colIndex, store) {
                if (!this.hasHeadline.getValue() || rowIndex > 0) {
                    return value;
                }
            }.bind(this)
        });

        dataGridCols.push({
                text: t("preview"),
                menuText: t("preview"),
                xtype: 'actioncolumn',
                width: 80,
                tooltip: t('preview'),
                items: [
                    {
                        getClass: function (v, meta, rec, rowIndex) {
                            if (!this.hasHeadline.getValue() || rowIndex > 0) {
                                return 'pimcore_icon_search';
                            }
                        }.bind(this),

                        handler: function (dataStore, grid, rowIndex, colIndex) {
                            if (!this.hasHeadline.getValue() || rowIndex > 0) {
                                this.callback.preview(rowIndex);
                            }
                        }.bind(this, dataStore)
                    }
                ]
            }
        );

        for (var i = 0; i < data.dataFields.length - 1; i++) {
            dataGridCols.push({
                text: t("field") + " " + i,
                sortable: false,
                dataIndex: data.dataFields[i],
                flex: 1,
                renderer: renderer,
                minWidth: 100
            });

        }

        this.dataGrid = new Ext.grid.Panel({
            store: dataStore,
            columns: dataGridCols,
            viewConfig: {
                forceFit: false
            },
            autoScroll: true
        });


        this.hasHeadline = new Ext.form.field.Checkbox(
            {
                xtype: "checkbox",
                name: "hasHeadRow",
                fieldLabel: t("importFileHasHeadRow"),
                listeners: {
                    change: function (checkbox, checked) {
                        this.callback.resolverSettingsPanel.setSkipHeaderRow(checked);
                        this.config.resolverSettings.skipHeadRow = checked;
                        this.dataGrid.getView().refresh();
                    }.bind(this)
                },
                value: this.config.resolverSettings.skipHeadRow
            });

        var formPanel = new Ext.form.FormPanel({
            items: [

                this.hasHeadline
            ],
            defaults: {
                labelWidth: 200
            },
            //autoHeight:true,
            bodyStyle: "padding: 10px;"
        });

        this.previewPanel.add([formPanel, this.dataGrid]);
    },

    setFirstLineHeadline: function (value) {
        this.hasHeadline.setValue(value);
        this.dataGrid.getView().refresh();
    }


});
