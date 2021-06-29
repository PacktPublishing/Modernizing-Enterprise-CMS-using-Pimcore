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


pimcore.registerNS("pimcore.bundle.EcommerceFramework.VoucherSeriesTab");

pimcore.bundle.EcommerceFramework.VoucherSeriesTab = Class.create({

    title: t('bundle_ecommerce_vouchertoolkit_tab'),
    iconCls: 'plugin_voucherservice_icon',
    src: null,
    id: null,

    initialize: function(object, type) {
        this.object = object;
        this.id = object.id;
        this.src = this.src + "?id=" + this.id;
        this.type = type;
        this.src = Routing.generate('pimcore_ecommerce_backend_voucher_voucher-code-tab', {id: this.id});
    },

    getLayout: function () {
        if (this.panel == null) {

            this.reloadButton = new Ext.Button({
                text: t("reload"),
                iconCls: "pimcore_icon_reload",
                handler: this.reload.bind(this)
            });


            this.panel = new Ext.Panel({
                id: "bundle_ecommerce_vouchertoolkit_tab_" + this.id,
                title: this.title,
                iconCls: this.iconCls,
                border: false,
                layout: "fit",
                closable: false,
                bodyStyle: "-webkit-overflow-scrolling:touch;",
                html: '<iframe src="about:blank" frameborder="0" width="100%" id="bundle_ecommerce_vouchertoolkit_tab_frame_' + this.id + '"></iframe>',
                tbar: [this.reloadButton]
            });

            this.panel.on("resize", this.onLayoutResize.bind(this));
            var that = this;
            this.panel.on("afterrender", function(e){
                that.panel.on("activate", function(e){
                    that.reload();
                });
            });

        }
        return this.panel;

    },

    onLayoutResize: function (el, width, height, rWidth, rHeight) {
        this.setLayoutFrameDimensions(width, height);
    },

    setLayoutFrameDimensions: function (width, height) {
        Ext.get("bundle_ecommerce_vouchertoolkit_tab_frame_" + this.id).setStyle({
            height: (height - 50) + "px"
        });
    },

    reload: function () {
        try {
            Ext.get("bundle_ecommerce_vouchertoolkit_tab_frame_" + this.id).dom.src = this.src;
        }
        catch (e) {
            console.log(e);
        }
    }

});
