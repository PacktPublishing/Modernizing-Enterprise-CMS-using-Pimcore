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

pimcore.registerNS("pimcore.object.classes.layout.button");
pimcore.object.classes.layout.button = Class.create(pimcore.object.classes.layout.layout, {

    type: "button",

    initialize: function (treeNode, initData) {
        this.type = "button";

        this.initData(initData);

        this.treeNode = treeNode;
    },

    getTypeName: function () {
        return t("button");
    },

    getIconClass: function () {
        return "pimcore_icon_button";
    },

    getLayout: function () {

        this.layout = new Ext.Panel({
            title: '<b>' + this.getTypeName() + '</b>',
            bodyStyle: 'padding: 10px;',
            items: [
                {
                    xtype: "form",
                    bodyStyle: "padding: 10px;",
                    style: "margin: 10px 0 10px 0",
                    items: [
                        {
                            xtype: "textfield",
                            fieldLabel: t("name"),
                            name: "name",
                            enableKeyEvents: true,
                            value: this.datax.name
                        },
                        {
                            xtype: "textfield",
                            fieldLabel: t("text"),
                            name: "text",
                            value: this.datax.text
                        },
						{
							xtype: "textfield",
							fieldLabel: t("icon"),
							name: "icon",
							value: this.datax.icon,
							enableKeyEvents: true,
							listeners: {
								"keyup": function (el) {
									el.inputEl.applyStyles("background:url(" + el.getValue() + ") right center no-repeat;");
								},
								"afterrender": function (el) {
									el.inputEl.applyStyles("background:url(" + el.getValue() + ") right center no-repeat;");
								}
							},
                            width: 600
						},
                        {
                            xtype: "textarea",
                            width: 400,
                            height: 300,
                            emptyText: '(function () {  alert("This is just an example ;-)")  }) ',
                            fieldLabel: t("handler"),
                            name: "handler",
                            value: this.datax.handler
                        },
                        {
                            xtype: "textfield",
                            fieldLabel: t("width"),
                            name: "width",
                            value: this.datax.width
                        },
                        {
                            xtype: "displayfield",
                            hideLabel: true,
                            value: t('width_explanation')
                        },
                        {
                            xtype: "textfield",
                            fieldLabel: t("height"),
                            name: "height",
                            value: this.datax.height
                        },
                        {
                            xtype: "displayfield",
                            hideLabel: true,
                            value: t('height_explanation')
                        }
                    ]
                }
            ]
        });


        this.layout.on("render", this.layoutRendered.bind(this));

        return this.layout;
    }
});
