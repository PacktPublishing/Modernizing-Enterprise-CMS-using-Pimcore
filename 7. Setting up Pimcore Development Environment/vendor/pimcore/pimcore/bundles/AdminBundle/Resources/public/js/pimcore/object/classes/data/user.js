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

pimcore.registerNS("pimcore.object.classes.data.user");
pimcore.object.classes.data.user = Class.create(pimcore.object.classes.data.data, {

    type: "user",
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
        this.type = "user";

        this.initData(initData);

        this.treeNode = treeNode;
    },

    getTypeName: function () {
        return t("user");
    },

    getGroup: function () {
        return "select";
    },

    getIconClass: function () {
        return "pimcore_icon_user";
    },

    getLayout: function ($super) {

        $super();

        this.specificPanel.removeAll();
        return this.layout;
    },
    
    applySpecialData: function(source) {
        if (source.datax) {
            if (!this.datax) {
                this.datax =  {};
            }
            Ext.apply(this.datax,
                {
                    unique: source.datax.unique
                });
        }
    },

    supportsUnique: function() {
        return true;
    }

});
