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

pimcore.registerNS("pimcore.element.abstract");
pimcore.element.abstract = Class.create({

    dirty: false,

    /**
     * if allowDirtyClose is true, a tab can be closed whether
     * the element is dirty or not, else the user will
     * be asked if he really wants to loose unsaved
     * changes.
     *
     * @private {boolean}
     */
    _allowDirtyClose: false,

    /**
     * if dirtyClose is disabled, dirtyConfirmed defines
     * whether the user already decided to close the tab
     * never the less.
     *
     * @private {boolean}
     */
    _dirtyCloseConfirmed: false,

    addToHistory: true,

    // startup / opening functions
    addLoadingPanel: function () {
        var type = pimcore.helpers.getElementTypeByObject(this);
        pimcore.helpers.addTreeNodeLoadingIndicator(type, this.id);
    },

    removeLoadingPanel: function () {
        var type = pimcore.helpers.getElementTypeByObject(this);
        pimcore.helpers.removeTreeNodeLoadingIndicator(type, this.id);
    },

    _dirtyClose: function () {
        /*
         * let a subclass also decide whether a dirty close is possible
         * or not, if onDirtyClose returns false, closing the tab
         * will be prevented using a decision dialog
         */
        var preventDirtyClose = false;
        if (typeof this.onDirtyClose === 'function') {
            preventDirtyClose = this.onDirtyClose() === false;
        }

        /*
         * dirty closing works if the subclass did not return false
         * the user disabled it in the settings
         * or the element is not dirty at all
         */
        if (!preventDirtyClose && (this.allowsDirtyClose() || !this.isDirty() || this.confirmedDirtyClose())) {
            return true;
        }

        this._confirmDirtyClose();
        return false;
    },

    // CHANGE DETECTOR
    startChangeDetector: function () {
        if (!this.changeDetectorInterval && !this.isDirty()) {
            this.changeDetectorInterval = window.setInterval(this.checkForChanges.bind(this), 1000);
        }
    },

    stopChangeDetector: function () {
        window.clearInterval(this.changeDetectorInterval);
        this.changeDetectorInterval = null;
    },

    setupChangeDetector: function () {
        /*
         * define whether the user allows dirty closing or not
         */
        this._allowDirtyClose = pimcore.globalmanager.get("user").allowDirtyClose;

        this.resetChanges();
        this.tab.on("deactivate", this.stopChangeDetector.bind(this));
        this.tab.on("activate", this.startChangeDetector.bind(this));
        this.tab.on("beforeclose", this._dirtyClose.bind(this));
        this.tab.on("destroy", this.stopChangeDetector.bind(this));
    },

    isDirty: function () {
        return this.dirty;
    },

    allowsDirtyClose: function () {
        return this._allowDirtyClose;
    },

    confirmedDirtyClose: function () {
        return this._confirmedDirtyClose;
    },

    detectedChange: function () {
        this.tab.setTitle(this.tab.initialConfig.title + " *");
        this.dirty = true;
        this.stopChangeDetector();
    },

    resetChanges: function () {
        this.changeDetectorInitData = {};

        try {
            this.tab.setTitle(this.tab.initialConfig.title);
            this.startChangeDetector();
            this.dirty = false;
        } catch(exception) {
            // tab was closed to fast
            console.error(exception);
        }
    },

    hotUpdateInitData: function() {
        this.changeDetectorInitData = {};
        this.changeDetectorInitData = this.getSaveData();

        var keys = Object.keys(liveData);

        for (var i = 0; i < keys.length; i++) {
            this.changeDetectorInitData[keys[i]] = liveData[keys[i]];
        }
    },

    checkForChanges: function () {

        // do not run when tab is not active
        if(document.hidden) {
            return;
        }

        // tab was closed before first cycle
        // stop change detector again
        if(this.tab.destroyed) {
            this.stopChangeDetector();
            return;
        }

        if (!this.changeDetectorInitData) {
            this.setupChangeDetector();
        }

        var liveData = this.getSaveData();

        var keys = Object.keys(liveData);

        for (var i = 0; i < keys.length; i++) {
            if (this.changeDetectorInitData[keys[i]]) {
                if (this.changeDetectorInitData[keys[i]] != liveData[keys[i]]) {
                    if(!this.isDirty()) {
                        this.detectedChange();
                    }
                }
            }
            this.changeDetectorInitData[keys[i]] = liveData[keys[i]];
        }
    },

    setAddToHistory: function (addToHistory) {
        this.addToHistory = addToHistory;
    },

    getAddToHistory: function () {
        return this.addToHistory;
    },

    _confirmDirtyClose: function () {
        Ext.MessageBox.confirm(
            t("element_has_unsaved_changes"),
            t("element_unsaved_changes_message"),
            function (buttonValue) {
                if (buttonValue === "yes") {
                    this._confirmedDirtyClose = true;

                    this.tab.fireEventedAction("close", [this.tab, {}]);
                    var tabPanel = Ext.getCmp("pimcore_panel_tabs");
                    tabPanel.remove(this.tab);
                }
            }.bind(this)
        );
    },

    addToMainTabPanel: function() {
        if(this.options && this.options['tabIndex'] !== undefined) {
            this.tabPanel.insert(this.options['tabIndex'], this.tab);
        } else {
            this.tabPanel.add(this.tab);
        }
    },

    getMetaInfoMenuItems: function() {
        var metainfo = this.getMetaInfo();

        return [
            {
                text: t("metainfo_copy_id"),
                iconCls: "pimcore_icon_copy",
                handler: pimcore.helpers.copyStringToClipboard.bind(this, metainfo.id)
            },
            {
                text: t("metainfo_copy_fullpath"),
                iconCls: "pimcore_icon_copy",
                handler: pimcore.helpers.copyStringToClipboard.bind(this, metainfo.path)
            },
            {
                text: t("metainfo_copy_deeplink"),
                iconCls: "pimcore_icon_copy",
                handler: pimcore.helpers.copyStringToClipboard.bind(this, metainfo.deeplink)
            }
        ];
    },

    getIconClass: function () {
        var iconClass;
        if (this.data.iconCls) {
            iconClass = this.data.iconCls;
        } else if (this.data.icon) {
            iconClass = pimcore.helpers.getClassForIcon(this.data.icon);
        }
        return iconClass;
    }
});