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

pimcore.registerNS("pimcore.object.classes.data.language");
pimcore.object.classes.data.language = Class.create(pimcore.object.classes.data.data, {

    type: "language",
    /**
     * define where this datatype is allowed
     */
    allowIn: {
        object: true,
        objectbrick: true,
        fieldcollection: true,
        localizedfield: true,
        classificationstore : true,
        block: true,
        encryptedField: true
    },

    initialize: function (treeNode, initData) {
        this.type = "language";

        this.initData(initData);

        this.treeNode = treeNode;
    },

    getTypeName: function () {
        return t("language");
    },

    getGroup: function () {
        return "select";
    },

    getIconClass: function () {
        return "pimcore_icon_language";
    },

    getLayout: function ($super) {

        $super();

        this.specificPanel.removeAll();
        var specificItems = this.getSpecificPanelItems(this.datax, false);
        this.specificPanel.add(specificItems);

        return this.layout;
    },

    getSpecificPanelItems: function (datax, inEncryptedField) {
        return[
            {
                xtype: "checkbox",
                labelStyle: "width: 350px",
                fieldLabel: t("only_configured_languages"),
                name: "onlySystemLanguages",
                checked: datax.onlySystemLanguages
            }
        ];

    },

    applySpecialData: function(source) {
    if (source.datax) {
        if (!this.datax) {
            this.datax =  {};
        }
        Ext.apply(this.datax,
            {
                onlySystemLanguages: source.datax.onlySystemLanguages
            });
    }
}
});
