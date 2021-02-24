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

pimcore.registerNS("pimcore.object.classes.data.classificationstore");
pimcore.object.classes.data.classificationstore = Class.create(pimcore.object.classes.data.data, {

    type: "classificationstore",
    /**
     * define where this datatype is allowed
     */
    allowIn: {
        object: true,
        objectbrick: false,
        fieldcollection: false,
        localizedfield: false,
        classificationstore : false
    },

    initialize: function (treeNode, initData) {
        this.type = "classificationstore";

        this.initData(initData);
        this.treeNode = treeNode;
    },

    getTypeName: function () {
        return t("classificationstore");
    },

    getGroup: function () {
        return "structured";
    },

    getIconClass: function () {
        return "pimcore_icon_classificationstore";
    },

    getLayout: function ($super) {

        //this.datax.name = "classificationstore";

        $super();

        this.specificPanel.removeAll();

        this.specificPanel.add({
                    xtype: "numberfield",
                    name: "labelWidth",
                    fieldLabel: t("label_width"),
                    value: this.datax.labelWidth
        });

        this.specificPanel.add({
            xtype: "checkbox",
            name: "localized",
            fieldLabel: t("localized"),
            checked: this.datax.localized
        });

        this.specificPanel.add({
            xtype: "textarea",
            name: "allowedGroupIds",
            width: 500,
            height: 150,
            fieldLabel: t("allowed_group_ids"),
            value: this.datax.allowedGroupIds
        });

        this.specificPanel.add({
            xtype: "numberfield",
            fieldLabel: t("classificationstore_group_limitation"),
            name: "maxItems",
            value: this.datax.maxItems,
            minValue: 0
        });

        var  store = new Ext.data.Store({
            proxy: {
                type: 'ajax',
                url: Routing.generate('pimcore_admin_dataobject_classificationstore_liststores')
            },
            autoDestroy: false,
            autoLoad: true,
            listeners: {
                load: function() {
                    this.storeCombo.setValue(this.datax.storeId ? this.datax.storeId : 1);
                }.bind(this)
            }
        });

        this.storeCombo = new Ext.form.ComboBox({
            name: "storeId",
            fieldLabel: t("store"),
            value: this.datax.storeId ? this.datax.storeId : 1,
            store: store,
            displayField: 'name',
            valueField: 'id'
        });

        this.specificPanel.add(this.storeCombo);

        this.specificPanel.add({
            xtype: "checkbox",
            name: "hideEmptyData",
            fieldLabel: t("hide_empty_data"),
            checked: this.datax.hideEmptyData
        });

        this.specificPanel.add({
            xtype: "checkbox",
            name: "disallowAddRemove",
            fieldLabel: t("disallow_addremove"),
            checked: this.datax.disallowAddRemove

        });

        this.layout.on("render", this.layoutRendered.bind(this));

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
                    region: source.datax.region,
                    layout: source.datax.layout,
                    width: source.datax.width,
                    height: source.datax.height,
                    maxTabs: source.datax.maxTabs,
                    labelWidth: source.datax.labelWidth,
                    localized: source.datax.localized,
                    allowedGroupIds: source.datax.allowedGroupIds,
                    hideEmptyData: source.datax.hideEmptyData,
                    disallowAddRemove: source.datax.disallowAddRemove,
                    storeId: source.datax.storeId 
                });
        }
    }
});
