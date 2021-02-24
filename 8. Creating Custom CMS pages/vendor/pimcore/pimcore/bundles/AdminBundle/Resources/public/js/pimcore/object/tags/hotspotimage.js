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

pimcore.registerNS("pimcore.object.tags.hotspotimage");
pimcore.object.tags.hotspotimage = Class.create(pimcore.object.tags.image, {

    type: "hotspotimage",
    data: null,

    marginTop: 10,
    marginLeft: 8,
    fileinfo: null,
    previewItems: [],

    initialize: function (data, fieldConfig, additionalConfig) {
        this.hotspots = [];
        this.marker = [];
        this.crop = {};
        this.predefinedDataTemplates = {};
        if (fieldConfig.predefinedDataTemplates) {
            try {
                this.predefinedDataTemplates = Ext.decode(fieldConfig.predefinedDataTemplates);
            } catch (e) {
                console.log(e);
            }
        }

        if (data) {
            this.data = {};
            this.data.id = data.id;
            this.hotspots = data.hotspots;
            this.marker = data.marker;
            this.crop = data.crop;
        } else {
            this.data = {};

        }
        this.fieldConfig = fieldConfig;
        this.additionalConfig = additionalConfig || {};
    },


    getGridColumnConfig: function (field, forGridConfigPreview) {
        return {
            text: t(field.label), width: 100, sortable: false, dataIndex: field.key,
            getEditor: this.getWindowCellEditor.bind(this, field),
            renderer: function (key, value, metaData, record, rowIndex, colIndex, store, view) {
                this.applyPermissionStyle(key, value, metaData, record);

                if (record.data.inheritedFields && record.data.inheritedFields[key] && record.data.inheritedFields[key].inherited == true) {
                    metaData.tdCls += " grid_value_inherited";
                }

                if (value && value.id) {
                    var params = {
                        id: value.id
                    };

                    if (forGridConfigPreview) {
                        params['width'] = 88;
                        params['height'] = 20;
                        params['frame'] = true;

                        return '<img src="' + Routing.generate('pimcore_admin_asset_getimagethumbnail', params)  + '" />';
                    } else {
                        params['width'] = 88;
                        params['height'] = 88;
                        params['frame'] = true;

                        var url = Routing.generate('pimcore_admin_asset_getimagethumbnail', params);

                        if (value.crop) {
                            var cropParams = Ext.Object.toQueryString(value.crop);
                            url = Ext.String.urlAppend(url, cropParams);
                        }

                        url = '<img src="' + url + '" style="width:88px; height:88px;" />';
                        return url;
                    }
                }
            }.bind(this, field.key)
        };
    },

    getLayoutEdit: function () {

        if (intval(this.fieldConfig.width) < 1) {
            this.fieldConfig.width = 400;
        }
        if (intval(this.fieldConfig.height) < 1) {
            this.fieldConfig.height = 300;
        }

        var items = [];
        if (!this.additionalConfig.condensed) {
            items.push({
                xtype: "tbspacer",
                width: 48,
                height: 24,
                cls: "pimcore_icon_droptarget_upload"
            });

            items.push({
                xtype: "tbtext",
                text: "<b>" + this.fieldConfig.title + "</b>"
            });

            items.push("->");
        }

        if (this.additionalConfig.gallery) {
            items.push(
                {
                    xtype: "button",
                    iconCls: "pimcore_icon_left",
                    handler: function (image) {
                        this.move(-1, image.container);
                    }.bind(this.additionalConfig.callback, this)
                }
            );

            items.push(
                {
                    xtype: "button",
                    iconCls: "pimcore_icon_right",
                    handler: function (image) {
                        this.move(+1, image.container);
                    }.bind(this.additionalConfig.callback, this)
                }
            );

            items.push(
                {
                    xtype: "button",
                    tooltip: t("add"),
                    overflowText: t('add'),
                    iconCls: "pimcore_icon_plus",
                    handler: function (image) {
                        this.add(image.container);
                    }.bind(this.additionalConfig.callback, this)
                }
            );

            items.push(
                {
                    xtype: "button",
                    tooltip: t("delete"),
                    overflowText: t('delete'),
                    iconCls: "pimcore_icon_delete",
                    handler: function (image) {
                        this.delete(image.container);
                    }.bind(this.additionalConfig.callback, this)
                }
            );


        }

        items.push(
            {
                xtype: "button",
                tooltip: t("crop"),
                overflowText: t('crop'),
                iconCls: "pimcore_icon_image_region",
                handler: this.openCropWindow.bind(this)
            }
        );

        items.push({
            xtype: "button",
            tooltip: t("add_marker_or_hotspots"),
            overflowText: t('add_marker_or_hotspots'),
            iconCls: "pimcore_icon_marker pimcore_icon_overlay_edit",
            handler: this.openHotspotWindow.bind(this)
        });

        items.push({
            xtype: "button",
            tooltip: t("clear_marker_or_hotspots"),
            overflowText: t('clear_marker_or_hotspots'),
            iconCls: "pimcore_icon_marker pimcore_icon_overlay_delete",
            handler: this.clearData.bind(this)
        });

        items.push({
            xtype: "button",
            iconCls: "pimcore_icon_open",
            overflowText: t('open'),
            handler: this.openImage.bind(this)
        });

        items.push({
            xtype: "button",
            iconCls: "pimcore_icon_delete",
            overflowText: t('empty'),
            handler: this.empty.bind(this, false)
        });

        items.push({
                xtype: "button",
                iconCls: "pimcore_icon_search",
                overflowText: t('search'),
                handler: this.openSearchEditor.bind(this)
            }
        );

        items.push({
            xtype: "button",
            iconCls: "pimcore_icon_upload",
            overflowText: t('upload'),
            cls: "pimcore_inline_upload",
            handler: this.uploadDialog.bind(this)
        });

        var toolbarCfg = {
            region: "north",
            border: false,
            items: items,
            overflowHandler: 'menu'
        };

        var toolbar = new Ext.Toolbar(toolbarCfg);


        var conf = {
            width: this.fieldConfig.width,
            height: this.fieldConfig.height,
            border: true,
            componentCls: "object_field object_field_type_" + this.type,
            tbar: toolbar
        };

        if (!this.additionalConfig.gallery) {
             conf.style = "padding-bottom: 10px;";
        }

        this.component = new Ext.Panel(conf);
        this.createImagePanel();

        return this.component;
    },

    createImagePanel: function () {
        this.panel = new Ext.Panel({
            width: this.fieldConfig.width,
            height: this.fieldConfig.height - 27,
            cls: "pimcore_droptarget_image",
            bodyCls: "pimcore_droptarget_image pimcore_image_container",
            bodyStyle: "text-align: center; "
        });

        this.panel.on("afterrender", function (el) {
            // add drop zone
            new Ext.dd.DropZone(el.getEl(), {
                reference: this,
                ddGroup: "element",
                getTargetFromEvent: function (e) {
                    return this.reference.component.getEl();
                },

                onNodeOver: function (target, dd, e, data) {
                    if (data.records.length === 1 && data.records[0].data.type === "image") {
                        return Ext.dd.DropZone.prototype.dropAllowed;
                    }
                },

                onNodeDrop: this.onNodeDrop.bind(this)
            });


            el.getEl().on("contextmenu", this.onContextMenu.bind(this));

            pimcore.helpers.registerAssetDnDSingleUpload(el.getEl().dom, this.fieldConfig.uploadPath, 'path', function (e) {
                if (e['asset']['type'] === "image") {
                    this.empty(true);
                    this.dirty = true;
                    this.data.id = e['asset']['id'];
                    this.updateImage();

                    return true;
                } else {
                    pimcore.helpers.showNotification(t("error"), t('unsupported_filetype'), "error");
                }
            }.bind(this), null, this.context);

            if (this.data.id) {
                this.updateImage();
            }

        }.bind(this));

        this.component.add(this.panel);

        this.component.updateLayout();

    },

    updateImage: function () {
        // 5px padding (-10)
        var body = this.getBody();

        if (this.data && this.data['id']) {
            var width = null;
            var height = null;

            if (this.panel) {
                this.originalWidth = this.panel.initialConfig.width;
                this.originalHeight = this.panel.initialConfig.height;

                width = this.originalWidth - 10;
                height = this.originalHeight - 10;
            } else {
                width = body.getWidth() - 10;
                height = body.getHeight() - 10;
            }

            var path = Routing.generate('pimcore_admin_asset_getimagethumbnail', Ext.merge({
                id: this.data.id,
                width: width,
                height: height,
                contain: true
            }, this.crop));

            body.setStyle({
                backgroundImage: "url(" + path + ")",
                backgroundPosition: "center center",
                backgroundRepeat: "no-repeat"
            });

            this.getFileInfo(path);
        } else {
            this.fileinfo = null;
            body.setStyle({});
        }

        body.removeCls("pimcore_droptarget_image");
        body.repaint();

        this.showPreview();
    },

    getFileInfo: function (path) {
        if (!this.fileinfo) {
            Ext.Ajax.request({
                url: path,
                params: {
                    fileinfo: 1
                },
                success: function (response) {
                    this.fileinfo = Ext.decode(response.responseText);
                    this.showPreview();
                }.bind(this)
            });
        }
    },

    openCropWindow: function () {
        var editor = new pimcore.element.tag.imagecropper(this.data.id, this.crop, function (data) {
            this.crop = {};
            this.crop["cropWidth"] = data.cropWidth;
            this.crop["cropHeight"] = data.cropHeight;
            this.crop["cropTop"] = data.cropTop;
            this.crop["cropLeft"] = data.cropLeft;
            this.crop["cropPercent"] = true;

            this.dirty = true;

            this.updateImage();
        }.bind(this), {
            ratioX: this.fieldConfig.ratioX,
            ratioY: this.fieldConfig.ratioY
        });
        editor.open(true);
    },


    openHotspotWindow: function () {
        if (this.data) {
            var editor = new pimcore.element.tag.imagehotspotmarkereditor(
                this.data.id,
                {
                    hotspots: this.hotspots, marker: this.marker
                },
                function (data) {
                    this.hotspots = data["hotspots"];
                    this.marker = data["marker"];

                    this.showPreview();

                    this.dirty = true;
                }.bind(this),
                {
                    context: Ext.apply({scope: "objectEditor"}, this.getContext()),
                    predefinedDataTemplates: this.predefinedDataTemplates,
                    crop: this.crop
                }
            );
            editor.open(false);
        }
    },

    clearData: function () {
        this.doClearData();
        this.updateImage();
        pimcore.helpers.showNotification(t("success"), t("hotspots_cleared"), "success");

    },

    hasData: function () {
        return typeof this.hotspots !== "undefined" && this.hotspots.length
            || typeof this.marker !== "undefined" && this.marker.length
            || typeof this.crop !== "undefined" && !this.isEmptyObject(this.crop)
    },

    isEmptyObject: function (myObject) {
        for (var key in myObject) {
            if (myObject.hasOwnProperty(key)) {
                return false;
            }
        }

        return true
    },

    doClearData: function () {
        this.hotspots = [];
        this.marker = [];
        this.crop = {};
        this.dirty = true;
    },

    empty: function (replacement) {
        this.data = {};
        this.fileinfo = null;

        if (replacement && this.hasData()) {

            Ext.MessageBox.show({
                msg: t('clear_hotspots_msg'),
                buttons: Ext.Msg.YESNO,
                icon: Ext.MessageBox.INFO,
                modal: true,
                fn: function (btn) {
                    if (btn == "yes") {
                        this.doClearData();
                        this.updateImage();
                    }
                }.bind(this)
            });
        } else {
            this.doClearData();
        }

        this.dirty = true;
        this.component.removeAll();
        this.createImagePanel();
    }
    ,

    getValue: function () {
        return {id: this.data.id, hotspots: this.hotspots, marker: this.marker, crop: this.crop};
    }
    ,

    showPreview: function () {
        if (this.fileinfo) {
            var i;
            var originalWidth = this.originalWidth;
            var originalHeight = this.originalHeight;

            var addX = (originalWidth - this.fileinfo.width) / 2;
            var addY = (originalHeight - this.fileinfo.height) / 2;

            for (i = 0; i < this.previewItems.length; i++) {
                if (Ext.get(this.previewItems[i])) {
                    Ext.get(this.previewItems[i]).remove();
                }
            }
            this.previewItems = [];


            if (this.hotspots) {
                for (i = 0; i < this.hotspots.length; i++) {
                    var hotspotId = "hotspotId-" + uniqid();
                    this.panel.body.insertHtml("beforeEnd", '<div id="' + hotspotId + '" class="pimcore_image_hotspot"></div>');
                    this.previewItems.push(hotspotId);

                    var hotspotEl = Ext.get(hotspotId);
                    var config = this.hotspots[i];

                    //calculate absolute size based in image-size
                    var absoluteHeight = config["height"] * this.fileinfo.height / 100;
                    var absoluteWidth = config["width"] * this.fileinfo.width / 100;
                    var absoluteTop = config["top"] * this.fileinfo.height / 100;
                    var absoluteLeft = config["left"] * this.fileinfo.width / 100;

                    hotspotEl.applyStyles({
                        top: (absoluteTop + addY) + "px",
                        left: (absoluteLeft + addX) + "px",
                        height: (absoluteHeight) + "px",
                        width: (absoluteWidth) + "px"
                    });

                    this.addHotspotInfo(hotspotEl, config);
                }
            }
            if (this.marker) {
                for (i = 0; i < this.marker.length; i++) {
                    var markerId = "marker-" + uniqid();
                    this.panel.body.insertHtml("beforeEnd", '<div id="' + markerId + '" class="pimcore_image_marker"></div>');
                    this.previewItems.push(markerId);
                    var markerEl = Ext.get(markerId);

                    var config = this.marker[i];
                    var top = config["top"] / 100;
                    var left = config["left"] / 100;

                    left = ((left * this.fileinfo.width) + addX) / originalWidth;
                    top = ((top * this.fileinfo.height) + addY) / originalHeight;

                    markerEl.applyStyles({
                        top: ((originalHeight * top) - 35) + "px",
                        left: ((originalWidth * left) - 12) + "px"
                    });

                    this.addHotspotInfo(markerEl, config);
                }
            }
        }
    }
    ,

    addHotspotInfo: function (element, config) {
        if (config["name"]) {
            element.dom.setAttribute("title", config["name"]);
        }

        var functionCallback = function () {
            this.openHotspotWindow();
        };

        element.addListener('click', functionCallback.bind(this), false);
    }
    ,

    getCellEditValue: function () {
        return this.getValue();
    }
    ,

    setContainer: function (container) {
        this.container = container;
    }
});
