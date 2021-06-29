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

pimcore.registerNS("pimcore.object.classes.data.countrymultiselect");
pimcore.object.classes.data.countrymultiselect = Class.create(pimcore.object.classes.data.multiselect, {

    type: "countrymultiselect",
    /**
     * define where this datatype is allowed
     */
    allowIn: {
        object: true,
        objectbrick: true,
        fieldcollection: true,
        localizedfield: true,
        classificationstore: true,
        block: true,
        encryptedField: true
    },

    initialize: function (treeNode, initData) {
        this.type = "countrymultiselect";

        this.initData(initData);

        this.treeNode = treeNode;
    },

    getTypeName: function () {
        return t("countrymultiselect");
    },

    getIconClass: function () {
        return "pimcore_icon_countrymultiselect";
    },

    getLayout: function ($super) {

        $super();

        this.specificPanel.removeAll();
        var specificItems = this.getSpecificPanelItems(this.datax, false);
        this.specificPanel.add(specificItems);


        return this.layout;
    },

    getSpecificPanelItems: function (datax, inEncryptedField) {

        var countryProxy = {
            type: 'ajax',
            url: Routing.generate('pimcore_admin_settings_getavailablecountries'),
            reader: {
                type: 'json',
                rootProperty: 'data'
            }
        };

        var possibleOptions;
        var countryStore = new Ext.data.Store({
            proxy: countryProxy,
            fields: [
                {name: 'key'},
                {name: 'value'}
            ]
        });

        var options = {
            itemId: "valueeditor",
            name: "restrictTo",
            triggerAction: "all",
            editable: false,
            fieldLabel: t("restrict_selection_to"),
            store: countryStore,
            componentCls: "object_field",
            height: 200,
            width: 300,
            valueField: 'value',
            displayField: 'key',
            listeners: {
                afterRender: function () {
                    if (datax.restrictTo) {
                        possibleOptions.setValue(datax.restrictTo);
                    }
                }.bind(this)
            }
        };
        if (this.isInCustomLayoutEditor()) {
            options.disabled = true;
        }

        var possibleOptions = new Ext.ux.form.MultiSelect(options);

        var specificItems = [
            {
                xtype: "textfield",
                fieldLabel: t("width"),
                name: "width",
                value: datax.width
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
                value: datax.height
            },
            {
                xtype: "displayfield",
                hideLabel: true,
                value: t('height_explanation')
            },
            {
                xtype: "combo",
                fieldLabel: t("multiselect_render_type"),
                name: "renderType",
                itemId: "renderType",
                mode: 'local',
                store: [
                    ['list', 'List'],
                    ['tags', 'Tags']
                ],
                value: datax["renderType"] ? datax["renderType"] : 'list',
                triggerAction: "all",
                editable: false,
                forceSelection: true
            },
            possibleOptions
        ];

        countryStore.load();
        return specificItems;
    },

    applyData: function ($super) {
        $super();
        delete this.datax.options;
    },

    applySpecialData: function (source) {
        if (source.datax) {
            if (!this.datax) {
                this.datax = {};
            }
            Ext.apply(this.datax,
                {
                    restrictTo: source.datax.restrictTo,
                    width: source.datax.width,
                    height: source.datax.height,
                    renderType : source.datax.renderType

                });
        }
    }

});
