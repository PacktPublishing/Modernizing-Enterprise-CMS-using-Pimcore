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

pimcore.registerNS("pimcore.tool.paralleljobs");
pimcore.tool.paralleljobs = Class.create({

    initialize: function (config) {

        this.config = config;

        if(this.config["stopOnError"] !== false) {
            this.config["stopOnError"] = true;
        }

        this.groupsFinished = 0;
        this.groupsTotal = this.config.jobs.length;
        this.alloverJobs = 0;
        this.alloverJobsFinished = 0;

        for(var i=0; i<this.groupsTotal; i++) {
            this.alloverJobs += this.config.jobs[i].length;
        }
        
        this.groupStart();
    },

    groupStart: function () {

        this.jobsRunning = 0;
        this.jobsFinished = 0;
        this.jobsStarted = 0;
        this.jobsTotal = this.config.jobs[this.groupsFinished].length;

        this.jobsInterval = window.setInterval(this.processJob.bind(this),50);
    },

    groupFinished: function () {

        this.groupsFinished++;

        if(this.groupsFinished < this.groupsTotal) {
            this.groupStart();
        } else {
            // call success callback
            if(typeof this.config.success == "function") {
                this.config.success();
            }
        }
    },

    error: function (message, rdata) {

        if(this.config["stopOnError"]) {
            clearInterval(this.jobsInterval);
        }

        if(typeof this.config.failure == "function") {
            this.config.failure(message, rdata);
        }
    },

    continue: function (response) {
        this.jobsFinished++;
        this.jobsRunning-=1;
        this.alloverJobsFinished++;

        // update
        var status = this.alloverJobsFinished / this.alloverJobs;
        var percent = Math.ceil(status * 100);

        try {
            if(typeof this.config.update == "function") {
                this.config.update(this.alloverJobsFinished, this.alloverJobs, percent, response);
            }
        } catch (e2) {}
    },

    processJob: function () {

        var maxConcurrentJobs = 10;

        if(this.jobsFinished == this.jobsTotal) {
            clearInterval(this.jobsInterval);

            this.groupFinished();
            return;
        }

        if(this.jobsRunning < maxConcurrentJobs && this.jobsStarted < this.jobsTotal) {

            this.jobsRunning++;

            var method = 'POST';
            if(this.config.jobs[this.groupsFinished][this.jobsStarted]['method']) {
                method = this.config.jobs[this.groupsFinished][this.jobsStarted]['method'];
            }

            var requestConfig = {
                url: this.config.jobs[this.groupsFinished][this.jobsStarted].url,
                method: method,
                params: this.config.jobs[this.groupsFinished][this.jobsStarted].params,
                success: function (response) {
                    var res = null;
                    try {
                        res = Ext.decode(response.responseText);
                        if(!res["success"]) {
                            // if the download fails, stop all activity
                            throw res;
                        }
                    } catch (e) {
                        console.log(e);
                        console.log(response);
                        this.error((res && res["message"]) ? res["message"] : response.responseText, res);

                        if(this.config["stopOnError"]) {
                            // stop here
                            return;
                        }
                    }

                    this.continue(res ? res : response);
                }.bind(this),
                failure: function (response) {
                    this.error(response.responseText);

                    if(!this.config["stopOnError"]) {
                        this.continue();
                    }
                }.bind(this)
            };

            if ('undefined' !== typeof this.config.jobs[this.groupsFinished][this.jobsStarted].method) {
                requestConfig.method = this.config.jobs[this.groupsFinished][this.jobsStarted].method;
            }

            Ext.Ajax.request(requestConfig);

            this.jobsStarted++;
        }
    }
});
