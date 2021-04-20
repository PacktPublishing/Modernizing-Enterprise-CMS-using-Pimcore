pimcore.registerNS("pimcore.plugin.BlogBundle");

pimcore.plugin.BlogBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.BlogBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        // alert("BlogBundle ready!");
    }
});

var BlogBundlePlugin = new pimcore.plugin.BlogBundle();
