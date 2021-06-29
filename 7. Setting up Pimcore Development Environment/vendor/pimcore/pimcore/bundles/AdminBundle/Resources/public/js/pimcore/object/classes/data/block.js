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

pimcore.registerNS("pimcore.object.classes.data.block");
pimcore.object.classes.data.block = Class.create(pimcore.object.classes.data.data, {

    type: "block",
    allowIndex: false,
    /**
     * define where this datatype is allowed
     */
    allowIn: {
        object: true,
        objectbrick: true,
        fieldcollection: true,
        localizedfield: true,
        classificationstore : false
    },

    initialize: function (treeNode, initData) {
        this.type = "block";

        this.initData(initData);
        this.treeNode = treeNode;

        this.availableSettingsFields = ["name","title","noteditable","invisible","style"];
    },

    getTypeName: function () {
        return t("block");
    },

    getGroup: function () {
        return "structured";
    },

    getIconClass: function () {
        return "pimcore_icon_block";
    },

    getLayout: function ($super) {

        $super();

        this.specificPanel.removeAll();

        this.specificPanel.add([
            {
                xtype: "numberfield",
                fieldLabel: t("maximum_items"),
                name: "maxItems",
                value: this.datax.maxItems,
                minValue: 0
            },
            {
                xtype: "checkbox",
                fieldLabel: t("lazy_loading"),
                name: "lazyLoading",
                disabled: this.isInCustomLayoutEditor(),
                checked: this.datax.lazyLoading
            },
            {
                xtype: "checkbox",
                fieldLabel: t("disallow_addremove"),
                name: "disallowAddRemove",
                checked: this.datax.disallowAddRemove
            },
            {
                xtype: "checkbox",
                fieldLabel: t("disallow_reorder"),
                name: "disallowReorder",
                checked: this.datax.disallowReorder
            },
            {
                xtype: "textfield",
                fieldLabel: t("css_style") + " (float: left; margin:10px; ...)",
                name: "styleElement",
                itemId: "styleElement",
                value: this.datax.styleElement,
                width: 740
            }
        ]);

        this.specificPanel.updateLayout();

        this.standardSettingsForm.add(
            [
                {
                    xtype: "checkbox",
                    fieldLabel: t("collapsible"),
                    name: "collapsible",
                    checked: this.datax.collapsible
                },
                {
                    xtype: "checkbox",
                    fieldLabel: t("collapsed"),
                    name: "collapsed",
                    checked: this.datax.collapsed
                }
            ]

        );

        this.standardSettingsForm.updateLayout();
        return this.layout;

    },

    getData: function ($super) {
        var data = $super();

        return data;
    },

    applySpecialData: function(source) {
        if (source.datax) {
            if (!this.datax) {
                this.datax =  {};
            }
            Ext.apply(this.datax,
                {
                    maxItems: source.datax.maxItems,
                    disallowAddRemove: source.datax.disallowAddRemove,
                    disallowReorder: source.datax.disallowReorder,
                    collapsible: source.datax.collapsible,
                    collapsed: source.datax.collapsed,
                    lazyLoading: source.datax.lazyLoading,
                    styleElement: source.datax.styleElement
                    
                });
        }
    }
});
