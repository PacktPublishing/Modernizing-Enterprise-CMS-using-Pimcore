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

pimcore.registerNS("pimcore.object.gridcolumn.operator.objectbrickgetter");

pimcore.object.gridcolumn.operator.objectbrickgetter = Class.create(pimcore.object.gridcolumn.Abstract, {
    operatorGroup: "extractor",
    type: "operator",
    class: "ObjectBrickGetter",
    iconCls: "pimcore_icon_objectbricks",
    defaultText: "ObjectBrick Getter",
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
                expandable: false,
                isChildAllowed: this.allowChild
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
                leaf: true,
                isChildAllowed: this.allowChild
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
            expandable: false,
            isOperator: true,
            isChildAllowed: this.allowChild,
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
            value: this.node.data.configAttributes.label,
            allowBlank: true
        });

        this.attributeField = new Ext.form.TextField({
            fieldLabel: t('attribute'),
            length: 255,
            width: 200,
            value: this.node.data.configAttributes.attr,
            allowBlank: false
        });

        this.brickTypeField = new Ext.form.TextField({
            fieldLabel: t('brick_type'),
            length: 255,
            width: 200,
            value: this.node.data.configAttributes.brickType,
            allowBlank: false
        });


        this.brickAttributeField = new Ext.form.TextField({
            fieldLabel: t('brick_attribute'),
            length: 255,
            width: 200,
            value: this.node.data.configAttributes.brickAttr,
            allowBlank: false
        });



        this.configPanel = new Ext.form.Panel({
            layout: "form",
            bodyStyle: "padding: 10px;",
            items: [this.textfield, this.attributeField, this.brickTypeField, this.brickAttributeField],
            buttons: [{
                text: t("apply"),
                iconCls: "pimcore_icon_apply",
                handler: function () {
                    if (this.configPanel.isValid()) {
                        this.commitData(params);
                    } else {
                        Ext.MessageBox.show({
                            title:t('error'),
                            msg: t('Please fill all required fields correctly.'),
                            buttons: Ext.Msg.OK ,
                            icon: Ext.MessageBox.ERROR
                        });
                    }
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
        this.node.data.configAttributes.label = this.textfield.getValue();
        this.node.data.configAttributes.attr = this.attributeField.getValue();
        this.node.data.configAttributes.brickType = this.brickTypeField.getValue();
        this.node.data.configAttributes.brickAttr = this.brickAttributeField.getValue();
        var nodeLabel = this.getNodeLabel(this.node.data.configAttributes);
        this.node.set('text', nodeLabel);
        this.node.set('isOperator', true);
        this.window.close();

        if (params && params.callback) {
            params.callback();
        }
    },

    allowChild: function (targetNode, dropNode) {
        if (targetNode.childNodes.length > 0) {
            return false;
        }
        return true;
    },

    getNodeLabel: function (configAttributes) {
        var nodeLabel = configAttributes.label ? configAttributes.label : this.getDefaultText();
        if (configAttributes.attr) {
            nodeLabel += '<span class="pimcore_gridnode_hint"> (' + configAttributes.attr  + "-" + configAttributes.brickType  + "-" + configAttributes.brickAttr + ')</span>';
        }

        return nodeLabel;
    },
});