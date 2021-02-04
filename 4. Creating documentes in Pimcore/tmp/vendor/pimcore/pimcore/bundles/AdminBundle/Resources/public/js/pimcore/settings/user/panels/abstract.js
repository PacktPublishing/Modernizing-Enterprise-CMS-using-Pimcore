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


pimcore.registerNS("pimcore.settings.user.panels.abstract");
pimcore.settings.user.panels.abstract = Class.create({

    initialize: function () {
        this.panels = {};
        this.getTabPanel();
    },

    getEditPanel: function () {
        if (!this.editPanel) {
            this.editPanel = new Ext.TabPanel({
                activeTab: 0,
                items: [],
                region: 'center'
            });
        }

        return this.editPanel;
    },

    getTreeNodeListeners: function () {
        var treeNodeListeners = {
            'itemclick' : this.onTreeNodeClick.bind(this),
            'itemcontextmenu': this.onTreeNodeContextmenu.bind(this),
            'beforeitemappend': function (thisNode, newChildNode, index, eOpts) {
                newChildNode.data.qtip = t('id') +  ": " + newChildNode.data.id;
            }
        };

        return treeNodeListeners;
    },


    remove: function (tree, record) {

        Ext.MessageBox.show({
            title:t('delete'),
            msg: record.hasChildNodes() ? t("are_you_sure_recursive") : t("are_you_sure"),
            buttons: Ext.Msg.OKCANCEL ,
            icon: record.hasChildNodes() ? Ext.MessageBox.WARNING : Ext.MessageBox.QUESTION,
            fn: function (button) {
                if (button == "ok") {
                    Ext.Ajax.request({
                        url: Routing.generate('pimcore_admin_user_delete'),
                        method: 'DELETE',
                        params: {
                            id: record.data.id
                        },
                        success: function() {
                            var userPanelKey = "user_" + record.data.id;
                            if (this.panels[userPanelKey]) {
                                this.panels[userPanelKey].panel.close();
                                delete this.panels[userPanelKey];
                            }
                            record.remove();
                        }.bind(this, tree, record)
                    });
                }
            }.bind(this)
        });
    },


    add: function (type, cloneRecord, selectedRecord) {
        if (cloneRecord) {
            rid = cloneRecord.data.id;
            parentNode = cloneRecord.parentNode;
        } else {
            rid = 0;
            parentNode = selectedRecord;
        }
        var pid = parentNode.data.id;
        Ext.MessageBox.prompt(t('add'), t('enter_the_name_of_the_new_item'), function (button, value, object) {
            if(button=='ok' && value != ''){
                Ext.Ajax.request({
                    url: Routing.generate('pimcore_admin_user_add'),
                    method: 'POST',
                    params: {
                        parentId: pid,
                        type: type,
                        name: value,
                        active: 1,
                        rid: rid
                    },
                    success: this.addComplete.bind(this, parentNode)
                });
            }
        }.bind(this));
    }
});

