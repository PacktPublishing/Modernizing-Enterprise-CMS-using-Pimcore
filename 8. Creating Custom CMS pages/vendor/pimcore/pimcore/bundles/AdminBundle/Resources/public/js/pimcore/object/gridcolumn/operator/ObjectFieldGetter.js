/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @category   Pimcore
 * @package    Object
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */


pimcore.registerNS("pimcore.object.gridcolumn.operator.objectfieldgetter");

pimcore.object.gridcolumn.operator.objectfieldgetter = Class.create(pimcore.object.gridcolumn.Abstract, {
    operatorGroup: "extractor",
    type: "operator",
    class: "ObjectFieldGetter",
    iconCls: "pimcore_icon_operator_object_field_getter",
    defaultText: "ObjectField Getter",
    group: "getter",

    getConfigTreeNode: function(configAttributes) {
        if(configAttributes) {
            var nodeLabel = this.getNodeLabel(configAttributes);
            var node = {
                draggable: true,
                iconCls: this.iconCls,
                text: nodeLabel,
                configAttributes: configAttributes,
                isTarget: true,
                maxChildCount: 1,
                expanded: true,
                leaf: false,
                expandable: false
            };
        } else {

            //For building up operator list
            var configAttributes = { type: this.type, class: this.class, label: this.getDefaultText()};

            var node = {
                draggable: true,
                iconCls: this.iconCls,
                text: this.getDefaultText(),
                configAttributes: configAttributes,
                isTarget: true,
                maxChildCount: 1,
                leaf: true
            };
        }
        node.isOperator = true;
        return node;
    },


    getCopyNode: function(source) {
        var copy = source.createNode({
            iconCls: this.iconCls,
            text: source.data.cssClass,
            isTarget: true,
            leaf: false,
            maxChildCount: 1,
            expanded: true,
            isOperator: true,
            configAttributes: {
                label: source.data.configAttributes.label,
                type: this.type,
                class: this.class
            }
        });
        return copy;
    },


    getConfigDialog: function(node, params) {
        this.node = node;

        this.textfield = new Ext.form.TextField({
            fieldLabel: t('label'),
            length: 255,
            width: 200,
            value: this.node.data.configAttributes.label
        });

        this.attributeField = new Ext.form.TextField({
            fieldLabel: t('attribute'),
            length: 255,
            width: 200,
            value: this.node.data.configAttributes.attribute
        });

        this.forwardAttributeField = new Ext.form.TextField({
            fieldLabel: t('forward_attribute'),
            length: 255,
            width: 200,
            value: this.node.data.configAttributes.forwardAttribute
        });


        this.configPanel = new Ext.Panel({
            layout: "form",
            bodyStyle: "padding: 10px;",
            items: [this.textfield, this.attributeField, this.forwardAttributeField],
            buttons: [{
                text: t("apply"),
                iconCls: "pimcore_icon_apply",
                handler: function () {
                    this.commitData(params);
                }.bind(this)
            }]
        });

        this.window = new Ext.Window({
            width: 400,
            height: 350,
            modal: true,
            title: t('settings'),
            layout: "fit",
            items: [this.configPanel]
        });

        this.window.show();
        return this.window;
    },

    commitData: function(params) {
        this.node.set('isOperator', true);
        this.node.data.configAttributes.label = this.textfield.getValue();
        this.node.data.configAttributes.attribute = this.attributeField.getValue();
        this.node.data.configAttributes.forwardAttribute = this.forwardAttributeField.getValue();
        this.node.set('text', this.getNodeLabel(this.node.data.configAttributes));
        this.window.close();
        if (params && params.callback) {
            params.callback();
        }
    },

    getNodeLabel: function (configAttributes) {
        var nodeLabel = configAttributes.label ? configAttributes.label : this.getDefaultText();
        if (configAttributes.attribute) {
            nodeLabel += '<span class="pimcore_gridnode_hint"> (' + configAttributes.attribute + ')</span>';
        }

        return nodeLabel;

    }
});