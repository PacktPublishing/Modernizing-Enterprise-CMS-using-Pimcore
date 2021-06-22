pimcore.registerNS("pimcore.plugin.TestBundle");

pimcore.plugin.TestBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.TestBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        // alert("TestBundle ready!");
    }
});

var TestBundlePlugin = new pimcore.plugin.TestBundle();
