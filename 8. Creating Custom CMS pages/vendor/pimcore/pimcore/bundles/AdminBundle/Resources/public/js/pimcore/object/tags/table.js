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

pimcore.registerNS("pimcore.object.tags.table");
pimcore.object.tags.table = Class.create(pimcore.object.tags.abstract, {

    type: "table",
    dirty: false,

    initialize: function (data, fieldConfig) {

        this.fieldConfig = fieldConfig;

        if (!data) {
            data = this.getInitialData();

        }

        this.data = data;
    },

    getInitialData: function() {
        var data = [
            [""]
        ];
        if (this.fieldConfig.cols) {
            for (var i = 0; i < (this.fieldConfig.cols - 1); i++) {
                data[0].push("");
            }
        }
        if (this.fieldConfig.rows) {
            for (var i = 0; i < (this.fieldConfig.rows - 1); i++) {
                data.push(data[0]);
            }
        }
        if (this.fieldConfig.data) {
            try {
                var dataRows = this.fieldConfig.data.split("\n");
                var dataGrid = [];
                for (var i = 0; i < dataRows.length; i++) {
                    dataGrid.push(dataRows[i].split("|"));
                }

                data = dataGrid;
                this.dirty = true;
            }
            catch (e) {
                console.log(e);
            }
        }
        return data;
    },

    getGridColumnConfig: function (field) {
        return {
            text: t(field.label), width: 150, sortable: false, dataIndex: field.key,
            getEditor: this.getWindowCellEditor.bind(this, field),
            renderer: function (key, value, metaData, record) {
                this.applyPermissionStyle(key, value, metaData, record);

                if (record.data.inheritedFields && record.data.inheritedFields[key] && record.data.inheritedFields[key].inherited == true) {
                    metaData.tdCls += " grid_value_inherited";
                }

                if (value && value.length > 0) {
                    var table = '<table cellpadding="2" cellspacing="0" border="1">';

                    //print header row if defined
                    if(field.layout.columnConfigActivated && field.layout.columnConfig) {
                        table += '<tr>';
                        for (var i = 0; i < value[0].length; i++) {
                            table += '<th>' + Ext.util.Format.htmlEncode(t(field.layout.columnConfig[i].label)) + '</th>';
                        }
                        table += '</tr>';
                    }

                    for (var i = 0; i < value.length; i++) {
                        table += '<tr>';
                        for (var c = 0; c < value[i].length; c++) {
                            table += '<td>' + Ext.util.Format.htmlEncode(value[i][c]) + '</td>';
                        }
                        table += '</tr>';
                    }
                    table += '</table>';
                    return table;
                }
                return "";
            }.bind(this, field.key)
        };
    },

    getLayoutEdit: function () {

        var options = {};
        options.name = this.fieldConfig.name;
        options.border = true;
        options.layout = "fit";
        options.style = "margin-bottom: 10px";
        options.title = this.fieldConfig.title;
        options.componentCls = "object_field object_field_type_" + this.type;
        if (this.fieldConfig.width) {
            options.width = this.fieldConfig.width;
        }

        if (!this.component) {
            this.component = new Ext.Panel(options);
        }

        this.initStore(this.data);
        this.initGrid();

        return this.component;
    },


    getLayoutShow: function () {

        this.component = this.getLayoutEdit();
        this.component.disable();

        return this.component;
    },


    initGrid: function () {

        this.component.removeAll();

        var data = this.store.queryBy(function (record, id) {
            return true;
        });
        var columns = [];

        var fields = this.store.getInitialConfig().fields;

        if (data.items[0]) {
            for (var i = 0; i < fields.length; i++) {
                columns.push({
                    text: this.fieldConfig.columnConfigActivated && this.fieldConfig.columnConfig[i] ? t(this.fieldConfig.columnConfig[i].label) : '',
                    dataIndex: fields[i].name,
                    editor: new Ext.form.TextField(),
                    sortable: false,
                    flex: 1
                });
            }
        }

        this.cellEditing = Ext.create('Ext.grid.plugin.CellEditing', {});

        var tbar = [];

        if (!this.fieldConfig.colsFixed || columns.length < this.fieldConfig.cols) {
            tbar.push({
                iconCls: "pimcore_icon_table_col pimcore_icon_overlay_add",
                handler: this.addColumn.bind(this)
            });
        }

        if (!this.fieldConfig.colsFixed || columns.length > this.fieldConfig.cols) {
            tbar.push({
                iconCls: "pimcore_icon_table_col pimcore_icon_overlay_delete",
                handler: this.deleteColumn.bind(this)
            });
        }

        if (!this.fieldConfig.rowsFixed || data.length != this.fieldConfig.rows) {
            tbar.push({
                iconCls: "pimcore_icon_table_row pimcore_icon_overlay_delete",
                handler: this.deleteRow.bind(this)
            });

            tbar.push({
                iconCls: "pimcore_icon_table_row pimcore_icon_overlay_add",
                handler: this.addRow.bind(this)
            });
        }

        tbar.push({
            iconCls: "pimcore_icon_paste",
            handler: this.pasteFromClipboard.bind(this)
        });


        tbar.push({
            iconCls: "pimcore_icon_empty",
            handler: this.emptyStore.bind(this)
        });

        this.grid = Ext.create('Ext.grid.Panel', {
            store: this.store,
            columns: columns,
            stripeRows: true,
            columnLines: true,
            bodyCls: "pimcore_editable_grid",
            autoHeight: true,
            selModel: Ext.create('Ext.selection.CellModel'),
            hideHeaders: !this.fieldConfig.columnConfigActivated,
            plugins: [
                this.cellEditing
            ],
            tbar: tbar,
            viewConfig: {
                markDirty: false,
                forceFit: true
            }
        });
        this.component.add(this.grid);
        this.component.updateLayout();
    },

    emptyStore: function () {
        this.dirty = true;
        var initialData = this.getInitialData();
        this.initStore(initialData);
    },

    initStore: function (data) {
        var storeFields = [];
        if (data[0]) {
            for (var i = 0; i < data[0].length; i++) {
                storeFields.push({
                    name: "col_" + i
                });
            }
        }

        this.store = new Ext.data.ArrayStore({
            fields: storeFields
        });

        this.store.loadData(data);

        this.store.on("update", function () {
            this.dirty = true;
        }.bind(this));
        this.initGrid();},

    addColumn: function () {

        var currentData = this.getValue();

        for (var i = 0; i < currentData.length; i++) {
            currentData[i].push("");
        }

        this.initStore(currentData);
        this.dirty = true;
    },

    addRow: function () {
        var initData = {};

        var columnnManager = this.grid.getColumnManager();
        var columns = columnnManager.getColumns();
        for (var o = 0; o < columns.length; o++) {
            initData["col_" + o] = "";
        }

        this.store.add(initData);
        this.dirty = true;
    },

    deleteRow: function () {
        var selected = this.grid.getSelectionModel();
        if (selected.selection) {
            this.store.remove(selected.selection.record);
            this.grid.editingPlugin.view.refresh();  // Prevents the editor from being garbage collected
            this.dirty = true;
        }
    },

    deleteColumn: function () {
        var selected = this.grid.getSelectionModel();

        if (selected.selection) {
            var column = selected.selection.colIdx;

            var currentData = this.getValue();

            for (var i = 0; i < currentData.length; i++) {
                currentData[i].splice(column, 1);
            }

            this.initStore(currentData);
            this.dirty = true;
        }
    },

    getValue: function () {
        var data = this.store.queryBy(function (record, id) {
            return true;
        });

        var fields = this.store.getInitialConfig().fields;

        var storedData = [];
        var tmData = [];
        for (var i = 0; i < data.items.length; i++) {
            tmData = [];

            for (var u = 0; u < fields.length; u++) {
                tmData.push(data.items[i].data[fields[u].name]);
            }
            storedData.push(tmData);
        }

        return storedData;
    },

    getName: function () {
        return this.fieldConfig.name;
    },

    isDirty: function () {
        if ((this.component && !this.isRendered())) {
            return false;
        }

        return this.dirty;
    },

    getCellEditValue: function () {
        return this.getValue();
    },

    pasteFromClipboard: function() {
        this.pasteField = new Ext.form.TextArea({
            width: '100%',
            emptyText: t("paste_here"),
            validateOnChange: false,
            enableKeyEvents: true,
            listeners: {
                change: function(){
                    var value = this.pasteField.getValue();
                    if (value) {

                        var lines = value.split("\n");

                        var result = [];

                        if (lines) {
                            for (var i = 0; i < lines.length; i++) {
                                var line = lines[i];
                                line = line.split("\t");
                                result.push(line);
                            }
                        }
                    }

                    this.initStore(result);
                    this.pasteWindow.close();
                }.bind(this)
            }
        });

        this.pasteWindow = new Ext.Window({
            width: 500,
            height: 200,
            modal: true,
            title: t('paste_clipboard'),
            layout: "fit"
        });

        var panel = new Ext.Panel({
            bodyStyle: "padding: 10px;",
            items: [
                this.pasteField,
            ],
            buttons: [
                {
                    text: t("cancel"),
                    iconCls: "pimcore_icon_cancel",
                    handler: function () {
                        this.pasteWindow.close();
                    }.bind(this)
                }
            ]
        });
        this.pasteWindow.add(panel);
        this.pasteWindow.show();
        this.pasteField.focus();

    }


});
