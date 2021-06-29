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

pimcore.registerNS("pimcore.settings.gdpr.dataproviders.sentMail");
pimcore.settings.gdpr.dataproviders.sentMail = Class.create({

    searchParams: [],

    initialize: function (searchParams) {
        this.searchParams = searchParams;
        this.getPanel();
    },

    getPanel: function () {

        if(!this.panel) {

            this.panel = new Ext.Panel({
                title: t("gdpr_dataSource_sentMail"),
                layout: "border",
                iconCls: "pimcore_icon_email pimcore_icon_overlay_go",
                closable: false,
                items: [
                    this.getGrid()
                ]
            });
        }

        return this.panel;
    },

    getGrid: function () {

        var iFrameSettings = { width : 700, height : 500};
        var user = pimcore.globalmanager.get("user");

        var itemsPerPage = pimcore.helpers.grid.getDefaultPageSize();

        var gridColumns = [{
            text: "ID",
            dataIndex: "id",
            flex: 40,
            hidden: true
        },{
            text: "Document Id",
            dataIndex: "documentId",
            flex: 130,
            hidden: true
        },
            {
                text: t('email_log_sent_Date'),
                dataIndex: "sentDate",
                width: 150,
                flex: false,
                sortable: false,
                renderer: function (d) {
                    var date = new Date(intval(d) * 1000);
                    return Ext.Date.format(date, "Y-m-d H:i:s");
                }
            },
            {
                text: t('from'),
                sortable: false,
                dataIndex: "from",
                flex: 120
            },
            {
                text: t('to'),
                sortable: false,
                dataIndex: "to",
                flex: 120
            },
            {
                text: t('email_log_cc'),
                sortable: false,
                dataIndex: "cc",
                flex: 120
            },
            {
                text: t('email_log_bcc'),
                sortable: false,
                dataIndex: "bcc",
                flex: 120
            },
            {
                text: t('email_log_subject'),
                sortable: false,
                dataIndex: "subject",
                flex: 220
            },
            {
                xtype: 'actioncolumn',
                sortable: false,
                width: 50,
                dataIndex: "emailLogExistsHtml",
                text: t('html'),
                menuText: t('html'),
                items : [{
                    icon: "/bundles/pimcoreadmin/img/flat-color-icons/feedback.svg",
                    handler: function(grid, rowIndex){
                        if (!user.isAllowed("emails")) {
                            pimcore.helpers.showPermissionError("emails");
                            return;
                        }

                        var rec = grid.getStore().getAt(rowIndex);
                        var url = Routing.generate('pimcore_admin_email_showemaillog', {id: rec.get('id'), type: 'html'});
                        var iframe = new Ext.Window({
                            title: t("html"),
                            width: iFrameSettings.width,
                            height: iFrameSettings.height,
                            layout: 'fit',
                            items : [{
                                xtype : "box",
                                autoEl: {tag: 'iframe', src: url}
                            }]
                        });
                        iframe.show();
                    }.bind(this),
                    getClass: function(v, meta, rec) {
                        if (!user.isAllowed("emails")) {
                            return "inactive_actioncolumn";
                        }
                        if(!rec.get('emailLogExistsHtml')){
                            return "pimcore_hidden";
                        }
                    }
                }]
            },
            {
                xtype: 'actioncolumn',
                sortable: false,
                width: 50,
                dataIndex: "emailLogExistsText",
                text: t('text'),
                menuText: t('text'),
                hidden: true,
                items : [{
                    icon: "/bundles/pimcoreadmin/img/flat-color-icons/text.svg",
                    handler: function(grid, rowIndex){
                        if (!user.isAllowed("emails")) {
                            pimcore.helpers.showPermissionError("emails");
                            return;
                        }

                        var rec = grid.getStore().getAt(rowIndex);
                        var url = Routing.generate('pimcore_admin_email_showemaillog', {id: rec.get('id'), type: 'text'});
                        var iframe = new Ext.Window({
                            title: t("text"),
                            width: iFrameSettings.width,
                            height: iFrameSettings.height,
                            layout: 'fit',
                            items : [{
                                xtype : "box",
                                autoEl: {tag: 'iframe', src: url}
                            }]
                        });
                        iframe.show();
                    }.bind(this),
                    getClass: function(v, meta, rec) {
                        if (!user.isAllowed("emails")) {
                            return "inactive_actioncolumn";
                        }
                        if(!rec.get('emailLogExistsText')){
                            return "pimcore_hidden";
                        }
                    }
                }]
            },
            {
                xtype: 'actioncolumn',
                sortable: false,
                width: 120,
                dataIndex: "params",
                hidden: false,
                text: t('parameters'),
                menuText: t('parameters'),
                items : [{
                    icon: "/bundles/pimcoreadmin/img/flat-color-icons/info.svg",
                    handler: function(grid, rowIndex){
                        if (!user.isAllowed("emails")) {
                            pimcore.helpers.showPermissionError("emails");
                            return;
                        }

                        var rec = grid.getStore().getAt(rowIndex);
                        var url = Routing.generate('pimcore_admin_email_showemaillog', {id: rec.get('id'), type: 'params'});
                        var store = Ext.create('Ext.data.TreeStore', {
                            proxy: {
                                type: 'ajax',
                                url: url,
                                reader: {
                                    type: 'json'
                                },
                                autoDestroy: true
                            }
                        });


                        this.tree =  Ext.create('Ext.tree.Panel', {
                            expanded: true,
                            rootVisible: false,
                            store: store,
                            lines: true,
                            columnLines: true,
                            columns:[
                                new Ext.tree.Column({
                                    text: t('name'),
                                    dataIndex: 'key',
                                    width: 230
                                }),
                                {
                                    text: t('value'),
                                    width: 370,
                                    dataIndex: 'data',
                                    renderer: function(value, metadata, record) {

                                        var data = record.data.data;
                                        if (data.type == 'simple') {
                                            return data.value;
                                        } else {
                                            //when the objectPath is set -> the object is still available otherwise it was
                                            // deleted in the meantime
                                            if (data.objectPath) {
                                                var subtype = data.objectClassSubType.toLowerCase();
                                                return '<span onclick="pimcore.helpers.open'
                                                    + data.objectClassBase + '(' + data.objectId + ', \''
                                                    + subtype + '\');" class="input_drop_target" style="display: block;">'
                                                    + data.objectPath + '</span>';
                                            } else {
                                                return '"' + data.objectClass + '" with Id: '
                                                    + data.objectId + ' (deleted)';
                                            }
                                        }
                                    }


                                }]
                        });

                        this.window = new Ext.Window({
                            modal: true,
                            width: 620,
                            height: "90%",
                            title: t('parameters'),
                            items: [this.tree],
                            layout: "fit"
                        });
                        this.window.show();

                    }.bind(this),
                    getClass: function(v, meta, rec) {
                        if (!user.isAllowed("emails")) {
                            return "inactive_actioncolumn";
                        }
                    }
                }]
            },
            {
                xtype: 'actioncolumn',
                menuText: t('gdpr_dataSource_export'),
                width: 40,
                items: [
                    {
                        tooltip: t('gdpr_dataSource_export'),
                        icon: "/bundles/pimcoreadmin/img/flat-color-icons/export.svg",
                        handler: function (grid, rowIndex) {
                            if (!user.isAllowed("emails")) {
                                pimcore.helpers.showPermissionError("emails");
                                return;
                            }

                            var data = grid.getStore().getAt(rowIndex);
                            pimcore.helpers.download(Routing.generate('pimcore_admin_gdpr_sentmail_exportdataobject', {id: data.data.id}));
                        }.bind(this),
                        getClass: function(v, meta, rec) {
                            if (!user.isAllowed("emails")) {
                                return "inactive_actioncolumn";
                            }
                        }

                    }
                ]
            },
            {
                xtype: 'actioncolumn',
                menuText: t('delete'),
                width: 30,
                items: [{
                    tooltip: t('delete'),
                    icon: "/bundles/pimcoreadmin/img/flat-color-icons/delete.svg",
                    handler: function (grid, rowIndex) {
                        if (!user.isAllowed("emails")) {
                            pimcore.helpers.showPermissionError("emails");
                            return;
                        }

                        var rec = grid.getStore().getAt(rowIndex);

                        Ext.MessageBox.show({
                            title:t('delete'),
                            msg: t("are_you_sure"),
                            buttons: Ext.Msg.YESNO ,
                            icon: Ext.MessageBox.QUESTION,
                            fn: function (button) {
                                if (button == "yes") {
                                    Ext.Ajax.request({
                                        url: Routing.generate('pimcore_admin_email_deleteemaillog'),
                                        method: 'DELETE',
                                        success: function(response){
                                            var data = Ext.decode( response.responseText );
                                            if(!data.success){
                                                alert("Could not delete email log");
                                            }
                                        },
                                        failure: function () {
                                            alert("Could not delete email log");
                                        },
                                        params: { id : rec.get('id') }
                                    });
                                    this.store.reload();
                                }
                            }.bind(this)
                        });



                    }.bind(this),
                    getClass: function(v, meta, rec) {
                        if (!user.isAllowed("emails")) {
                            return "inactive_actioncolumn";
                        }
                    }
                }]
            }

        ];

        var storeFields = ["id","documentId","subject","emailLogExistsHtml","params","sentDate","params",
            "modificationDate","requestUri","from","to","cc","bcc","emailLogExistsHtml",
            "emailLogExistsText"];


        this.store = pimcore.helpers.grid.buildDefaultStore(
            Routing.generate('pimcore_admin_email_emaillogs'),
            storeFields,
            itemsPerPage
        );

        var proxy = this.store.getProxy();
        proxy.extraParams["filter"] = this.searchParams.email ? this.searchParams.email : "NO-E_MAIL_GIVEN_NO_RESULT_WANTED";

        this.pagingtoolbar = pimcore.helpers.grid.buildDefaultPagingToolbar(this.store);

        var toolbar = Ext.create('Ext.Toolbar', {
            cls: 'pimcore_main_toolbar',
            items: [
                {
                    text: t("gdpr_dataSource_sentMail_only_email") + ": " + this.searchParams.email,
                    xtype: "tbtext",
                    style: "margin: 0 10px 0 0;"
                }
            ]
        });

        this.grid = new Ext.grid.GridPanel({
            frame: false,
            region: "center",
            store: this.store,
            columns : gridColumns,
            columnLines: true,
            stripeRows: true,
            border: true,
            trackMouseOver: true,
            loadMask: true,
            viewConfig: {
                forceFit: true
            },
            tbar: toolbar,
            bbar: this.pagingtoolbar
        });

        return this.grid;
    }

});
