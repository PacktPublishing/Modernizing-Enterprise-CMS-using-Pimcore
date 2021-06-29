/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Commercial License (PCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PCL
 */

pimcore.registerNS("pimcore.report.custom.definition.sql");
pimcore.report.custom.definition.sql = Class.create({

    element: null,
    sourceDefinitionData: null,
    columnSettingsCallback: null,

    initialize: function (sourceDefinitionData, key, deleteControl, columnSettingsCallback) {
        this.sourceDefinitionData = sourceDefinitionData;
        this.columnSettingsCallback = columnSettingsCallback;
        this.groupByStore = new Ext.data.ArrayStore({
            fields: ['text'],
            data: [],
            expandData: true
        });

        this.element = new Ext.form.FormPanel({
            key: key,
            bodyStyle: "padding:10px;",
            autoHeight: true,
            border: false,
            tbar: deleteControl,
            listeners: {
                afterrender: function() {
                    this.updateGroupByMultiSelectStore(true);
                }.bind(this)
            },
            items: [
                {
                    xtype: "textarea",
                    name: "sql",
                    fieldLabel: "SELECT <br /><small>(eg. a,b,c)</small>",
                    value: (sourceDefinitionData ? sourceDefinitionData.sql : ""),
                    width: 500,
                    height: 150,
                    grow: true,
                    growMax: 200,
                    enableKeyEvents: true,
                    listeners: {
                        keyup: this.onSqlEditorKeyup.bind(this)
                    }
                },
                {
                    xtype: "textarea",
                    name: "from",
                    fieldLabel: "FROM <br /><small>(eg. d INNER JOIN e ON c.a = e.b)</small>",
                    value: (sourceDefinitionData ? sourceDefinitionData.from : ""),
                    width: 500,
                    height: 150,
                    grow: true,
                    growMax: 200,
                    enableKeyEvents: true,
                    listeners: {
                        keyup: this.onSqlEditorKeyup.bind(this)
                    }
                },
                {
                    xtype: "textarea",
                    name: "where",
                    fieldLabel: "WHERE <br /><small>(eg. c = 'some_value')</small>",
                    value: (sourceDefinitionData ? sourceDefinitionData.where : ""),
                    width: 500,
                    height: 150,
                    grow: true,
                    growMax: 200,
                    enableKeyEvents: true,
                    listeners: {
                        keyup: this.onSqlEditorKeyup.bind(this)
                    }
                },
                {
                    xtype: "textarea",
                    name: "groupby",
                    fieldLabel: "GROUP BY <br /><small>(eg. b, c )</small>",
                    value: (sourceDefinitionData ? sourceDefinitionData.groupby : ""),
                    width: 500,
                    height: 150,
                    grow: true,
                    growMax: 200,
                    enableKeyEvents: true,
                    listeners: {
                        keyup: this.onSqlEditorKeyup.bind(this)
                    }
                }
            ]
        });

        this.sqlText = new Ext.form.DisplayField({
            name: "sqlText",
            style: "color: blue;"
        });
        this.element.add(this.sqlText);
        this.element.updateLayout();
    },

    getElement: function() {
        return this.element;
    },

    getValues: function() {
        var values = this.element.getForm().getFieldValues();
        values.type = "sql";
        delete values["sqlText"];
        return values;
    },

    onSqlEditorKeyup: function() {
        clearTimeout(this._keyupTimout);

        var self = this;
        this._keyupTimout = setTimeout(function() {
            self.updateGroupByMultiSelectStore(false);
        }, 500);
    },

    updateGroupByMultiSelectStore: function(addItem) {
        this.columnSettingsCallback();
        var values = this.getValues();

        if(this.sqlText) {
            var sqlText = "";
            if(values.sql) {
                if(values.sql.trim().indexOf("SELECT") !== 0) {
                    sqlText += "SELECT ";
                }
                sqlText += values.sql;
            }

            if(values.from) {
                if(values.from.trim().indexOf("FROM") !== 0) {
                    sqlText += " FROM ";
                }
                sqlText += values.from;
            }

            if(values.where) {
                if(values.where.trim().indexOf("WHERE") !== 0) {
                    sqlText += " WHERE ";
                }
                sqlText += values.where;
            }

            if(values.groupby) {
                if(values.groupby.trim().indexOf("GROUP BY") !== 0) {
                    sqlText += " GROUP BY ";
                }
                sqlText += values.groupby;
            }

            this.sqlText.setValue(sqlText);
        }
    }
});
