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

pimcore.registerNS("pimcore.object.preview");
pimcore.object.preview = Class.create({

    initialize: function(object) {
        this.object = object;
    },


    getLayout: function () {

        if (this.layout == null) {

            var iframeOnLoad = "pimcore.globalmanager.get('object_"
                                        + this.object.data.general.o_id + "').preview.iFrameLoaded()";

            this.frameId = 'object_preview_iframe_' + this.object.id;

            this.layout = Ext.create('Ext.panel.Panel', {
                title: t('preview'),
                border: false,
                autoScroll: true,
                closable: false,
                iconCls: "pimcore_material_icon_devices pimcore_material_icon",
                bodyCls: "pimcore_overflow_scrolling",
                html: '<iframe src="about:blank" style="width: 100%;" onload="' + iframeOnLoad
                    + '" frameborder="0" id="' + this.frameId + '"></iframe>'
            });

            this.layout.on("resize", this.setLayoutFrameDimensions.bind(this));
            this.layout.on("activate", this.refresh.bind(this));
        }

        return this.layout;
    },


    createLoadingMask: function() {
        if (!this.loadMask) {
            this.loadMask = new Ext.LoadMask(
                {
                    target: this.layout,
                    msg:t("please_wait")
                });

             //= new Ext.LoadMask(this.layout.getEl(), {msg: t("please_wait")});
            this.loadMask.enable();
        }
    },

    setLayoutFrameDimensions: function (el, width, height, rWidth, rHeight) {
        Ext.get(this.frameId).setStyle({
            height: (height-7) + "px"
        });
    },

    iFrameLoaded: function () {
        if (this.loadMask) {
            this.loadMask.hide();
        }
    },

    loadCurrentPreview: function () {
        var date = new Date();
        var url = Routing.generate('pimcore_admin_dataobject_dataobject_preview', {id: this.object.data.general.o_id, time: date.getTime()});

        try {
            Ext.get(this.frameId).dom.src = url;
        }
        catch (e) {
            console.log(e);
        }
    },

    refresh: function () {
        this.createLoadingMask();
        this.loadMask.enable();
        this.object.saveToSession(function () {
            if (this.preview) {
                this.preview.loadCurrentPreview();
            }
        }.bind(this.object));
    }
});
