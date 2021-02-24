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

pimcore.registerNS("pimcore.document.page");
pimcore.document.page = Class.create(pimcore.document.page_snippet, {

    initialize: function(id, options) {

        this.options = options;
        this.id = intval(id);
        this.setType("page");
        this.addLoadingPanel();

        pimcore.plugin.broker.fireEvent("preOpenDocument", this, "page");
        this.getData();

    },

    init: function () {

        var user = pimcore.globalmanager.get("user");

        if (this.isAllowed("save") || this.isAllowed("publish")) {
            this.edit = new pimcore.document.edit(this);
        }
        if (this.isAllowed("settings")) {
            this.settings = new pimcore.document.pages.settings(this);
            this.scheduler = new pimcore.element.scheduler(this, "document");
        }

        if (user.isAllowed("notes_events")) {
            this.notes = new pimcore.element.notes(this, "document");
        }

        if (this.isAllowed("properties")) {
            this.properties = new pimcore.document.properties(this, "document");
        }
        if (this.isAllowed("versions")) {
            this.versions = new pimcore.document.versions(this);
        }

        this.dependencies = new pimcore.element.dependencies(this, "document");
        this.preview = new pimcore.document.pages.preview(this);
        this.reports = new pimcore.report.panel("document_page", this);
        this.tagAssignment = new pimcore.element.tag.assignment(this, "document");
        this.workflows = new pimcore.element.workflows(this, "document");
    },

    getTabPanel: function () {

        var user = pimcore.globalmanager.get("user");
        var items = [];

        if (this.isAllowed("save") || this.isAllowed("publish")) {
            items.push(this.edit.getLayout());
        }
        items.push(this.preview.getLayout());

        if (this.isAllowed("settings")) {
            items.push(this.settings.getLayout());
        }
        if (this.isAllowed("properties")) {
            items.push(this.properties.getLayout());
        }
        if (this.isAllowed("versions")) {
            items.push(this.versions.getLayout());
        }
        if (this.isAllowed("settings")) {
            items.push(this.scheduler.getLayout());
        }

        items.push(this.dependencies.getLayout());

        var reportLayout = this.reports.getLayout();
        if(reportLayout) {
            items.push(reportLayout);
        }

        if (user.isAllowed("notes_events")) {
            items.push(this.notes.getLayout());
        }

        if (user.isAllowed("workflow_details") && this.data.workflowManagement && this.data.workflowManagement.hasWorkflowManagement === true) {
            items.push(this.workflows.getLayout());
        }

        if (user.isAllowed("tags_assignment")) {
            items.push(this.tagAssignment.getLayout());
        }

        this.tabbar = new Ext.TabPanel({
            tabPosition: "top",
            region:'center',
            deferredRender:true,
            enableTabScroll:true,
            border: false,
            items: items,
            tabConfig: {
                margin: 0
            },
            activeTab: 0
        });

        return this.tabbar;
    },

    getSaveData : function (only) {

        var parameters = {};
        parameters.id = this.id;

        // get only scheduled tasks
        if (only == "scheduler") {
            try {
                parameters.scheduler = Ext.encode(this.scheduler.getValues());
                return parameters;
            }
            catch (e) {
                console.log("scheduler not available");
                return;
            }
        }


        // save all data allowed

        // data
        try {
            parameters.data = Ext.encode(this.edit.getValues());

            if(this.edit.targetGroup && this.edit.targetGroup.getValue()) {
                parameters.appendEditables = "true";
            }
        }
        catch (e2) {
            //console.log(e2);
        }

        if (this.isAllowed("properties")) {
            // properties
            try {
                parameters.properties = Ext.encode(this.properties.getValues());
            }
            catch (e3) {
                //console.log(e3);
            }
        }

        var settings = null;

        if (this.isAllowed("settings")) {
            // settings
            try {
                settings = this.settings.getValues();
                settings.published = this.data.published;
            }
            catch (e4) {
                //console.log(e4);
            }

            // scheduler
            try {
                parameters.scheduler = Ext.encode(this.scheduler.getValues());
            }
            catch (e5) {
                //console.log(e5);
            }
        }

        if(settings) {
            parameters.settings = Ext.encode(settings);
        }

        return parameters;
    },

    createScreenshot: function () {

        if(!pimcore.settings.document_generatepreviews) {
            return;
        }

        var date = new Date();
        var path = this.data.path + this.data.key + "?pimcore_preview=true&time=" + date.getTime();

        window.setTimeout(function () {
            pimcore.helpers.generatePagePreview(this.id, path);
        }.bind(this), 5000);
    }

});

