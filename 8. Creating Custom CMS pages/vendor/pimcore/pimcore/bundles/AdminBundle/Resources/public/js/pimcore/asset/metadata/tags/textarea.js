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

pimcore.registerNS("pimcore.asset.metadata.tags.textarea");
pimcore.asset.metadata.tags.textarea = Class.create(pimcore.asset.metadata.tags.abstract, {

    type: "textarea",

    initialize: function (data, fieldConfig) {
        this.data = data;
        this.fieldConfig = fieldConfig;
    },

    getGridColumnConfig:function (field) {
        return {
            text: t(field.label),
            width: this.getColumnWidth(field, 200),
            sortable:false,
            dataIndex:field.key,
            filter: this.getGridColumnFilter(field),
            getEditor: this.getGridColumnEditor.bind(this, field),
            renderer: this.getRenderer(field)
        };
    },

    getGridColumnEditor: function(field) {
        var editorConfig = {};

        if (field.config) {
            if (field.config.width) {
                if (intval(field.config.width) > 10) {
                    editorConfig.width = field.config.width;
                }
            }
        }

        // TEXTAREA
        if (field.type == "textarea") {
           return new Ext.form.TextArea(editorConfig);
        }
    },

    getGridColumnFilter: function(field) {
        return {type: 'string', dataIndex: field.key};
    },

    getLayoutEdit: function () {


        if (intval(this.fieldConfig.width) < 1) {
            this.fieldConfig.width = 250;
        }
        if (intval(this.fieldConfig.height) < 1) {
            this.fieldConfig.height = 250;
        }

        var labelWidth = this.fieldConfig.labelWidth ? this.fieldConfig.labelWidth : 100;

        var conf = {
            name: this.fieldConfig.name,
            width: this.fieldConfig.width,
            height: this.fieldConfig.height,
            fieldLabel: this.fieldConfig.title,
            componentCls: "object_field",
            labelWidth: labelWidth
        };

        conf.width += conf.labelWidth;

        if (this.data) {
            conf.value = this.data;
        }

        this.component = new Ext.form.TextArea(conf);

        return this.component;
    },


    getLayoutShow: function () {
        var layout = this.getLayoutEdit();
        this.component.setReadOnly(true);
        return layout;
    },

    getValue: function () {
        return this.component.getValue();
    },

    getName: function () {
        return this.fieldConfig.name;
    },

    getGridCellEditor: function (gridtype, record) {
        return Ext.create('Ext.form.TextArea');
    },

    getGridCellRenderer: function(value, metaData, record, rowIndex, colIndex, store) {
        if (value) {
            return nl2br(value);
        } else {
            return "";
        }
    }
});