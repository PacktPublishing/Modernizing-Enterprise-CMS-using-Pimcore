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

pimcore.registerNS("pimcore.document.editable");
pimcore.document.editable = Class.create({

    id: null,
    name: null,
    realName: null,
    inherited: false,
    inDialogBox: null,
    required: false,
    requiredError: false,

    setupWrapper: function (styleOptions) {

        if (!styleOptions) {
            styleOptions = {};
        }

        var container = Ext.get(this.id);
        container.setStyle(styleOptions);

        return container;
    },

    setName: function(name) {
        this.name = name;
    },

    getName: function () {
        return this.name;
    },

    setRealName: function(realName) {
        this.realName = realName;
    },

    getRealName: function() {
        return this.realName;
    },

    setInDialogBox: function(inDialogBox) {
        this.inDialogBox = inDialogBox;
    },

    getInDialogBox: function() {
        return this.inDialogBox;
    },

    reloadDocument: function () {
        window.editWindow.reload();
    },

    setInherited: function(inherited, el) {
        this.inherited = inherited;

        // if an element given is as optional second parameter we use this for the mask
        if(!(el instanceof Ext.Element)) {
            el = Ext.get(this.id);
        }

        // check for inherited elements, and mask them if necessary
        if(this.inherited) {
            var mask = el.mask();
            new Ext.ToolTip({
                target: mask,
                showDelay: 100,
                trackMouse:true,
                html: t("click_right_to_overwrite")
            });
            mask.on("contextmenu", function (e) {
                var menu = new Ext.menu.Menu();
                menu.add(new Ext.menu.Item({
                    text: t('overwrite'),
                    iconCls: "pimcore_icon_overwrite",
                    handler: function (item) {
                        this.setInherited(false);
                    }.bind(this)
                }));
                menu.showAt(e.getXY());

                e.stopEvent();
            }.bind(this));
        } else {
            el.unmask();
        }
    },

    getInherited: function () {
        return this.inherited;
    },

    setId: function (id) {
        this.id = id;
    },

    getId: function () {
        return this.id;
    },

    parseConfig: function (config) {
        if(!config || config instanceof Array || typeof config != "object") {
            config = {};
        }

        return config;
    },

    /**
     * HACK to get custom data from a grid instead of the tree
     * better solutions are welcome ;-)
     */
    getCustomPimcoreDropData : function (data){
        if(typeof(data.grid) != 'undefined' && typeof(data.grid.getCustomPimcoreDropData) == 'function'){ //droped from priceList
             var record = data.grid.getStore().getAt(data.rowIndex);
             var data = data.grid.getCustomPimcoreDropData(record);
         }
        return data;
    },

    getContext: function() {
        var context = {
            scope: "documentEditor",
            containerType: "document",
            documentId: pimcore_document_id,
            fieldname: this.name
        }
        return context;
    },

    validateRequiredValue: function(value, el, parent, mark) {
        let valueLength = 1;
        if (typeof value === "string") {
            valueLength = trim(strip_tags(value)).length;
        } else if (value == null) {
            valueLength = 0;
        }

        if (valueLength < 1) {
            parent.requiredError = true;
            if (mark) {
                el.addCls('editable-error');
            }
        } else {
            parent.requiredError = false;
            if (mark) {
                el.removeCls('editable-error');
            }
        }
    }
});

