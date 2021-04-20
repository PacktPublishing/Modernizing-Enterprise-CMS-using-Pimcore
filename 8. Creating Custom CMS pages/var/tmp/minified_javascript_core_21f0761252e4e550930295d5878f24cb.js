(function (root, factory) {
    var routing = factory();
    if (typeof define === 'function' && define.amd) {
        // AMD. Register as an anonymous module.
        define([], routing.Routing);
    } else if (typeof module === 'object' && module.exports) {
        // Node. Does not work with strict CommonJS, but
        // only CommonJS-like environments that support module.exports,
        // like Node.
        module.exports = routing.Routing;
    } else {
        // Browser globals (root is window)
        root.Routing = routing.Routing;
        root.fos = {
            Router: routing.Router
        };
    }
}(this, function () {
    'use strict';

/**
 * @fileoverview This file defines the Router class.
 *
 * You can compile this file by running the following command from the Resources folder:
 *
 *    npm install && npm run build
 */

/**
 * Class Router
 */

var _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; };

var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; };

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var Router = function () {

    /**
     * @constructor
     * @param {Router.Context=} context
     * @param {Object.<string, Router.Route>=} routes
     */
    function Router(context, routes) {
        _classCallCheck(this, Router);

        this.context_ = context || { base_url: '', prefix: '', host: '', port: '', scheme: '', locale: '' };
        this.setRoutes(routes || {});
    }

    /**
     * Returns the current instance.
     * @returns {Router}
     */


    _createClass(Router, [{
        key: 'setRoutingData',


        /**
         * Sets data for the current instance
         * @param {Object} data
         */
        value: function setRoutingData(data) {
            this.setBaseUrl(data['base_url']);
            this.setRoutes(data['routes']);

            if ('prefix' in data) {
                this.setPrefix(data['prefix']);
            }
            if ('port' in data) {
                this.setPort(data['port']);
            }
            if ('locale' in data) {
                this.setLocale(data['locale']);
            }

            this.setHost(data['host']);
            this.setScheme(data['scheme']);
        }

        /**
         * @param {Object.<string, Router.Route>} routes
         */

    }, {
        key: 'setRoutes',
        value: function setRoutes(routes) {
            this.routes_ = Object.freeze(routes);
        }

        /**
         * @return {Object.<string, Router.Route>} routes
         */

    }, {
        key: 'getRoutes',
        value: function getRoutes() {
            return this.routes_;
        }

        /**
         * @param {string} baseUrl
         */

    }, {
        key: 'setBaseUrl',
        value: function setBaseUrl(baseUrl) {
            this.context_.base_url = baseUrl;
        }

        /**
         * @return {string}
         */

    }, {
        key: 'getBaseUrl',
        value: function getBaseUrl() {
            return this.context_.base_url;
        }

        /**
         * @param {string} prefix
         */

    }, {
        key: 'setPrefix',
        value: function setPrefix(prefix) {
            this.context_.prefix = prefix;
        }

        /**
         * @param {string} scheme
         */

    }, {
        key: 'setScheme',
        value: function setScheme(scheme) {
            this.context_.scheme = scheme;
        }

        /**
         * @return {string}
         */

    }, {
        key: 'getScheme',
        value: function getScheme() {
            return this.context_.scheme;
        }

        /**
         * @param {string} host
         */

    }, {
        key: 'setHost',
        value: function setHost(host) {
            this.context_.host = host;
        }

        /**
         * @return {string}
         */

    }, {
        key: 'getHost',
        value: function getHost() {
            return this.context_.host;
        }

        /**
         * @param {string} port
        */

    }, {
        key: 'setPort',
        value: function setPort(port) {
            this.context_.port = port;
        }

        /**
         * @return {string}
         */

    }, {
        key: 'getPort',
        value: function getPort() {
            return this.context_.port;
        }
    }, {
        key: 'setLocale',


        /**
         * @param {string} locale
         */
        value: function setLocale(locale) {
            this.context_.locale = locale;
        }

        /**
         * @return {string}
         */

    }, {
        key: 'getLocale',
        value: function getLocale() {
            return this.context_.locale;
        }
    }, {
        key: 'buildQueryParams',


        /**
         * Builds query string params added to a URL.
         * Port of jQuery's $.param() function, so credit is due there.
         *
         * @param {string} prefix
         * @param {Array|Object|string} params
         * @param {Function} add
         */
        value: function buildQueryParams(prefix, params, add) {
            var _this = this;

            var name = void 0;
            var rbracket = new RegExp(/\[\]$/);

            if (params instanceof Array) {
                params.forEach(function (val, i) {
                    if (rbracket.test(prefix)) {
                        add(prefix, val);
                    } else {
                        _this.buildQueryParams(prefix + '[' + ((typeof val === 'undefined' ? 'undefined' : _typeof(val)) === 'object' ? i : '') + ']', val, add);
                    }
                });
            } else if ((typeof params === 'undefined' ? 'undefined' : _typeof(params)) === 'object') {
                for (name in params) {
                    this.buildQueryParams(prefix + '[' + name + ']', params[name], add);
                }
            } else {
                add(prefix, params);
            }
        }

        /**
         * Returns a raw route object.
         *
         * @param {string} name
         * @return {Router.Route}
         */

    }, {
        key: 'getRoute',
        value: function getRoute(name) {
            var prefixedName = this.context_.prefix + name;
            var sf41i18nName = name + '.' + this.context_.locale;
            var prefixedSf41i18nName = this.context_.prefix + name + '.' + this.context_.locale;
            var variants = [prefixedName, sf41i18nName, prefixedSf41i18nName, name];

            for (var i in variants) {
                if (variants[i] in this.routes_) {
                    return this.routes_[variants[i]];
                }
            }

            throw new Error('The route "' + name + '" does not exist.');
        }

        /**
         * Generates the URL for a route.
         *
         * @param {string} name
         * @param {Object.<string, string>} opt_params
         * @param {boolean} absolute
         * @return {string}
         */

    }, {
        key: 'generate',
        value: function generate(name, opt_params) {
            var absolute = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : false;

            var route = this.getRoute(name),
                params = opt_params || {},
                unusedParams = _extends({}, params),
                url = '',
                optional = true,
                host = '',
                port = typeof this.getPort() == "undefined" || this.getPort() === null ? '' : this.getPort();

            route.tokens.forEach(function (token) {
                if ('text' === token[0]) {
                    url = Router.encodePathComponent(token[1]) + url;
                    optional = false;

                    return;
                }

                if ('variable' === token[0]) {
                    var hasDefault = route.defaults && token[3] in route.defaults;
                    if (false === optional || !hasDefault || token[3] in params && params[token[3]] != route.defaults[token[3]]) {
                        var value = void 0;

                        if (token[3] in params) {
                            value = params[token[3]];
                            delete unusedParams[token[3]];
                        } else if (hasDefault) {
                            value = route.defaults[token[3]];
                        } else if (optional) {
                            return;
                        } else {
                            throw new Error('The route "' + name + '" requires the parameter "' + token[3] + '".');
                        }

                        var empty = true === value || false === value || '' === value;

                        if (!empty || !optional) {
                            var encodedValue = Router.encodePathComponent(value);

                            if ('null' === encodedValue && null === value) {
                                encodedValue = '';
                            }

                            url = token[1] + encodedValue + url;
                        }

                        optional = false;
                    } else if (hasDefault && token[3] in unusedParams) {
                        delete unusedParams[token[3]];
                    }

                    return;
                }

                throw new Error('The token type "' + token[0] + '" is not supported.');
            });

            if (url === '') {
                url = '/';
            }

            route.hosttokens.forEach(function (token) {
                var value = void 0;

                if ('text' === token[0]) {
                    host = token[1] + host;

                    return;
                }

                if ('variable' === token[0]) {
                    if (token[3] in params) {
                        value = params[token[3]];
                        delete unusedParams[token[3]];
                    } else if (route.defaults && token[3] in route.defaults) {
                        value = route.defaults[token[3]];
                    }

                    host = token[1] + value + host;
                }
            });
            // Foo-bar!
            url = this.context_.base_url + url;

            if (route.requirements && "_scheme" in route.requirements && this.getScheme() != route.requirements["_scheme"]) {
                var currentHost = host || this.getHost();

                url = route.requirements["_scheme"] + "://" + currentHost + (currentHost.indexOf(':' + port) > -1 || '' === port ? '' : ':' + port) + url;
            } else if ("undefined" !== typeof route.schemes && "undefined" !== typeof route.schemes[0] && this.getScheme() !== route.schemes[0]) {
                var _currentHost = host || this.getHost();

                url = route.schemes[0] + "://" + _currentHost + (_currentHost.indexOf(':' + port) > -1 || '' === port ? '' : ':' + port) + url;
            } else if (host && this.getHost() !== host + (host.indexOf(':' + port) > -1 || '' === port ? '' : ':' + port)) {
                url = this.getScheme() + "://" + host + (host.indexOf(':' + port) > -1 || '' === port ? '' : ':' + port) + url;
            } else if (absolute === true) {
                url = this.getScheme() + "://" + this.getHost() + (this.getHost().indexOf(':' + port) > -1 || '' === port ? '' : ':' + port) + url;
            }

            if (Object.keys(unusedParams).length > 0) {
                var prefix = void 0;
                var queryParams = [];
                var add = function add(key, value) {
                    // if value is a function then call it and assign it's return value as value
                    value = typeof value === 'function' ? value() : value;

                    // change null to empty string
                    value = value === null ? '' : value;

                    queryParams.push(Router.encodeQueryComponent(key) + '=' + Router.encodeQueryComponent(value));
                };

                for (prefix in unusedParams) {
                    this.buildQueryParams(prefix, unusedParams[prefix], add);
                }

                url = url + '?' + queryParams.join('&');
            }

            return url;
        }

        /**
         * Returns the given string encoded to mimic Symfony URL generator.
         *
         * @param {string} value
         * @return {string}
         */

    }], [{
        key: 'getInstance',
        value: function getInstance() {
            return Routing;
        }

        /**
         * Configures the current Router instance with the provided data.
         * @param {Object} data
         */

    }, {
        key: 'setData',
        value: function setData(data) {
            var router = Router.getInstance();

            router.setRoutingData(data);
        }
    }, {
        key: 'customEncodeURIComponent',
        value: function customEncodeURIComponent(value) {
            return encodeURIComponent(value).replace(/%2F/g, '/').replace(/%40/g, '@').replace(/%3A/g, ':').replace(/%21/g, '!').replace(/%3B/g, ';').replace(/%2C/g, ',').replace(/%2A/g, '*').replace(/\(/g, '%28').replace(/\)/g, '%29').replace(/'/g, '%27');
        }

        /**
         * Returns the given path properly encoded to mimic Symfony URL generator.
         *
         * @param {string} value
         * @return {string}
         */

    }, {
        key: 'encodePathComponent',
        value: function encodePathComponent(value) {
            return Router.customEncodeURIComponent(value).replace(/%3D/g, '=').replace(/%2B/g, '+').replace(/%21/g, '!').replace(/%7C/g, '|');
        }

        /**
         * Returns the given query parameter or value properly encoded to mimic Symfony URL generator.
         *
         * @param {string} value
         * @return {string}
         */

    }, {
        key: 'encodeQueryComponent',
        value: function encodeQueryComponent(value) {
            return Router.customEncodeURIComponent(value).replace(/%3F/g, '?');
        }
    }]);

    return Router;
}();

/**
 * @typedef {{
 *     tokens: (Array.<Array.<string>>),
 *     defaults: (Object.<string, string>),
 *     requirements: Object,
 *     hosttokens: (Array.<string>)
 * }}
 */


Router.Route;

/**
 * @typedef {{
 *     base_url: (string)
 * }}
 */
Router.Context;

/**
 * Router singleton.
 * @const
 * @type {Router}
 */
var Routing = new Router();

    return { Router: Router, Routing: Routing };
}));


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
function t(key, defaultValue, placeholders) {
    if (!key) {
        return "";
    }

    var alreadyTranslated = pimcore.globalmanager.get("translations_admin_translated_values");
    if(!alreadyTranslated) {
        alreadyTranslated = [];
        pimcore.globalmanager.add("translations_admin_translated_values", []);
    }

    // make sure 'key' is a string
    key = String(key);

    // remove plus at the start and the end to avoid double translations
    key = key.replace(/^[\+]+(.*)[\+]+$/, function(match, $1, offset, original) {
        return $1;
    });

    var originalKey = key;
    // the maximum length of a translation key are 190 characters
    if (key.length > 190) {
        if (!defaultValue) {
            return key;
        }

        return defaultValue;
    }

    if (pimcore && pimcore.system_i18n && (pimcore.system_i18n[key] || pimcore.system_i18n[originalKey])) {
        var trans = pimcore.system_i18n[originalKey] ? pimcore.system_i18n[originalKey] : pimcore.system_i18n[key];

        // find and replace placeholders, if provided
        if (placeholders) {
            let pKeys = Object.keys(placeholders);

            for (let i = 0; i < pKeys.length; i++) {
                let regExp = new RegExp('\{(' + pKeys[i] + ')\}', 'gi');
                let replace = placeholders[pKeys[i]];

                if (trans.match(regExp)) {
                    trans = trans.replace(regExp, replace);
                }
            }
        }

        pimcore.globalmanager.get("translations_admin_translated_values").push(trans);
        return trans;
    }

    var transKeys = pimcore && pimcore.system_i18n ? Object.keys(pimcore.system_i18n) : {};
    if(pimcore && pimcore.system_i18n && transKeys.indexOf(key) === -1 && transKeys.indexOf(originalKey) === -1){
        if(!defaultValue && !in_array(key, alreadyTranslated)) {
            if(pimcore.globalmanager.exists("translations_admin_missing")) {
                if (!in_array(key, pimcore.globalmanager.get("translations_admin_added")) &&
                    !in_array(key, pimcore.globalmanager.get("translations_admin_missing"))) {
                    pimcore.globalmanager.get("translations_admin_missing").push(key);
                }
            }
        }
    }

    if(parent.pimcore.settings.debug_admin_translations){ // use parent here, because it's also used in the editmode iframe
        return "+" + key + "+";
    }  else if (defaultValue) {
        return defaultValue;
    } else {
        return originalKey;
    }
}

/**
 * @deprecated
 */
function ts(key) {
    return t(key);
}

Math.sec = function(x) {
    return 1 / Math.cos(x);
};



function RealTypeOf(v) {
  if (typeof(v) == "object") {
    if (v === null) {
        return "null";
    }
    if (v.constructor == (new Array).constructor) {
        return "array";
    }
    if (v.constructor == (new Date).constructor) {
        return "date";
    }
    if (v.constructor == (new RegExp).constructor) {
        return "regex";
    }
    return "object";
  }
  return typeof(v);
}



function FormatJSON(oData, sIndent) {
    if (arguments.length < 2) {
        var sIndent = "";
    }
    var sIndentStyle = "    ";
    var sDataType = RealTypeOf(oData);

    // open object
    if (sDataType == "array") {
        if (oData.length == 0) {
            return "[]";
        }
        var sHTML = "[";
    } else {
        var iCount = 0;
        for (let key in oData) {
            if (oData.hasOwnProperty(key)) {
                iCount++;
            }
        }
        if (iCount == 0) { // object is empty
            return "{}";
        }
        var sHTML = "{";
    }

    // loop through items
    var iCount = 0;
    var vValue = null;
    for (let sKey in oData) {
        vValue = oData[sKey];
        if (iCount > 0) {
            sHTML += ",";
        }
        if (sDataType == "array") {
            sHTML += ("\n" + sIndent + sIndentStyle);
        } else {
            sHTML += ("\n" + sIndent + sIndentStyle + "\"" + sKey + "\"" + ": ");
        }

        // display relevant data type
        switch (RealTypeOf(vValue)) {
            case "array":
            case "object":
                sHTML += FormatJSON(vValue, (sIndent + sIndentStyle));
                break;
            case "boolean":
            case "number":
                sHTML += vValue.toString();
                break;
            case "null":
                sHTML += "null";
                break;
            case "string":
                sHTML += ("\"" + vValue + "\"");
                break;
            default:
                sHTML += ("TYPEOF: " + typeof(vValue));
        }

        // loop
        iCount++;
    }

    // close object
    if (sDataType == "array") {
        sHTML += ("\n" + sIndent + "]");
    } else {
        sHTML += ("\n" + sIndent + "}");
    }

    // return
    return sHTML;
}


function in_arrayi(needle, haystack) {
    return in_array(needle.toLocaleLowerCase(), array_map(strtolower, haystack));
}


function strtolower (str) {
    // http://kevin.vanzonneveld.net
    // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   improved by: Onno Marsman
    // *     example 1: strtolower('Kevin van Zonneveld');
    // *     returns 1: 'kevin van zonneveld'
    return (str + '').toLowerCase();
}


function array_map (callback) {
    // http://kevin.vanzonneveld.net
    // +   original by: Andrea Giammarchi (http://webreflection.blogspot.com)
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   improved by: Brett Zamir (http://brett-zamir.me)
    // %        note 1: Takes a function as an argument, not a function's name
    // %        note 2: If the callback is a string, it can only work if the function name is in the global context
    // *     example 1: array_map( function (a){return (a * a * a)}, [1, 2, 3, 4, 5] );
    // *     returns 1: [ 1, 8, 27, 64, 125 ]
    var argc = arguments.length,
        argv = arguments;
    var j = argv[1].length,
        i = 0,
        k = 1,
        m = 0;
    var tmp = [],
        tmp_ar = [];

    while (i < j) {
        while (k < argc) {
            tmp[m++] = argv[k++][i];
        }

        m = 0;
        k = 1;

        if (callback) {
            if (typeof callback === 'string') {
                callback = this.window[callback];
            }
            tmp_ar[i++] = callback.apply(null, tmp);
        } else {
            tmp_ar[i++] = tmp;
        }

        tmp = [];
    }

    return tmp_ar;
}



function is_numeric(mixed_var) {
    // http://kevin.vanzonneveld.net
    // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   improved by: David
    // +   improved by: taith
    // +   bugfixed by: Tim de Koning
    // +   bugfixed by: WebDevHobo (http://webdevhobo.blogspot.com/)
    // +   bugfixed by: Brett Zamir (http://brett-zamir.me)
    // *     example 1: is_numeric(186.31);
    // *     returns 1: true
    // *     example 2: is_numeric('Kevin van Zonneveld');
    // *     returns 2: false
    // *     example 3: is_numeric('+186.31e2');
    // *     returns 3: true
    // *     example 4: is_numeric('');
    // *     returns 4: false
    // *     example 4: is_numeric([]);
    // *     returns 4: false

    return (typeof(mixed_var) === 'number' || typeof(mixed_var) === 'string') && mixed_var !== '' && !isNaN(mixed_var);
}



function in_array(needle, haystack, argStrict) {
    // Checks if the given value exists in the array
    //
    // version: 905.3120
    // discuss at: http://phpjs.org/functions/in_array
    // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   improved by: vlado houba
    // *     example 1: in_array('van', ['Kevin', 'van', 'Zonneveld']);
    // *     returns 1: true
    // *     example 2: in_array('vlado', {0: 'Kevin', vlado: 'van', 1: 'Zonneveld'});
    // *     returns 2: false
    // *     example 3: in_array(1, ['1', '2', '3']);
    // *     returns 3: true
    // *     example 3: in_array(1, ['1', '2', '3'], false);
    // *     returns 3: true
    // *     example 4: in_array(1, ['1', '2', '3'], true);
    // *     returns 4: false
    var key = '', strict = !!argStrict;

    if (strict) {
        for (key in haystack) {
            if (haystack[key] === needle) {
                return true;
            }
        }
    } else {
        for (key in haystack) {
            if (haystack[key] == needle) {
                return true;
            }
        }
    }

    return false;
}


function uniqid(prefix, more_entropy) {
    // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +    revised by: Kankrelune (http://www.webfaktory.info/)
    // %        note 1: Uses an internal counter (in php_js global) to avoid collision
    // *     example 1: uniqid();
    // *     returns 1: 'a30285b160c14'
    // *     example 2: uniqid('foo');
    // *     returns 2: 'fooa30285b1cd361'
    // *     example 3: uniqid('bar', true);
    // *     returns 3: 'bara20285b23dfd1.31879087'
    if (typeof prefix == 'undefined') {
        prefix = "";
    }

    var retId;
    var formatSeed = function(seed, reqWidth) {
        seed = parseInt(seed, 10).toString(16); // to hex str
        if (reqWidth < seed.length) { // so long we split
            return seed.slice(seed.length - reqWidth);
        }
        if (reqWidth > seed.length) { // so short we pad
            return Array(1 + (reqWidth - seed.length)).join('0') + seed;
        }
        return seed;
    };

    // BEGIN REDUNDANT
    if (!this.php_js) {
        this.php_js = {};
    }
    // END REDUNDANT
    if (!this.php_js.uniqidSeed) { // init seed with big random int
        this.php_js.uniqidSeed = Math.floor(Math.random() * 0x75bcd15);
    }
    this.php_js.uniqidSeed++;

    retId = prefix; // start with prefix, add current milliseconds hex string
    retId += formatSeed(parseInt(new Date().getTime() / 1000, 10), 8);
    retId += formatSeed(this.php_js.uniqidSeed, 5); // add seed hex string

    if (more_entropy) {
        // for more entropy we add a float lower to 10
        retId += (Math.random() * 10).toFixed(8).toString();
    }

    return retId;
}


function empty (mixed_var) {
    // http://kevin.vanzonneveld.net
    // +   original by: Philippe Baumann
    // +      input by: Onno Marsman
    // +   bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +      input by: LH
    // +   improved by: Onno Marsman
    // +   improved by: Francesco
    // +   improved by: Marc Jansen
    // +   input by: Stoyan Kyosev (http://www.svest.org/)
    // *     example 1: empty(null);
    // *     returns 1: true
    // *     example 2: empty(undefined);
    // *     returns 2: true
    // *     example 3: empty([]);
    // *     returns 3: true
    // *     example 4: empty({});
    // *     returns 4: true
    // *     example 5: empty({'aFunc' : function () { alert('humpty'); } });
    // *     returns 5: false
    var key;

    if (mixed_var === "" || mixed_var === 0 || mixed_var === "0" || mixed_var === null || mixed_var === false
                                                            || typeof mixed_var === 'undefined') {
        return true;
    }

    if (typeof mixed_var == 'object') {
        for (key in mixed_var) {
            return false;
        }
        return true;
    }

    return false;
}

function str_replace(search, replace, subject, count) {
    // Replaces all occurrences of search in haystack with replace
    //
    // version: 905.3122
    // discuss at: http://phpjs.org/functions/str_replace
    // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   improved by: Gabriel Paderni
    // +   improved by: Philip Peterson
    // +   improved by: Simon Willison (http://simonwillison.net)
    // +    revised by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
    // +   bugfixed by: Anton Ongson
    // +      input by: Onno Marsman
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +    tweaked by: Onno Marsman
    // +      input by: Brett Zamir (http://brett-zamir.me)
    // +   bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   input by: Oleg Eremeev
    // +   improved by: Brett Zamir (http://brett-zamir.me)
    // +   bugfixed by: Oleg Eremeev
    // %          note 1: The count parameter must be passed as a string in order
    // %          note 1:  to find a global variable in which the result will be given
    // *     example 1: str_replace(' ', '.', 'Kevin van Zonneveld');
    // *     returns 1: 'Kevin.van.Zonneveld'
    // *     example 2: str_replace(['{name}', 'l'], ['hello', 'm'], '{name}, lars');
    // *     returns 2: 'hemmo, mars'
    var i = 0, j = 0, temp = '', repl = '', sl = 0, fl = 0,
            f = [].concat(search),
            r = [].concat(replace),
            s = subject,
            ra = r instanceof Array, sa = s instanceof Array;
    s = [].concat(s);
    if (count) {
        this.window[count] = 0;
    }

    for (i = 0,sl = s.length; i < sl; i++) {
        if (s[i] === '') {
            continue;
        }
        for (j = 0,fl = f.length; j < fl; j++) {
            temp = s[i] + '';
            repl = ra ? (r[j] !== undefined ? r[j] : '') : r[0];
            s[i] = (temp).split(f[j]).join(repl);
            if (count && s[i] !== temp) {
                this.window[count] += (temp.length - s[i].length) / f[j].length;
            }
        }
    }
    return sa ? s : s[0];
}


function trim(str, charlist) {
    // Strips whitespace from the beginning and end of a string
    //
    // version: 905.1001
    // discuss at: http://phpjs.org/functions/trim
    // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   improved by: mdsjack (http://www.mdsjack.bo.it)
    // +   improved by: Alexander Ermolaev (http://snippets.dzone.com/user/AlexanderErmolaev)
    // +      input by: Erkekjetter
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +      input by: DxGx
    // +   improved by: Steven Levithan (http://blog.stevenlevithan.com)
    // +    tweaked by: Jack
    // +   bugfixed by: Onno Marsman
    // *     example 1: trim('    Kevin van Zonneveld    ');
    // *     returns 1: 'Kevin van Zonneveld'
    // *     example 2: trim('Hello World', 'Hdle');
    // *     returns 2: 'o Wor'
    // *     example 3: trim(16, 1);
    // *     returns 3: 6
    var whitespace, l = 0, i = 0;
    str += '';

    if (!charlist) {
        // default list
        whitespace = " \n\r\t\f\x0b\xa0\u2000\u2001\u2002\u2003\u2004\u2005\u2006\u2007\u2008\u2009\u200a\u200b\u2028\u2029\u3000";
    } else {
        // preg_quote custom list
        charlist += '';
        whitespace = charlist.replace(/([\[\]\(\)\.\?\/\*\{\}\+\$\^\:])/g, '$1');
    }

    l = str.length;
    for (i = 0; i < l; i++) {
        if (whitespace.indexOf(str.charAt(i)) === -1) {
            str = str.substring(i);
            break;
        }
    }

    l = str.length;
    for (i = l - 1; i >= 0; i--) {
        if (whitespace.indexOf(str.charAt(i)) === -1) {
            str = str.substring(0, i + 1);
            break;
        }
    }

    return whitespace.indexOf(str.charAt(0)) === -1 ? str : '';
}


function base64_encode(data) {
    // http://kevin.vanzonneveld.net
    // +   original by: Tyler Akins (http://rumkin.com)
    // +   improved by: Bayron Guevara
    // +   improved by: Thunder.m
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   bugfixed by: Pellentesque Malesuada
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // -    depends on: utf8_encode
    // *     example 1: base64_encode('Kevin van Zonneveld');
    // *     returns 1: 'S2V2aW4gdmFuIFpvbm5ldmVsZA=='

    // mozilla has this native
    // - but breaks in 2.0.0.12!
    //if (typeof this.window['atob'] == 'function') {
    //    return atob(data);
    //}

    var b64 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
    var o1, o2, o3, h1, h2, h3, h4, bits, i = 0, ac = 0, enc = "", tmp_arr = [];

    if (!data) {
        return data;
    }

    data = this.utf8_encode(data + '');

    do { // pack three octets into four hexets
        o1 = data.charCodeAt(i++);
        o2 = data.charCodeAt(i++);
        o3 = data.charCodeAt(i++);

        bits = o1 << 16 | o2 << 8 | o3;

        h1 = bits >> 18 & 0x3f;
        h2 = bits >> 12 & 0x3f;
        h3 = bits >> 6 & 0x3f;
        h4 = bits & 0x3f;

        // use hexets to index into b64, and append result to encoded string
        tmp_arr[ac++] = b64.charAt(h1) + b64.charAt(h2) + b64.charAt(h3) + b64.charAt(h4);
    } while (i < data.length);

    enc = tmp_arr.join('');

    switch (data.length % 3) {
        case 1:
            enc = enc.slice(0, -2) + '==';
            break;
        case 2:
            enc = enc.slice(0, -1) + '=';
            break;
    }

    return enc;
}

function base64_decode(data) {
    // Decodes string using MIME base64 algorithm
    //
    // version: 905.3122
    // discuss at: http://phpjs.org/functions/base64_decode
    // +   original by: Tyler Akins (http://rumkin.com)
    // +   improved by: Thunder.m
    // +      input by: Aman Gupta
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   bugfixed by: Onno Marsman
    // +   bugfixed by: Pellentesque Malesuada
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +      input by: Brett Zamir (http://brett-zamir.me)
    // +   bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // -    depends on: utf8_decode
    // *     example 1: base64_decode('S2V2aW4gdmFuIFpvbm5ldmVsZA==');
    // *     returns 1: 'Kevin van Zonneveld'
    // mozilla has this native
    // - but breaks in 2.0.0.12!
    //if (typeof this.window['btoa'] == 'function') {
    //    return btoa(data);
    //}

    var b64 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
    var o1, o2, o3, h1, h2, h3, h4, bits, i = 0, ac = 0, dec = "", tmp_arr = [];

    if (!data) {
        return data;
    }

    data += '';

    do {  // unpack four hexets into three octets using index points in b64
        h1 = b64.indexOf(data.charAt(i++));
        h2 = b64.indexOf(data.charAt(i++));
        h3 = b64.indexOf(data.charAt(i++));
        h4 = b64.indexOf(data.charAt(i++));

        bits = h1 << 18 | h2 << 12 | h3 << 6 | h4;

        o1 = bits >> 16 & 0xff;
        o2 = bits >> 8 & 0xff;
        o3 = bits & 0xff;

        if (h3 == 64) {
            tmp_arr[ac++] = String.fromCharCode(o1);
        } else if (h4 == 64) {
            tmp_arr[ac++] = String.fromCharCode(o1, o2);
        } else {
            tmp_arr[ac++] = String.fromCharCode(o1, o2, o3);
        }
    } while (i < data.length);

    dec = tmp_arr.join('');
    dec = this.utf8_decode(dec);

    return dec;
}


function utf8_decode(str_data) {
    // Converts a UTF-8 encoded string to ISO-8859-1
    //
    // version: 905.3122
    // discuss at: http://phpjs.org/functions/utf8_decode
    // +   original by: Webtoolkit.info (http://www.webtoolkit.info/)
    // +      input by: Aman Gupta
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   improved by: Norman "zEh" Fuchs
    // +   bugfixed by: hitwork
    // +   bugfixed by: Onno Marsman
    // +      input by: Brett Zamir (http://brett-zamir.me)
    // +   bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // *     example 1: utf8_decode('Kevin van Zonneveld');
    // *     returns 1: 'Kevin van Zonneveld'
    var tmp_arr = [], i = 0, ac = 0, c1 = 0, c2 = 0, c3 = 0;

    str_data += '';

    while (i < str_data.length) {
        c1 = str_data.charCodeAt(i);
        if (c1 < 128) {
            tmp_arr[ac++] = String.fromCharCode(c1);
            i++;
        } else if ((c1 > 191) && (c1 < 224)) {
            c2 = str_data.charCodeAt(i + 1);
            tmp_arr[ac++] = String.fromCharCode(((c1 & 31) << 6) | (c2 & 63));
            i += 2;
        } else {
            c2 = str_data.charCodeAt(i + 1);
            c3 = str_data.charCodeAt(i + 2);
            tmp_arr[ac++] = String.fromCharCode(((c1 & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
            i += 3;
        }
    }

    return tmp_arr.join('');
}


function ucfirst(str) {
    // Makes a string's first character uppercase
    //
    // version: 905.3122
    // discuss at: http://phpjs.org/functions/ucfirst
    // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   bugfixed by: Onno Marsman
    // +   improved by: Brett Zamir (http://brett-zamir.me)
    // *     example 1: ucfirst('kevin van zonneveld');
    // *     returns 1: 'Kevin van zonneveld'
    str += '';
    var f = str.charAt(0).toUpperCase();
    return f + str.substr(1);
}


function array_search(needle, haystack, argStrict) {
    // Searches the array for a given value and returns the corresponding key if successful
    //
    // version: 905.3122
    // discuss at: http://phpjs.org/functions/array_search
    // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +      input by: Brett Zamir (http://brett-zamir.me)
    // +   bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // *     example 1: array_search('zonneveld', {firstname: 'kevin', middle: 'van', surname: 'zonneveld'});
    // *     returns 1: 'surname'

    var strict = !!argStrict;
    var key = '';

    for (key in haystack) {
        if ((strict && haystack[key] === needle) || (!strict && haystack[key] == needle)) {
            return key;
        }
    }

    return false;
}


function mergeObject(p, c) {

    var keys = Object.keys(p);

    for (var i = 0; i < keys.length; i++) {
        if (!c[keys[i]]) {
            c[keys[i]] = p[keys[i]];
        }
    }

    return c;
}


function replace_html_event_attributes(value) {
    return value.replace(/ on[^=]+=/, function (attributeName) {
        return ' data-' + trim(attributeName);
    });
}

function strip_tags(str, allowed_tags) {
    // http://kevin.vanzonneveld.net
    // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   improved by: Luke Godfrey
    // +      input by: Pul
    // +   bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   bugfixed by: Onno Marsman
    // +      input by: Alex
    // +   bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +      input by: Marc Palau
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +      input by: Brett Zamir (http://brett-zamir.me)
    // +   bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   bugfixed by: Eric Nagel
    // +      input by: Bobby Drake
    // +   bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   bugfixed by: Tomasz Wesolowski
    // *     example 1: strip_tags('<p>Kevin</p> <br /><b>van</b> <i>Zonneveld</i>', '<i><b>');
    // *     returns 1: 'Kevin <b>van</b> <i>Zonneveld</i>'
    // *     example 2: strip_tags('<p>Kevin <img src="someimage.png" onmouseover="someFunction()">van <i>Zonneveld</i></p>', '<p>');
    // *     returns 2: '<p>Kevin van Zonneveld</p>'
    // *     example 3: strip_tags("<a href='http://kevin.vanzonneveld.net'>Kevin van Zonneveld</a>", "<a>");
    // *     returns 3: '<a href='http://kevin.vanzonneveld.net'>Kevin van Zonneveld</a>'
    // *     example 4: strip_tags('1 < 5 5 > 1');
    // *     returns 4: '1 < 5 5 > 1'

    var key = '', allowed = false;
    var matches = [];
    var allowed_array = [];
    var allowed_tag = '';
    var i = 0;
    var k = '';
    var html = '';

    var replacer = function (search, replace, str) {
        return str.split(search).join(replace);
    };

    // Build allowes tags associative array
    if (allowed_tags) {
        allowed_array = allowed_tags.match(/([a-zA-Z0-9]+)/gi);
    }

    str += '';

    // Match tags
    matches = str.match(/(<\/?[\S][^>]*>)/gi);

    // Go through all HTML tags
    for (key in matches) {
        if (isNaN(key)) {
            // IE7 Hack
            continue;
        }

        // Save HTML tag
        html = matches[key].toString();

        // Is tag not in allowed list? Remove from str!
        allowed = false;

        // Go through all allowed tags
        for (k in allowed_array) {
            // Init
            allowed_tag = allowed_array[k];
            i = -1;

            if (i != 0) {
                i = html.toLowerCase().indexOf('<' + allowed_tag + '>');
            }
            if (i != 0) {
                i = html.toLowerCase().indexOf('<' + allowed_tag + ' ');
            }
            if (i != 0) {
                i = html.toLowerCase().indexOf('</' + allowed_tag);
            }

            // Determine
            if (i == 0) {
                allowed = true;
                break;
            }
        }

        if (!allowed) {
            str = replacer(html, "", str); // Custom replace. No regexing
        }
    }

    return str;
}


function md5(str) {
    // Calculate the md5 hash of a string
    //
    // version: 909.322
    // discuss at: http://phpjs.org/functions/md5    // +   original by: Webtoolkit.info (http://www.webtoolkit.info/)
    // + namespaced by: Michael White (http://getsprink.com)
    // +    tweaked by: Jack
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +      input by: Brett Zamir (http://brett-zamir.me)    // +   bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // -    depends on: utf8_encode
    // *     example 1: md5('Kevin van Zonneveld');
    // *     returns 1: '6e658d4bfcb59cc13f96c14450ac40b9'
    var xl;
    var rotateLeft = function (lValue, iShiftBits) {
        return (lValue << iShiftBits) | (lValue >>> (32 - iShiftBits));
    };
    var addUnsigned = function (lX, lY) {
        var lX4,lY4,lX8,lY8,lResult;
        lX8 = (lX & 0x80000000);
        lY8 = (lY & 0x80000000);
        lX4 = (lX & 0x40000000);
        lY4 = (lY & 0x40000000);
        lResult = (lX & 0x3FFFFFFF) + (lY & 0x3FFFFFFF);
        if (lX4 & lY4) {
            return (lResult ^ 0x80000000 ^ lX8 ^ lY8);
        }
        if (lX4 | lY4) {
            if (lResult & 0x40000000) {
                return (lResult ^ 0xC0000000 ^ lX8 ^ lY8);
            } else {
                return (lResult ^ 0x40000000 ^ lX8 ^ lY8);
            }
        } else {
            return (lResult ^ lX8 ^ lY8);
        }
    };
    var _F = function (x, y, z) {
        return (x & y) | ((~x) & z);
    };
    var _G = function (x, y, z) {
        return (x & z) | (y & (~z));
    };
    var _H = function (x, y, z) {
        return (x ^ y ^ z);
    };
    var _I = function (x, y, z) {
        return (y ^ (x | (~z)));
    };
    var _FF = function (a, b, c, d, x, s, ac) {
        a = addUnsigned(a, addUnsigned(addUnsigned(_F(b, c, d), x), ac));
        return addUnsigned(rotateLeft(a, s), b);
    };
    var _GG = function (a, b, c, d, x, s, ac) {
        a = addUnsigned(a, addUnsigned(addUnsigned(_G(b, c, d), x), ac));
        return addUnsigned(rotateLeft(a, s), b);
    };
    var _HH = function (a, b, c, d, x, s, ac) {
        a = addUnsigned(a, addUnsigned(addUnsigned(_H(b, c, d), x), ac));
        return addUnsigned(rotateLeft(a, s), b);
    };
    var _II = function (a, b, c, d, x, s, ac) {
        a = addUnsigned(a, addUnsigned(addUnsigned(_I(b, c, d), x), ac));
        return addUnsigned(rotateLeft(a, s), b);
    };
    var convertToWordArray = function (str) {
        var lWordCount;
        var lMessageLength = str.length;
        var lNumberOfWords_temp1 = lMessageLength + 8;
        var lNumberOfWords_temp2 = (lNumberOfWords_temp1 - (lNumberOfWords_temp1 % 64)) / 64;
        var lNumberOfWords = (lNumberOfWords_temp2 + 1) * 16;
        var lWordArray = new Array(lNumberOfWords - 1);
        var lBytePosition = 0;
        var lByteCount = 0;
        while (lByteCount < lMessageLength) {
            lWordCount = (lByteCount - (lByteCount % 4)) / 4;
            lBytePosition = (lByteCount % 4) * 8;
            lWordArray[lWordCount] = (lWordArray[lWordCount] | (str.charCodeAt(lByteCount) << lBytePosition));
            lByteCount++;
        }
        lWordCount = (lByteCount - (lByteCount % 4)) / 4;
        lBytePosition = (lByteCount % 4) * 8;
        lWordArray[lWordCount] = lWordArray[lWordCount] | (0x80 << lBytePosition);
        lWordArray[lNumberOfWords - 2] = lMessageLength << 3;
        lWordArray[lNumberOfWords - 1] = lMessageLength >>> 29;
        return lWordArray;
    };

    var wordToHex = function (lValue) {
        var wordToHexValue = "",wordToHexValue_temp = "",lByte,lCount;
        for (lCount = 0; lCount <= 3; lCount++) {
            lByte = (lValue >>> (lCount * 8)) & 255;
            wordToHexValue_temp = "0" + lByte.toString(16);
            wordToHexValue = wordToHexValue + wordToHexValue_temp.substr(wordToHexValue_temp.length - 2, 2);
        }
        return wordToHexValue;
    };

    var x = [],        k,AA,BB,CC,DD,a,b,c,d,
            S11 = 7, S12 = 12, S13 = 17, S14 = 22,
            S21 = 5, S22 = 9 , S23 = 14, S24 = 20,
            S31 = 4, S32 = 11, S33 = 16, S34 = 23,
            S41 = 6, S42 = 10, S43 = 15, S44 = 21;
    str = this.utf8_encode(str);
    x = convertToWordArray(str);
    a = 0x67452301;
    b = 0xEFCDAB89;
    c = 0x98BADCFE;
    d = 0x10325476;
    xl = x.length;
    for (k = 0; k < xl; k += 16) {
        AA = a;
        BB = b;
        CC = c;
        DD = d;
        a = _FF(a, b, c, d, x[k + 0], S11, 0xD76AA478);
        d = _FF(d, a, b, c, x[k + 1], S12, 0xE8C7B756);
        c = _FF(c, d, a, b, x[k + 2], S13, 0x242070DB);
        b = _FF(b, c, d, a, x[k + 3], S14, 0xC1BDCEEE);
        a = _FF(a, b, c, d, x[k + 4], S11, 0xF57C0FAF);
        d = _FF(d, a, b, c, x[k + 5], S12, 0x4787C62A);
        c = _FF(c, d, a, b, x[k + 6], S13, 0xA8304613);
        b = _FF(b, c, d, a, x[k + 7], S14, 0xFD469501);
        a = _FF(a, b, c, d, x[k + 8], S11, 0x698098D8);
        d = _FF(d, a, b, c, x[k + 9], S12, 0x8B44F7AF);
        c = _FF(c, d, a, b, x[k + 10], S13, 0xFFFF5BB1);
        b = _FF(b, c, d, a, x[k + 11], S14, 0x895CD7BE);
        a = _FF(a, b, c, d, x[k + 12], S11, 0x6B901122);
        d = _FF(d, a, b, c, x[k + 13], S12, 0xFD987193);
        c = _FF(c, d, a, b, x[k + 14], S13, 0xA679438E);
        b = _FF(b, c, d, a, x[k + 15], S14, 0x49B40821);
        a = _GG(a, b, c, d, x[k + 1], S21, 0xF61E2562);
        d = _GG(d, a, b, c, x[k + 6], S22, 0xC040B340);
        c = _GG(c, d, a, b, x[k + 11], S23, 0x265E5A51);
        b = _GG(b, c, d, a, x[k + 0], S24, 0xE9B6C7AA);
        a = _GG(a, b, c, d, x[k + 5], S21, 0xD62F105D);
        d = _GG(d, a, b, c, x[k + 10], S22, 0x2441453);
        c = _GG(c, d, a, b, x[k + 15], S23, 0xD8A1E681);
        b = _GG(b, c, d, a, x[k + 4], S24, 0xE7D3FBC8);
        a = _GG(a, b, c, d, x[k + 9], S21, 0x21E1CDE6);
        d = _GG(d, a, b, c, x[k + 14], S22, 0xC33707D6);
        c = _GG(c, d, a, b, x[k + 3], S23, 0xF4D50D87);
        b = _GG(b, c, d, a, x[k + 8], S24, 0x455A14ED);
        a = _GG(a, b, c, d, x[k + 13], S21, 0xA9E3E905);
        d = _GG(d, a, b, c, x[k + 2], S22, 0xFCEFA3F8);
        c = _GG(c, d, a, b, x[k + 7], S23, 0x676F02D9);
        b = _GG(b, c, d, a, x[k + 12], S24, 0x8D2A4C8A);
        a = _HH(a, b, c, d, x[k + 5], S31, 0xFFFA3942);
        d = _HH(d, a, b, c, x[k + 8], S32, 0x8771F681);
        c = _HH(c, d, a, b, x[k + 11], S33, 0x6D9D6122);
        b = _HH(b, c, d, a, x[k + 14], S34, 0xFDE5380C);
        a = _HH(a, b, c, d, x[k + 1], S31, 0xA4BEEA44);
        d = _HH(d, a, b, c, x[k + 4], S32, 0x4BDECFA9);
        c = _HH(c, d, a, b, x[k + 7], S33, 0xF6BB4B60);
        b = _HH(b, c, d, a, x[k + 10], S34, 0xBEBFBC70);
        a = _HH(a, b, c, d, x[k + 13], S31, 0x289B7EC6);
        d = _HH(d, a, b, c, x[k + 0], S32, 0xEAA127FA);
        c = _HH(c, d, a, b, x[k + 3], S33, 0xD4EF3085);
        b = _HH(b, c, d, a, x[k + 6], S34, 0x4881D05);
        a = _HH(a, b, c, d, x[k + 9], S31, 0xD9D4D039);
        d = _HH(d, a, b, c, x[k + 12], S32, 0xE6DB99E5);
        c = _HH(c, d, a, b, x[k + 15], S33, 0x1FA27CF8);
        b = _HH(b, c, d, a, x[k + 2], S34, 0xC4AC5665);
        a = _II(a, b, c, d, x[k + 0], S41, 0xF4292244);
        d = _II(d, a, b, c, x[k + 7], S42, 0x432AFF97);
        c = _II(c, d, a, b, x[k + 14], S43, 0xAB9423A7);
        b = _II(b, c, d, a, x[k + 5], S44, 0xFC93A039);
        a = _II(a, b, c, d, x[k + 12], S41, 0x655B59C3);
        d = _II(d, a, b, c, x[k + 3], S42, 0x8F0CCC92);
        c = _II(c, d, a, b, x[k + 10], S43, 0xFFEFF47D);
        b = _II(b, c, d, a, x[k + 1], S44, 0x85845DD1);
        a = _II(a, b, c, d, x[k + 8], S41, 0x6FA87E4F);
        d = _II(d, a, b, c, x[k + 15], S42, 0xFE2CE6E0);
        c = _II(c, d, a, b, x[k + 6], S43, 0xA3014314);
        b = _II(b, c, d, a, x[k + 13], S44, 0x4E0811A1);
        a = _II(a, b, c, d, x[k + 4], S41, 0xF7537E82);
        d = _II(d, a, b, c, x[k + 11], S42, 0xBD3AF235);
        c = _II(c, d, a, b, x[k + 2], S43, 0x2AD7D2BB);
        b = _II(b, c, d, a, x[k + 9], S44, 0xEB86D391);
        a = addUnsigned(a, AA);
        b = addUnsigned(b, BB);
        c = addUnsigned(c, CC);
        d = addUnsigned(d, DD);
    }

    var temp = wordToHex(a) + wordToHex(b) + wordToHex(c) + wordToHex(d);
    return temp.toLowerCase();
}

function utf8_encode(string) {
    // Encodes an ISO-8859-1 string to UTF-8
    //
    // version: 909.322
    // discuss at: http://phpjs.org/functions/utf8_encode    // +   original by: Webtoolkit.info (http://www.webtoolkit.info/)
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   improved by: sowberry
    // +    tweaked by: Jack
    // +   bugfixed by: Onno Marsman    // +   improved by: Yves Sucaet
    // +   bugfixed by: Onno Marsman
    // +   bugfixed by: Ulrich
    // *     example 1: utf8_encode('Kevin van Zonneveld');
    // *     returns 1: 'Kevin van Zonneveld'    var string = (argString+''); // .replace(/\r\n/g, "\n").replace(/\r/g, "\n");

    var utftext = "";
    var start, end;
    var stringl = 0;
    start = end = 0;
    stringl = string.length;
    for (var n = 0; n < stringl; n++) {
        var c1 = string.charCodeAt(n);
        var enc = null;

        if (c1 < 128) {
            end++;
        } else if (c1 > 127 && c1 < 2048) {
            enc = String.fromCharCode((c1 >> 6) | 192) + String.fromCharCode((c1 & 63) | 128);
        } else {
            enc = String.fromCharCode((c1 >> 12) | 224) + String.fromCharCode(((c1 >> 6) & 63) | 128) + String.fromCharCode((c1 & 63) | 128);
        }
        if (enc !== null) {
            if (end > start) {
                utftext += string.substring(start, end);
            }
            utftext += enc;
            start = end = n + 1;
        }
    }

    if (end > start) {
        utftext += string.substring(start, string.length);
    }

    return utftext;
}


function intval(mixed_var, base) {
    // http://kevin.vanzonneveld.net
    // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   improved by: stensi
    // +   bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   input by: Matteo
    // +   bugfixed by: Brett Zamir (http://brett-zamir.me)
    // *     example 1: intval('Kevin van Zonneveld');
    // *     returns 1: 0
    // *     example 2: intval(4.2);
    // *     returns 2: 4
    // *     example 3: intval(42, 8);
    // *     returns 3: 42
    // *     example 4: intval('09');
    // *     returns 4: 9
    // *     example 5: intval('1e', 16);
    // *     returns 5: 30

    var tmp;

    var type = typeof( mixed_var );

    if (type === 'boolean') {
        return (mixed_var) ? 1 : 0;
    } else if (type === 'string') {
        tmp = parseInt(mixed_var, base || 10);
        return (isNaN(tmp) || !isFinite(tmp)) ? 0 : tmp;
    } else if (type === 'number' && isFinite(mixed_var)) {
        return Math.floor(mixed_var);
    } else {
        return 0;
    }
}


function nl2br (str, is_xhtml) {
    // http://kevin.vanzonneveld.net
    // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   improved by: Philip Peterson
    // +   improved by: Onno Marsman
    // +   improved by: Atli Þór
    // +   bugfixed by: Onno Marsman
    // +      input by: Brett Zamir (http://brett-zamir.me)
    // +   bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   improved by: Brett Zamir (http://brett-zamir.me)
    // +   improved by: Maximusya
    // *     example 1: nl2br('Kevin\nvan\nZonneveld');
    // *     returns 1: 'Kevin<br />\nvan<br />\nZonneveld'
    // *     example 2: nl2br("\nOne\nTwo\n\nThree\n", false);
    // *     returns 2: '<br>\nOne<br>\nTwo<br>\n<br>\nThree<br>\n'
    // *     example 3: nl2br("\nOne\nTwo\n\nThree\n", true);
    // *     returns 3: '<br />\nOne<br />\nTwo<br />\n<br />\nThree<br />\n'

    var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';

    return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1'+ breakTag +'$2');
}


function preg_quote (str, delimiter) {
    // http://kevin.vanzonneveld.net
    // +   original by: booeyOH
    // +   improved by: Ates Goral (http://magnetiq.com)
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   bugfixed by: Onno Marsman
    // +   improved by: Brett Zamir (http://brett-zamir.me)
    // *     example 1: preg_quote("$40");
    // *     returns 1: '\$40'
    // *     example 2: preg_quote("*RRRING* Hello?");
    // *     returns 2: '\*RRRING\* Hello\?'
    // *     example 3: preg_quote("\\.+*?[^]$(){}=!<>|:");
    // *     returns 3: '\\\.\+\*\?\[\^\]\$\(\)\{\}\=\!\<\>\|\:'
    return (str + '').replace(new RegExp('[.\\\\+*?\\[\\^\\]$(){}=!<>|:\\' + (delimiter || '') + '-]', 'g'), '\\$&');
}


function urlencode (str) {
    // http://kevin.vanzonneveld.net
    // +   original by: Philip Peterson
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +      input by: AJ
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   improved by: Brett Zamir (http://brett-zamir.me)
    // +   bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +      input by: travc
    // +      input by: Brett Zamir (http://brett-zamir.me)
    // +   bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   improved by: Lars Fischer
    // +      input by: Ratheous
    // +      reimplemented by: Brett Zamir (http://brett-zamir.me)
    // +   bugfixed by: Joris
    // +      reimplemented by: Brett Zamir (http://brett-zamir.me)
    // %          note 1: This reflects PHP 5.3/6.0+ behavior
    // %        note 2: Please be aware that this function expects to encode into UTF-8 encoded strings, as found on
    // %        note 2: pages served as UTF-8
    // *     example 1: urlencode('Kevin van Zonneveld!');
    // *     returns 1: 'Kevin+van+Zonneveld%21'
    // *     example 2: urlencode('http://kevin.vanzonneveld.net/');
    // *     returns 2: 'http%3A%2F%2Fkevin.vanzonneveld.net%2F'
    // *     example 3: urlencode('http://www.google.nl/search?q=php.js&ie=utf-8&oe=utf-8&aq=t&rls=com.ubuntu:en-US:unofficial&client=firefox-a');
    // *     returns 3: 'http%3A%2F%2Fwww.google.nl%2Fsearch%3Fq%3Dphp.js%26ie%3Dutf-8%26oe%3Dutf-8%26aq%3Dt%26rls%3Dcom.ubuntu%3Aen-US%3Aunofficial%26client%3Dfirefox-a'
    str = (str + '').toString();

    // Tilde should be allowed unescaped in future versions of PHP (as reflected below), but if you want to reflect current
    // PHP behavior, you would need to add ".replace(/~/g, '%7E');" to the following.
    return encodeURIComponent(str).replace(/!/g, '%21').replace(/'/g, '%27').replace(/\(/g, '%28').
    replace(/\)/g, '%29').replace(/\*/g, '%2A').replace(/%20/g, '+');
}


function htmlentities (string, quote_style, charset, double_encode) {
    // http://kevin.vanzonneveld.net
    // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +    revised by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   improved by: nobbler
    // +    tweaked by: Jack
    // +   bugfixed by: Onno Marsman
    // +    revised by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +    bugfixed by: Brett Zamir (http://brett-zamir.me)
    // +      input by: Ratheous
    // +   improved by: Rafał Kukawski (http://blog.kukawski.pl)
    // +   improved by: Dj (http://phpjs.org/functions/htmlentities:425#comment_134018)
    // -    depends on: get_html_translation_table
    // *     example 1: htmlentities('Kevin & van Zonneveld');
    // *     returns 1: 'Kevin &amp; van Zonneveld'
    // *     example 2: htmlentities("foo'bar","ENT_QUOTES");
    // *     returns 2: 'foo&#039;bar'
    var hash_map = get_html_translation_table('HTML_ENTITIES', quote_style),
        symbol = '';
    string = string == null ? '' : string + '';

    if (!hash_map) {
        return false;
    }

    if (quote_style && quote_style === 'ENT_QUOTES') {
        hash_map["'"] = '&#039;';
    }

    if (!!double_encode || double_encode == null) {
        for (symbol in hash_map) {
            string = string.split(symbol).join(hash_map[symbol]);
        }
    } else {
        string = string.replace(/([\s\S]*?)(&(?:#\d+|#x[\da-f]+|[a-zA-Z][\da-z]*);|$)/g, function (ignore, text, entity) {
            for (symbol in hash_map) {
                text = text.split(symbol).join(hash_map[symbol]);
            }

            return text + entity;
        });
    }

    return string;
}


function get_html_translation_table (table, quote_style) {
    // http://kevin.vanzonneveld.net
    // +   original by: Philip Peterson
    // +    revised by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   bugfixed by: noname
    // +   bugfixed by: Alex
    // +   bugfixed by: Marco
    // +   bugfixed by: madipta
    // +   improved by: KELAN
    // +   improved by: Brett Zamir (http://brett-zamir.me)
    // +   bugfixed by: Brett Zamir (http://brett-zamir.me)
    // +      input by: Frank Forte
    // +   bugfixed by: T.Wild
    // +      input by: Ratheous
    // %          note: It has been decided that we're not going to add global
    // %          note: dependencies to php.js, meaning the constants are not
    // %          note: real constants, but strings instead. Integers are also supported if someone
    // %          note: chooses to create the constants themselves.
    // *     example 1: get_html_translation_table('HTML_SPECIALCHARS');
    // *     returns 1: {'"': '&quot;', '&': '&amp;', '<': '&lt;', '>': '&gt;'}
    var entities = {},
        hash_map = {},
        decimal = 0,
        symbol = '';
    var constMappingTable = {},
        constMappingQuoteStyle = {};
    var useTable = {},
        useQuoteStyle = {};

    // Translate arguments
    constMappingTable[0] = 'HTML_SPECIALCHARS';
    constMappingTable[1] = 'HTML_ENTITIES';
    constMappingQuoteStyle[0] = 'ENT_NOQUOTES';
    constMappingQuoteStyle[2] = 'ENT_COMPAT';
    constMappingQuoteStyle[3] = 'ENT_QUOTES';

    useTable = !isNaN(table) ? constMappingTable[table] : table ? table.toUpperCase() : 'HTML_SPECIALCHARS';
    useQuoteStyle = !isNaN(quote_style) ? constMappingQuoteStyle[quote_style] : quote_style ? quote_style.toUpperCase() : 'ENT_COMPAT';

    if (useTable !== 'HTML_SPECIALCHARS' && useTable !== 'HTML_ENTITIES') {
        throw new Error("Table: " + useTable + ' not supported');
        // return false;
    }

    entities['38'] = '&amp;';
    if (useTable === 'HTML_ENTITIES') {
        entities['160'] = '&nbsp;';
        entities['161'] = '&iexcl;';
        entities['162'] = '&cent;';
        entities['163'] = '&pound;';
        entities['164'] = '&curren;';
        entities['165'] = '&yen;';
        entities['166'] = '&brvbar;';
        entities['167'] = '&sect;';
        entities['168'] = '&uml;';
        entities['169'] = '&copy;';
        entities['170'] = '&ordf;';
        entities['171'] = '&laquo;';
        entities['172'] = '&not;';
        entities['173'] = '&shy;';
        entities['174'] = '&reg;';
        entities['175'] = '&macr;';
        entities['176'] = '&deg;';
        entities['177'] = '&plusmn;';
        entities['178'] = '&sup2;';
        entities['179'] = '&sup3;';
        entities['180'] = '&acute;';
        entities['181'] = '&micro;';
        entities['182'] = '&para;';
        entities['183'] = '&middot;';
        entities['184'] = '&cedil;';
        entities['185'] = '&sup1;';
        entities['186'] = '&ordm;';
        entities['187'] = '&raquo;';
        entities['188'] = '&frac14;';
        entities['189'] = '&frac12;';
        entities['190'] = '&frac34;';
        entities['191'] = '&iquest;';
        entities['192'] = '&Agrave;';
        entities['193'] = '&Aacute;';
        entities['194'] = '&Acirc;';
        entities['195'] = '&Atilde;';
        entities['196'] = '&Auml;';
        entities['197'] = '&Aring;';
        entities['198'] = '&AElig;';
        entities['199'] = '&Ccedil;';
        entities['200'] = '&Egrave;';
        entities['201'] = '&Eacute;';
        entities['202'] = '&Ecirc;';
        entities['203'] = '&Euml;';
        entities['204'] = '&Igrave;';
        entities['205'] = '&Iacute;';
        entities['206'] = '&Icirc;';
        entities['207'] = '&Iuml;';
        entities['208'] = '&ETH;';
        entities['209'] = '&Ntilde;';
        entities['210'] = '&Ograve;';
        entities['211'] = '&Oacute;';
        entities['212'] = '&Ocirc;';
        entities['213'] = '&Otilde;';
        entities['214'] = '&Ouml;';
        entities['215'] = '&times;';
        entities['216'] = '&Oslash;';
        entities['217'] = '&Ugrave;';
        entities['218'] = '&Uacute;';
        entities['219'] = '&Ucirc;';
        entities['220'] = '&Uuml;';
        entities['221'] = '&Yacute;';
        entities['222'] = '&THORN;';
        entities['223'] = '&szlig;';
        entities['224'] = '&agrave;';
        entities['225'] = '&aacute;';
        entities['226'] = '&acirc;';
        entities['227'] = '&atilde;';
        entities['228'] = '&auml;';
        entities['229'] = '&aring;';
        entities['230'] = '&aelig;';
        entities['231'] = '&ccedil;';
        entities['232'] = '&egrave;';
        entities['233'] = '&eacute;';
        entities['234'] = '&ecirc;';
        entities['235'] = '&euml;';
        entities['236'] = '&igrave;';
        entities['237'] = '&iacute;';
        entities['238'] = '&icirc;';
        entities['239'] = '&iuml;';
        entities['240'] = '&eth;';
        entities['241'] = '&ntilde;';
        entities['242'] = '&ograve;';
        entities['243'] = '&oacute;';
        entities['244'] = '&ocirc;';
        entities['245'] = '&otilde;';
        entities['246'] = '&ouml;';
        entities['247'] = '&divide;';
        entities['248'] = '&oslash;';
        entities['249'] = '&ugrave;';
        entities['250'] = '&uacute;';
        entities['251'] = '&ucirc;';
        entities['252'] = '&uuml;';
        entities['253'] = '&yacute;';
        entities['254'] = '&thorn;';
        entities['255'] = '&yuml;';
    }

    if (useQuoteStyle !== 'ENT_NOQUOTES') {
        entities['34'] = '&quot;';
    }
    if (useQuoteStyle === 'ENT_QUOTES') {
        entities['39'] = '&#39;';
    }
    entities['60'] = '&lt;';
    entities['62'] = '&gt;';


    // ascii decimals to real symbols
    for (decimal in entities) {
        symbol = String.fromCharCode(decimal);
        hash_map[symbol] = entities[decimal];
    }

    return hash_map;
}


function parse_url (str, component) {
    // http://kevin.vanzonneveld.net
    // +      original by: Steven Levithan (http://blog.stevenlevithan.com)
    // + reimplemented by: Brett Zamir (http://brett-zamir.me)
    // + input by: Lorenzo Pisani
    // + input by: Tony
    // + improved by: Brett Zamir (http://brett-zamir.me)
    // %          note: Based on http://stevenlevithan.com/demo/parseuri/js/assets/parseuri.js
    // %          note: blog post at http://blog.stevenlevithan.com/archives/parseuri
    // %          note: demo at http://stevenlevithan.com/demo/parseuri/js/assets/parseuri.js
    // %          note: Does not replace invalid characters with '_' as in PHP, nor does it return false with
    // %          note: a seriously malformed URL.
    // %          note: Besides function name, is essentially the same as parseUri as well as our allowing
    // %          note: an extra slash after the scheme/protocol (to allow file:/// as in PHP)
    // *     example 1: parse_url('http://username:password@hostname/path?arg=value#anchor');
    // *     returns 1: {scheme: 'http', host: 'hostname', user: 'username', pass: 'password', path: '/path', query: 'arg=value', fragment: 'anchor'}
    var key = ['source', 'scheme', 'authority', 'userInfo', 'user', 'pass', 'host', 'port',
                        'relative', 'path', 'directory', 'file', 'query', 'fragment'],
        ini = (this.php_js && this.php_js.ini) || {},
        mode = (ini['phpjs.parse_url.mode'] &&
            ini['phpjs.parse_url.mode'].local_value) || 'php',
        parser = {
            php: /^(?:([^:\/?#]+):)?(?:\/\/()(?:(?:()(?:([^:@]*):?([^:@]*))?@)?([^:\/?#]*)(?::(\d*))?))?()(?:(()(?:(?:[^?#\/]*\/)*)()(?:[^?#]*))(?:\?([^#]*))?(?:#(.*))?)/,
            strict: /^(?:([^:\/?#]+):)?(?:\/\/((?:(([^:@]*):?([^:@]*))?@)?([^:\/?#]*)(?::(\d*))?))?((((?:[^?#\/]*\/)*)([^?#]*))(?:\?([^#]*))?(?:#(.*))?)/,
            loose: /^(?:(?![^:@]+:[^:@\/]*@)([^:\/?#.]+):)?(?:\/\/\/?)?((?:(([^:@]*):?([^:@]*))?@)?([^:\/?#]*)(?::(\d*))?)(((\/(?:[^?#](?![^?#\/]*\.[^?#\/.]+(?:[?#]|$)))*\/?)?([^?#\/]*))(?:\?([^#]*))?(?:#(.*))?)/ // Added one optional slash to post-scheme to catch file:/// (should restrict this)
        };

    var m = parser[mode].exec(str),
        uri = {},
        i = 14;
    while (i--) {
        if (m[i]) {
          uri[key[i]] = m[i];
        }
    }

    if (component) {
        return uri[component.replace('PHP_URL_', '').toLowerCase()];
    }
    if (mode !== 'php') {
        var name = (ini['phpjs.parse_url.queryKey'] &&
                ini['phpjs.parse_url.queryKey'].local_value) || 'queryKey';
        parser = /(?:^|&)([^&=]*)=?([^&]*)/g;
        uri[name] = {};
        uri[key[12]].replace(parser, function ($0, $1, $2) {
            if ($1) {uri[name][$1] = $2;}
        });
    }
    delete uri.source;
    return uri;
}

function round (value, precision, mode) {
    // http://kevin.vanzonneveld.net
    // +   original by: Philip Peterson
    // +    revised by: Onno Marsman
    // +      input by: Greenseed
    // +    revised by: T.Wild
    // +      input by: meo
    // +      input by: William
    // +   bugfixed by: Brett Zamir (http://brett-zamir.me)
    // +      input by: Josep Sanz (http://www.ws3.es/)
    // +    revised by: Rafał Kukawski (http://blog.kukawski.pl/)
    // %        note 1: Great work. Ideas for improvement:
    // %        note 1:  - code more compliant with developer guidelines
    // %        note 1:  - for implementing PHP constant arguments look at
    // %        note 1:  the pathinfo() function, it offers the greatest
    // %        note 1:  flexibility & compatibility possible
    // *     example 1: round(1241757, -3);
    // *     returns 1: 1242000
    // *     example 2: round(3.6);
    // *     returns 2: 4
    // *     example 3: round(2.835, 2);
    // *     returns 3: 2.84
    // *     example 4: round(1.1749999999999, 2);
    // *     returns 4: 1.17
    // *     example 5: round(58551.799999999996, 2);
    // *     returns 5: 58551.8
    var m, f, isHalf, sgn; // helper variables
    precision |= 0; // making sure precision is integer
    m = Math.pow(10, precision);
    value *= m;
    sgn = (value > 0) | -(value < 0); // sign of the number
    isHalf = value % 1 === 0.5 * sgn;
    f = Math.floor(value);

    if (isHalf) {
        switch (mode) {
        case 'PHP_ROUND_HALF_DOWN':
            value = f + (sgn < 0); // rounds .5 toward zero
            break;
        case 'PHP_ROUND_HALF_EVEN':
            value = f + (f % 2 * sgn); // rouds .5 towards the next even integer
            break;
        case 'PHP_ROUND_HALF_ODD':
            value = f + !(f % 2); // rounds .5 towards the next odd integer
            break;
        default:
            value = f + (sgn > 0); // rounds .5 away from zero
        }
    }

    return (isHalf ? value : Math.round(value)) / m;
}


function implode (glue, pieces) {
    // Joins array elements placing glue string between items and return one string
    //
    // version: 1109.2015
    // discuss at: http://phpjs.org/functions/implode    // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   improved by: Waldo Malqui Silva
    // +   improved by: Itsacon (http://www.itsacon.net/)
    // +   bugfixed by: Brett Zamir (http://brett-zamir.me)
    // *     example 1: implode(' ', ['Kevin', 'van', 'Zonneveld']);    // *     returns 1: 'Kevin van Zonneveld'
    // *     example 2: implode(' ', {first:'Kevin', last: 'van Zonneveld'});
    // *     returns 2: 'Kevin van Zonneveld'
    var i = '',
        retVal = '',        tGlue = '';
    if (arguments.length === 1) {
        pieces = glue;
        glue = '';
    }    if (typeof(pieces) === 'object') {
        if (Object.prototype.toString.call(pieces) === '[object Array]') {
            return pieces.join(glue);
        }
        for (i in pieces) {            retVal += tGlue + pieces[i];
            tGlue = glue;
        }
        return retVal;
    }    return pieces;
}

/**
 * inserts a text into an input/textarea where the cursor is set
 * @param txtarea
 * @param text
 */
function insertTextToFormElementAtCursor(txtarea, text) {
    var scrollPos = txtarea.scrollTop;
    var strPos = 0;
    var br = ((txtarea.selectionStart || txtarea.selectionStart == '0') ?
        "ff" : (document.selection ? "ie" : false ) );
    if (br == "ie") {
        txtarea.focus();
        var range = document.selection.createRange();
        range.moveStart('character', -txtarea.value.length);
        strPos = range.text.length;
    }
    else if (br == "ff") strPos = txtarea.selectionStart;

    var front = (txtarea.value).substring(0, strPos);
    var back = (txtarea.value).substring(strPos, txtarea.value.length);
    txtarea.value = front + text + back;
    strPos = strPos + text.length;
    if (br == "ie") {
        txtarea.focus();
        var range = document.selection.createRange();
        range.moveStart('character', -txtarea.value.length);
        range.moveStart('character', strPos);
        range.moveEnd('character', 0);
        range.select();
    }
    else if (br == "ff") {
        txtarea.selectionStart = strPos;
        txtarea.selectionEnd = strPos;
        txtarea.focus();
    }
    txtarea.scrollTop = scrollPos;
}

/**
 * inserts a text into an html element with contenteditable where the cursor is set
 * @param text
 * @param win
 * @param doc
 */
function insertTextToContenteditableAtCursor (text, win, doc) {

    if(!win) {
        var win = window;
    }
    if(!doc) {
        var doc = document;
    }

    var sel, range;
    if (win.getSelection) {
        sel = win.getSelection();
        if (sel.getRangeAt && sel.rangeCount) {
            range = sel.getRangeAt(0);
            range.deleteContents();
            range.insertNode( doc.createTextNode(text) );
        }
    } else if (doc.selection && doc.selection.createRange) {
        doc.selection.createRange().text = text;
    }
}

stringToFunction = function(str) {
    if (typeof str !== "string") {
        return str;
    }

    var arr = str.split(".");

    var fn = (window || this);
    for (var i = 0, len = arr.length; i < len; i++) {
        fn = fn[arr[i]];
    }

    if (typeof fn !== "function") {
        throw new Error("function not found");
    }

    return  fn;
};

sprintf = function ()
{
    if (!arguments || arguments.length < 1 || !RegExp)
    {
        return;
    }
    var str = arguments[0];
    var re = /([^%]*)%('.|0|\x20)?(-)?(\d+)?(\.\d+)?(%|b|c|d|u|f|o|s|x|X)(.*)/;
    var a = b = [], numSubstitutions = 0, numMatches = 0;
    while (a = re.exec(str))
    {
        var leftpart = a[1], pPad = a[2], pJustify = a[3], pMinLength = a[4];
        var pPrecision = a[5], pType = a[6], rightPart = a[7];

        numMatches++;
        if (pType == '%')
        {
            subst = '%';
        }
        else
        {
            numSubstitutions++;
            if (numSubstitutions >= arguments.length)
            {
                alert('Error! Not enough function arguments (' + (arguments.length - 1) + ', excluding the string)\nfor the number of substitution parameters in string (' + numSubstitutions + ' so far).');
            }
            var param = arguments[numSubstitutions];
            var pad = '';
            if (pPad && pPad.substr(0,1) == "'") pad = leftpart.substr(1,1);
            else if (pPad) pad = pPad;
            var justifyRight = true;
            if (pJustify && pJustify === "-") justifyRight = false;
            var minLength = -1;
            if (pMinLength) minLength = parseInt(pMinLength);
            var precision = -1;
            if (pPrecision && pType == 'f') precision = parseInt(pPrecision.substring(1));
            var subst = param;
            if (pType == 'b') subst = parseInt(param).toString(2);
            else if (pType == 'c') subst = String.fromCharCode(parseInt(param));
            else if (pType == 'd') subst = parseInt(param) ? parseInt(param) : 0;
            else if (pType == 'u') subst = Math.abs(param);
            else if (pType == 'f') subst = (precision > -1) ? Math.round(parseFloat(param) * Math.pow(10, precision)) / Math.pow(10, precision): parseFloat(param);
            else if (pType == 'o') subst = parseInt(param).toString(8);
            else if (pType == 's') subst = param;
            else if (pType == 'x') subst = ('' + parseInt(param).toString(16)).toLowerCase();
            else if (pType == 'X') subst = ('' + parseInt(param).toString(16)).toUpperCase();
        }
        str = leftpart + subst + rightPart;
    }
    return str;
}

function array_merge () {
    // http://kevin.vanzonneveld.net
    // +   original by: Brett Zamir (http://brett-zamir.me)
    // +   bugfixed by: Nate
    // +   input by: josh
    // +   bugfixed by: Brett Zamir (http://brett-zamir.me)
    // *     example 1: arr1 = {"color": "red", 0: 2, 1: 4}
    // *     example 1: arr2 = {0: "a", 1: "b", "color": "green", "shape": "trapezoid", 2: 4}
    // *     example 1: array_merge(arr1, arr2)
    // *     returns 1: {"color": "green", 0: 2, 1: 4, 2: "a", 3: "b", "shape": "trapezoid", 4: 4}
    // *     example 2: arr1 = []
    // *     example 2: arr2 = {1: "data"}
    // *     example 2: array_merge(arr1, arr2)
    // *     returns 2: {0: "data"}

    var args = Array.prototype.slice.call(arguments),
        retObj = {}, k, j = 0, i = 0, retArr = true;

    for (i=0; i < args.length; i++) {
        if (!(args[i] instanceof Array)) {
            retArr=false;
            break;
        }
    }

    if (retArr) {
        retArr = [];
        for (i=0; i < args.length; i++) {
            retArr = retArr.concat(args[i]);
        }
        return retArr;
    }
    var ct = 0;

    for (i=0, ct=0; i < args.length; i++) {
        if (args[i] instanceof Array) {
            for (j=0; j < args[i].length; j++) {
                retObj[ct++] = args[i][j];
            }
        } else {
            for (k in args[i]) {
                if (args[i].hasOwnProperty(k)) {
                    if (parseInt(k, 10)+'' === k) {
                        retObj[ct++] = args[i][k];
                    } else {
                        retObj[k] = args[i][k];
                    }
                }
            }
        }
    }
    return retObj;
}

function array_merge_recursive (arr1, arr2){
    // http://kevin.vanzonneveld.net
    // +   original by: Subhasis Deb
    // +      input by: Brett Zamir (http://brett-zamir.me)
    // +   bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // -    depends on: array_merge
    // *     example 1: arr1 = {'color': {'favourite': 'read'}, 0: 5}
    // *     example 1: arr2 = {0: 10, 'color': {'favorite': 'green', 0: 'blue'}}
    // *     example 1: array_merge_recursive(arr1, arr2)
    // *     returns 1: {'color': {'favorite': {0: 'red', 1: 'green'}, 0: 'blue'}, 1: 5, 1: 10}

    var idx = '';

    if ((arr1 && (arr1 instanceof Array)) && (arr2 && (arr2 instanceof Array))) {
        for (idx in arr2) {
            arr1.push(arr2[idx]);
        }
    } else if ((arr1 && (arr1 instanceof Object)) && (arr2 && (arr2 instanceof Object))) {
        for (idx in arr2) {
            if (idx in arr1) {
                if (typeof arr1[idx] == 'object' && typeof arr2 == 'object') {
                    arr1[idx] = this.array_merge(arr1[idx], arr2[idx]);
                } else {
                    arr1[idx] = arr2[idx];
                }
            } else {
                arr1[idx] = arr2[idx];
            }
        }
    }

    return arr1;
}


function htmlspecialchars (string, quoteStyle, charset, doubleEncode) {
    //       discuss at: http://locutus.io/php/htmlspecialchars/
    //      original by: Mirek Slugen
    //      improved by: Kevin van Zonneveld (http://kvz.io)
    //      bugfixed by: Nathan
    //      bugfixed by: Arno
    //      bugfixed by: Brett Zamir (http://brett-zamir.me)
    //      bugfixed by: Brett Zamir (http://brett-zamir.me)
    //       revised by: Kevin van Zonneveld (http://kvz.io)
    //         input by: Ratheous
    //         input by: Mailfaker (http://www.weedem.fr/)
    //         input by: felix
    // reimplemented by: Brett Zamir (http://brett-zamir.me)
    //           note 1: charset argument not supported
    //        example 1: htmlspecialchars("<a href='test'>Test</a>", 'ENT_QUOTES')
    //        returns 1: '&lt;a href=&#039;test&#039;&gt;Test&lt;/a&gt;'
    //        example 2: htmlspecialchars("ab\"c'd", ['ENT_NOQUOTES', 'ENT_QUOTES'])
    //        returns 2: 'ab"c&#039;d'
    //        example 3: htmlspecialchars('my "&entity;" is still here', null, null, false)
    //        returns 3: 'my &quot;&entity;&quot; is still here'

    var optTemp = 0
    var i = 0
    var noquotes = false
    if (typeof quoteStyle === 'undefined' || quoteStyle === null) {
        quoteStyle = 2
    }
    string = string || ''
    string = string.toString()

    if (doubleEncode !== false) {
        // Put this first to avoid double-encoding
        string = string.replace(/&/g, '&amp;')
    }

    string = string
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')

    var OPTS = {
        'ENT_NOQUOTES': 0,
        'ENT_HTML_QUOTE_SINGLE': 1,
        'ENT_HTML_QUOTE_DOUBLE': 2,
        'ENT_COMPAT': 2,
        'ENT_QUOTES': 3,
        'ENT_IGNORE': 4
    }
    if (quoteStyle === 0) {
        noquotes = true
    }
    if (typeof quoteStyle !== 'number') {
        // Allow for a single string or an array of string flags
        quoteStyle = [].concat(quoteStyle)
        for (i = 0; i < quoteStyle.length; i++) {
            // Resolve string input to bitwise e.g. 'ENT_IGNORE' becomes 4
            if (OPTS[quoteStyle[i]] === 0) {
                noquotes = true
            } else if (OPTS[quoteStyle[i]]) {
                optTemp = optTemp | OPTS[quoteStyle[i]]
            }
        }
        quoteStyle = optTemp
    }
    if (quoteStyle & OPTS.ENT_HTML_QUOTE_SINGLE) {
        string = string.replace(/'/g, '&#039;')
    }
    if (!noquotes) {
        string = string.replace(/"/g, '&quot;')
    }

    return string
}



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

Ext.setVersion("ext", "7.0.0.159");
Ext.setVersion("core", "7.0.0.159");

if(typeof window['t'] !== 'function') {
    // for compatibility reasons
    window.t = function(v) { return v; };
}


Ext.form.field.Date.prototype.startDay = 1;

Ext.override(Ext.dd.DragDropMgr, {
        startDrag: function (x, y) {

            // always hide tree-previews on drag start
            pimcore.helpers.treeNodeThumbnailPreviewHide();

            this.callParent(arguments);
        }
    }
);

/**
 * Undesired behaviour: submenu is hidden on clicking owner menu item
 * fix see https://www.sencha.com/forum/showthread.php?305492-Undesired-behaviour-submenu-is-hidden-on-clicking-owner-menu-item
 * @param e
 */
Ext.menu.Manager.checkActiveMenus = function(e) {
    var allMenus = this.visible,
        len = allMenus.length,
        i, menu,
        mousedownCmp = Ext.Component.fromElement(e.target);
    if (len) {
        // Clone here, we may modify this collection while the loop is active
        allMenus = allMenus.slice();
        for (i = 0; i < len; ++i) {
            menu = allMenus[i];
            // Hide the menu if:
            //      The menu does not own the clicked upon element AND
            //      The menu is not the child menu of a clicked upon MenuItem
            if (!(menu.owns(e) || (mousedownCmp && mousedownCmp.isMenuItem && mousedownCmp.menu === menu))) {
                menu.hide();
            }
        }
    }
};


Ext.define('pimcore.FieldSetTools', {
    extend: 'Ext.form.FieldSet',

    createLegendCt: function () {
        var me = this;
        var result = this.callSuper(arguments);

        if (me.config.tools && me.config.tools.length > 0) {
            for (var i = 0; i < me.config.tools.length; i++) {
                var tool = me.config.tools[i];
                this.createToolCmp(tool, result);
            }
        }
        return result;

    },


    createToolCmp: function(tool, result) {
        var me = this;
        var cls = me.baseCls + '-header-tool-default ' + me.baseCls + '-header-tool-right';
        if (tool['cls']) {
            cls = cls + ' ' + tool['cls'];
        }
        var cfg = {
            type: tool['type'],
            html: me.title,
            ui: me.ui,
            tooltip: tool.qtip,
            handler: tool.handler,
            hidden: tool.hidden,
            cls: cls,
            ariaRole: 'checkbox',
            ariaRenderAttributes: {
                'aria-checked': !me.collapsed
            }
        };

        if (tool['id']) {
            cfg['id'] = tool['id'];
        }

        var cmp = new Ext.panel.Tool(cfg);
        result.add(cmp);
        return result;
    },
});



Ext.define('pimcore.filters', {
    extend: 'Ext.grid.filters.Filters',
    alias: 'plugin.pimcore.gridfilters',

    createColumnFilter: function(column) {
        this.callSuper(arguments);
        var type = column.filter.type;
        var theFilter = column.filter.filter;

        if (column.filter instanceof Ext.grid.filters.filter.TriFilter) {
            theFilter.lt.config.type = type;
            theFilter.gt.config.type = type;
            theFilter.eq.config.type = type;

            if (column.decimalPrecision) {
                column.filter.fields.lt.decimalPrecision = column.decimalPrecision;
                column.filter.fields.gt.decimalPrecision = column.decimalPrecision;
                column.filter.fields.eq.decimalPrecision = column.decimalPrecision;
            }
        } else {
            theFilter.config.type = type;
        }
    }
});

// See https://www.sencha.com/forum/showthread.php?288385
// Column renderer will give no metadata parameter after change a value of cell.
// It happens because column renderer method is invoked with null second parameter here
Ext.define('Ext.overrides.grid.View', {
        extend: 'Ext.grid.View',

        alias: 'widget.patchedgridview'
        ,

        handleUpdate: function(store, record, operation, changedFieldNames) {
            var me = this,
                rowTpl = me.rowTpl,
                oldItem, oldItemDom, oldDataRow,
                newItemDom,
                newAttrs, attLen, attName, attrIndex,
                overItemCls,
                focusedItemCls,
                selectedItemCls,
                columns,
                column,
                columnsToUpdate = [],
                len, i,
                hasVariableRowHeight = me.variableRowHeight,
                cellUpdateFlag,
                updateTypeFlags = 0,
                cell,
                fieldName,
                value,
                defaultRenderer,
                scope,
                ownerCt = me.ownerCt;


            if (me.viewReady) {
                oldItemDom = me.getNodeByRecord(record);

                if (oldItemDom) {
                    overItemCls = me.overItemCls;
                    focusedItemCls = me.focusedItemCls;
                    selectedItemCls = me.selectedItemCls;
                    columns = me.ownerCt.getVisibleColumnManager().getColumns();

                    if (!me.getRowFromItem(oldItemDom) || (updateTypeFlags & 1) || (oldItemDom.tBodies[0].childNodes.length > 1)) {
                        oldItem = Ext.fly(oldItemDom, '_internal');
                        newItemDom = me.createRowElement(record, me.dataSource.indexOf(record), columnsToUpdate);
                        if (oldItem.hasCls(overItemCls)) {
                            Ext.fly(newItemDom).addCls(overItemCls);
                        }
                        if (oldItem.hasCls(focusedItemCls)) {
                            Ext.fly(newItemDom).addCls(focusedItemCls);
                        }
                        if (oldItem.hasCls(selectedItemCls)) {
                            Ext.fly(newItemDom).addCls(selectedItemCls);
                        }

                        newAttrs = newItemDom.attributes;
                        attLen = newAttrs.length;
                        for (attrIndex = 0; attrIndex < attLen; attrIndex++) {
                            attName = newAttrs[attrIndex].name;
                            if (attName !== 'id') {
                                oldItemDom.setAttribute(attName, newAttrs[attrIndex].value);
                            }
                        }

                        if (columns.length && (oldDataRow = me.getRow(oldItemDom))) {
                            me.updateColumns(oldDataRow, Ext.fly(newItemDom).down(me.rowSelector, true), columnsToUpdate);
                        }

                        while (rowTpl) {
                            if (rowTpl.syncContent) {
                                if (rowTpl.syncContent(oldItemDom, newItemDom, changedFieldNames ? columnsToUpdate : null) === false) {
                                    break;
                                }
                            }
                            rowTpl = rowTpl.nextTpl;
                        }
                    }
                    else {
                        this.refresh();
                    }

                    if (hasVariableRowHeight) {
                        Ext.suspendLayouts();
                    }


                    me.fireEvent('itemupdate', record, me.store.indexOf(record), oldItemDom);

                    if (hasVariableRowHeight) {
                        me.refreshSize();

                        Ext.resumeLayouts(true);
                    }
                }
            }
        }
    }
);

Ext.define('pimcore.tree.Panel', {
    extend: 'Ext.tree.Panel'
});

Ext.define('pimcore.tree.View', {
    extend: 'Ext.tree.View',
    alias: 'widget.pimcoretreeview',
    listeners: {
        refresh: function() {
            this.updatePaging();
        },
        beforeitemupdate: function(record) {
            if(record.ptb) {
                record.ptb.destroy();
                delete record.ptb;
            }
        },

        itemupdate: function(record) {
            if (record.needsPaging && typeof record.ptb == "undefined") {
                this.doUpdatePaging(record);
            }
        }
    },

    queue: {},

    renderRow: function(record, rowIdx, out) {
        var me = this;
        if (record.needsPaging) {
            me.queue[record.id] = record;
        }

        me.superclass.renderRow.call(this, record, rowIdx, out);

        if (record.needsPaging && typeof record.ptb == "undefined") {
            this.doUpdatePaging(record);
        }

        this.fireEvent("itemafterrender", record, rowIdx, out);
    },

    doUpdatePaging: function(node) {

        if (node.data.expanded && node.needsPaging) {

            node.ptb = ptb = Ext.create('pimcore.toolbar.Paging', {
                    node: node,
                    width: 260
                }
            );

            node.ptb.node = node;
            node.ptb.store = this.store;


            var tree = node.getOwnerTree();
            var view = tree.getView();
            var nodeEl = Ext.fly(view.getNodeByRecord(node));
            if (!nodeEl) {
                //console.log("Could not resolve node " + node.id);
                return;
            }
            nodeEl = nodeEl.getFirstChild();
            nodeEl = nodeEl.query(".x-tree-node-text");
            nodeEl = nodeEl[0];
            var el = nodeEl;

            //el.addCls('x-grid-header-inner');
            el = Ext.DomHelper.insertAfter(el, {
                tag: 'span',
                "class": "pimcore_pagingtoolbar_container"
            }, true);

            el.addListener("click", function(e) {
                e.stopPropagation();
            });


            el.addListener("mousedown", function(e) {
                e.stopPropagation();
            });

            ptb.render(el);
            tree.updateLayout();

            if (node.filter) {
                node.ptb.filterField.focus([node.filter.length, node.filter.length]);
            } else if (node.fromPaging) {
                node.ptb.numberItem.focus();
            }
        }

    },

    updatePaging: function() {
        var me = this;
        var queue = me.queue;

        var names = Object.getOwnPropertyNames(queue);

        for (i = 0; i < names.length; i++) {
            var node = queue[names[i]];
            this.doUpdatePaging(node);
        }

        me.queue = {}
    }
});

Ext.define('pimcore.data.PagingTreeStore', {

    extend: 'Ext.data.TreeStore',

    ptb: false,

    onProxyLoad: function(operation) {
        try {
            var me = this;
            var options = operation.initialConfig
            var node = options.node;
            var proxy = me.getProxy();
            var extraParams = proxy.getExtraParams();


            var response = operation.getResponse();
            var data = response.responseJson;

            node.fromPaging = data.fromPaging;
            node.filter = data.filter;
            node.inSearch = data.inSearch;
            node.overflow = data.overflow;

            proxy.setExtraParam("fromPaging", 0);

            var total = data.total;

            var text = node.data.text;
            if (typeof total == "undefined") {
                total = 0;
            }

            node.addListener("expand", function (node) {
                var tree = node.getOwnerTree();
                if (tree) {
                    var view = tree.getView();
                    view.updatePaging();
                }
            }.bind(this));

            //to hide or show the expanding icon depending if childs are available or not
            node.addListener('remove', function (node, removedNode, isMove) {
                if (!node.hasChildNodes()) {
                    node.set('expandable', false);
                }
            });
            node.addListener('append', function (node) {
                node.set('expandable', true);
            });

            if (me.pageSize < total || node.inSearch) {
                node.needsPaging = true;
                node.pagingData = {
                    total: data.total,
                    offset: data.offset,
                    limit: data.limit
                }
            } else {
                node.needsPaging = false;
            }

            me.superclass.onProxyLoad.call(this, operation);
            var proxy = this.getProxy();
            proxy.setExtraParam("start", 0);
        } catch (e) {
            console.log(e);
        }
    }
});


Ext.define('pimcore.toolbar.Paging', {
    extend: 'Ext.toolbar.Toolbar',
    requires: [
        'Ext.toolbar.TextItem',
        'Ext.form.field.Number'
    ],

    displayInfo: false,

    prependButtons: false,

    displayMsg: t('Displaying {0} - {1} of {2}'),

    emptyMsg: t('no_data_to_display'),

    beforePageText: t('page'),

    afterPageText: '/ {0}',

    firstText: t('first_page'),

    prevText: t('previous_page'),

    nextText: t('next_page'),

    lastText: t('last_page'),

    refreshText: t('refresh'),

    width: 280,

    height: 20,

    border: false,

    emptyPageData: {
        total: 0,
        currentPage: 0,
        pageCount: 0,
        toRecord: 0,
        fromRecord: 0
    },

    doCancelSearch: function (node) {
        this.inSearch = 0;
        this.cancelFilterButton.hide();
        this.filterButton.show();
        this.filterField.setValue("");
        this.filterField.hide();

        var store = this.store;
        store.load({
                node: node,
                params: {
                    "inSearch": 0
                }
            }
        );


        this.first.show();
        this.prev.show();
        this.numberItem.show();
        this.spacer.show();
        this.afterItem.show();
        this.next.show();
        this.last.show();
    },

    getPagingItems: function () {
        var me = this,
            inputListeners = {
                scope: me,
                blur: me.onPagingBlur
            };

        var node = me.node;
        var pagingData = me.node.pagingData;

        var currPage = pagingData.offset / pagingData.limit + 1;

        this.inSearch = node.inSearch;
        var hidden = this.inSearch
        pimcore.isTreeFiltering = false;

        inputListeners[Ext.supports.SpecialKeyDownRepeat ? 'keydown' : 'keypress'] = me.onPagingKeyDown;

        this.filterField = new Ext.form.field.Text({
            name: 'filter',
            width: 160,
            border: true,
            cls: "pimcore_pagingtoolbar_container_filter",
            fieldStyle: "padding: 0 10px 0 10px;",
            height: 18,
            value: node.filter ? node.filter : "",
            enableKeyEvents: true,
            hidden: !hidden,
            listeners: {
                "keydown": function (node, inputField, event) {
                    if (event.keyCode == 13) {
                        var store = this.store;
                        var proxy = store.getProxy();
                        this.currentFilter = this.filterField.getValue();


                        try {
                            store.load({
                                    node: node,
                                    params: {
                                        "filter": this.filterField.getValue(),
                                        "inSearch": this.inSearch
                                    }
                                }
                            );
                        } catch (e) {

                        }


                    }
                }.bind(this, node)
            }

        })
        ;

        var result = [this.filterField];

        this.overflow = new Ext.button.Button(
            {
                tooltip: t("there_are_more_items"),
                overflowText: t("there_are_more_items"),
                iconCls: "pimcore_icon_warning",
                disabled: false,
                scope: me,
                border: false,
                hidden: !node.overflow
            });


        this.filterButton = new Ext.button.Button(
            {
                itemId: 'filterButton',
                tooltip: t("filter"),
                overflowText: t("filter"),
                iconCls: Ext.baseCSSPrefix + 'tbar-page-filter',
                margin: '-1 2 3 2',
                handler: function () {
                    this.inSearch = 1;
                    this.cancelFilterButton.show();
                    this.filterButton.hide();
                    this.filterField.setValue("");
                    this.filterField.show();

                    this.filterField.focus();

                    this.first.hide();
                    this.prev.hide();
                    this.numberItem.hide();
                    this.spacer.hide();
                    this.afterItem.hide();
                    this.next.hide();
                    this.last.hide();
                }.bind(this),
                scope: me,
                hidden: this.inSearch
            });

        this.cancelFilterButton = new Ext.button.Button(
            {
                itemId: 'cancelFlterButton',
                tooltip: t("clear"),
                overflowText: t("clear"),
                margin: '-1 2 3 2',
                iconCls: Ext.baseCSSPrefix + 'tbar-page-cancel-filter',
                handler: function () {
                    this.doCancelSearch(node);

                }.bind(this),
                scope: me,
                hidden: !this.inSearch
            });

        this.afterItem = Ext.create('Ext.form.NumberField', {

            cls: Ext.baseCSSPrefix + 'tbar-page-number',
            value: Math.ceil(pagingData.total / pagingData.limit),
            hideTrigger: true,
            heightLabel: true,
            height: 18,
            width: 38,
            disabled: true,
            margin: '-1 2 3 2',
            hidden: hidden
        });


        this.numberItem = new Ext.form.field.Number({
            xtype: 'numberfield',
            itemId: 'inputItem',
            name: 'inputItem',
            heightLabel: true,
            cls: Ext.baseCSSPrefix + 'tbar-page-number',
            allowDecimals: false,
            minValue: 1,
            maxValue: this.getMaxPageNum(),
            value: currPage,
            hideTrigger: true,
            enableKeyEvents: true,
            keyNavEnabled: false,
            selectOnFocus: true,
            submitValue: false,
            height: 18,
            width: 40,
            isFormField: false,
            margin: '-1 2 3 2',
            listeners: inputListeners,
            hidden: hidden
        });


        this.first = new Ext.button.Button(
            {
                itemId: 'first',
                tooltip: me.firstText,
                overflowText: me.firstText,
                iconCls: Ext.baseCSSPrefix + 'tbar-page-first',
                disabled: me.node.pagingData.offset == 0,
                handler: me.moveFirst,
                scope: me,
                border: false,
                hidden: hidden

            });


        this.prev = new Ext.button.Button({
            itemId: 'prev',
            tooltip: me.prevText,
            overflowText: me.prevText,
            iconCls: Ext.baseCSSPrefix + 'tbar-page-prev',
            disabled: me.node.pagingData.offset == 0,
            handler: me.movePrevious,
            scope: me,
            border: false,
            hidden: hidden
        });


        this.spacer = new Ext.toolbar.Spacer({
            xtype: "tbspacer",
            hidden: hidden
        });


        this.next = new Ext.button.Button({
            itemId: 'next',
            tooltip: me.nextText,
            overflowText: me.nextText,
            iconCls: Ext.baseCSSPrefix + 'tbar-page-next',
            disabled: (Math.ceil(me.node.pagingData.total / me.node.pagingData.limit) - 1) * me.node.pagingData.limit == me.node.pagingData.offset,
            handler: me.moveNext,
            scope: me,
            hidden: hidden
        });


        this.last = new Ext.button.Button({
            itemId: 'last',
            tooltip: me.lastText,
            overflowText: me.lastText,
            iconCls: Ext.baseCSSPrefix + 'tbar-page-last',
            disabled: (Math.ceil(me.node.pagingData.total / me.node.pagingData.limit) - 1) * me.node.pagingData.limit == me.node.pagingData.offset,
            handler: me.moveLast,
            scope: me,
            hidden: hidden
        });


        result.push(this.overflow);
        result.push(this.filterButton);
        result.push(this.cancelFilterButton);

        result.push(this.filterField);
        result.push(this.first);
        result.push(this.prev);
        result.push(this.numberItem);
        result.push(this.spacer);
        result.push(this.afterItem);
        result.push(this.next);
        result.push(this.last);


        return result;
    },

    getMaxPageNum: function() {
        var me = this;
        return Math.ceil(me.node.pagingData.total / me.node.pagingData.limit)
    },

    initComponent: function(config) {
        var me = this,
            userItems = me.items || me.buttons || [],
            pagingItems;

        pagingItems = me.getPagingItems();
        if (me.prependButtons) {
            me.items = userItems.concat(pagingItems);
        } else {
            me.items = pagingItems.concat(userItems);
        }
        delete me.buttons;
        if (me.displayInfo) {
            me.items.push('->');
            me.items.push({
                xtype: 'tbtext',
                itemId: 'displayItem'
            });
        }
        me.callParent();
    },


    getInputItem: function() {
        return this.child('#inputItem');
    },


    onPagingBlur: function(e) {
        var inputItem = this.getInputItem(),
            curPage;
        if (inputItem) {
            //curPage = this.getPageData().currentPage;
            //inputItem.setValue(curPage);
        }
    },

    onPagingKeyDown: function(field, e) {
        this.processKeyEvent(field, e);
    },

    readPageFromInput: function() {
        var inputItem = this.getInputItem(),
            pageNum = false,
            v;
        if (inputItem) {
            v = inputItem.getValue();
            pageNum = parseInt(v, 10);
        }
        return pageNum;
    },


    processKeyEvent: function(field, e) {
        var me = this,
            k = e.getKey(),
        //pageData = me.getPageData(),
            increment = e.shiftKey ? 10 : 1,
            pageNum;
        if (k == e.RETURN) {
            e.stopEvent();
            pageNum = me.readPageFromInput();
            if (pageNum !== false) {
                pageNum = Math.min(Math.max(1, pageNum), this.getMaxPageNum());
                this.moveToPage(pageNum);
            }


        } else if (k == e.HOME) {
            e.stopEvent();
            this.moveFirst();
        } else if (k == e.END) {
            e.stopEvent();
            this.moveLast();
        } else if (k == e.UP || k == e.PAGE_UP || k == e.DOWN || k == e.PAGE_DOWN) {
            e.stopEvent();
            pageNum = me.readPageFromInput();
            if (pageNum) {
                if (k == e.DOWN || k == e.PAGE_DOWN) {
                    increment *= -1;
                }
                pageNum += increment;
                if (pageNum >= 1 && pageNum <= this.getMaxPageNum()) {
                    this.moveToPage(pageNum);
                }
            }
        }
    },

    moveToPage: function(page) {
        var me = this;
        var node = me.node;
        var pagingData = node.pagingData;
        var store = node.getTreeStore();

        var proxy = store.getProxy();
        proxy.setExtraParam("start",  pagingData.limit * (page - 1));
        proxy.setExtraParam("fromPaging", 1);
        store.load({
            node: node
        });
    },

    moveFirst: function() {
        var me = this;
        var node = me.node;
        var pagingData = node.pagingData;
        var store = node.getTreeStore();
        var page = pagingData.offset / pagingData.total;

        var proxy = store.getProxy();
        proxy.setExtraParam("start", 0);
        store.load({
            node: node
        });
    },

    movePrevious: function() {
        var me = this;
        var node = me.node;
        var pagingData = node.pagingData;
        var store = node.getTreeStore();
        var page = pagingData.offset / pagingData.total;

        var proxy = store.getProxy();
        proxy.setExtraParam("start", pagingData.offset - pagingData.limit);
        store.load({
            node: node
        });
    },

    moveNext: function() {
        var me = this;
        var node = me.node;
        var pagingData = node.pagingData;
        var store = node.getTreeStore();
        var page = pagingData.offset / pagingData.total;

        var proxy = store.getProxy();
        proxy.setExtraParam("start", pagingData.offset + pagingData.limit);
        store.load({
            node: node
        });

    },

    moveLast: function() {
        var me = this;
        var node = me.node;
        var pagingData = node.pagingData;
        var store = node.getTreeStore();
        var offset = (Math.ceil(pagingData.total / pagingData.limit) - 1) * pagingData.limit;

        var proxy = store.getProxy();
        proxy.setExtraParam("start", offset);
        store.load({
            node: node
        });
    },

    doRefresh: function() {
        var me = this;
        var node = me.node;
        var pagingData = node.pagingData;
        var store = node.getTreeStore();
        var page = pagingData.offset / pagingData.total;

        var proxy = store.getProxy();
        proxy.setExtraParam("start", pagingData.offset);
        store.load({
            node: node
        });
    },

    onDestroy: function() {
        //this.bindStore(null);
        this.callParent();
    }
});

/**
 * Fixes ID validation to include more characters as we need the colon for nested editable names
 *
 * See:
 *
 * - http://www.sencha.com/forum/showthread.php?296173-validIdRe-throwing-Invalid-Element-quot-id-quot-for-valid-ids-containing-colons
 * - https://github.com/JarvusInnovations/sencha-hotfixes/blob/ext/5/0/1/1255/overrides/dom/Element/ValidId.js
 */
Ext.define('EXTJS-17231.ext.dom.Element.validIdRe', {
    override: 'Ext.dom.Element',

    validIdRe: /^[a-z][a-z0-9\-_:.]*$/i,

    getObservableId: function () {
        return (this.observableId = this.callParent().replace(/([.:])/g, "\\$1"));
    }
});

/**
 * Fieldtype date is not able to save the correct value (before 1951) #1329
 *
 * When saving a date before the year 1951 (e.g. 01/01/1950) with the fieldtype "date" inside a object ...
 *
 * Expected behavior
 *
 * ... the timestamp saved into the database should contain the date 01/01/1950.
 *
 * Actual behavior
 *
 * ... but it actually contains the value of 01/01/2050.
 *
 *
 */
Ext.define('pimcore.Ext.form.field.Date', {
    override: 'Ext.form.field.Date',

    initValue: function() {
        var value = this.value;

        if (Ext.isString(value)) {
            this.value = this.rawToValue(value);
            this.rawDate = this.value;
            this.rawDateText = this.parseDate(this.value);
        }
        else {
            this.value = value || null;
            this.rawDate = this.value;
            this.rawDateText = this.value ? this.parseDate(this.value) : '';
        }

        this.callParent();
    },

    rawToValue: function(rawValue) {
        if (rawValue === this.rawDateText) {
            return this.rawDate;
        }
        return this.parseDate(rawValue) || rawValue || null;
    },

    setValue: function(v) {
        var utilDate = Ext.Date,
            rawDate;

        this.lastValue = this.rawDateText;
        this.lastDate = this.rawDate;
        if (Ext.isDate(v)) {
            rawDate = this.rawDate  = v;
            this.rawDateText = this.formatDate(v);
        }
        else {
            rawDate = this.rawDate = this.rawToValue(v);
            this.rawDateText = this.formatDate(v);
            if (rawDate === v) {
                rawDate = this.rawDate = null;
                this.rawDateText = '';
            }
        }
        if (rawDate && !utilDate.formatContainsHourInfo(this.format)) {
            this.rawDate = utilDate.clearTime(rawDate, true);
        }
        this.callParent(arguments);
    },

    checkChange: function() {
        var  newVal, oldVal, lastDate;

        if (!this.suspendCheckChange) {
            newVal = this.getRawValue();
            oldVal = this.lastValue;
            lastDate = this.lastDate;

            if (!this.destroyed && this.didValueChange(newVal, oldVal)) {
                this.rawDate = this.rawToValue(newVal);
                this.rawDateText = this.formatDate(newVal);
                this.lastValue = newVal;
                this.lastDate = this.rawDate;
                this.fireEvent('change', this, this.getValue(), lastDate);
                this.onChange(newVal, oldVal);
            }
        }
    },

    getSubmitValue: function() {
        var format = this.submitFormat || this.format,
            value = this.rawDate;

        return value ? Ext.Date.format(value, format) : '';
    },

    getValue: function() {
        return this.rawDate || null;
    },

    setRawValue: function(value) {
        this.callParent([value]);
        this.rawDate = Ext.isDate(value) ? value : this.rawToValue(value);
        this.rawDateText = this.formatDate(value);
    },

    onSelect: function(m, d) {
        this.setValue(d);
        this.rawDate = d;
        this.fireEvent('select', this, d);
        this.onTabOut(m);
    },

    onTabOut: function(picker) {
        this.inputEl.focus();
        this.collapse();
    },

    onExpand: function() {
        var value = this.rawDate;
        this.picker.setValue(Ext.isDate(value) ? value : null);
    }
});

//Fix - Date picker does not align to component in scrollable container and breaks view layout randomly.
Ext.override(Ext.picker.Date, {
        afterComponentLayout: function (width, height, oldWidth, oldHeight) {
        var field = this.pickerField;
        this.callParent([
            width,
            height,
            oldWidth,
            oldHeight
        ]);
        // Bound list may change size, so realign on layout
        // **if the field is an Ext.form.field.Picker which has alignPicker!**
        if (field && field.alignPicker) {
            field.alignPicker();
        }
    }
});


/**
 * A specialized {@link Ext.view.BoundListKeyNav} implementation for navigating in the quicksearch.
 * This is needed because in the default implementation the Crtl+A combination is disabled, but this is needed
 * for the purpose of the quicksearch
 */
Ext.define('Pimcore.view.BoundListKeyNav', {
    extend: 'Ext.view.BoundListKeyNav',

    alias: 'view.navigation.quicksearch.boundlist',

    initKeyNav: function(view) {
        var me = this,
            field = view.pickerField;

        // Add the regular KeyNav to the view.
        // Unless it's already been done (we may have to defer a call until the field is rendered.
        if (!me.keyNav) {
            me.callParent([view]);

            // Add ESC handling to the View's KeyMap to collapse the field
            me.keyNav.map.addBinding({
                key: Ext.event.Event.ESC,
                fn: me.onKeyEsc,
                scope: me
            });
        }

        // BoundLists must be able to function standalone with no bound field
        if (!field) {
            return;
        }

        if (!field.rendered) {
            field.on('render', Ext.Function.bind(me.initKeyNav, me, [view], 0), me, {single: true});
            return;
        }

        // BoundListKeyNav also listens for key events from the field to which it is bound.
        me.fieldKeyNav = new Ext.util.KeyNav({
            disabled: true,
            target: field.inputEl,
            forceKeyDown: true,
            up: me.onKeyUp,
            down: me.onKeyDown,
            right: me.onKeyRight,
            left: me.onKeyLeft,
            pageDown: me.onKeyPageDown,
            pageUp: me.onKeyPageUp,
            home: me.onKeyHome,
            end: me.onKeyEnd,
            tab: me.onKeyTab,
            space: me.onKeySpace,
            enter: me.onKeyEnter,
            // This object has to get its key processing in first.
            // Specifically, before any Editor's key hyandling.
            priority: 1001,
            scope: me
        });
    }
});



Ext.define('Ext.pimcore.slider.Milestone', {
    extend: 'Ext.slider.Multi',

    requires: [
        'Ext.slider.Multi'
    ],

    startDate: null,
    thumbsToRender: [],
    activeThumb: null,

    initComponent: function() {
        this.useTips = true;
        this.tipText = function(thumb){
            var date = new Date(thumb.value * 1000);
            return Ext.Date.format(date, 'H:i');
        };

        this.callParent();

        if(this.startDate) {
            this.initDate(this.startDate);
        }

        this.increment = 20;
        this.thumbs = [];
        this.constrainThumbs = false;
        this.clickToChange = false;

        this.initDefaultListeners();
    },

    initDefaultListeners: function() {

        this.addListener('change', function(slider, newValue, thumb, eOpts) {
            if(typeof thumb.moveCallback === "function") {
                thumb.moveCallback(newValue);
            }

        });

        this.addListener('render', function() {
            for(var i = 0; i < this.thumbsToRender.length; i++) {
                this.attachListenersToThumb(this.thumbsToRender[i]);
            }

            this.thumbsToRender = [];
            if(this.activeThumb) {
                this.activateThumb(this.activeThumb);
            }
        }.bind(this));

    },

    initDate: function(date) {
        this.removeThumbs();

        this.startDate = date;
        var startDate = date.getTime() / 1000;
        this.setMinValue(startDate);
        this.setMaxValue(startDate + 86399);


    },

    addTimestamp: function(timestamp, key, moveCallback, clickCallback, deleteCallback) {
        var thumb = this.addThumb(timestamp);
        thumb.key = key;
        thumb.moveCallback = moveCallback;
        thumb.deleteCallback = deleteCallback;
        thumb.clickCallback = clickCallback;

        if(this.rendered) {
            this.attachListenersToThumb(thumb);
        } else {
            this.thumbsToRender.push(thumb);
        }

        return thumb;
    },

    attachListenersToThumb: function(thumb) {

        var domElement = thumb.el;

        if(typeof thumb.clickCallback === "function") {
            domElement.on('click', function(thumb) {
                this.activateThumb(thumb);
            }.bind(this, thumb));
        }

        domElement.on("contextmenu", function (e) {
            var menu = new Ext.menu.Menu();
            menu.add(new Ext.menu.Item({
                text: t('delete'),
                iconCls: "pimcore_icon_delete",
                handler: function (thumb, item) {
                    thumb.deleteCallback(thumb.key);
                    this.removeThumb(thumb);
                }.bind(this, thumb)
            }));
            menu.showAt(e.getXY());
            menu.setZIndex(20000);

            e.stopEvent();
        }.bind(this));

    },

    activateThumb: function(thumb) {
        this.activeThumb = thumb;
        if(this.rendered) {
            for(var i = 0; i < this.thumbs.length; i++) {
                if(this.thumbs[i].el) {
                    this.thumbs[i].el.removeCls('selected');
                }
            }
            thumb.el.addCls('selected');
            thumb.clickCallback(thumb.key);
        }
    },

    activateThumbByValue: function(value) {
        for(var i = 0; i < this.thumbs.length; i++) {
            if(this.thumbs[i].value == value) {
                this.activateThumb(this.thumbs[i]);
                return;
            }
        }
    },

    removeThumbs: function() {
        this.thumbsToRender = [];
        for(var i = 0; i < this.thumbs.length; i++) {
            this.thumbs[i].destroy();
        }
        this.thumbs = [];
        this.thumbStack = null;
    },

    removeThumb: function(thumb) {
        thumb.destroy();

        var index = this.thumbs.indexOf(thumb);
        if (index !== -1) {
            this.thumbs.splice(index, 1);
        }
    },

    //needs to be overwritten in order to handle no thumbs available
    onClickChange : function(trackPoint) {
        var me = this,
            thumb, index;

        // How far along the track *from the origin* was the click.
        // If vertical, the origin is the bottom of the slider track.

        //find the nearest thumb to the click event
        thumb = me.getNearest(trackPoint);
        if (thumb && !thumb.disabled) {
            index = thumb.index;
            me.setValue(index, Ext.util.Format.round(me.reversePixelValue(trackPoint), me.decimalPrecision), undefined, true);
        }
    }
});


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

pimcore.registerNS("pimcore.element.tag.imagehotspotmarkereditor");
pimcore.element.tag.imagehotspotmarkereditor = Class.create({

    initialize: function (imageId, data, saveCallback, config) {
        this.imageId = imageId;
        this.data = data;
        this.saveCallback = saveCallback;
        this.modal = true;
        this.config = typeof config != "undefined" ? config : {};
        this.context = this.config.context ? this.config.context : {};
        this.predefinedDataTemplates = this.config.predefinedDataTemplates ? this.config.predefinedDataTemplates : {};
        this.context.scope = "hotspotEditor";

        // we need some space for the surrounding area (button, dialog frame, etc...)
        this.width = Math.min(1000, window.innerWidth - 100);
        this.height = Math.min(800, window.innerHeight - 180);

    },

    open: function (modal) {
        var validImage = (typeof this.imageId != "undefined" && this.imageId !== null),
            imageUrl = Routing.generate('pimcore_admin_asset_getimagethumbnail', {id: this.imageId, width: this.width, height: this.height, contain: true});

        if (this.config.crop) {
            imageUrl = imageUrl + '&' + Ext.urlEncode(this.config.crop);
        }

        if (typeof modal != "undefined") {
            this.modal = modal;
        }

        this.hotspotStore = [];
        this.hotspotMetaData = {};

        var markerConfig = this.getButtonConfig("marker", "pimcore_icon_overlay_add");
        var hotspotConfig = this.getButtonConfig("hotspot", "pimcore_icon_image_region pimcore_icon_overlay_add");

        this.hotspotWindow = new Ext.Window({
            width: this.width + 100,
            height: this.height + 100,
            modal: this.modal,
            closeAction: "destroy",
            autoDestroy: true,
            resizable: false,
            bodyStyle: "background: url('/bundles/pimcoreadmin/img/tree-preview-transparent-background.png');",
            tbar: {
                overflowHandler: 'menu',
                items:
                    [
                        markerConfig,
                        hotspotConfig
                    ]
            },
            bbar: {
                overflowHandler: 'menu',
                items: ["->", {
                    xtype: "button",
                    iconCls: "pimcore_icon_apply",
                    text: t("save"),
                    handler: function () {

                        var el;
                        var dataHotspot = [];
                        var dataMarker = [];

                        var windowId = this.hotspotWindow.getId();
                        var windowEl = Ext.getCmp(windowId).body;
                        var originalWidth = windowEl.getWidth(true);
                        var originalHeight = windowEl.getHeight(true);

                        for (var i = 0; i < this.hotspotStore.length; i++) {
                            el = this.hotspotStore[i];

                            if (Ext.get(el["id"])) {
                                var theEl = Ext.get(el["id"]);
                                var dimensions = theEl.getStyle(["top", "left", "width", "height"]);
                                var name = Ext.get(el["id"]).getAttribute("title");
                                var metaData = [];
                                if (this.hotspotMetaData && this.hotspotMetaData[el["id"]]) {
                                    metaData = this.hotspotMetaData[el["id"]];
                                }

                                if (el.type == "marker") {
                                    dataMarker.push({
                                        top: (intval(dimensions.top) + 35) * 100 / originalHeight, //the marker el is 35px high
                                        left: (intval(dimensions.left) + 12) * 100 / originalWidth,//the marker el is 25px wide
                                        data: metaData,
                                        name: name
                                    });
                                } else if (el.type == "hotspot") {
                                    dataHotspot.push({
                                        top: intval(dimensions.top) * 100 / originalHeight,
                                        left: intval(dimensions.left) * 100 / originalWidth,
                                        width: intval(dimensions.width) * 100 / originalWidth,
                                        height: intval(dimensions.height) * 100 / originalHeight,
                                        data: metaData,
                                        name: name
                                    });
                                }
                            }
                        }

                        this.data.hotspots = dataHotspot;
                        this.data.marker = dataMarker;

                        if (typeof this.saveCallback == "function") {
                            this.saveCallback(this.data);
                        }

                        this.hotspotWindow.close();
                    }.bind(this)
                }]
            },
            html: validImage ? '<img id="hotspotImage" src="' + imageUrl + '" />' : '<span style="padding:10px;">' + t("no_data_to_display") + '</span>'
        });

        this.hotspotWindowInitCount = 0;

        this.hotspotWindow.on("afterrender", function () {
            this.hotspotWindowInterval = window.setInterval(function () {
                var el = Ext.get("hotspotImage");
                if (!el) {
                    clearInterval(this.hotspotWindowInterval);
                    return;
                }
                var imageWidth = el.getWidth();
                var imageHeight = el.getHeight();
                var i;
                var elId;

                if (el) {
                    if (el.getWidth() > 30) {
                        clearInterval(this.hotspotWindowInterval);
                        this.hotspotWindowInitCount = 0;

                        var winBodyInnerSize = this.hotspotWindow.body.getSize();
                        var winOuterSize = this.hotspotWindow.getSize();
                        var paddingWidth = winOuterSize["width"] - winBodyInnerSize["width"];
                        var paddingHeight = winOuterSize["height"] - winBodyInnerSize["height"];

                        this.hotspotWindow.setSize(imageWidth + paddingWidth, imageHeight + paddingHeight);
                        //Ext.get("hotspotImage").remove();

                        if (this.data && this.data["hotspots"]) {
                            for (i = 0; i < this.data.hotspots.length; i++) {
                                elId = this.addHotspot(this.data.hotspots[i]);
                                if (this.data.hotspots[i]["data"]) {
                                    this.hotspotMetaData[elId] = this.data.hotspots[i]["data"];
                                }
                            }
                        }

                        if (this.data && this.data["marker"]) {
                            for (i = 0; i < this.data.marker.length; i++) {
                                elId = this.addMarker(this.data.marker[i]);
                                if (this.data.marker[i]["data"]) {
                                    this.hotspotMetaData[elId] = this.data.marker[i]["data"];
                                }
                            }
                        }

                        return;

                    } else if (this.hotspotWindowInitCount > 60) {
                        // if more than 30 secs cancel and close the window
                        this.hotspotWindow.close();
                    }

                    this.hotspotWindowInitCount++;
                }
            }.bind(this), 500);

        }.bind(this));

        this.hotspotWindow.show();
    },

    addMarker: function (config) {

        var markerId = "marker-" + (this.hotspotStore.length + 1);
        this.hotspotWindow.body.getFirstChild().insertHtml("beforeEnd", '<div id="' + markerId
            + '" class="pimcore_image_marker"></div>');

        var markerEl = Ext.get(markerId);

        if (typeof config == "object") {
            if (config["top"]) {
                var windowId = this.hotspotWindow.getId();
                var windowEl = Ext.getCmp(windowId).body;
                var originalWidth = windowEl.getWidth(true);
                var originalHeight = windowEl.getHeight(true);

                markerEl.applyStyles({
                    top: (originalHeight * (config["top"] / 100) - 35) + "px",
                    left: (originalWidth * (config["left"] / 100) - 12) + "px"
                });
            }

            if (config["name"]) {
                markerEl.dom.setAttribute("title", config["name"]);
            }
        }

        this.addMarkerHotspotContextMenu(markerId, "marker", markerEl);

        var markerDD = new Ext.dd.DD(markerEl);
        this.hotspotStore.push({
            id: markerId,
            type: "marker"
        });

        return markerId;
    },

    addHotspot: function (config) {
        var hotspotId = "hotspot-" + (this.hotspotStore.length + 1);

        this.hotspotWindow.add(
            {
                xtype: 'component',
                id: hotspotId,
                resizable: {
                    target: hotspotId,
                    pinned: true,
                    minWidth: 20,
                    minHeight: 20,
                    preserveRatio: false,
                    dynamic: true,
                    handles: 'all'
                },
                style: "cursor:move;",
                draggable: true,
                cls: 'pimcore_image_hotspot'
            });

        var hotspotEl = Ext.get(hotspotId);

        // default dimensions
        hotspotEl.applyStyles({
            width: "50px",
            height: "50px"
        });

        if (typeof config == "object") {
            if (config["top"]) {
                var windowId = this.hotspotWindow.getId();
                var windowEl = Ext.getCmp(windowId).body;
                var originalWidth = windowEl.getWidth(true);
                var originalHeight = windowEl.getHeight(true);

                hotspotEl.applyStyles({
                    top: (originalHeight * (config["top"] / 100)) + "px",
                    left: (originalWidth * (config["left"] / 100)) + "px",
                    width: (originalWidth * (config["width"] / 100)) + "px",
                    height: (originalHeight * (config["height"] / 100)) + "px"
                });
            }

            if (config["name"]) {
                hotspotEl.dom.setAttribute("title", config["name"]);
            }
        }

        this.addMarkerHotspotContextMenu(hotspotId, "hotspot", hotspotEl);

        this.hotspotStore.push({
            id: hotspotId,
            type: "hotspot"
        });

        return hotspotId;
    },

    addMarkerHotspotContextMenu: function (id, type, el) {
        el.on("contextmenu", function (id, e) {
            var menu = new Ext.menu.Menu();

            menu.add(new Ext.menu.Item({
                text: t("add_data"),
                iconCls: "pimcore_icon_metadata pimcore_icon_overlay_add",
                handler: function (id, item) {
                    item.parentMenu.destroy();

                    this.editMarkerHotspotData(id);
                }.bind(this, id)
            }));

            menu.add(new Ext.menu.Item({
                text: t("remove"),
                iconCls: "pimcore_icon_delete",
                handler: function (id, type, item) {
                    item.parentMenu.destroy();
                    if (type == "hotspot") {
                        var cmp = Ext.getCmp(id);
                        this.hotspotWindow.remove(cmp);
                    } else {
                        var el = Ext.get(id);
                        el.remove();
                    }

                }.bind(this, id, type)
            }));


            menu.add(new Ext.menu.Item({
                text: t("clone"),
                iconCls: "pimcore_icon_copy",
                handler: function (id, type, item) {
                    item.parentMenu.destroy();

                    var el = Ext.get(id);
                    var copiedData = this.hotspotMetaData[id] ? this.hotspotMetaData[id].slice() : [];

                    var windowId = this.hotspotWindow.getId();
                    var windowEl = Ext.getCmp(windowId).body;
                    var originalWidth = windowEl.getWidth(true);
                    var originalHeight = windowEl.getHeight(true);

                    var dimensions = el.getStyle(["top", "left", "width", "height"]);

                    var config = {
                        data: copiedData,
                        name: el.getAttribute("title"),
                    };

                    if (type == "hotspot") {
                        config["top"] = (intval(dimensions.top) + 30) * 100 / originalHeight;
                        config["left"] = (intval(dimensions.left) + 30) * 100 / originalWidth;
                        config["width"] = intval(dimensions.width) * 100 / originalWidth;
                        config["height"] = intval(dimensions.height) * 100 / originalHeight;
                        var elId = this.addHotspot(config);
                    } else {
                        config["top"] = (intval(dimensions.top) + 30 + 35) * 100 / originalHeight;
                        config["left"] = (intval(dimensions.left) + 30 + 12) * 100 / originalWidth;
                        var elId = this.addMarker(config);
                    }
                    this.hotspotMetaData[elId] = copiedData;

                }.bind(this, id, type)
            }));

            menu.showAt(e.getXY());
            e.stopEvent();
        }.bind(this, id));
    },

    editMarkerHotspotData: function (id) {
        var nameField = new Ext.form.field.Text(
            {
                id: "name-field-" + id,
                value: Ext.get(id).getAttribute("title")
            }
        );
        var hotspotMetaDataWin = new Ext.Window({
            width: 600,
            height: 440,
            modal: this.modal,
            resizable: false,
            autoScroll: true,
            items: [{
                xtype: "form",
                itemId: "form",
                bodyStyle: "padding: 10px;"
            }],
            tbar: [{
                xtype: "button",
                iconCls: "pimcore_icon_add",
                menu: [{
                    text: t("textfield"),
                    iconCls: "pimcore_icon_input",
                    handler: function () {
                        addItem("textfield");
                    }
                }, {
                    text: t("textarea"),
                    iconCls: "pimcore_icon_textarea",
                    handler: function () {
                        addItem("textarea");
                    }
                }, {
                    text: t("checkbox"),
                    iconCls: "pimcore_icon_checkbox",
                    handler: function () {
                        addItem("checkbox");
                    }
                }, {
                    text: t("object"),
                    iconCls: "pimcore_icon_object",
                    handler: function () {
                        addItem("object");
                    }
                }, {
                    text: t("document"),
                    iconCls: "pimcore_icon_document",
                    handler: function () {
                        addItem("document");
                    }
                }, {
                    text: t("asset"),
                    iconCls: "pimcore_icon_asset",
                    handler: function () {
                        addItem("asset");
                    }
                }]
            }, "->", {
                xtype: "tbtext",
                text: t("name") + ":"
            },
                nameField
            ],
            buttons: [{
                text: t("save"),
                iconCls: "pimcore_icon_apply",
                handler: function (id) {

                    var form = hotspotMetaDataWin.getComponent("form").getForm();
                    var data = form.getFieldValues();
                    var normalizedData = [];

                    // when only one item is in the form
                    if (typeof data["name"] == "string") {
                        data = {
                            name: [data["name"]],
                            type: [data["type"]],
                            value: [data["value"]]
                        };
                    }

                    if (data && data["name"] && data["name"].length > 0) {
                        for (var i = 0; i < data["name"].length; i++) {

                            var listItem = {
                                name: data["name"][i],
                                value: data["value"][i],
                                type: data["type"][i]
                            };

                            normalizedData.push(listItem);
                        }
                    }


                    Ext.get(id).dom.setAttribute("title", Ext.getCmp("name-field-" + id).getValue());
                    this.hotspotMetaData[id] = normalizedData;

                    hotspotMetaDataWin.close();
                }.bind(this, id)
            }],
            listeners: {
                afterrender: function (id) {
                    if (this.hotspotMetaData && this.hotspotMetaData[id]) {
                        var data = this.hotspotMetaData[id];
                        for (var i = 0; i < data.length; i++) {
                            addItem(data[i]["type"], data[i]);
                        }
                    }
                }.bind(this, id)
            }
        });

        var addItem = function (hotspotMetaDataWin, type, data) {

            var id = "item-" + uniqid();
            var valueField;

            if (!data) {
                data = {
                    name: "",
                    value: ""
                };
            }

            if (type == "textfield") {
                valueField = {
                    xtype: "textfield",
                    name: "value",
                    fieldLabel: t("value"),
                    width: 500,
                    value: data["value"]
                };
            } else if (type == "textarea") {
                valueField = {
                    xtype: "textarea",
                    name: "value",
                    fieldLabel: t("value"),
                    width: 500,
                    value: data["value"]
                };
            } else if (type == "checkbox") {
                valueField = {
                    xtype: "checkbox",
                    name: "value",
                    fieldLabel: t("value"),
                    checked: data["value"]
                };
            } else if (type == "object" || type == "asset" || type == "document") {
                var textField = new Ext.form.TextField({
                    fieldCls: "pimcore_droptarget_input",
                    name: "value",
                    fieldLabel: t("value"),
                    value: data["value"],
                    width: 420,
                    listeners: {
                        render: this.addDataDropTarget.bind(this, type)
                    }
                });

                var items = [textField, {
                    xtype: "button",
                    iconCls: "pimcore_icon_edit",
                    handler: this.openElement.bind(this, textField, type)
                }, {
                    xtype: "button",
                    iconCls: "pimcore_icon_delete"
                    ,
                    handler: this.empty.bind(this, textField)
                }, {
                    xtype: "button",
                    iconCls: "pimcore_icon_search",
                    handler: this.openSearchEditor.bind(this, textField, type, hotspotMetaDataWin, nameField)
                }];

                valueField = new Ext.form.FieldContainer({
                    items: items,
                    componentCls: "object_field",
                    layout: 'hbox'
                });

            } else {
                // no valid type
                return;
            }

            hotspotMetaDataWin.getComponent("form").add({
                xtype: 'panel',
                itemId: id,
                bodyStyle: "padding-top:10px",
                items: [{
                    xtype: "hidden",
                    name: "type",
                    value: type
                }, {
                    xtype: "textfield",
                    name: "name",
                    value: data["name"],
                    fieldLabel: t("name")
                }, valueField],
                tbar: ["->", {
                    iconCls: "pimcore_icon_delete",
                    handler: function (hotspotMetaDataWin, subComponen) {
                        var form = hotspotMetaDataWin.getComponent("form");
                        form.remove(form.getComponent(id));
                        hotspotMetaDataWin.updateLayout();
                    }.bind(this, hotspotMetaDataWin)
                }]
            });

            hotspotMetaDataWin.updateLayout();
        }.bind(this, hotspotMetaDataWin);

        hotspotMetaDataWin.show();
    },

    empty: function (textfield) {
        textfield.setValue("");
    },

    openElement: function (textfield, type) {
        var value = textfield.getValue();
        if (value) {
            pimcore.helpers.openElement(value, type);
        }
    },


    addDataDropTarget: function (type, el) {
        var drop = function (el, target, dd, e, data) {

            if(!pimcore.helpers.dragAndDropValidateSingleItem(data)) {
                return false;
            }

            data = data.records[0].data;
            if (data.elementType == type) {
                target.component.setValue(data.path);
                return true;
            } else {
                return false;
            }
        }.bind(this, el);

        var over = function (target, dd, e, data) {
            if (data.records.length === 1 && data.records[0].data.elementType == type) {
                return Ext.dd.DropZone.prototype.dropAllowed;
            }
            return Ext.dd.DropZone.prototype.dropNotAllowed;
        };

        if (typeof dndManager == "object") {
            // register at global DnD manager
            // in iframes, eg. document editmode
            dndManager.addDropTarget(el.getEl(), over, drop);
        } else {
            new Ext.dd.DropZone(el.getEl(), {
                reference: this,
                ddGroup: "element",
                getTargetFromEvent: function (e) {
                    return el.getEl();
                },
                onNodeOver: over,
                onNodeDrop: drop
            });
        }
    },

    openSearchEditor: function (textfield, type, hotspotMetaDataWin, nameField) {
        var allowedTypes = [];
        var allowedSpecific = {};
        var allowedSubtypes = {};

        allowedTypes.push(type);
        if (type == "object") {
            allowedSubtypes.object = ["object", "folder", "variant"];
        }

        var form = hotspotMetaDataWin.getComponent("form").getForm();
        var hotspotData = form.getFieldValues();

        var hotspotName = nameField.getValue();


        pimcore.helpers.itemselector(false, this.addDataFromSelector.bind(this, textfield), {
                type: allowedTypes,
                subtype: allowedSubtypes,
                specific: allowedSpecific
            },
            {
                context: Ext.apply(
                    {
                        hotspotName: hotspotName,
                        hotspotData: hotspotData
                    }, this.context)
            });
    },

    addDataFromSelector: function (textfield, data) {
        if (data) {
            textfield.setValue(data.fullpath);
        }
    }

    ,

    getButtonConfig: function (type, iconCls) {


        var callbackFunctionName = "add" + ucfirst(type);
        var callbackFunction = this[callbackFunctionName].bind(this);
        var textKey = "add_" + type;

        var buttonConfig = {
            xtype: "button",
            text: t(textKey),
            iconCls: iconCls,
            handler: function () {
                callbackFunction();
            }.bind(this)
        };

        if (this.predefinedDataTemplates[type] && this.predefinedDataTemplates[type].length > 0) {
            buttonConfig.xtype = "splitbutton";
            var menu = [];
            for (var i = 0; i < this.predefinedDataTemplates[type].length; i++) {
                var templateConfig = this.predefinedDataTemplates[type][i];
                var templateConfigName = templateConfig.name;
                var templateMenuName = templateConfig.menuName ? templateConfig.menuName : templateConfigName;
                if (!templateConfigName) {
                    templateConfigName = "&nbsp";
                }
                menu.push(
                    {
                        text: t(templateMenuName),
                        iconCls: "pimcore_icon_hotspotmarker_template",
                        handler: function (templateConfig) {
                            var elId = callbackFunction(templateConfig);
                            var copiedData = templateConfig.data ? templateConfig.data.slice() : [];
                            this.hotspotMetaData[elId] = copiedData;
                        }.bind(this, templateConfig)
                    }
                );
            }
            buttonConfig.menu = menu;
        }

        return buttonConfig;
    }


});



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
pimcore.registerNS("pimcore.element.tag.imagecropper");
pimcore.element.tag.imagecropper = Class.create({

    initialize: function (imageId, data, saveCallback, config) {
        this.imageId = imageId;
        this.data = data;
        this.saveCallback = saveCallback;
        this.modal = true;

        this.ratioX = null;
        this.ratioY = null;
        this.preserveRatio = false;
        if(typeof config == "object") {
            if(config["ratioX"] && config["ratioY"]) {
                this.ratioX = config["ratioX"];
                this.ratioY = config["ratioY"];
                this.preserveRatio = true;
            }
        }
    },

    open: function (modal) {
        var validImage = (typeof this.imageId != "undefined" && this.imageId !== null),
            imageUrl = Routing.generate('pimcore_admin_asset_getimagethumbnail', {id: this.imageId, width: 500, height: 400, contain: true}),
            button = {};

        if(typeof modal != "undefined") {
            this.modal = modal;
        }

        if( validImage )
        {
            button = {
                xtype: "button",
                iconCls: "pimcore_icon_apply",
                text: t("save"),
                handler: function () {

                    var originalWidth = this.editWindow.body.getWidth();
                    var originalHeight = this.editWindow.body.getHeight();

                    var dimensions = Ext.get("selector").getStyle(["top","left","width","height"]);

                    var newWidth = intval(dimensions.width);
                    var newHeight = intval(dimensions.height);
                    var top = intval(dimensions.top);
                    var left = intval(dimensions.left);

                    this.data = {
                        cropWidth: newWidth * 100 / originalWidth,
                        cropHeight: newHeight * 100 / originalHeight,
                        cropTop: top * 100 / originalHeight,
                        cropLeft: left * 100 / originalWidth,
                        cropPercent: true
                    };

                    if(typeof this.saveCallback == "function") {
                        this.saveCallback(this.data);
                    }

                    this.editWindow.close();
                }.bind(this)
            }
        }
        this.editWindow = new Ext.Window({
            width: 500,
            height: 400,
            modal: this.modal,
            resizable: false,
            bodyStyle: "background: url('/bundles/pimcoreadmin/img/tree-preview-transparent-background.png');",
            bbar: ["->", button],
            html: validImage ? '<img id="selectorImage" src="' + imageUrl + '" />' : '<span style="padding:10px;">' + t("no_data_to_display") + '</span>'
        });

        var checkSize = function () {
            // this function checks if the selected area fits into the image
            var sel = Ext.get("selector");
            var dimensions;

            var windowId = this.editWindow.getId();
            var originalWidth = Ext.getCmp(windowId).getEl().getWidth(true);
            var originalHeight = Ext.getCmp(windowId).getEl().getHeight(true);

            var skip = false;

            while(!skip) {
                skip = true;
                dimensions = sel.getStyle(["top","left","width","height"]);

                if(intval(dimensions.top) < 0) {
                    sel.setStyle("top", "0");
                    skip = false;
                }
                if(intval(dimensions.left) < 0) {
                    sel.setStyle("left", "0");
                    skip = false;
                }
                if((intval(dimensions.left) + intval(dimensions.width)) > originalWidth) {
                    if(intval(dimensions.left) < originalWidth || intval(dimensions.left) > originalWidth) {
                        sel.setStyle("left", (originalWidth-intval(dimensions.width)) + "px");
                    }
                    if(intval(dimensions.width) > originalWidth) {
                        sel.setStyle("width", (originalWidth) + "px");
                    }
                    skip = false;
                }
                if((intval(dimensions.top) + intval(dimensions.height)) > originalHeight) {
                    if(intval(dimensions.top) < originalHeight || intval(dimensions.top) > originalHeight) {
                        sel.setStyle("top", (originalHeight-intval(dimensions.height)) + "px");
                    }
                    if(intval(dimensions.height) > originalHeight) {
                        sel.setStyle("height", (originalHeight) + "px");
                    }
                    skip = false;
                }
            }


            // check the ratio if given
            if(this.ratioX && this.ratioY) {
                dimensions = sel.getStyle(["width","height"]);

                var height = intval(dimensions.width) * (this.ratioY / this.ratioX);
                sel.setStyle("height", (height) + "px");
            }
        };

        if( validImage ) {

            this.editWindow.add({
                xtype: 'component',
                id: "selector",
                resizable: {
                    target: "selector",
                    pinned: true,
                    width: 100,
                    height: 100 / (this.ratioX / this.ratioY) || 100,
                    preserveRatio: this.preserveRatio,
                    dynamic: true,
                    handles: 'all',
                    listeners: {
                        resize: checkSize.bind(this)
                    }
                },
                style: "cursor:move; position: absolute; top: 10px; left: 10px;z-index:9000;",
                draggable: true,
                listeners: {
                    afterrender: function (el) {

                    }
                }
            });

        }

        this.editWindowInitCount = 0;

        this.editWindow.on("afterrender", function ( ){
            this.editWindowInterval = window.setInterval(function () {
                var el = Ext.get("selectorImage");

                if(el) {

                    var imageWidth = el.getWidth();
                    var imageHeight = el.getHeight();

                    if(el.getWidth() > 30) {
                        clearInterval(this.editWindowInterval);
                        this.editWindowInitCount = 0;

                        var winBodyInnerSize = this.editWindow.body.getSize();
                        var winOuterSize = this.editWindow.getSize();
                        var paddingWidth = winOuterSize["width"] - winBodyInnerSize["width"];
                        var paddingHeight = winOuterSize["height"] - winBodyInnerSize["height"];

                        this.editWindow.setSize(imageWidth + paddingWidth, imageHeight + paddingHeight);

                        //Ext.get("selectorImage").remove();

                        if(this.data && this.data["cropPercent"]) {
                            Ext.get("selector").applyStyles({
                                width: (imageWidth * (this.data.cropWidth / 100)) + "px",
                                height: (imageHeight * (this.data.cropHeight / 100)) + "px",
                                top: (imageHeight * (this.data.cropTop / 100)) + "px",
                                left: (imageWidth * (this.data.cropLeft / 100)) + "px"
                            });
                        }

                        return;

                    } else if (this.editWindowInitCount > 60) {
                        // if more than 30 secs cancel and close the window
                        this.editWindow.close();
                    }

                    this.editWindowInitCount++;
                } else {
                    clearInterval(this.editWindowInterval);
                }
            }.bind(this), 500);

        }.bind(this));

        this.editWindow.show();
    }

});



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

pimcore.edithelpers = {};

// disable reload & links, this function is here because it has to be in the header (body attribute)
function pimcoreOnUnload() {
    editWindow.protectLocation();
}

pimcore.edithelpers.frame = {
    active: false,
    topEl: null,
    bottomEl: null,
    rightEl: null,
    leftEl: null,
    timeout: null
};

 pimcore.edithelpers.pasteHtmlAtCaret = function (html, selectPastedContent) {
     var sel, range;
     if (window.getSelection) {
         // IE9 and non-IE
         sel = window.getSelection();
         if (sel.getRangeAt && sel.rangeCount) {
             range = sel.getRangeAt(0);
             range.deleteContents();

             // Range.createContextualFragment() would be useful here but is
             // only relatively recently standardized and is not supported in
             // some browsers (IE9, for one)
             var el = document.createElement("div");
             el.innerHTML = html;
             var frag = document.createDocumentFragment(), node, lastNode;
             while ((node = el.firstChild)) {
                 lastNode = frag.appendChild(node);
             }
             var firstNode = frag.firstChild;
             range.insertNode(frag);

             // Preserve the selection
             if (lastNode) {
                 range = range.cloneRange();
                 range.setStartAfter(lastNode);
                 if (selectPastedContent) {
                     range.setStartBefore(firstNode);
                 } else {
                     range.collapse(true);
                 }
                 sel.removeAllRanges();
                 sel.addRange(range);
             }
         }
     }
 };



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

pimcore.registerNS("pimcore.elementservice.x");

pimcore.elementservice.deleteElement = function (options) {
    var elementType = options.elementType;
    var url = Routing.getBaseUrl() + "/admin/"  + elementType + "/delete-info?";
    // check for dependencies
    Ext.Ajax.request({
        url: url,
        params: {id: options.id, type: elementType},
        success: pimcore.elementservice.deleteElementsComplete.bind(window, options)
    });
};

pimcore.elementservice.deleteElementsComplete = function(options, response) {
    try {
        var res = Ext.decode(response.responseText);

        if (res.errors) {
            var message = res.batchDelete ? t('delete_error_batch') : t('delete_error');
            var hasDeleteable = true;

            if (res.itemResults) {
                var reasons = res.itemResults.filter(function (result) {
                    return !result.allowed;
                }).map(function (result) {
                    if (res.batchDelete) {
                        return htmlspecialchars(result.key + ': ' + result.reason);
                    }

                    return htmlspecialchars(result.reason);
                });

                message += "<br /><b style='display: block; text-align: center; padding: 10px 0;'>" + reasons.join('<br/>') + "</b>";

                hasDeleteable = res.itemResults.filter(function (result) {
                    return result.allowed;
                }).length > 0;
            }

            Ext.MessageBox.show({
                title:t('delete'),
                msg: message,
                buttons: hasDeleteable ? Ext.Msg.OKCANCEL : Ext.Msg.CANCEL,
                icon: Ext.MessageBox.INFO,
                fn: function(r, options, button) {
                    if (button === "ok" && hasDeleteable && r.deletejobs && r.batchDelete) {
                        pimcore.elementservice.deleteElementCheckDependencyComplete.call(this, window, r, options);
                    }
                }.bind(window, res, options)
            });
        }
        else {
            pimcore.elementservice.deleteElementCheckDependencyComplete.call(this, window, res, options);
        }
    }
    catch (e) {
        console.log(e);
    }
}

pimcore.elementservice.deleteElementCheckDependencyComplete = function (window, res, options) {

    try {
        var message = res.batchDelete ? t('delete_message_batch') : t('delete_message');
        if (res.elementKey) {
            message += "<br /><b style='display: block; text-align: center; padding: 10px 0;'>\"" + htmlspecialchars(res.elementKey) + "\"</b>";
        }
        if (res.hasDependencies) {
            message += "<br />" + t('delete_message_dependencies');
        }

        if(res["childs"] > 100) {
            message += "<br /><br /><b>" + t("too_many_children_for_recyclebin") + "</b>";
        }

        Ext.MessageBox.show({
            title:t('delete'),
            msg: message,
            buttons: Ext.Msg.OKCANCEL ,
            icon: Ext.MessageBox.INFO ,
            fn: pimcore.elementservice.deleteElementFromServer.bind(window, res, options)
        });
    }
    catch (e) {
        console.log(e);
    }
};


pimcore.elementservice.getElementTreeNames = function(elementType) {
    var treeNames = ["layout_" + elementType + "_tree"]
    if (pimcore.settings.customviews.length > 0) {
        for (var cvs = 0; cvs < pimcore.settings.customviews.length; cvs++) {
            var cv = pimcore.settings.customviews[cvs];
            if (!cv.treetype && elementType == "object" || cv.treetype == elementType) {
                treeNames.push("layout_" + elementType + "_tree_" + cv.id);
            }
        }
    }
    return treeNames;
};

pimcore.elementservice.deleteElementFromServer = function (r, options, button) {

    if (button == "ok" && r.deletejobs) {
        var successHandler = options["success"];
        var elementType = options.elementType;
        var id = options.id;

        let ids = Ext.isString(id) ? id.split(',') : [id];
        ids.forEach(function (elementId) {
            pimcore.helpers.addTreeNodeLoadingIndicator(elementType, elementId);
        });

        var affectedNodes = pimcore.elementservice.getAffectedNodes(elementType, id);
        for (var index = 0; index < affectedNodes.length; index++) {
            var node = affectedNodes[index];
            if (node) {
                var nodeEl = Ext.fly(node.getOwnerTree().getView().getNodeByRecord(node));
                nodeEl.addCls("pimcore_delete");
            }
        }

        if (pimcore.globalmanager.exists(elementType + "_" + id)) {
            var tabPanel = Ext.getCmp("pimcore_panel_tabs");
            tabPanel.remove(elementType + "_" + id);
        }

        if(r.deletejobs.length > 2) {
            this.deleteProgressBar = new Ext.ProgressBar({
                text: t('initializing')
            });

            this.deleteWindow = new Ext.Window({
                title: t("delete"),
                layout:'fit',
                width:200,
                bodyStyle: "padding: 10px;",
                closable:false,
                plain: true,
                items: [this.deleteProgressBar],
                listeners: pimcore.helpers.getProgressWindowListeners()
            });

            this.deleteWindow.show();
        }

        var pj = new pimcore.tool.paralleljobs({
            success: function (id, successHandler) {
                var refreshParentNodes = [];
                for (var index = 0; index < affectedNodes.length; index++) {
                    var node = affectedNodes[index];
                    try {
                        if (node) {
                            refreshParentNodes[node.parentNode.id] = node.parentNode.id;
                        }
                    } catch (e) {
                        console.log(e);
                        pimcore.helpers.showNotification(t("error"), t("error_deleting_item"), "error");
                        if (node) {
                            tree.getStore().load({
                                node: node.parentNode
                            });
                        }
                    }
                }

                for (var parentNodeId in refreshParentNodes) {
                    pimcore.elementservice.refreshNodeAllTrees(elementType, parentNodeId);
                }

                if(this.deleteWindow) {
                    this.deleteWindow.close();
                }

                this.deleteProgressBar = null;
                this.deleteWindow = null;

                if(typeof successHandler == "function") {
                    successHandler();
                }
            }.bind(this, id, successHandler),
            update: function (currentStep, steps, percent, response) {
                if(this.deleteProgressBar) {
                    var status = currentStep / steps;
                    this.deleteProgressBar.updateProgress(status, percent + "%");
                }

                if(response && response['deleted']) {
                    var ids = Object.keys(response['deleted']);
                    ids.forEach(function (id) {
                        pimcore.helpers.closeElement(id, elementType);
                    })
                }
            }.bind(this),
            failure: function (id, message) {
                if (this.deleteWindow) {
                    this.deleteWindow.close();
                }

                pimcore.helpers.showNotification(t("error"), t("error_deleting_item"), "error", t(message));
                for (var index = 0; index < affectedNodes.length; index++) {
                    try {
                        var node = affectedNodes[i];
                        if (node) {
                            tree.getStore().load({
                                node: node.parentNode
                            });
                        }
                    } catch (e) {
                        console.log(e);
                    }
                }
            }.bind(this, id),
            jobs: r.deletejobs
        });
    }
};

pimcore.elementservice.updateAsset = function (id, data, callback) {

    if (!callback) {
        callback = function() {
        };
    }

    data.id = id;

    Ext.Ajax.request({
        url: Routing.generate('pimcore_admin_asset_update'),
        method: "PUT",
        params: data,
        success: callback
    });
};

pimcore.elementservice.updateDocument = function (id, data, callback) {

    if (!callback) {
        callback = function() {
        };
    }

    data.id = id;

    Ext.Ajax.request({
        url: Routing.generate('pimcore_admin_document_document_update'),
        method: "PUT",
        params: data,
        success: callback
    });
};

pimcore.elementservice.updateObject = function (id, values, callback) {

    if (!callback) {
        callback = function () {
        };
    }

    Ext.Ajax.request({
        url: Routing.generate('pimcore_admin_dataobject_dataobject_update'),
        method: "PUT",
        params: {
            id: id,
            values: Ext.encode(values)
        },
        success: callback
    });
};

pimcore.elementservice.getAffectedNodes = function(elementType, id) {

    var ids = Ext.isString(id) ? id.split(',') : [id];
    var treeNames = pimcore.elementservice.getElementTreeNames(elementType);
    var affectedNodes = [];
    for (var index = 0; index < treeNames.length; index++) {
        var treeName = treeNames[index];
        var tree = pimcore.globalmanager.get(treeName);
        if (!tree) {
            continue;
        }
        tree = tree.tree;
        var store = tree.getStore();

        ids.forEach(function (id) {
            var record = store.getNodeById(id);
            if (record) {
                affectedNodes.push(record);
            }
        });
    }

    return affectedNodes;

};


pimcore.elementservice.applyNewKey = function(affectedNodes, elementType, id, value) {
    value = Ext.util.Format.htmlEncode(value);
    for (var index = 0; index < affectedNodes.length; index++) {
        var record = affectedNodes[index];
        record.set("text", value);
        record.set("path", record.data.basePath + value);
    }
    pimcore.helpers.addTreeNodeLoadingIndicator(elementType, id);

    return affectedNodes;
};

pimcore.elementservice.editDocumentKeyComplete =  function (options, button, value, object) {
    if (button == "ok") {

        var record;
        var id = options.id;
        var elementType = options.elementType;
        value = pimcore.helpers.getValidFilename(value, "document");

        if (options.sourceTree) {
            var tree = options.sourceTree;
            var store = tree.getStore();
            record = store.getById(id);
            if(pimcore.elementservice.isKeyExistingInLevel(record.parentNode, value, record)) {
                return;
            }
            if(pimcore.elementservice.isDisallowedDocumentKey(record.parentNode.id, value)) {
                return;
            }
        }

        var originalText;
        var originalPath;
        var affectedNodes = pimcore.elementservice.getAffectedNodes(elementType, id);
        if (affectedNodes) {
            record = affectedNodes[0];
            if(record) {
                originalText = record.get("text");
                originalPath = record.get("path");
            }
        }
        pimcore.elementservice.applyNewKey(affectedNodes, elementType, id, value);

        pimcore.elementservice.updateDocument(id, {
            key: value,
            create_redirects: options['create_redirects']
        }, function (response) {
            var record, index;
            var rdata = Ext.decode(response.responseText);
            if (!rdata || !rdata.success) {
                for (index = 0; index < affectedNodes.length; index++) {
                    record = affectedNodes[index];
                    record.set("text", originalText);
                    record.set("path", originalPath);
                }
                pimcore.helpers.showNotification(t("error"), t("error_renaming_item"), "error",
                    t(rdata.message));
                return;
            }

            if(rdata && rdata.success) {
                // removes loading indicator added in the applyNewKey method
                pimcore.helpers.removeTreeNodeLoadingIndicator(elementType, id);
            }

            for (index = 0; index < affectedNodes.length; index++) {
                record = affectedNodes[index];
                pimcore.elementservice.refreshNode(record.parentNode);
            }

            if (pimcore.globalmanager.exists("document_" + id)) {
                try {
                    if (rdata && rdata.success) {
                        pimcore.elementservice.reopenElement(options);
                    }  else {
                        pimcore.helpers.showNotification(t("error"), t("error_renaming_item"), "error",
                            t(rdata.message));
                    }
                } catch (e) {
                    pimcore.helpers.showNotification(t("error"), t("error_renaming_item"), "error");
                }
            }
        }.bind(this));
    }
};

pimcore.elementservice.editObjectKeyComplete = function (options, button, value, object) {
    if (button == "ok") {

        var record;
        var id = options.id;
        var elementType = options.elementType;
        value = pimcore.helpers.getValidFilename(value, "object");

        if (options.sourceTree) {
            var tree = options.sourceTree;
            var store = tree.getStore();
            record = store.getById(id);
            if(pimcore.elementservice.isKeyExistingInLevel(record.parentNode, value, record)) {
                return;
            }
        }

        var affectedNodes = pimcore.elementservice.getAffectedNodes(elementType, id);
        if (affectedNodes) {
            record = affectedNodes[0];
            if(record) {
                originalText = record.get("text");
                originalPath = record.get("path");
            }
        }
        pimcore.elementservice.applyNewKey(affectedNodes, elementType, id, value);

        pimcore.elementservice.updateObject(id, {key: value},
            function (response) {
                var index, record;
                for (index = 0; index < affectedNodes.length; index++) {
                    record = affectedNodes[index];
                    pimcore.elementservice.refreshNode(record);
                }

                try {
                    var rdata = Ext.decode(response.responseText);
                    if (rdata && rdata.success) {
                        pimcore.elementservice.reopenElement(options);
                        // removes loading indicator added in the applyNewKey method
                        pimcore.helpers.removeTreeNodeLoadingIndicator(elementType, id);
                    }  else {
                        pimcore.helpers.showNotification(t("error"), t("error_renaming_item"), "error",
                            t(rdata.message));
                        for (index = 0; index < affectedNodes.length; index++) {
                            record = affectedNodes[index];
                            pimcore.elementservice.refreshNode(record.parentNode);
                        }
                    }
                } catch (e) {
                    pimcore.helpers.showNotification(t("error"), t("error_renaming_item"), "error");
                    for (index = 0; index < affectedNodes.length; index++) {
                        record = affectedNodes[index];
                        pimcore.elementservice.refreshNode(record.parentNode);
                    }
                }
            }.bind(this))
        ;
    }
};

pimcore.elementservice.reopenElement = function(options) {
    var elementType = options.elementType;
    if (pimcore.globalmanager.exists(elementType + "_" + options.id)) {
        pimcore.helpers["close"  + ucfirst(elementType)](options.id);
        pimcore.helpers["open" + ucfirst(elementType)](options.id, options.elementSubType);
    }

};

pimcore.elementservice.editAssetKeyComplete = function (options, button, value, object) {
    try {
        if (button == "ok") {
            var record;
            var id = options.id;
            var elementType = options.elementType;

            value = pimcore.helpers.getValidFilename(value, "asset");

            if (options.sourceTree) {
                var tree = options.sourceTree;
                var store = tree.getStore();
                record = store.getById(id);
                // check for ident filename in current level

                var parentChilds = record.parentNode.childNodes;
                for (var i = 0; i < parentChilds.length; i++) {
                    if (parentChilds[i].data.text == value && this != parentChilds[i].data.text) {
                        Ext.MessageBox.alert(t('rename'), t('name_already_in_use'));
                        return;
                    }
                }
            }

            var affectedNodes = pimcore.elementservice.getAffectedNodes(elementType, id);
            if (affectedNodes) {
                record = affectedNodes[0];
                if(record) {
                    originalText = record.get("text");
                    originalPath = record.get("path");
                }
            }
            pimcore.elementservice.applyNewKey(affectedNodes, elementType, id, value);

            pimcore.elementservice.updateAsset(id, {filename: value},
                function (response) {
                    var index, record;
                    var rdata = Ext.decode(response.responseText);
                    if (!rdata || !rdata.success) {
                        for (index = 0; index < affectedNodes.length; index++) {
                            record = affectedNodes[index];
                            record.set("text", originalText);
                            record.set("path", originalPath);
                        }
                        pimcore.helpers.showNotification(t("error"), t("error_renaming_item"),
                            "error");
                        return;
                    }

                    if(rdata && rdata.success) {
                        // removes loading indicator added in the applyNewKey method
                        pimcore.helpers.removeTreeNodeLoadingIndicator(elementType, id);
                    }

                    for (index = 0; index < affectedNodes.length; index++) {
                        record = affectedNodes[index];
                        pimcore.elementservice.refreshNode(record);
                    }

                    if (pimcore.globalmanager.exists("asset_" + id)) {
                        try {
                            if (rdata && rdata.success) {
                                pimcore.elementservice.reopenElement(options);
                            }  else {
                                pimcore.helpers.showNotification(t("error"), t("error_renaming_item"),
                                    "error", t(rdata.message));
                            }
                        } catch (e) {
                            pimcore.helpers.showNotification(t("error"), t("error_renaming_item"),
                                "error");
                        }
                    }
                }.bind(this))
            ;
        }
    } catch (e) {
        console.log(e);
    }
};

pimcore.elementservice.editElementKey = function(options) {
    var completeCallback;
    if (options.elementType == "asset") {
        completeCallback = pimcore.elementservice.editAssetKeyComplete.bind(this, options);
    } else if (options.elementType == "document") {
        completeCallback = pimcore.elementservice.editDocumentKeyComplete.bind(this, options);
    } else if (options.elementType == "object") {
        completeCallback = pimcore.elementservice.editObjectKeyComplete.bind(this, options);
    } else {
        throw new Error("type " + options.elementType + " not supported!");
    }

    if(
        options['elementType'] === 'document' &&
        (options['elementSubType'] === 'page' || options['elementSubType'] === 'hardlink') &&
        pimcore.globalmanager.get("user").isAllowed('redirects')
    ) {
        // for document pages & hardlinks we need an additional checkbox for auto-redirects
        var messageBox = null;
        completeCallback = pimcore.elementservice.editDocumentKeyComplete.bind(this);
        var submitFunction = function () {
            options['create_redirects'] = messageBox.getComponent('create_redirects').getValue()
            completeCallback(options, 'ok', messageBox.getComponent('key').getValue());
            messageBox.close();
        };

        messageBox = new Ext.Window({
            modal: true,
            width: 500,
            title: t('rename'),
            items: [{
                xtype: 'container',
                html: t('please_enter_the_new_name')
            }, {
                xtype: "textfield",
                width: "100%",
                name: 'key',
                itemId: 'key',
                value: options.default,
                listeners: {
                    afterrender: function () {
                        window.setTimeout(function () {
                            this.focus(true);
                        }.bind(this), 100);
                    }
                }
            },{
                xtype: "checkbox",
                boxLabel: t('create_redirects'),
                name: 'create_redirects',
                itemId: 'create_redirects',
                checked: true
            }],
            bodyStyle: 'padding: 10px 10px 0px 10px',
            buttonAlign: 'center',
            buttons: [{
                text: t('OK'),
                handler: submitFunction
            },{
                text: t('cancel'),
                handler: function() {
                    messageBox.close();
                }
            }]
        });

        messageBox.show();

        var map = new Ext.util.KeyMap({
            target: messageBox.getEl(),
            key:  Ext.event.Event.ENTER,
            fn: submitFunction
        });
    } else {
        Ext.MessageBox.prompt(t('rename'), t('please_enter_the_new_name'), completeCallback, window, false, options.default);
    }
};


pimcore.elementservice.refreshNode = function (node) {
    var ownerTree = node.getOwnerTree();

    node.data.expanded = true;
    ownerTree.getStore().load({
        node: node
    });
};


pimcore.elementservice.isDisallowedDocumentKey = function (parentNodeId, key) {

    if(parentNodeId == 1) {
        var disallowedKeys = ["admin","install","plugin"];
        if(in_arrayi(key, disallowedKeys)) {
            Ext.MessageBox.alert(t('name_is_not_allowed'),
                t('name_is_not_allowed'));
            return true;
        }
    }
    return false;
};

pimcore.elementservice.isKeyExistingInLevel = function(parentNode, key, node) {

    key = pimcore.helpers.getValidFilename(key, parentNode.data.elementType);
    var parentChilds = parentNode.childNodes;
    for (var i = 0; i < parentChilds.length; i++) {
        if (parentChilds[i].data.text == key && node != parentChilds[i]) {
            Ext.MessageBox.alert(t('error'),
                t('name_already_in_use'));
            return true;
        }
    }
    return false;
};

pimcore.elementservice.nodeMoved = function(elementType, oldParent, newParent) {
    // disabled for now
    /*var oldParentId = oldParent.getId();
    var newParentId = newParent.getId();
    var newParentTreeId = newParent.getOwnerTree().getId();

    var affectedNodes = pimcore.elementservice.getAffectedNodes(elementType, newParentId);
    for (var index = 0; index < affectedNodes.length; index++) {
        var node = affectedNodes[index];
        var nodeTreeId = node.getOwnerTree().getId();
        if (nodeTreeId != newParentTreeId) {
            pimcore.elementservice.refreshNode(node);
        }
    }

    if (oldParentId != newParentId) {
        var affectedNodes = pimcore.elementservice.getAffectedNodes(elementType, oldParentId);
        for (var index = 0; index < affectedNodes.length; index++) {
            var node = affectedNodes[index];
            var nodeTreeId = node.getOwnerTree().getId();
            if (nodeTreeId != newParentTreeId) {
                pimcore.elementservice.refreshNode(node);
            }
        }
    }*/
};

pimcore.elementservice.addObject = function(options) {

    var url = options.url;
    delete options.url;
    delete options["sourceTree"];

    Ext.Ajax.request({
        url: url,
        method: 'POST',
        params: options,
        success: pimcore.elementservice.addObjectComplete.bind(this, options)
    });
};

pimcore.elementservice.addDocument = function(options) {

    var url = options.url;
    delete options.url;
    delete options["sourceTree"];

    Ext.Ajax.request({
        url: url,
        method: 'POST',
        params: options,
        success: pimcore.elementservice.addDocumentComplete.bind(this, options)
    });
};

pimcore.elementservice.refreshRootNodeAllTrees = function(elementType) {
    var treeNames = pimcore.elementservice.getElementTreeNames(elementType);
    for (var index = 0; index < treeNames.length; index++) {
        try {
            var treeName = treeNames[index];
            var tree = pimcore.globalmanager.get(treeName);
            if (!tree) {
                continue;
            }
            tree = tree.tree;
            var rootNode = tree.getRootNode();
            if (rootNode) {
                pimcore.elementservice.refreshNode(rootNode);
            }
        } catch (e) {
            console.log(e);
        }
    }
};



pimcore.elementservice.refreshNodeAllTrees = function(elementType, id) {
    var treeNames = pimcore.elementservice.getElementTreeNames(elementType);
    for (var index = 0; index < treeNames.length; index++) {
        try {
            var treeName = treeNames[index];
            var tree = pimcore.globalmanager.get(treeName);
            if (!tree) {
                continue;
            }
            tree = tree.tree;
            var store = tree.getStore();
            var parentRecord = store.getById(id);
            if (parentRecord) {
                parentRecord.data.leaf = false;
                parentRecord.expand();
                pimcore.elementservice.refreshNode(parentRecord);
            }
        } catch (e) {
            console.log(e);
        }
    }
};

pimcore.elementservice.addDocumentComplete = function (options, response) {
    try {
        response = Ext.decode(response.responseText);
        if (response && response.success) {
            pimcore.elementservice.refreshNodeAllTrees(options.elementType, options.parentId);

            if(in_array(response["type"], ["page","snippet","email","newsletter","link","hardlink","printpage","printcontainer"])) {
                pimcore.helpers.openDocument(response.id, response.type);
                pimcore.plugin.broker.fireEvent("postAddDocumentTree", response.id);
            }
        }  else {
            pimcore.helpers.showNotification(t("error"), t("failed_to_create_new_item"), "error",
                t(response.message));
        }
    } catch(e) {
        pimcore.helpers.showNotification(t("error"), t("failed_to_create_new_item"), "error");
    }
};

pimcore.elementservice.addObjectComplete = function(options, response) {
    try {
        var rdata = Ext.decode(response.responseText);
        if (rdata && rdata.success) {
            pimcore.elementservice.refreshNodeAllTrees(options.elementType, options.parentId);

            if (rdata.id && rdata.type) {
                if (rdata.type == "object") {
                    pimcore.helpers.openObject(rdata.id, rdata.type);
                    pimcore.plugin.broker.fireEvent("postAddObjectTree", rdata.id);
                }
            }
        }  else {
            pimcore.helpers.showNotification(t("error"), t("failed_to_create_new_item"), "error", t(rdata.message));
        }
    } catch (e) {
        pimcore.helpers.showNotification(t("error"), t("failed_to_create_new_item"), "error");
    }

};


pimcore.elementservice.lockElement = function(options) {
    try {
        var updateMethod = pimcore.elementservice["update" + ucfirst(options.elementType)];
        updateMethod(options.id,
            {
                locked: options.mode
            },
            function() {
                pimcore.elementservice.refreshRootNodeAllTrees(options.elementType);
            }
        );
    } catch (e) {
        console.log(e);
    }
};

pimcore.elementservice.unlockElement = function(options) {
    try {
        Ext.Ajax.request({
            url: Routing.generate('pimcore_admin_element_unlockpropagate'),
            method: 'PUT',
            params: {
                id: options.id,
                type: options.elementType
            },
            success: function () {
                pimcore.elementservice.refreshRootNodeAllTrees(options.elementType);
            }.bind(this)
        });
    } catch (e) {
        console.log(e);
    }
};

pimcore.elementservice.setElementPublishedState = function(options) {
    var elementType = options.elementType;
    var id = options.id;
    var published = options.published;

    var affectedNodes = pimcore.elementservice.getAffectedNodes(elementType, id);
    for (var index = 0; index < affectedNodes.length; index++) {
        try {
            var node = affectedNodes[index];
            if (node) {
                var tree = node.getOwnerTree();
                var view = tree.getView();
                var nodeEl = Ext.fly(view.getNodeByRecord(node));
                if (nodeEl) {
                    var nodeElInner = nodeEl.down(".x-grid-td");
                    if (nodeElInner) {
                        if (published) {
                            nodeElInner.removeCls("pimcore_unpublished");
                        } else {
                            nodeElInner.addCls("pimcore_unpublished");
                        }
                    }
                }

                if(!node.data['cls']) {
                    node.data['cls'] = '';
                }

                if (published) {
                    node.data.cls = node.data.cls.replace(/pimcore_unpublished/g, '');
                } else {
                    node.data.cls += " pimcore_unpublished";
                }

                node.data.published = published;
            }
        } catch (e) {
            console.log(e);
        }
    }
};

pimcore.elementservice.setElementToolbarButtons = function(options) {
    var elementType = options.elementType;
    var id = options.id;
    var key = elementType + "_" + id;
    if (pimcore.globalmanager.exists(key)) {
        if (options.published) {
            pimcore.globalmanager.get(key).toolbarButtons.unpublish.show();
        } else {
            pimcore.globalmanager.get(key).toolbarButtons.unpublish.hide();
        }
    }
};

pimcore.elementservice.reloadVersions = function(options) {
    var elementType = options.elementType;
    var id = options.id;
    var key = elementType + "_" + id;

    if (pimcore.globalmanager.exists(key)) {
        // reload versions
        if (pimcore.globalmanager.get(key).versions) {
            if (typeof pimcore.globalmanager.get(key).versions.reload  == "function") {
                pimcore.globalmanager.get(key).versions.reload();
            }
        }
    }
};

pimcore.elementservice.showLocateInTreeButton = function(elementType) {
    var locateConfigs = pimcore.globalmanager.get("tree_locate_configs");

    if (locateConfigs[elementType]) {
        return true;
    }
    return false;
};

pimcore.elementservice.integrateWorkflowManagement = function(elementType, elementId, elementEditor, buttons) {

    if(elementEditor.data.workflowManagement && elementEditor.data.workflowManagement.hasWorkflowManagement === true) {

        var workflows = elementEditor.data.workflowManagement.workflows;

        if(workflows.length > 0) {

            var button = pimcore.elementservice.getWorkflowActionsButton(workflows, elementType, elementId, elementEditor);

            if(button !== false) {
                buttons.push("-");
                buttons.push(button);
            }
        }

        buttons.push("-");
        buttons.push({
            xtype: 'container',
            html: [
                elementEditor.data.workflowManagement.statusInfo
            ]
        });

    }

};

pimcore.elementservice.getWorkflowActionsButton = function(workflows, elementType, elementId, elementEditor) {
    var workflowsWithTransitions = [];

    workflows.forEach(function(el){

        if(el.allowedTransitions.length) {
            workflowsWithTransitions.push(el);
        } else if(el.globalActions.length) {
            workflowsWithTransitions.push(el);
        }
    }.bind(workflowsWithTransitions));

    if(workflowsWithTransitions.length > 0) {

        var items = [];

        workflowsWithTransitions.forEach(function (workflow) {
            if (workflowsWithTransitions.length > 1) {
                items.push({
                    xtype: 'container',
                    html: '<span class="pimcore-workflow-action-workflow-label">' + t(workflow.label) + '</span>'
                });
            }

            for (i = 0; i < workflow.allowedTransitions.length; i++) {
                var transition = workflow.allowedTransitions[i];

                items.push({
                    text: t(transition.label),
                    iconCls: transition.iconCls,
                    handler: function (workflow, transition) {

                        transition.isGlobalAction = false;
                        if (transition.notes) {
                            new pimcore.workflow.transitionPanel(elementType, elementId, elementEditor, workflow.name, transition);
                        } else {
                            pimcore.workflow.transitions.perform(elementType, elementId, elementEditor, workflow.name, transition);
                        }


                    }.bind(this, workflow, transition)
                });
            }


            for (i = 0; i < workflow.globalActions.length; i++) {
                var transition = workflow.globalActions[i];

                items.push({
                    text: t(transition.label),
                    iconCls: transition.iconCls,
                    handler: function (workflow, transition) {

                        transition.isGlobalAction = true;
                        if (transition.notes) {
                            new pimcore.workflow.transitionPanel(elementType, elementId, elementEditor, workflow.name, transition);
                        } else {
                            pimcore.workflow.transitions.perform(elementType, elementId, elementEditor, workflow.name, transition);
                        }


                    }.bind(this, workflow, transition)
                });
            }
        });

        return {
            text: t('actions'),
            scale: "medium",
            iconCls: 'pimcore_material_icon_workflow pimcore_material_icon',
            cls: 'pimcore_workflow_button',
            menu: {
                xtype: 'menu',
                items: items
            }
        };
    }

    return false;
};


pimcore.elementservice.replaceAsset = function (id, callback) {
    pimcore.helpers.uploadDialog(Routing.generate('pimcore_admin_asset_replaceasset', {id: id}), "Filedata", function() {
        if(typeof callback == "function") {
            callback();
        }
    }.bind(this), function (res) {
        var message = false;
        try {
            var response = Ext.util.JSON.decode(res.response.responseText);
            if(response.message) {
                message = response.message;
            }

        } catch(e) {}

        Ext.MessageBox.alert(t("error"), message || t("error"));
    });
};


pimcore.elementservice.downloadAssetFolderAsZip = function (id, selectedIds) {

    var that = {};

    var idsParam = '';
    if(selectedIds && selectedIds.length) {
        idsParam = selectedIds.join(',');
    }

    Ext.Ajax.request({
        url: Routing.generate('pimcore_admin_asset_downloadaszipjobs'),
        params: {
            id: id,
            selectedIds: idsParam
        },
        success: function(response) {
            var res = Ext.decode(response.responseText);

            that.downloadProgressBar = new Ext.ProgressBar({
                text: t('initializing')
            });

            that.downloadProgressWin = new Ext.Window({
                title: t("download_as_zip"),
                layout:'fit',
                width:200,
                bodyStyle: "padding: 10px;",
                closable:false,
                plain: true,
                items: [that.downloadProgressBar],
                listeners: pimcore.helpers.getProgressWindowListeners()
            });

            that.downloadProgressWin.show();


            var pj = new pimcore.tool.paralleljobs({
                success: function () {
                    if(that.downloadProgressWin) {
                        that.downloadProgressWin.close();
                    }

                    that.downloadProgressBar = null;
                    that.downloadProgressWin = null;

                    pimcore.helpers.download(Routing.generate('pimcore_admin_asset_downloadaszip', {jobId: res.jobId, id: id}));
                },
                update: function (currentStep, steps, percent) {
                    if(that.downloadProgressBar) {
                        var status = currentStep / steps;
                        that.downloadProgressBar.updateProgress(status, percent + "%");
                    }
                },
                failure: function (message) {
                    that.downloadProgressWin.close();
                    pimcore.helpers.showNotification(t("error"), t("error"),
                        "error", t(message));
                },
                jobs: res.jobs
            });
        }
    });
};



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

pimcore.registerNS("pimcore.document.edit.dnd");
pimcore.document.edit.dnd = Class.create({

    dndManager: null,

    globalDropZone: null,

    initialize: function(parentExt, body, iframeElement) {

        parentExt.dd.DragDropMgr.notifyOccluded = true;
        this.dndManager = parentExt.dd.DragDropMgr;

        body.addListener('mousemove', this.ddMouseMove.bind(this));
        body.addListener('mouseup', this.ddMouseUp.bind(this));

        this.globalDropZone = new parent.Ext.dd.DropZone(iframeElement, {
            ddGroup: "element",
            validElements: [],

            getTargetFromEvent: function(e) {
                var element = null;
                var elLength = this.validElements.length;

                for (var i = 0; i < elLength; i++) {
                    element = this.validElements[i];
                    if (element["el"].dndOver) {
                        if(element["drop"]) {
                            this.onNodeDrop = element["drop"];
                        }
                        if(element["over"]) {
                            this.onNodeOver = element["over"];
                        }
                        return element["el"];
                    }
                }
            }
        });

        window.setInterval(this.setIframeOffset.bind(this),1000);
        this.setIframeOffset();
    },

    addDropTarget: function (el, overCallback, dropCallback) {

        el.on("mouseover", function (e) {
            this.dndOver = true;
        }.bind(el));
        el.on("mouseout", function (e) {
            this.dndOver = false;
        }.bind(el));

        el.dndOver = false;

        this.globalDropZone.validElements.push({
            el: el,
            over: overCallback,
            drop: dropCallback
        });
    },

    ddMouseMove: function (e) {
        if (this.dndManager.dragCurrent) {
            // update the xy of the event if necessary
            this.setDDPos(e);
            // *** Note that the 'this' scope is the drag drop manager
            this.dndManager.handleMouseMove(e);
        }
    },

    ddMouseUp : function (e) {
        if (this.dndManager.dragCurrent) {
            // update the xy of the event if necessary
            this.setDDPos(e);
            // *** Note that the 'this' scope is the drag drop manager
            this.dndManager.handleMouseUp(e);
        }
    },


    setDDPos: function (e) {

        var scrollTop = 0;
        var scrollLeft = 0;

        var doc = (window.contentDocument || window.document);
        scrollTop = doc.documentElement.scrollTop || doc.body.scrollTop;
        scrollLeft = doc.documentElement.scrollLeft || doc.body.scrollLeft;

        if (this.dndManager.dragCurrent) {
            e.xy = [e.pageX + this.iframeOffset[0] - scrollLeft, e.pageY + this.iframeOffset[1] - scrollTop];
        }
    },

    setIframeOffset: function () {
        try {
            this.iframeOffset = parent.Ext.get('document_iframe_'
            + window.editWindow.document.id).getOffsetsTo(parent.Ext.getBody());
        } catch (e) {
            console.log(e);
        }
    },

    disable: function () {
        this.globalDropZone.lock();
    },

    enable: function () {
        this.globalDropZone.unlock();
    }

});



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

pimcore.registerNS("pimcore.document.editable");
pimcore.document.editable = Class.create({

    id: null,
    name: null,
    realName: null,
    inherited: false,
    inDialogBox: null,
    required: false,
    requiredError: false,

    setupWrapper: function (styleOptions) {

        if (!styleOptions) {
            styleOptions = {};
        }

        var container = Ext.get(this.id);
        container.setStyle(styleOptions);

        return container;
    },

    setName: function(name) {
        this.name = name;
    },

    getName: function () {
        return this.name;
    },

    setRealName: function(realName) {
        this.realName = realName;
    },

    getRealName: function() {
        return this.realName;
    },

    setInDialogBox: function(inDialogBox) {
        this.inDialogBox = inDialogBox;
    },

    getInDialogBox: function() {
        return this.inDialogBox;
    },

    reloadDocument: function () {
        window.editWindow.reload();
    },

    setInherited: function(inherited, el) {
        this.inherited = inherited;

        // if an element given is as optional second parameter we use this for the mask
        if(!(el instanceof Ext.Element)) {
            el = Ext.get(this.id);
        }

        // check for inherited elements, and mask them if necessary
        if(this.inherited) {
            var mask = el.mask();
            new Ext.ToolTip({
                target: mask,
                showDelay: 100,
                trackMouse:true,
                html: t("click_right_to_overwrite")
            });
            mask.on("contextmenu", function (e) {
                var menu = new Ext.menu.Menu();
                menu.add(new Ext.menu.Item({
                    text: t('overwrite'),
                    iconCls: "pimcore_icon_overwrite",
                    handler: function (item) {
                        this.setInherited(false);
                    }.bind(this)
                }));
                menu.showAt(e.getXY());

                e.stopEvent();
            }.bind(this));
        } else {
            el.unmask();
        }
    },

    getInherited: function () {
        return this.inherited;
    },

    setId: function (id) {
        this.id = id;
    },

    getId: function () {
        return this.id;
    },

    parseConfig: function (config) {
        if(!config || config instanceof Array || typeof config != "object") {
            config = {};
        }

        return config;
    },

    /**
     * HACK to get custom data from a grid instead of the tree
     * better solutions are welcome ;-)
     */
    getCustomPimcoreDropData : function (data){
        if(typeof(data.grid) != 'undefined' && typeof(data.grid.getCustomPimcoreDropData) == 'function'){ //droped from priceList
             var record = data.grid.getStore().getAt(data.rowIndex);
             var data = data.grid.getCustomPimcoreDropData(record);
         }
        return data;
    },

    getContext: function() {
        var context = {
            scope: "documentEditor",
            containerType: "document",
            documentId: pimcore_document_id,
            fieldname: this.name
        }
        return context;
    },

    validateRequiredValue: function(value, el, parent, mark) {
        let valueLength = 1;
        if (typeof value === "string") {
            valueLength = trim(strip_tags(value)).length;
        } else if (value == null) {
            valueLength = 0;
        }

        if (valueLength < 1) {
            parent.requiredError = true;
            if (mark) {
                el.addCls('editable-error');
            }
        } else {
            parent.requiredError = false;
            if (mark) {
                el.removeCls('editable-error');
            }
        }
    }
});




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

pimcore.registerNS("pimcore.document.editables.block");
pimcore.document.editables.block = Class.create(pimcore.document.editable, {

    initialize: function(id, name, config, data, inherited) {

        this.id = id;
        this.name = name;
        this.elements = [];
        this.config = this.parseConfig(config);
    },

    refresh: function() {
        var plusButton, minusButton, upButton, downButton, plusDiv, minusDiv, upDiv, downDiv, amountDiv, amountBox;
        this.elements = Ext.get(this.id).query('.pimcore_block_entry[data-name="' + this.name + '"][key]');

        var limitReached = false;
        if(this.config['limit'] && this.elements.length >= this.config.limit) {
            limitReached = true;
        }

        if (this.elements.length < 1) {
            this.createInitalControls();
        }
        else {
            Ext.get(this.id).removeCls("pimcore_block_buttons");

            for (var i = 0; i < this.elements.length; i++) {

                if(this.elements[i].key) {
                    continue;
                }

                this.elements[i].key = this.elements[i].getAttribute("key");

                if(!limitReached) {
                    // amount selection
                    amountDiv = Ext.get(this.elements[i]).query('.pimcore_block_amount[data-name="' + this.name + '"]')[0];
                    amountBox = new Ext.form.ComboBox({
                        cls: "pimcore_block_amount_select",
                        store: this.getAmountValues(),
                        value: 1,
                        mode: "local",
                        editable: false,
                        triggerAction: "all",
                        width: 45
                    });
                    amountBox.render(amountDiv);

                    // plus button
                    plusDiv = Ext.get(this.elements[i]).query('.pimcore_block_plus[data-name="' + this.name + '"]')[0];
                    plusButton = new Ext.Button({
                        cls: "pimcore_block_button_plus",
                        iconCls: "pimcore_icon_plus",
                        listeners: {
                            "click": this.addBlock.bind(this, this.elements[i], amountBox)
                        }
                    });
                    plusButton.render(plusDiv);
                }

                // minus button
                minusDiv = Ext.get(this.elements[i]).query('.pimcore_block_minus[data-name="' + this.name + '"]')[0];
                minusButton = new Ext.Button({
                    cls: "pimcore_block_button_minus",
                    iconCls: "pimcore_icon_minus",
                    listeners: {
                        "click": this.removeBlock.bind(this, this.elements[i])
                    }
                });
                minusButton.render(minusDiv);

                // up button
                upDiv = Ext.get(this.elements[i]).query('.pimcore_block_up[data-name="' + this.name + '"]')[0];
                upButton = new Ext.Button({
                    cls: "pimcore_block_button_up",
                    iconCls: "pimcore_icon_up",
                    listeners: {
                        "click": this.moveBlockUp.bind(this, this.elements[i])
                    }
                });
                upButton.render(upDiv);

                // up button
                downDiv = Ext.get(this.elements[i]).query('.pimcore_block_down[data-name="' + this.name + '"]')[0];
                downButton = new Ext.Button({
                    cls: "pimcore_block_button_down",
                    iconCls: "pimcore_icon_down",
                    listeners: {
                        "click": this.moveBlockDown.bind(this, this.elements[i])
                    }
                });
                downButton.render(downDiv);
            }
        }
    },

    render: function () {
        this.refresh();

        Ext.get(this.id).on('mouseenter', function (event) {
            Ext.get(this.id).addCls('pimcore_block_entry_over');
        });

        Ext.get(this.id).on('mouseleave', function (event) {
            Ext.get(this.id).removeCls('pimcore_block_entry_over');
        });
    },

    setInherited: function ($super, inherited) {
        var elements = Ext.get(this.id).query('.pimcore_block_buttons[data-name="' + this.name + '"]');
        if(elements.length > 0) {
            for(var i=0; i<elements.length; i++) {
                $super(inherited, Ext.get(elements[i]));
            }
        }
    },

    getAmountValues: function () {
        var amountValues = [];

        if(typeof this.config.limit != "undefined") {
            var maxAddValues = intval(this.config.limit) - this.elements.length;
            if(maxAddValues > 10) {
                maxAddValues = 10;
            }
            for (var a=1; a<=maxAddValues; a++) {
                amountValues.push(a);
            }
        }

        if(amountValues.length < 1) {
            amountValues = [1,2,3,4,5,6,7,8,9,10];
        }

        return amountValues;
    },

    createInitalControls: function (amountValues) {
        var amountEl = document.createElement("div");
        amountEl.setAttribute("class", "pimcore_block_amount");
        amountEl.setAttribute("data-name", this.name);

        var plusEl = document.createElement("div");
        plusEl.setAttribute("class", "pimcore_block_plus");
        plusEl.setAttribute("data-name", this.name);

        var clearEl = document.createElement("div");
        clearEl.setAttribute("class", "pimcore_block_clear");
        clearEl.setAttribute("data-name", this.name);

        Ext.get(this.id).appendChild(amountEl);
        Ext.get(this.id).appendChild(plusEl);
        Ext.get(this.id).appendChild(clearEl);

        // amount selection
        var amountBox = new Ext.form.ComboBox({
            cls: "pimcore_block_amount_select",
            store: this.getAmountValues(),
            mode: "local",
            triggerAction: "all",
            editable: false,
            value: 1,
            width: 55
        });
        amountBox.render(amountEl);

        // plus button
        var plusButton = new Ext.Button({
            cls: "pimcore_block_button_plus",
            iconCls: "pimcore_icon_plus",
            listeners: {
                "click": this.addBlock.bind(this, null, amountBox)
            }
        });
        plusButton.render(plusEl);

        Ext.get(this.id).addCls("pimcore_block_limitnotreached pimcore_block_buttons");
    },

    addBlock : function (element, amountbox) {

        var index = this.getElementIndex(element) + 1;
        var amount = 1;

        // get amount of new blocks
        try {
            amount = amountbox.getValue();
        }
        catch (e) {
        }

        if (intval(amount) < 1) {
            amount = 1;
        }

        // get next higher key
        var nextKey = 0;
        var currentKey;

        for (var i = 0; i < this.elements.length; i++) {
            currentKey = intval(this.elements[i].key);
            if (currentKey > nextKey) {
                nextKey = currentKey;
            }
        }

        if(this.config['reload'] === true) {
            var args = [index, 0];
            var firstNewKey = nextKey+1;

            for (var p = 0; p < amount; p++) {
                nextKey++;
                args.push({key: nextKey});
            }

            this.elements.splice.apply(this.elements, args);

            editWindow.lastScrollposition = '#' + this.id + ' .pimcore_block_entry[data-name="' + this.name + '"][key="' + firstNewKey + '"]';
            this.reloadDocument();
        } else {
            let template = this.config['template']['html'];
            for (let p = 0; p < amount; p++) {
                nextKey++;
                let blockHtml = template.replaceAll(':1000000.', ':' + nextKey + '.');
                blockHtml = blockHtml.replaceAll('_1000000_', '_' + nextKey + '_');
                blockHtml = blockHtml.replaceAll('="1000000"', '="' + nextKey + '"');
                blockHtml = blockHtml.replaceAll(', 1000000"', ', ' + nextKey + '"');

                if(!this.elements.length) {
                    Ext.get(this.id).setHtml(blockHtml);
                } else if (this.elements[index-1]) {
                    Ext.get(this.elements[index-1]).insertHtml('afterEnd', blockHtml, true);
                }

                this.config['template']['editables'].forEach(editableDef => {
                    let editable = Ext.clone(editableDef);
                    editable['id'] = editable['id'].replace('_1000000_', '_' + nextKey + '_');
                    editable['name'] = editable['name'].replace(':1000000.', ':' + nextKey + '.');
                    editableManager.addByDefinition(editable);
                });

                this.elements = Ext.get(this.id).query('.pimcore_block_entry[data-name="' + this.name + '"][key]');
            }

            this.refresh();
        }
    },

    removeBlock: function (element) {

        var index = this.getElementIndex(element);

        this.elements.splice(index, 1);
        Ext.get(element).remove();

        if(this.config['reload'] === true) {
            this.reloadDocument();
        } else {
            this.refresh();
        }
    },

    moveBlockDown: function (element) {
        var index = this.getElementIndex(element);
        if (index < (this.elements.length-1)) {
            if(this.config['reload'] === true) {
                var x = this.elements[index];
                var y = this.elements[index + 1];

                this.elements[index + 1] = x;
                this.elements[index] = y;

                this.reloadDocument();
            } else {
                Ext.get(element).insertAfter(this.elements[index+1]);
                this.refresh();
            }
        }
    },

    moveBlockUp: function (element) {
        var index = this.getElementIndex(element);
        if (index > 0) {
            if(this.config['reload'] === true) {
                var x = this.elements[index];
                var y = this.elements[index - 1];

                this.elements[index - 1] = x;
                this.elements[index] = y;

                this.reloadDocument();
            } else {
                Ext.get(element).insertBefore(this.elements[index-1]);
                this.refresh();
            }
        }
    },

    getElementIndex: function (element) {

        try {
            var key = Ext.get(element).dom.key;
            for (var i = 0; i < this.elements.length; i++) {
                if (this.elements[i].key == key) {
                    var index = i;
                    break;
                }
            }
        }
        catch (e) {
            return 0;
        }

        return index;
    },

    getValue: function () {
        var data = [];
        for (var i = 0; i < this.elements.length; i++) {
            if (this.elements[i]) {
                if (this.elements[i].key) {
                    data.push(this.elements[i].key);
                }
            }
        }

        return data;
    },

    getType: function () {
        return "block";
    }
});



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

pimcore.registerNS("pimcore.document.editables.scheduledblock");
pimcore.document.editables.scheduledblock = Class.create(pimcore.document.editables.block, {

    initialize: function(id, name, config, data, inherited) {
        this.id = id;
        this.name = name;
        this.elements = [];
        this.config = this.parseConfig(config);

        this.elements = Ext.get(id).query('.pimcore_block_entry[data-name="' + name + '"][key]');

        for (var i = 0; i < this.elements.length; i++) {
                this.elements[i].key = this.elements[i].getAttribute("key");
                this.elements[i].date = this.elements[i].getAttribute("date");

                Ext.get(this.elements[i]).setVisibilityMode(Ext.Element.DISPLAY);
                Ext.get(this.elements[i]).setVisible(false);
        }

        Ext.get(id).on('mouseenter', function (event) {
            Ext.get(id).addCls('pimcore_block_entry_over');
        });

        Ext.get(id).on('mouseleave', function (event) {
            Ext.get(id).removeCls('pimcore_block_entry_over');
        });

        this.renderControls();
    },

    /**
     * generates id for current selected date that is stored in globalmanager
     * in order to jup to the correct date when view is reloaded because new
     * timestamp was added
     *
     * @returns {string}
     */
    getTmpStoreId: function() {
        var documentId = window.editWindow.document.id;
        return "pimcore_scheduled_block_tmp_date_" + documentId + "_" + this.name;
    },

    renderControls: function() {

        var controlDiv = Ext.get(this.id).query('.pimcore_scheduled_block_controls')[0];

        var controlItems = [];

        var initialDate = new Date();
        if(top.pimcore.globalmanager.get(this.getTmpStoreId())) {
            initialDate = top.pimcore.globalmanager.get(this.getTmpStoreId());
            top.pimcore.globalmanager.remove(this.getTmpStoreId());
        }

        this.dateField = new Ext.form.DateField({
            cls: "pimcore_block_field_date",
            value: initialDate,
            region: 'west',
            listeners: {
                'change': function() {
                    this.loadTimestampsForDate();
                }.bind(this)
            }
        });
        controlItems.push(this.dateField);

        this.slider = Ext.create('Ext.pimcore.slider.Milestone', {
            width: '100%',
            region: 'center',
            style: 'padding-left: 10px; padding-right: 10px'
        });

        controlItems.push(this.slider);
        var plusButton = new Ext.Button({
            cls: "pimcore_block_button_plus",
            iconCls: "pimcore_icon_plus",
            region: 'east',
            listeners: {
                "click": function() {
                    this.addBlock(this.dateField.getValue());
                }.bind(this)
            }
        });
        controlItems.push(plusButton);

        var jumpMenuEntries = [];
        for (var i = 0; i < this.elements.length; i++) {
            var element = this.elements[i];

            var timestamp = new Date(element.date * 1000);

            jumpMenuEntries.push({
                text: Ext.Date.format(timestamp, 'Y-m-d H:i'),
                iconCls: 'pimcore_icon_time',
                handler: function(element, timestamp) {
                    this.dateField.setValue(timestamp);
                    this.slider.activateThumbByValue(element.date);
                }.bind(this, element, timestamp)
            });
        }

        if(jumpMenuEntries.length > 0) {
            jumpMenuEntries.push({
                xtype: 'menuseparator'
            });
        }

        jumpMenuEntries.push({
            text: t('scheduled_block_delete_all_in_past'),
            iconCls: 'pimcore_icon_delete',
            handler: function(element, timestamp) {
                Ext.MessageBox.confirm("", t("scheduled_block_really_delete_past"), function (buttonValue) {
                    if (buttonValue == "yes") {
                        this.cleanupTimestamps(false);
                    }
                }.bind(this));
            }.bind(this)
        });

        jumpMenuEntries.push({
            text: t('scheduled_block_delete_all'),
            iconCls: 'pimcore_icon_delete',
            handler: function(element, timestamp) {
                Ext.MessageBox.confirm("", t("scheduled_block_really_delete_all"), function (buttonValue) {
                    if (buttonValue == "yes") {
                        this.cleanupTimestamps(false);
                    }
                }.bind(this));
            }.bind(this)
        });

        var jumpButton = new Ext.Button({
            iconCls: "pimcore_icon_time",
            region: 'east',
            menu: jumpMenuEntries
        });
        controlItems.push(jumpButton);


        var controlBar = new Ext.Panel({
            items: controlItems,
            layout: 'border',
            height: 35,
            border: false,
            style: "margin-bottom: 10px"
        });
        controlBar.render(controlDiv);

        this.loadTimestampsForDate();
    },

    cleanupTimestamps: function(allTimestamps) {

        var currentTimestamp = (new Date()).getTime() / 1000;

        if(allTimestamps) {
            for (var i = 0; i < this.elements.length; i++) {
                var element = this.elements[i];
                var index = this.getElementIndex(element);
                this.elements.splice(index, 1);
                Ext.get(element).remove();
            }
        } else {
            var previousElement = null;
            for (var i = 0; i < this.elements.length; i++) {
                var element = this.elements[i];
                if(previousElement) {
                    var index = this.getElementIndex(previousElement);
                    this.elements.splice(index, 1);
                    Ext.get(previousElement).remove();
                }
                if(element.date < currentTimestamp) {
                    previousElement = element;
                }
            }
        }

        this.reloadDocument();
    },

    loadTimestampsForDate: function() {
        var date = this.dateField.getValue();

        this.slider.initDate(date);

        var timestampFrom = date.getTime() / 1000;
        var timestampTo = timestampFrom + 86399; //plus one day

        var firstElementVisible = false;
        var latestPreviousElement = null;
        for (var i = 0; i < this.elements.length; i++) {

            var element = this.elements[i];

            if(element.date >= timestampFrom && element.date <= timestampTo) {

                var timestampMarker = this.slider.addTimestamp(
                    element.date,
                    element.key,
                    function(element, newValue) {
                        element.date = newValue;
                    }.bind(this, element),
                    this.showElement.bind(this, element),
                    this.removeBlock.bind(this, element)
                );

                if(!firstElementVisible) {
                    this.slider.activateThumb(timestampMarker);
                    firstElementVisible = true;
                }
            } else {
                //remember last element in front of current day - for showing if no element is in current day
                if(element.date < timestampFrom) {
                    if(!latestPreviousElement || latestPreviousElement.date < element.date) {
                        latestPreviousElement = element;
                    }
                }
            }
        }

        if(!firstElementVisible) {
            if(latestPreviousElement) {
                this.showElement(latestPreviousElement, latestPreviousElement.key);
            } else {
                this.hideAllElements();
            }
        }

    },

    hideAllElements: function() {
        for(var i = 0; i < this.elements.length; i++) {
            Ext.get(this.elements[i]).setVisible(false);
        }
    },

    showElement: function(element, key) {
        this.hideAllElements();
        Ext.get(element).setVisible(true);
    },

    createInitalControls: function (amountValues) {
        //nothing to do, but needs to be overwritten
    },

    addBlock : function (date) {
        // get next higher key
        var nextKey = 0;
        var currentKey;

        for (var i = 0; i < this.elements.length; i++) {
            currentKey = intval(this.elements[i].key);
            if (currentKey > nextKey) {
                nextKey = currentKey;
            }
        }

        if(!date) {
            date = new Date();
        }

        nextKey++;

        this.elements.push({key: nextKey, date: (date.getTime()) / 1000});

        this.reloadDocument();

        pimcore.globalmanager.add(this.getTmpStoreId(),  date);

    },

    getValue: function () {
        var data = [];
        for (var i = 0; i < this.elements.length; i++) {
            if (this.elements[i]) {
                if (this.elements[i].key) {
                    data.push({
                        key: this.elements[i].key,
                        date: this.elements[i].date
                    });
                }
            }
        }

        return data;
    },

    getType: function () {
        return "scheduledblock";
    }
});



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

pimcore.registerNS("pimcore.document.editables.date");
pimcore.document.editables.date = Class.create(pimcore.document.editable, {

    initialize: function(id, name, config, data, inherited) {
        this.id = id;
        this.name = name;
        this.config = this.parseConfig(config);
        this.config.name = id + "_editable";

        this.data = null;
        if(data) {
            this.data = new Date(intval(data) * 1000);
        }
    },

    render: function () {
        this.setupWrapper();

        if (this.config.format) {
            // replace any % prefixed parts from strftime format
            this.config.format = this.config.format.replace(/%([a-zA-Z])/g, '$1');
        }

        if(this.data) {
            this.config.value = this.data;
        }

        this.element = new Ext.form.DateField(this.config);
        if (this.config["reload"]) {
            this.element.on("change", this.reloadDocument);
        }

        this.element.render(this.id);
    },

    getValue: function () {
        if(this.element) {
            return this.element.getValue();
        } else if (this.data) {
            return Ext.Date.format(this.data, "Y-m-d\\TH:i:s");
        }
    },

    getType: function () {
        return "date";
    }
});



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

pimcore.registerNS("pimcore.document.editables.relation");
pimcore.document.editables.relation = Class.create(pimcore.document.editable, {

    initialize: function(id, name, config, data, inherited) {

        this.id = id;
        this.name = name;
        this.config = this.parseConfig(config);

        this.data = {
            id: null,
            path: "",
            type: ""
        };

        if (data) {
            this.data = data;
            this.config.value = this.data.path;
        }

        this.config.enableKeyEvents = true;

        if(typeof this.config.emptyText == "undefined") {
            this.config.emptyText = t("drop_element_here");
        }

        this.config.name = id + "_editable";
    },

    render: function () {
        this.setupWrapper();

        if (!this.config.width) {
            this.config.width = Ext.get(this.id).getWidth() ?? Ext.get(this.id).getWidth() - 2;
        }

        this.element = new Ext.form.TextField(this.config);


        this.element.on("render", function (el) {
            // register at global DnD manager
            dndManager.addDropTarget(el.getEl(), this.onNodeOver.bind(this), this.onNodeDrop.bind(this));

            el.getEl().on("contextmenu", this.onContextMenu.bind(this));
        }.bind(this));

        // disable typing into the textfield
        this.element.on("keyup", function (element, event) {
            element.setValue(this.data.path);
        }.bind(this));

        var items = [this.element, {
            xtype: "button",
            iconCls: "pimcore_icon_open",
            style: "margin-left: 5px",
            handler: this.openElement.bind(this)
        }, {
            xtype: "button",
            iconCls: "pimcore_icon_delete",
            style: "margin-left: 5px",
            handler: this.empty.bind(this)
        }, {
            xtype: "button",
            iconCls: "pimcore_icon_search",
            style: "margin-left: 5px",
            handler: this.openSearchEditor.bind(this)
        }];

        this.composite = Ext.create('Ext.form.FieldContainer', {
            layout: 'hbox',
            items: items
        });

        this.composite.render(this.id);
    },

    uploadDialog: function () {
        pimcore.helpers.assetSingleUploadDialog(this.config["uploadPath"], "path", function (res) {
            try {
                var data = Ext.decode(res.response.responseText);
                if(data["id"]) {

                    if (this.config["subtypes"]) {
                        var found = false;
                        var typeKeys = Object.keys(this.config.subtypes);
                        for (var st = 0; st < typeKeys.length; st++) {
                            for (var i = 0; i < this.config.subtypes[typeKeys[st]].length; i++) {
                                if (this.config.subtypes[typeKeys[st]][i] == data["type"]) {
                                    found = true;
                                    break;
                                }
                            }
                        }
                        if (!found) {
                            return false;
                        }
                    }

                    this.data.id = data["id"];
                    this.data.subtype = data["type"];
                    this.data.elementType = "asset";
                    this.data.path = data["fullpath"];
                    this.element.setValue(data["fullpath"]);
                }
            } catch (e) {
                console.log(e);
            }
        }.bind(this));
    },

    onNodeOver: function(target, dd, e, data) {
        var record = data.records[0];

        record = this.getCustomPimcoreDropData(record);
        if (data.records.length === 1 && this.dndAllowed(record)) {
            return Ext.dd.DropZone.prototype.dropAllowed;
        }
        else {
            return Ext.dd.DropZone.prototype.dropNotAllowed;
        }
    },

    onNodeDrop: function (target, dd, e, data) {

        if(!pimcore.helpers.dragAndDropValidateSingleItem(data)) {
            return false;
        }

        var record = data.records[0];
        record = this.getCustomPimcoreDropData(record);

        if(!this.dndAllowed(record)){
            return false;
        }


        this.data.id = record.data.id;
        this.data.subtype = record.data.type;
        this.data.elementType = record.data.elementType;
        this.data.path = record.data.path;

        this.element.setValue(record.data.path);

        if (this.config.reload) {
            this.reloadDocument();
        }

        return true;
    },

    dndAllowed: function(data) {

        var i;
        var found;

        var checkSubType = false;
        var checkClass = false;
        var type;

        //only is legacy
        if (this.config.only && !this.config.types) {
            this.config.types = [this.config.only];
        }

        //type check   (asset,document,object)
        if (this.config.types) {
            found = false;
            for (i = 0; i < this.config.types.length; i++) {
                type = this.config.types[i];
                if (type == data.data.elementType) {
                    found = true;

                    if((typeof this.config.subtypes !== "undefined") && this.config.subtypes[type] && this.config.subtypes[type].length) {
                        checkSubType = true;
                    }
                    if(data.data.elementType == "object" && this.config.classes) {
                        checkClass = true;
                    }
                    break;
                }
            }
            if (!found) {
                return false;
            }
        }

        //subtype check  (folder,page,snippet ... )
        if (checkSubType) {

            found = false;
            var subTypes = this.config.subtypes[type];
            for (i = 0; i < subTypes.length; i++) {
                if (subTypes[i] == data.data.type) {
                    found = true;
                    break;
                }

            }
            if (!found) {
                return false;
            }
        }

        //object class check
        if (checkClass) {
            found = false;
            for (i = 0; i < this.config.classes.length; i++) {
                if (this.config.classes[i] == data.data.className) {
                    found = true;
                    break;
                }
            }
            if (!found) {
                return false;
            }
        }

        return true;
    },

    onContextMenu: function (e) {

        var menu = new Ext.menu.Menu();

        if(this.data["id"]) {
            menu.add(new Ext.menu.Item({
                text: t('empty'),
                iconCls: "pimcore_icon_delete",
                handler: this.empty.bind(this)
            }));

            menu.add(new Ext.menu.Item({
                text: t('open'),
                iconCls: "pimcore_icon_open",
                handler: this.openElement.bind(this)
            }));

            if (pimcore.elementservice.showLocateInTreeButton("document")) {
                menu.add(new Ext.menu.Item({
                    text: t('show_in_tree'),
                    iconCls: "pimcore_icon_show_in_tree",
                    handler: function (item) {
                        item.parentMenu.destroy();
                        pimcore.treenodelocator.showInTree(this.data.id, this.data.elementType);
                    }.bind(this)
                }));
            }
        }

        menu.add(new Ext.menu.Item({
            text: t('search'),
            iconCls: "pimcore_icon_search",
            handler: function (item) {
                item.parentMenu.destroy();

                this.openSearchEditor();
            }.bind(this)
        }));

        if((this.config["types"] && in_array("asset",this.config.types)) || !this.config["types"]) {
            menu.add(new Ext.menu.Item({
                text: t('upload'),
                cls: "pimcore_inline_upload",
                iconCls: "pimcore_icon_upload",
                handler: function (item) {
                    item.parentMenu.destroy();
                    this.uploadDialog();
                }.bind(this)
            }));
        }

        menu.showAt(e.getXY());

        e.stopEvent();
    },

    openSearchEditor: function () {

        //only is legacy
        if (this.config.only && !this.config.types) {
            this.config.types = [this.config.only];
        }

        pimcore.helpers.itemselector(false, this.addDataFromSelector.bind(this), {
            type: this.config.types,
            subtype: this.config.subtypes,
            specific: {
                classes: this.config["classes"]
            }
        }, {
            context: this.getContext()
        });
    },

    addDataFromSelector: function (item) {
        if (item) {
            this.data.id = item.id;
            this.data.subtype = item.subtype;
            this.data.elementType = item.type;
            this.data.path = item.fullpath;

            this.element.setValue(this.data.path);
            if (this.config.reload) {
                this.reloadDocument();
            }
        }
    },

    openElement: function () {
        if (this.data.id && this.data.elementType) {
            pimcore.helpers.openElement(this.data.id, this.data.elementType, this.data.subtype);
        }
    },

    empty: function () {
        this.data = {};
        this.element.setValue(this.data.path);
        if (this.config.reload) {
            this.reloadDocument();
        }
    },

    getValue: function () {
        return {
            id: this.data.id,
            type: this.data.elementType,
            subtype: this.data.subtype
        };
    },

    getType: function () {
        return "relation";
    }
});



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

pimcore.registerNS("pimcore.document.editables.relations");
pimcore.document.editables.relations = Class.create(pimcore.document.editable, {

    initialize: function (id, name, config, data, inherited) {
        this.id = id;
        this.name = name;

        this.config = this.parseConfig(config);

        var modelName = 'DocumentsMultihrefEntry';
        if (!Ext.ClassManager.isCreated(modelName)) {
            Ext.define(modelName, {
                extend: 'Ext.data.Model',
                idProperty: 'rowId',
                fields: [
                    'id',
                    'path',
                    'type',
                    'subtype'
                ]
            });
        }

        this.store = new Ext.data.ArrayStore({
            data: data,
            model: modelName
        });
    },

    render: function () {
        this.setupWrapper();

        var tbar = [
            Ext.create('Ext.toolbar.Spacer', {
                width: 24,
                height: 24,
                cls: "pimcore_icon_droptarget"
            }),
            Ext.create('Ext.toolbar.TextItem', {
                text: "<b>" + (this.config.title ? this.config.title : "") + "</b>"
            }),
            "->",
            {
                xtype: "button",
                iconCls: "pimcore_icon_delete",
                handler: this.empty.bind(this)
            },
            {
                xtype: "button",
                iconCls: "pimcore_icon_search",
                handler: this.openSearchEditor.bind(this)
            }
        ];

        if (this.canInlineUpload()) {
            tbar.push({
                xtype: "button",
                cls: "pimcore_inline_upload",
                iconCls: "pimcore_icon_upload",
                handler: this.uploadDialog.bind(this)
            });
        }

        var elementConfig = {
            store: this.store,
            bodyStyle: "color:#000",
            selModel: Ext.create('Ext.selection.RowModel', {}),

            columns: {
                defaults: {
                    sortable: false
                },
                items: [
                    {text: 'ID', dataIndex: 'id', width: 50},
                    {text: t("path"), dataIndex: 'path', flex: 200},
                    {text: t("type"), dataIndex: 'type', width: 100},
                    {text: t("subtype"), dataIndex: 'subtype', width: 100},
                    {
                        xtype: 'actioncolumn',
                        menuText: t('up'),
                        width: 30,
                        items: [
                            {
                                tooltip: t('up'),
                                icon: "/bundles/pimcoreadmin/img/flat-color-icons/up.svg",
                                handler: function (grid, rowIndex) {
                                    if (rowIndex > 0) {
                                        var rec = grid.getStore().getAt(rowIndex);
                                        grid.getStore().removeAt(rowIndex);
                                        grid.getStore().insert(rowIndex - 1, [rec]);

                                        if (this.config.reload) {
                                            this.reloadDocument();
                                        }
                                    }
                                }.bind(this)
                            }
                        ]
                    },
                    {
                        xtype: 'actioncolumn',
                        menuText: t('down'),
                        width: 30,
                        items: [
                            {
                                tooltip: t('down'),
                                icon: "/bundles/pimcoreadmin/img/flat-color-icons/down.svg",
                                handler: function (grid, rowIndex) {
                                    if (rowIndex < (grid.getStore().getCount() - 1)) {
                                        var rec = grid.getStore().getAt(rowIndex);
                                        grid.getStore().removeAt(rowIndex);
                                        grid.getStore().insert(rowIndex + 1, [rec]);

                                        if (this.config.reload) {
                                            this.reloadDocument();
                                        }
                                    }
                                }.bind(this)
                            }
                        ]
                    },
                    {
                        xtype: 'actioncolumn',
                        menuText: t('open'),
                        width: 30,
                        items: [{
                            tooltip: t('open'),
                            icon: "/bundles/pimcoreadmin/img/flat-color-icons/open_file.svg",
                            handler: function (grid, rowIndex) {
                                var data = grid.getStore().getAt(rowIndex);
                                var subtype = data.data.subtype;
                                if (data.data.type == "object" && data.data.subtype != "folder") {
                                    subtype = "object";
                                }
                                pimcore.helpers.openElement(data.data.id, data.data.type, subtype);
                            }.bind(this)
                        }]
                    },
                    {
                        xtype: 'actioncolumn',
                        menuText: t('remove'),
                        width: 30,
                        items: [{
                            tooltip: t('remove'),
                            icon: "/bundles/pimcoreadmin/img/flat-color-icons/delete.svg",
                            handler: function (grid, rowIndex) {
                                grid.getStore().removeAt(rowIndex);

                                if (this.config.reload) {
                                    this.reloadDocument();
                                }
                            }.bind(this)
                        }]
                    }
                ]
            },
            tbar: {
                items: tbar
            }
        };

        // height specifics
        if (typeof this.config.height != "undefined") {
            elementConfig.height = this.config.height;
        } else {
            elementConfig.autoHeight = true;
        }

        // width specifics
        if (typeof this.config.width != "undefined") {
            elementConfig.width = this.config.width;
        }

        this.element = new Ext.grid.GridPanel(elementConfig);

        this.element.on("rowcontextmenu", this.onRowContextmenu.bind(this));
        //this.element.reference = this;

        this.element.on("render", function (el) {
            // register at global DnD manager
            dndManager.addDropTarget(this.element.getEl(),
                this.onNodeOver.bind(this),
                this.onNodeDrop.bind(this));

        }.bind(this));

        this.element.render(this.id);
    },

    canInlineUpload: function() {
        if(this.config["disableInlineUpload"] === true) {
            return false;
        }

        // no assets allowed, disable inline upload
        if(this.config["types"] && this.config["types"].length && this.config["types"].indexOf("asset") === -1) {
            return false;
        }

        return true;
    },

    uploadDialog: function () {
        pimcore.helpers.assetSingleUploadDialog(this.config["uploadPath"], "path", function (res) {
            try {
                var data = Ext.decode(res.response.responseText);
                if (data["id"]) {
                    this.store.add({
                        id: data["id"],
                        path: data["fullpath"],
                        type: "asset",
                        subtype: data["type"]
                    });

                    if (this.config.reload) {
                        this.reloadDocument();
                    }
                }
            } catch (e) {
                console.log(e);
            }
        }.bind(this));
    },

    onNodeOver: function (target, dd, e, data) {
        var returnValue = Ext.dd.DropZone.prototype.dropAllowed;
        data.records.forEach(function (record) {
            record = this.getCustomPimcoreDropData(record);
            if (!this.dndAllowed(record)) {
                returnValue = Ext.dd.DropZone.prototype.dropNotAllowed;
            }
        }.bind(this));

        return returnValue;
    },

    onNodeDrop: function (target, dd, e, data) {

        var elementsToAdd = [];

        data.records.forEach(function (record) {
            if (!this.dndAllowed(this.getCustomPimcoreDropData(record))) {
                return false;
            }

            var data = record.data;

            var initData = {
                id: data.id,
                path: data.path,
                type: data.elementType
            };

            if (initData.type === "object") {
                if (data.className) {
                    initData.subtype = data.className;
                }
                else {
                    initData.subtype = "folder";
                }
            }

            if (initData.type === "document" || initData.type === "asset") {
                initData.subtype = data.type;
            }

            // check for existing element
            if (!this.elementAlreadyExists(initData.id, initData.type)) {
                elementsToAdd.push(initData);
            }
        }.bind(this));

        if(elementsToAdd.length) {
            this.store.add(elementsToAdd);

            if (this.config.reload) {
                this.reloadDocument();
            }

            return true;
        }

        return false;

    },

    dndAllowed: function (data) {

        var i;
        var found;

        var checkSubType = false;
        var checkClass = false;
        var type;

        //only is legacy
        if (this.config.only && !this.config.types) {
            this.config.types = [this.config.only];
        }

        //type check   (asset,document,object)
        if (this.config.types) {
            found = false;
            for (i = 0; i < this.config.types.length; i++) {
                type = this.config.types[i];
                if (type == data.data.elementType) {
                    found = true;

                    if (this.config.subtypes && this.config.subtypes[type] && this.config.subtypes[type].length) {
                        checkSubType = true;
                    }
                    if (data.data.elementType == "object" && this.config.classes) {
                        checkClass = true;
                    }
                    break;
                }
            }
            if (!found) {
                return false;
            }
        }

        //subtype check  (folder,page,snippet ... )
        if (checkSubType) {

            found = false;
            var subTypes = this.config.subtypes[type];
            for (i = 0; i < subTypes.length; i++) {
                if (subTypes[i] == data.data.type) {
                    found = true;
                    if (data.data.type == "folder" && checkClass) {
                        checkClass = false;
                    }
                    break;
                }

            }
            if (!found) {
                return false;
            }
        }

        //object class check
        if (checkClass) {
            found = false;
            for (i = 0; i < this.config.classes.length; i++) {
                if (this.config.classes[i] == data.data.className) {
                    found = true;
                    break;
                }
            }
            if (!found) {
                return false;
            }
        }

        return true;
    },

    onRowContextmenu: function (grid, record, tr, rowIndex, e, eOpts) {

        var menu = new Ext.menu.Menu();

        menu.add(new Ext.menu.Item({
            text: t('remove'),
            iconCls: "pimcore_icon_delete",
            handler: this.removeElement.bind(this, rowIndex)
        }));

        menu.add(new Ext.menu.Item({
            text: t('open'),
            iconCls: "pimcore_icon_open",
            handler: function (record, item) {

                item.parentMenu.destroy();

                var subtype = record.data.subtype;
                if (record.data.type == "object" && record.data.subtype != "folder") {
                    subtype = "object";
                }
                pimcore.helpers.openElement(record.data.id, record.data.type, subtype);
            }.bind(this, record)
        }));

        if (pimcore.elementservice.showLocateInTreeButton("document")) {
            menu.add(new Ext.menu.Item({
                text: t('show_in_tree'),
                iconCls: "pimcore_icon_show_in_tree",
                handler: function (item) {
                    item.parentMenu.destroy();
                    pimcore.treenodelocator.showInTree(record.data.id, record.data.type);
                }.bind(this)
            }));
        }

        menu.add(new Ext.menu.Item({
            text: t('search'),
            iconCls: "pimcore_icon_search",
            handler: function (item) {
                item.parentMenu.destroy();
                this.openSearchEditor();
            }.bind(this)
        }));

        e.stopEvent();
        menu.showAt(e.pageX, e.pageY);
    },

    openSearchEditor: function () {

        pimcore.helpers.itemselector(true, this.addDataFromSelector.bind(this), {
                type: this.config.types,
                subtype: this.config.subtypes,
                specific: {
                    classes: this.config["classes"]
                }
            },
            {
                context: this.getContext()
            });

    },

    elementAlreadyExists: function (id, type) {

        // check for existing element
        var result = this.store.queryBy(function (id, type, record, rid) {
            if (record.data.id == id && record.data.type == type) {
                return true;
            }
            return false;
        }.bind(this, id, type));

        if (result.length < 1) {
            return false;
        }
        return true;
    },

    addDataFromSelector: function (items) {
        if (items.length > 0) {
            for (var i = 0; i < items.length; i++) {
                if (!this.elementAlreadyExists(items[i].id, items[i].type)) {

                    var subtype = items[i].subtype;
                    if (items[i].type == "object") {
                        if (items[i].subtype == "object") {
                            if (items[i].classname) {
                                subtype = items[i].classname;
                            }
                        }
                    }

                    this.store.add({
                        id: items[i].id,
                        path: items[i].fullpath,
                        type: items[i].type,
                        subtype: subtype
                    });

                    if (this.config.reload) {
                        this.reloadDocument();
                    }
                }
            }
        }
    },

    empty: function () {
        this.store.removeAll();

        if (this.config.reload) {
            this.reloadDocument();
        }
    },

    removeElement: function (index, item) {
        this.store.removeAt(index);
        item.parentMenu.destroy();

        if (this.config.reload) {
            this.reloadDocument();
        }
    },

    getValue: function () {
        var tmData = [];

        var data = this.store.queryBy(function (record, id) {
            return true;
        });


        for (var i = 0; i < data.items.length; i++) {
            tmData.push(data.items[i].data);
        }

        return tmData;
    },

    getType: function () {
        return "relations";
    }
});



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

pimcore.registerNS("pimcore.document.editables.checkbox");
pimcore.document.editables.checkbox = Class.create(pimcore.document.editable, {


    initialize: function(id, name, config, data, inherited) {
        this.id = id;
        this.name = name;
        this.config = this.parseConfig(config);

        if (!data) {
            data = false;
        }

        this.data = data;
    },

    render: function () {
        this.setupWrapper();
        this.htmlId = this.id + "_editable";

        var elContainer = Ext.get(this.id);

        var inputCheckbox = document.createElement("input");
        inputCheckbox.setAttribute('name', this.htmlId);
        inputCheckbox.setAttribute('type', 'checkbox');
        inputCheckbox.setAttribute('value', 'true');
        inputCheckbox.setAttribute('id', this.htmlId);
        if(this.data) {
            inputCheckbox.setAttribute('checked', 'checked');
        }

        elContainer.appendChild(inputCheckbox);

        if(this.config["label"]) {
            var labelCheckbox = document.createElement("label");
            labelCheckbox.setAttribute('for', this.htmlId);
            labelCheckbox.innerText = this.config["label"];
            elContainer.appendChild(labelCheckbox);
        }

        this.elComponent = Ext.get(this.htmlId);

        if (this.config.reload) {
            this.elComponent.on('change', this.reloadDocument);
        }
    },

    renderInDialogBox: function () {

        if(this.config['dialogBoxConfig'] &&
            (this.config['dialogBoxConfig']['label'] || this.config['dialogBoxConfig']['name'])) {
            this.config["label"] = this.config['dialogBoxConfig']['label'] ?? this.config['dialogBoxConfig']['name'];
        }

        this.render();
    },

    getValue: function () {
        if(this.elComponent) {
            return this.elComponent.dom.checked;
        }

        return this.data;
    },

    getType: function () {
        return "checkbox";
    }
});



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

pimcore.registerNS("pimcore.document.editables.image");
pimcore.document.editables.image = Class.create(pimcore.document.editable, {

    initialize: function(id, name, config, data, inherited) {
        this.id = id;
        this.name = name;
        this.datax = {};
        this.inherited = inherited;
        this.config = this.parseConfig(config);

        this.originalDimensions = {
            width: this.config.width,
            height: this.config.height
        };

        if (data) {
            this.datax = data;
        }
    },

    render: function () {
        this.setupWrapper();

        this.element = Ext.get(this.id);

        if (this.config["width"]) {
            this.element.setStyle("width", this.config["width"] + "px");
        }

        if (!this.config["height"]) {
            if (this.config["defaultHeight"]){
                this.element.setStyle("min-height", this.config["defaultHeight"] + "px");
            }
        } else {
            this.element.setStyle("height", this.config["height"] + "px");
        }

        // contextmenu
        this.element.on("contextmenu", this.onContextMenu.bind(this));

        // register at global DnD manager
        if (typeof dndManager != 'undefined') {
            dndManager.addDropTarget(this.element, this.onNodeOver.bind(this), this.onNodeDrop.bind(this));
        }

        // tooltip
        if(this.config["title"]) {
            new Ext.ToolTip({
                target: this.element,
                showDelay: 100,
                hideDelay: 0,
                trackMouse: true,
                html: this.config["title"]
            });
        }

        // alt / title
        this.altBar = document.createElement("div");
        this.element.appendChild(this.altBar);

        this.altBar = Ext.get(this.altBar);
        this.altBar.addCls("pimcore_editable_image_alt");
        this.altBar.setStyle({
            opacity: 0.8,
            display: "none"
        });

        this.altInput = new Ext.form.TextField({
            name: "altText",
            width: this.config.width
        });
        this.altInput.render(this.altBar);

        if (this.datax.alt) {
            this.altInput.setValue(this.datax.alt);
        }

        if (this.config.hidetext === true) {
            this.altBar.setStyle({
                display: "none",
                visibility: "hidden"
            });
        }

        // add additional drop targets
        if (this.config["dropClass"]) {
            var extra_drop_targets = Ext.query('.' + this.config.dropClass);

            for (var i = 0; i < extra_drop_targets.length; ++i) {
                var drop_el = Ext.get(extra_drop_targets[i]);
                dndManager.addDropTarget(drop_el, this.onNodeOver.bind(this), this.onNodeDrop.bind(this));
                drop_el.on("contextmenu", this.onContextMenu.bind(this));
            }
        }

        if(this.config["disableInlineUpload"] !== true) {
            this.element.insertHtml("beforeEnd",'<div class="pimcore_editable_droptarget_upload"></div>');
            this.element.addCls("pimcore_editable_image_empty");
            pimcore.helpers.registerAssetDnDSingleUpload(this.element.dom, this.config["uploadPath"], 'path', function (e) {
                if (e['asset']['type'] === "image" && !this.inherited) {
                    this.resetData();
                    this.datax.id = e['asset']['id'];

                    this.updateImage();
                    this.reload();

                    return true;
                } else {
                    pimcore.helpers.showNotification(t("error"), t('unsupported_filetype'), "error");
                }
            }.bind(this), null, this.getContext());
        } else {
            this.element.insertHtml("beforeEnd",'<div class="pimcore_editable_droptarget"></div>');
            this.element.addCls("pimcore_editable_image_no_upload_empty");
        }

        // insert image
        if (this.datax) {
            this.updateImage();
        }
    },

    onContextMenu: function (e) {

        var menu = new Ext.menu.Menu();

        if(this.datax.id) {

            if(this.config['focal_point_context_menu_item']) {
                menu.add(new Ext.menu.Item({
                    text: t('set_focal_point'),
                    iconCls: "pimcore_icon_focal_point",
                    handler: function (item) {
                        pimcore.helpers.openAsset(this.datax.id, 'image');
                    }.bind(this)
                }));
            }

            menu.add(new Ext.menu.Item({
                text: t('select_specific_area_of_image'),
                iconCls: "pimcore_icon_image_region",
                handler: function (item) {
                    item.parentMenu.destroy();

                    this.openEditWindow();
                }.bind(this)
            }));

            menu.add(new Ext.menu.Item({
                text: t('add_marker_or_hotspots'),
                iconCls: "pimcore_icon_image pimcore_icon_overlay_edit",
                handler: function (item) {
                    item.parentMenu.destroy();

                    this.openHotspotWindow();
                }.bind(this)
            }));

            menu.add(new Ext.menu.Item({
                text: t('empty'),
                iconCls: "pimcore_icon_delete",
                handler: function (item) {
                    item.parentMenu.destroy();

                    this.empty();

                }.bind(this)
            }));
            menu.add(new Ext.menu.Item({
                text: t('open'),
                iconCls: "pimcore_icon_open",
                handler: function (item) {
                    item.parentMenu.destroy();
                    pimcore.helpers.openAsset(this.datax.id, "image");
                }.bind(this)
            }));

            if (pimcore.elementservice.showLocateInTreeButton("document")) {
                menu.add(new Ext.menu.Item({
                    text: t('show_in_tree'),
                    iconCls: "pimcore_icon_show_in_tree",
                    handler: function (item) {
                        item.parentMenu.destroy();
                        pimcore.treenodelocator.showInTree(this.datax.id, "asset");
                    }.bind(this)
                }));
            }
        }

        menu.add(new Ext.menu.Item({
            text: t('search'),
            iconCls: "pimcore_icon_search",
            handler: function (item) {
                item.parentMenu.destroy();
                this.openSearchEditor();
            }.bind(this)
        }));

        if(this.config["disableInlineUpload"] !== true) {
            menu.add(new Ext.menu.Item({
                text: t('upload'),
                cls: "pimcore_inline_upload",
                iconCls: "pimcore_icon_upload",
                handler: function (item) {
                    item.parentMenu.destroy();
                    this.uploadDialog();
                }.bind(this)
            }));
        }

        menu.showAt(e.pageX, e.pageY);
        e.stopEvent();
    },

    uploadDialog: function () {
        pimcore.helpers.assetSingleUploadDialog(this.config["uploadPath"], "path", function (res) {
            try {
                var data = Ext.decode(res.response.responseText);
                if(data["id"] && data["type"] == "image") {
                    this.resetData();
                    this.datax.id = data["id"];

                    this.updateImage();
                    this.reload();
                }
            } catch (e) {
                console.log(e);
            }
        }.bind(this));
    },

    onNodeOver: function(target, dd, e, data) {
        if (data.records.length === 1 && this.dndAllowed(data.records[0].data) && !this.inherited) {
            return Ext.dd.DropZone.prototype.dropAllowed;
        }
        else {
            return Ext.dd.DropZone.prototype.dropNotAllowed;
        }
    },

    onNodeDrop: function (target, dd, e, data) {

        if(!pimcore.helpers.dragAndDropValidateSingleItem(data)) {
            return false;
        }

        data = data.records[0].data;

        if (data.type === "image" && this.dndAllowed(data) && !this.inherited) {
            this.resetData();
            this.datax.id = data.id;

            this.updateImage();
            this.reload();

            return true;
        }

        return false;
    },

    dndAllowed: function(data) {

        if(data.elementType !== "asset" || data.type !== "image"){
            return false;
        } else {
            return true;
        }

    },

    openSearchEditor: function () {
        pimcore.helpers.itemselector(false, this.addDataFromSelector.bind(this), {
            type: ["asset"],
            subtype: {
                asset: ["image"]
            }
        }, {
                context: this.getContext()
            }
        );
    },

    addDataFromSelector: function (item) {
        if(item) {
            this.resetData();
            this.datax.id = item.id;

            this.updateImage();
            this.reload();

            return true;
        }
    },

    resetData: function () {
        this.datax = {
            id: null
        };
    },

    empty: function () {

        this.resetData();

        this.updateImage();
        this.element.addCls("pimcore_editable_image_empty");
        this.altBar.setStyle({
            display: "none"
        });
        this.reload();
    },

    getThumbnailConfig: function(additionalConfig) {
        let merged = Ext.merge(this.datax, additionalConfig);
        merged = Ext.clone(merged);
        delete merged["hotspots"];
        delete merged["path"];
        return merged;

    },

    updateImage: function () {

        var path = "";
        var existingImage = this.element.dom.getElementsByTagName("img")[0];
        if (existingImage) {
            Ext.get(existingImage).remove();
        }

        if (!this.datax.id) {
            return;
        }


        if (!this.config["thumbnail"]) {
            if(!this.originalDimensions["width"] && !this.originalDimensions["height"]) {
                path = Routing.generate('pimcore_admin_asset_getimagethumbnail', this.getThumbnailConfig({
                    'width': this.element.getWidth(),
                    'aspectratio': true
                }));
            } else if (this.originalDimensions["width"]) {
                path = Routing.generate('pimcore_admin_asset_getimagethumbnail', this.getThumbnailConfig({
                    'width': this.originalDimensions["width"],
                    'aspectratio': true
                }));
            } else if (this.originalDimensions["height"]) {
                path = Routing.generate('pimcore_admin_asset_getimagethumbnail', this.getThumbnailConfig({
                    'height': this.originalDimensions["height"],
                    'aspectratio': true
                }));
            }
        } else if (typeof this.config.thumbnail == "string" || typeof this.config.thumbnail == "object") {
                path = Routing.generate('pimcore_admin_asset_getimagethumbnail', this.getThumbnailConfig({
                    'height': this.originalDimensions["height"],
                    'thumbnail': this.config.thumbnail,
                    'pimcore_editmode': '1'
                }));
        }

        var image = document.createElement("img");
        image.src = path;

        this.element.appendChild(image);

        // show alt input field
        this.altBar.setStyle({
            display: "block"
        });

        this.element.removeCls("pimcore_editable_image_empty");

        this.updateCounter = 0;
        this.updateDimensionsInterval = window.setInterval(this.updateDimensions.bind(this), 1000);
    },

    reload : function () {
        if (this.config.reload) {
            this.reloadDocument();
        }
    },

    updateDimensions: function () {

        var image = this.element.dom.getElementsByTagName("img")[0];
        if (!image) {
            return;
        }
        image = Ext.get(image);

        var width = image.getWidth();
        var height = image.getHeight();

        if (width > 1 && height > 1) {

            var dimensionError = false;
            if(typeof this.config.minWidth != "undefined") {
                if(width < this.config.minWidth) {
                    dimensionError = true;
                }
            }
            if(typeof this.config.minHeight != "undefined") {
                if(height < this.config.minHeight) {
                    dimensionError = true;
                }
            }

            if(dimensionError) {
                this.empty();
                clearInterval(this.updateDimensionsInterval);

                Ext.MessageBox.alert(t("error"), t("image_is_too_small"));

                return;
            }

            if (typeof this.originalDimensions.width == "undefined") {
                this.element.setWidth(width);
            }
            if (typeof this.originalDimensions.height == "undefined") {
                this.element.setHeight(height);
            }

            this.altInput.setWidth(width);

            // show alt input field
            this.altBar.setStyle({
                display: "block"
            });

            clearInterval(this.updateDimensionsInterval);
        }
        else {
            this.altBar.setStyle({
                display: "none"
            });
        }

        if (this.updateCounter > 20) {
            // only wait 20 seconds until image must be loaded
            clearInterval(this.updateDimensionsInterval);
        }

        this.updateCounter++;
    },

    openEditWindow: function() {

        var config = {};
        if(this.config["ratioX"] && this.config["ratioY"]) {
            config["ratioX"] = this.config["ratioX"];
            config["ratioY"] = this.config["ratioY"];
        }

        var editor = pimcore.helpers.openImageCropper(this.datax.id, this.datax, function (data) {
            this.datax.cropWidth = data.cropWidth;
            this.datax.cropHeight = data.cropHeight;
            this.datax.cropTop = data.cropTop;
            this.datax.cropLeft = data.cropLeft;
            this.datax.cropPercent = (undefined !== data.cropPercent) ? data.cropPercent : true;

            this.updateImage();
        }.bind(this), config);
        editor.open(true);
    },

    openHotspotWindow: function() {
        var editor = pimcore.helpers.openImageHotspotMarkerEditor(
            this.datax.id,
            this.datax,
            function (data) {
                this.datax["hotspots"] = data["hotspots"];
                this.datax["marker"] = data["marker"];
            }.bind(this),
            {
                crop: {
                    cropWidth: this.datax.cropWidth,
                    cropHeight: this.datax.cropHeight,
                    cropTop: this.datax.cropTop,
                    cropLeft: this.datax.cropLeft,
                    cropPercent: this.datax.cropPercent
                },
                predefinedDataTemplates : this.config.predefinedDataTemplates
            }

        );
        editor.open(false);
    },

    getValue: function () {

        // alt alt value
        if(this.altInput) {
            this.datax.alt = this.altInput.getValue();
        }

        return this.datax;
    },

    getType: function () {
        return "image";
    }
});



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

pimcore.registerNS("pimcore.document.editables.input");
pimcore.document.editables.input = Class.create(pimcore.document.editable, {

    initialize: function(id, name, config, data, inherited) {
        this.id = id;
        this.name = name;
        this.config = this.parseConfig(config);

        if (!data) {
            data = "";
        }

        this.data = data;
    },

    render: function() {
        this.setupWrapper();
        this.element = Ext.get(this.id);
        this.element.dom.setAttribute("contenteditable", true);

        this.element.update(this.data + "<br>");

        if(this.config["required"]) {
            this.required = this.config["required"];
        }

        this.checkValue();

        this.element.on("keyup", this.checkValue.bind(this, true));
        this.element.on("keydown", function (e, t, o) {
            // do not allow certain keys, like enter, ...
            if(in_array(e.getCharCode(), [13])) {
                e.stopEvent();
            }
        });

        this.element.dom.addEventListener("paste", function(e) {
            e.preventDefault();

            var text = "";
            if(e.clipboardData) {
                text = e.clipboardData.getData("text/plain");
            } else if (window.clipboardData) {
                text = window.clipboardData.getData("Text");
            }

            text = this.clearText(text);
            text = htmlentities(text, "ENT_NOQUOTES", null, false);
            text = trim(text);

            try {
                pimcore.edithelpers.pasteHtmlAtCaret(text);
            } catch (e) {
                console.log(e);
            }
        }.bind(this));

        if(this.config["width"]) {
            this.element.applyStyles({
                display: "inline-block",
                width: this.config["width"] + "px",
                overflow: "auto",
                "white-space": "nowrap"
            });
        }
        if(this.config["nowrap"]) {
            this.element.applyStyles({
                "white-space": "nowrap",
                overflow: "auto"
            });
        }
        if (this.config["placeholder"]) {
            this.element.dom.setAttribute('data-placeholder', this.config["placeholder"]);
        }
    },

    checkValue: function (mark) {
        var value = trim(this.element.dom.innerHTML);
        var origValue = value;

        var textLength = trim(strip_tags(value)).length;

        if(textLength < 1) {
            this.element.addCls("empty");
            value = ""; // set to "" since it can contain an <br> at the end
        } else {
            this.element.removeCls("empty");
        }

        if(value != origValue) {
            this.element.update(this.getValue());
        }

        if (this.required) {
            this.validateRequiredValue(value, this.element, this, mark);
        }
    },

    getValue: function () {

        if(!this.element) {
            return this.data;
        }

        var text = "";
        if(typeof this.element.dom.textContent != "undefined") {
            text = this.element.dom.textContent;
        } else {
            text = this.element.dom.innerText;
        }

        text = this.clearText(text);
        return text;
    },

    clearText: function (text) {
        text = str_replace("\r\n", " ", text);
        text = str_replace("\n", " ", text);
        return text;
    },

    getType: function () {
        return "input";
    },

    setInherited: function($super, inherited, el) {

        $super(inherited, el);

        if(this.inherited) {
            this.element.dom.setAttribute("contenteditable", false);
        } else {
            this.element.dom.setAttribute("contenteditable", true);
        }
    }
});



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

pimcore.registerNS("pimcore.document.editables.link");
pimcore.document.editables.link = Class.create(pimcore.document.editable, {

    initialize: function(id, name, config, data, inherited) {

        if (!data) {
            data = {};
        }

        this.defaultData = {
            path: "",
            parameters: "",
            anchor: "",
            accesskey: "",
            rel: "",
            tabindex: "",
            target: "",
            "class": "",
            attributes: ""
        };

        this.data = mergeObject(this.defaultData, data);

        this.id = id;
        this.name = name;
        this.config = this.parseConfig(config);
    },

    render: function() {
        this.setupWrapper();

        Ext.get(this.id).setStyle({
            display:"inline"
        });
        Ext.get(this.id).insertHtml("beforeEnd",'<span class="pimcore_editable_link_text">' + this.getLinkContent() + '</span>');

        var editButton = new Ext.Button({
            iconCls: "pimcore_icon_link pimcore_icon_overlay_edit",
            cls: "pimcore_edit_link_button",
            listeners: {
                "click": this.openEditor.bind(this)
            }
        });

        var openButton = new Ext.Button({
            iconCls: "pimcore_icon_open",
            cls: "pimcore_open_link_button",
            listeners: {
                "click": function () {
                    if (this.data && this.data.path) {
                        if (this.data.linktype == "internal") {
                            pimcore.helpers.openElement(this.data.path, this.data.internalType);
                        } else {
                            window.open(this.data.path, "_blank");
                        }
                    }
                }.bind(this)
            }
        });

        openButton.render(this.id);
        editButton.render(this.id);
    },

    openEditor: function () {

        // disable the global dnd handler in this editmode/frame
        window.dndManager.disable();

        this.window = pimcore.helpers.editmode.openLinkEditPanel(this.data, {
            empty: this.empty.bind(this),
            cancel: this.cancel.bind(this),
            save: this.save.bind(this)
        });
    },


    getLinkContent: function () {

        var text = "[" + t("not_set") + "]";
        if (this.data.text) {
            text = this.data.text;
        } else if (this.data.path) {
            text = this.data.path;
        }
        if (this.data.path) {
            return '<a href="' + this.data.path + '" class="' + this.config["class"] + ' ' + this.data["class"] + '">' + text + '</a>';
        }
        return text;
    },

    save: function () {

        // enable the global dnd dropzone again
        window.dndManager.enable();

        var values = this.window.getComponent("form").getForm().getFieldValues();
        this.data = values;

        // close window
        this.window.close();

        // set text
        Ext.get(this.id).query(".pimcore_editable_link_text")[0].innerHTML = this.getLinkContent();

        this.reload();
    },

    reload : function () {
        if (this.config.reload) {
            this.reloadDocument();
        }
    },

    empty: function () {

        // enable the global dnd dropzone again
        window.dndManager.enable();

        // close window
        this.window.close();

        this.data = this.defaultData;

        // set text
        Ext.get(this.id).query(".pimcore_editable_link_text")[0].innerHTML = this.getLinkContent();
    },

    cancel: function () {

        // enable the global dnd dropzone again
        window.dndManager.enable();

        this.window.close();
    },

    getValue: function () {
        return this.data;
    },

    getType: function () {
        return "link";
    }
});


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

pimcore.registerNS("pimcore.document.editables.select");
pimcore.document.editables.select = Class.create(pimcore.document.editable, {

    initialize: function(id, name, config, data, inherited) {
        this.id = id;
        this.name = name;

        config = this.parseConfig(config);

        config.listeners = {};

        if (config["reload"]) {
            config.listeners.select = this.reloadDocument;
        }

        config.name = id + "_editable";
        config.triggerAction = 'all';
        config.editable = false;
        config.value = data;

        this.config = config;
    },

    render: function() {
        this.setupWrapper();
        this.element = new Ext.form.ComboBox(this.config);
        this.element.render(this.id);
    },

    getValue: function () {
        if(this.element) {
            return this.element.getValue();
        }

        return this.config.value;
    },

    getType: function () {
        return "select";
    }
});


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

pimcore.registerNS("pimcore.document.editables.snippet");
pimcore.document.editables.snippet = Class.create(pimcore.document.editable, {

    initialize: function(id, name, config, data, inherited) {
        this.id = id;
        this.name = name;
        this.config = this.parseConfig(config);
        this.data = {};
        if (data) {
            this.data = data;
        }

        // height management                
        this.defaultHeight = 100;
        if (this.config.defaultHeight) {
            this.defaultHeight = this.config.defaultHeight;
        }
        if (!this.config.height && !this.data.path) {
            this.config.height = this.defaultHeight;
        }

        this.config.name = id + "_editable";
        this.config.border = false;
        this.config.bodyStyle = "min-height: 40px;";
    },

    render: function () {
        this.setupWrapper();

        this.element = new Ext.Panel(this.config);

        this.element.on("render", function (el) {
            try {
                if (typeof dndManager != "undefined") {
                    dndManager.addDropTarget(el.getEl(), this.onNodeOver.bind(this), this.onNodeDrop.bind(this));
                }

                var body = this.getBody();
                var style = {
                    overflow: "auto"

                };
                body.setStyle(style);
                body.getFirstChild().setStyle(style);

                body.insertHtml("beforeEnd", '<div class="pimcore_editable_droptarget"></div>');
                body.addCls("pimcore_editable_snippet_empty");

                el.getEl().on("contextmenu", this.onContextMenu.bind(this));
            } catch (e) {
                console.log(e);
            }

        }.bind(this));

        this.element.render(this.id);

        if (this.data.path) {
            this.updateContent(this.data.path);
        }
    },

    onNodeDrop: function (target, dd, e, data) {
        if(!pimcore.helpers.dragAndDropValidateSingleItem(data)) {
            return false;
        }

        data = data.records[0].data;

        if (this.dndAllowed(data)) {
            // get path from nodes data
            var uri = data.path;

            this.data.id = data.id;
            this.data.path = uri;

            if (this.config.reload) {
                this.reloadDocument();
            } else {
                this.updateContent(uri);
            }

            return true;
        }
    },

    onNodeOver: function(target, dd, e, data) {
        if (data.records.length === 1 && this.dndAllowed(data.records[0].data)) {
            return Ext.dd.DropZone.prototype.dropAllowed;
        }
        else {
            return Ext.dd.DropZone.prototype.dropNotAllowed;
        }
    },

    dndAllowed: function(data) {

        if (data.type != "snippet") {
            return false;
        } else {
            return true;
        }
    },

    getBody: function () {
        // get the id from the body element of the panel because there is no method to set body's html
        // (only in configure)
        var bodyId = Ext.get(this.element.getEl().dom).query("." + Ext.baseCSSPrefix + "panel-body")[0].getAttribute("id");
        var body = Ext.get(bodyId);
        return body;
    },

    updateContent: function (path) {

        var params = this.config;
        params.pimcore_admin = true;

        Ext.Ajax.request({
            method: "get",
            url: path,
            success: function (response) {
                var body = this.getBody();
                body.getFirstChild().dom.innerHTML = response.responseText;
                body.insertHtml("beforeEnd",'<div class="pimcore_editable_droptarget"></div>');
                this.updateDimensions();
            }.bind(this),
            params: params
        });
    },

    updateDimensions: function () {
        var body = this.getBody();
        var parent = body.getParent();
        this.element.getEl().setStyle("height", "auto");
        body.setStyle("height", "auto");
        parent.setStyle("height", "auto");
        body.removeCls("pimcore_editable_snippet_empty");
    },

    onContextMenu: function (e) {

        var menu = new Ext.menu.Menu();

        if(this.data["id"]) {
            menu.add(new Ext.menu.Item({
                text: t('empty'),
                iconCls: "pimcore_icon_delete",
                handler: function (item) {
                    item.parentMenu.destroy();

                    var height = this.config.height;
                    if (!height) {
                        height = this.defaultHeight;
                    }

                    this.element.setHeight(height);

                    this.data = {};
                    var body = this.getBody();
                    body.getFirstChild().dom.innerHTML = '';
                    body.insertHtml("beforeEnd",'<div class=" pimcore_editable_droptarget"></div>');
                    body.addCls("pimcore_editable_snippet_empty");
                    body.setStyle(height + "px");

                    if (this.config.reload) {
                        this.reloadDocument();
                    }

                }.bind(this)
            }));

            menu.add(new Ext.menu.Item({
                text: t('open'),
                iconCls: "pimcore_icon_open",
                handler: function (item) {
                    item.parentMenu.destroy();

                    pimcore.helpers.openDocument(this.data.id, "snippet");

                }.bind(this)
            }));

            if (pimcore.elementservice.showLocateInTreeButton("document")) {
                menu.add(new Ext.menu.Item({
                    text: t('show_in_tree'),
                    iconCls: "pimcore_icon_show_in_tree",
                    handler: function (item) {
                        item.parentMenu.destroy();
                        pimcore.treenodelocator.showInTree(this.data.id, "document");
                    }.bind(this)
                }));
            }
        }
        
        menu.add(new Ext.menu.Item({
            text: t('search'),
            iconCls: "pimcore_icon_search",
            handler: function (item) {
                item.parentMenu.destroy();
                
                this.openSearchEditor();
            }.bind(this)
        }));


        menu.showAt(e.getXY());

        e.stopEvent();
    },
    
    openSearchEditor: function () {

        pimcore.helpers.itemselector(false, this.addDataFromSelector.bind(this), {
            type: ["document"],
            subtype: {
                document: ["snippet"]
            }
        },
            {
                context: this.getContext()
            });
    },
    
    addDataFromSelector: function (item) {
        
        if(item) {
            var uri = item.fullpath;
    
            this.data.id = item.id;
            this.data.path = uri;

            if (this.config.reload) {
                this.reloadDocument();
            } else {
                this.updateContent(uri);
            }
        }
    },

    getValue: function () {
        return this.data.id;
    },

    getType: function () {
        return "snippet";
    }
});


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

pimcore.registerNS("pimcore.document.editables.textarea");
pimcore.document.editables.textarea = Class.create(pimcore.document.editable, {

    initialize: function(id, name, config, data, inherited) {
        this.id = id;
        this.name = name;
        this.config = this.parseConfig(config);

        if (!data) {
            data = "";
        }

        this.data = str_replace("\n","<br>", data);

        if(this.config["required"]) {
            this.required = this.config["required"];
        }
    },

    render: function () {
        this.setupWrapper();
        this.element = Ext.get(this.id);
        this.element.dom.setAttribute("contenteditable", true);

        this.element.update(this.data);

        this.checkValue();

        this.element.on("keyup", this.checkValue.bind(this, true));
        this.element.on("keydown", function (e, t, o) {

            if(e.getCharCode() == 13) {

                if (window.getSelection) {
                    var selection = window.getSelection(),
                        range = selection.getRangeAt(0),
                        br = document.createElement("br"),
                        textNode = document.createTextNode("\u00a0"); //Passing " " directly will not end up being shown correctly
                    range.deleteContents();//required or not?
                    range.insertNode(br);
                    range.collapse(false);
                    range.insertNode(textNode);
                    range.selectNodeContents(textNode);

                    selection.removeAllRanges();
                    selection.addRange(range);
                }

                e.stopEvent();
            }
        });

        this.element.dom.addEventListener("paste", function(e) {
            e.preventDefault();

            var text = "";
            if(e.clipboardData) {
                text = e.clipboardData.getData("text/plain");
            } else if (window.clipboardData) {
                text = window.clipboardData.getData("Text");
            }

            text = htmlentities(text, 'ENT_NOQUOTES', null, false);
            text = trim(text);

            try {
                pimcore.edithelpers.pasteHtmlAtCaret(text);
            } catch (e) {
                console.log(e);
            }
        }.bind(this));

        if(this.config["width"] || this.config["height"]) {
            this.element.applyStyles({
                display: "inline-block",
                overflow: "auto"
            });
        }
        if(this.config["width"]) {
            this.element.applyStyles({
                width: this.config["width"] + "px"
            })
        }
        if(this.config["height"]) {
            this.element.applyStyles({
                height: this.config["height"] + "px"
            })
        }
        if (this.config["placeholder"]) {
            this.element.dom.setAttribute('data-placeholder', this.config["placeholder"]);
        }
    },

    checkValue: function (mark) {
        var value = this.element.dom.innerHTML;

        if(trim(strip_tags(value)).length < 1) {
            this.element.addCls("empty");
        } else {
            this.element.removeCls("empty");
        }

        if (this.required) {
            this.validateRequiredValue(value, this.element, this, mark);
        }
    },

    getValue: function () {

        let value = this.data;
        if(this.element) {
            value = this.element.dom.innerHTML;
        }

        value = strip_tags(value, '<br>'); // strip out nasty HTML, eg. inserted by highlighting feature (ExtJS masks)
        value = value.replace(/<br>/g, "\n");
        value = trim(value);
        return value;
    },

    getType: function () {
        return "textarea";
    },

    setInherited: function($super, inherited, el) {

        $super(inherited, el);

        if(this.inherited) {
            this.element.dom.setAttribute("contenteditable", false);
        } else {
            this.element.dom.setAttribute("contenteditable", true);
        }
    }
});



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

pimcore.registerNS("pimcore.document.editables.numeric");
pimcore.document.editables.numeric = Class.create(pimcore.document.editable, {

    initialize: function(id, name, config, data, inherited) {
        this.id = id;
        this.name = name;
        config = this.parseConfig(config);

        if ('number' !== typeof data && !data) {
            data = "";
        }

        config.value = data;
        config.name = id + "_editable";
        config.decimalPrecision = 20;

        if(config["required"]) {
            this.required = config["required"];
        }

        this.config = config;
    },

    render: function () {
        this.setupWrapper();
        this.element = new Ext.form.field.Number(this.config);
        this.element.render(this.id);

        this.checkValue();
        this.element.on("blur", this.checkValue.bind(this, true));
    },

    getValue: function () {
        if(this.element) {
            return this.element.getValue();
        }

        return this.config.value;
    },

    getType: function () {
        return "numeric";
    },

    checkValue: function (mark) {
        var value = this.getValue();

        if(Number(value) < 1) {
            this.element.addCls("empty");
        } else {
            this.element.removeCls("empty");
        }

        if (this.required) {
            this.validateRequiredValue(value, this.element, this, mark);
        }
    }
});



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

/*global CKEDITOR*/
pimcore.registerNS("pimcore.document.editables.wysiwyg");
pimcore.document.editables.wysiwyg = Class.create(pimcore.document.editable, {

    type: "wysiwyg",

    initialize: function(id, name, config, data, inherited) {

        this.id = id;
        this.name = name;
        config = this.parseConfig(config);

        if (!data) {
            data = "";
        }
        this.data = data;
        this.config = config;
        this.inherited = inherited;

        if(config["required"]) {
            this.required = config["required"];
        }
    },

    render: function () {
        this.setupWrapper();

        this.textarea = document.createElement("div");
        this.textarea.setAttribute("contenteditable","true");

        Ext.get(this.id).appendChild(this.textarea);
        Ext.get(this.id).insertHtml("beforeEnd",'<div class="pimcore_editable_droptarget"></div>');

        this.textarea.id = this.id + "_textarea";
        this.textarea.innerHTML = this.data;

        let textareaHeight = 100;
        if (this.config.height) {
            textareaHeight = this.config.height;
        }
        if (this.config.placeholder) {
            this.textarea.setAttribute('data-placeholder', this.config["placeholder"]);
        }

        let inactiveContainerWidth = this.config.width + "px";
        if (typeof this.config.width == "string" && this.config.width.indexOf("%") >= 0) {
            inactiveContainerWidth = this.config.width;
        }

        Ext.get(this.textarea).addCls("pimcore_wysiwyg");
        Ext.get(this.textarea).applyStyles("width: " + inactiveContainerWidth  + "; min-height: " + textareaHeight
            + "px;");

        // register at global DnD manager
        if (typeof dndManager !== 'undefined') {
            dndManager.addDropTarget(Ext.get(this.id), this.onNodeOver.bind(this), this.onNodeDrop.bind(this));
        }

        this.startCKeditor();
        this.checkValue();
    },

    startCKeditor: function () {

        try {
            CKEDITOR.config.language = pimcore.globalmanager.get("user").language;
            var eConfig = {};
            var specificConfig = Object.assign({}, this.config);

            // if there is no toolbar defined use Full which is defined in CKEDITOR.config.toolbar_Full, possible
            // is also Basic
            if(!this.config["toolbarGroups"] && this.config['toolbarGroups'] !== false){
                eConfig.toolbarGroups = [
                    { name: 'basicstyles', groups: [ 'undo', "find", 'basicstyles', 'list'] },
                    '/',
                    { name: 'paragraph', groups: [ 'align', 'indent'] },
                    { name: 'blocks' },
                    { name: 'links' },
                    { name: 'insert' },
                    "/",
                    { name: 'styles' },
                    { name: 'tools', groups: ['colors', "tools", 'cleanup', 'mode', "others"] }
                ];
            }
            
            delete specificConfig.width;

            eConfig.language = pimcore.settings["language"];
            eConfig.entities = false;
            eConfig.entities_greek = false;
            eConfig.entities_latin = false;
            eConfig.extraAllowedContent = "*[pimcore_type,pimcore_id]";

            if(typeof(pimcore.document.editables.wysiwyg.defaultEditorConfig) == 'object'){
                eConfig = mergeObject(eConfig, pimcore.document.editables.wysiwyg.defaultEditorConfig);
            }

            eConfig = mergeObject(eConfig, specificConfig);

            this.ckeditor = CKEDITOR.inline(this.textarea, eConfig);

            this.ckeditor.on('change', this.checkValue.bind(this, true));

                // disable URL field in image dialog
            this.ckeditor.on("dialogShow", function (e) {
                var urlField = e.data.getElement().findOne("input");
                if(urlField && urlField.getValue()) {
                    if(urlField.getValue().indexOf("/image-thumbnails/") > 1) {
                        urlField.getParent().getParent().getParent().hide();
                    }
                } else if (urlField) {
                    urlField.getParent().getParent().getParent().show();
                }
            });

            // force paste dialog to prevent security message on various browsers
            this.ckeditor.on('beforeCommandExec', function(event) {
                if (event.data.name === 'paste') {
                    event.editor._.forcePasteDialog = true;
                }

                if (event.data.name === 'pastetext' && event.data.commandData.from === 'keystrokeHandler') {
                    event.cancel();
                }
            });

            this.ckeditorReady = false;
            this.ckeditor.on("instanceReady", function() {
                this.ckeditorReady = true;
            }.bind(this));
        }
        catch (e) {
            console.log(e);
        }
    },

    onNodeDrop: function (target, dd, e, data) {

        if(!pimcore.helpers.dragAndDropValidateSingleItem(data)) {
            return false;
        }

        var record = data.records[0];
        data = record.data;

        if (!this.ckeditor || !this.dndAllowed(data) || this.inherited) {
            return;
        }

        // we have to foxus the editor otherwise an error is thrown in the case the editor wasn't opend before a drop element
        this.ckeditor.focus();

        var wrappedText = data.text;
        var textIsSelected = false;

        try {
            var selection = this.ckeditor.getSelection();
            var bookmarks = selection.createBookmarks();
            var range = selection.getRanges()[ 0 ];
            var fragment = range.clone().cloneContents();

            selection.selectBookmarks(bookmarks);
            var retval = "";
            var childList = fragment.getChildren();
            var childCount = childList.count();

            for (var i = 0; i < childCount; i++) {
                var child = childList.getItem(i);
                retval += ( child.getOuterHtml ?
                        child.getOuterHtml() : child.getText() );
            }

            if (retval.length > 0) {
                wrappedText = retval;
                textIsSelected = true;
            }
        }
        catch (e2) {
        }

        // remove existing links out of the wrapped text
        wrappedText = wrappedText.replace(/<\/?([a-z][a-z0-9]*)\b[^>]*>/gi, function ($0, $1) {
            if($1.toLowerCase() == "a") {
                return "";
            }
            return $0;
        });

        var insertEl = null;
        var id = data.id;
        var uri = data.path;
        var browserPossibleExtensions = ["jpg","jpeg","gif","png"];

        if (data.elementType == "asset") {
            if (data.type == "image" && textIsSelected == false) {
                // images bigger than 600px or formats which cannot be displayed by the browser directly will be
                // converted by the pimcore thumbnailing service so that they can be displayed in the editor
                var defaultWidth = 600;
                var additionalAttributes = "";

                if(typeof data.imageWidth != "undefined") {
                    var route = 'pimcore_admin_asset_getimagethumbnail';
                    var params = {
                        id: id,
                        width: defaultWidth,
                        aspectratio: true
                    };

                    uri = Routing.generate(route, params);

                    if(data.imageWidth < defaultWidth
                            && in_arrayi(pimcore.helpers.getFileExtension(data.text),
                                        browserPossibleExtensions)) {
                        uri = data.path;
                        additionalAttributes += ' pimcore_disable_thumbnail="true"';
                    }

                    if(data.imageWidth < defaultWidth) {
                        defaultWidth = data.imageWidth;
                    }

                    additionalAttributes += ' style="width:' + defaultWidth + 'px;"';
                }

                insertEl = CKEDITOR.dom.element.createFromHtml('<img src="'
                            + uri + '" pimcore_type="asset" pimcore_id="' + id + '" ' + additionalAttributes + ' />');
                this.ckeditor.insertElement(insertEl);
                return true;
            }
            else {
                insertEl = CKEDITOR.dom.element.createFromHtml('<a href="' + uri
                            + '" target="_blank" pimcore_type="asset" pimcore_id="' + id + '">' + wrappedText + '</a>');
                this.ckeditor.insertElement(insertEl);
                return true;
            }
        }

        if (data.elementType == "document" && (data.type=="page"
                            || data.type=="hardlink" || data.type=="link")){
            insertEl = CKEDITOR.dom.element.createFromHtml('<a href="' + uri + '" pimcore_type="document" pimcore_id="'
                                                                        + id + '">' + wrappedText + '</a>');
            this.ckeditor.insertElement(insertEl);
            return true;
        }

        if (data.elementType == "object"){
            insertEl = CKEDITOR.dom.element.createFromHtml('<a href="' + uri + '" pimcore_type="object" pimcore_id="'
                + id + '">' + wrappedText + '</a>');
            this.ckeditor.insertElement(insertEl);
            return true;
        }

    },

    checkValue: function (mark) {

        var value = this.getValue();

        if(trim(strip_tags(value)).length < 1) {
            Ext.get(this.textarea).addCls("empty");
        } else {
            Ext.get(this.textarea).removeCls("empty");
        }


        if (this.required) {
            this.validateRequiredValue(value, Ext.get(this.textarea), this, mark);
        }
    },

    onNodeOver: function(target, dd, e, data) {
        if (data.records.length === 1 && this.dndAllowed(data.records[0].data) && !this.inherited) {
            return Ext.dd.DropZone.prototype.dropAllowed;
        }
        else {
            return Ext.dd.DropZone.prototype.dropNotAllowed;
        }
    },


    dndAllowed: function(data) {

        if (data.elementType == "document" && (data.type=="page"
                            || data.type=="hardlink" || data.type=="link")){
            return true;
        } else if (data.elementType=="asset" && data.type != "folder"){
            return true;
        } else if (data.elementType=="object" && data.type != "folder"){
            return true;
        }

        return false;
    },


    getValue: function () {

        var value = this.data;

        if (this.ckeditorReady && this.ckeditor) {
            value = this.ckeditor.getData();
        }

        this.data = value;

        return value;
    },

    getType: function () {
        return "wysiwyg";
    }
});

CKEDITOR.disableAutoInline = true;



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

pimcore.registerNS("pimcore.document.editables.renderlet");
pimcore.document.editables.renderlet = Class.create(pimcore.document.editable, {

    defaultHeight: 100,

    initialize: function(id, name, config, data, inherited) {
        this.id = id;
        this.name = name;
        this.config = this.parseConfig(config);


        //TODO maybe there is a nicer way, the Panel doesn't like this
        this.controller = config.controller;
        delete(config.controller);

        this.data = {};
        if (data) {
            this.data = data;
        }

        // height management
        this.defaultHeight = 100;
        if (this.config.defaultHeight) {
            this.defaultHeight = this.config.defaultHeight;
        }
        if (!this.config.height) {
            this.config.height = this.defaultHeight;
        }

        this.config.name = id + "_editable";
        this.config.border = false;
        this.config.bodyStyle = "min-height: 40px;";
    },

    render: function() {
        this.setupWrapper();

        this.element = new Ext.Panel(this.config);
        this.element.on("render", function (el) {

            // register at global DnD manager
            dndManager.addDropTarget(el.getEl(), this.onNodeOver.bind(this), this.onNodeDrop.bind(this));

            this.getBody().setStyle({
                overflow: "auto"
            });

            this.getBody().insertHtml("beforeEnd",'<div class="pimcore_editable_droptarget"></div>');
            this.getBody().addCls("pimcore_editable_snippet_empty");

            el.getEl().on("contextmenu", this.onContextMenu.bind(this));

        }.bind(this));

        this.element.render(this.id);

        if (this.data.id) {
            this.updateContent();
        }
    },

    onNodeDrop: function (target, dd, e, data) {

        if(!pimcore.helpers.dragAndDropValidateSingleItem(data)) {
            return false;
        }

        var record = data.records[0];
        data = record.data;

        this.data.id = data.id;
        this.data.type = data.elementType;
        this.data.subtype = data.type;

        if (this.config.type) {
            if (this.config.type != data.elementType) {
                return false;
            }
        }

        if (this.config.className) {
            if(Array.isArray(this.config.className)) {
                if (this.config.className.indexOf(data.className) < 0) {
                    return false;
                }
            } else {
                if (this.config.className != data.className) {
                    return false;
                }
            }
        }

        if (this.config.reload) {
            this.reloadDocument();
        } else {
            this.updateContent();
        }

        return true;
    },

    onNodeOver: function(target, dd, e, data) {
        if (data.records.length !== 1) {
            return false;
        }

        data = data.records[0].data;
        if (this.config.type) {
            if (this.config.type != data.elementType) {
                return false;
            }
        }

        if (this.config.className) {
            if(Array.isArray(this.config.className)) {
                if (this.config.className.indexOf(data.className) < 0) {
                    return false;
                }
            } else {
                if (this.config.className != data.className) {
                    return false;
                }
            }
        }

        return Ext.dd.DropZone.prototype.dropAllowed;
    },

    getBody: function () {
        // get the id from the body element of the panel because there is no method to set body's html
        // (only in configure)
        var bodyId = this.element.getEl().query("." + Ext.baseCSSPrefix + "panel-body")[0].getAttribute("id");
        return Ext.get(bodyId);
    },

    updateContent: function () {
        var self = this;

        this.getBody().removeCls("pimcore_editable_snippet_empty");
        this.getBody().dom.innerHTML = '<br />&nbsp;&nbsp;Loading ...';

        var params = this.data;
        params.controller = this.controller;
        Ext.apply(params, this.config);

        try {
            // add the id of the current document, so that the renderlet knows in which document it is embedded
            // this information is then grabbed in Pimcore_Controller_Action_Frontend::init() to set the correct locale
            params["pimcore_parentDocument"] = window.editWindow.document.id;
        } catch (e) {
        }

        if ('undefined' !== typeof window.editWindow.targetGroup && window.editWindow.targetGroup.getValue()) {
            params['_ptg'] = window.editWindow.targetGroup.getValue();
        }

        var setContent = function(content) {
            self.getBody().dom.innerHTML = content;
            self.getBody().insertHtml("beforeEnd",'<div class="pimcore_editable_droptarget"></div>');
            self.updateDimensions();
        };

        Ext.Ajax.request({
            method: "get",
            url: Routing.generate('pimcore_admin_document_renderlet_renderlet'),
            success: function (response) {
                setContent(response.responseText);
            }.bind(this),

            failure: function(response) {
                var message = response.responseText;

                try {
                    var json = Ext.decode(response.responseText);
                    if (json && 'undefined' !== typeof json.message) {
                        message = '<strong style="color:red">' + json.message + '</strong>';
                    }
                } catch (e) {
                    // noop - fall back to responseText
                }

                message = '<br />&nbsp;&nbsp;' + message;

                setContent(message);
            }.bind(this),

            params: params
        });
    },

    updateDimensions: function () {
        this.getBody().setStyle({
            height: "auto"
        });
    },

    onContextMenu: function (e) {

        var menu = new Ext.menu.Menu();

        if(this.data["id"]) {
            menu.add(new Ext.menu.Item({
                text: t('empty'),
                iconCls: "pimcore_icon_delete",
                handler: function () {
                    var height = this.config.height;
                    if (!height) {
                        height = this.defaultHeight;
                    }
                    this.data = {};
                    this.getBody().update('');
                    this.getBody().insertHtml("beforeEnd",'<div class="pimcore_editable_droptarget"></div>');
                    this.getBody().addCls("pimcore_editable_snippet_empty");
                    this.getBody().setHeight(height + "px");

                    if (this.config.reload) {
                        this.reloadDocument();
                    }

                }.bind(this)
            }));

            menu.add(new Ext.menu.Item({
                text: t('open'),
                iconCls: "pimcore_icon_open",
                handler: function () {
                    if(this.data.id) {
                        pimcore.helpers.openElement(this.data.id, this.data.type, this.data.subtype);
                    }
                }.bind(this)
            }));

            if (pimcore.elementservice.showLocateInTreeButton("document")) {
                menu.add(new Ext.menu.Item({
                    text: t('show_in_tree'),
                    iconCls: "pimcore_icon_show_in_tree",
                    handler: function (item) {
                        item.parentMenu.destroy();
                        pimcore.treenodelocator.showInTree(this.data.id, this.data.type);
                    }.bind(this)
                }));
            }
        }

        menu.add(new Ext.menu.Item({
            text: t('search'),
            iconCls: "pimcore_icon_search",
            handler: function (item) {
                item.parentMenu.destroy();

                this.openSearchEditor();
            }.bind(this)
        }));


        menu.showAt(e.getXY());

        e.stopEvent();
    },

    openSearchEditor: function () {
        var restrictions = {};

        if (this.config.type) {
            restrictions.type = [this.config.type];
        }
        if (this.config.className) {
            restrictions.specific = {
                classes: [this.config.className]
            };
        }

        pimcore.helpers.itemselector(false, this.addDataFromSelector.bind(this), restrictions, {
            context: this.getContext()
        });
    },

    addDataFromSelector: function (item) {
        if(item) {
            this.data.id = item.id;
            this.data.type = item.type;
            this.data.subtype = item.subtype;

            if (this.config.reload) {
                this.reloadDocument();
            } else {
                this.updateContent();
            }
        }
    },

    getValue: function () {
        return this.data;
    },

    getType: function () {
        return "renderlet";
    }
});



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

pimcore.registerNS("pimcore.document.editables.table");
pimcore.document.editables.table = Class.create(pimcore.document.editable, {

    initialize: function(id, name, config, data, inherited) {

        this.id = id;
        this.name = name;
        config = this.parseConfig(config);

        if (!data) {
            data = [
                [" "]
            ];
            if (config.defaults) {
                if (config.defaults.cols) {
                    for (let i = 0; i < (config.defaults.cols - 1); i++) {
                        data[0].push(" ");
                    }
                }
                if (config.defaults.rows) {
                    for (let i = 0; i < (config.defaults.rows - 1); i++) {
                        data.push(data[0]);
                    }
                }
                if (config.defaults.data) {
                    data = config.defaults.data;
                }
            }
        }

        delete config["height"];

        this.config = config;

        this.initStore(data);
    },

    refreshStoreGrid: function (data) {
        this.initStore(data);
        this.render();
    },

    render: function() {
        if (this.grid) {
            this.grid.destroy();
        }
        this.setupWrapper();

        var data = this.store.queryBy(function(record, id) {
            return true;
        });
        var columns = [];

        var fields = this.store.getInitialConfig().fields;

        if (data.items[0]) {
            for (var i = 0; i < fields.length; i++) {
                columns.push({
                    dataIndex: fields[i].name,
                    editor: new Ext.form.TextField({
                        allowBlank: true
                    }),
                    hideable: false,
                    sortable: false
                });
            }
        }

        this.cellEditing = Ext.create('Ext.grid.plugin.CellEditing', {
            clicksToEdit: 1
        });

        let gridConfig = array_merge(this.config, {
            name: this.id + "_editable",
            store: this.store,
            border: true,
            columns:columns,
            stripeRows: true,
            columnLines: true,
            selModel: Ext.create('Ext.selection.CellModel'),
            manageHeight: false,
            plugins: [
                this.cellEditing
            ],
            tbar: [
                {
                    iconCls: "pimcore_icon_table_col pimcore_icon_overlay_add",
                    handler: this.addColumn.bind(this)
                },
                {
                    iconCls: "pimcore_icon_table_col pimcore_icon_overlay_delete",
                    handler: this.deleteColumn.bind(this)
                },
                {
                    iconCls: "pimcore_icon_table_row pimcore_icon_overlay_add",
                    handler: this.addRow.bind(this)
                },
                {
                    iconCls: "pimcore_icon_table_row pimcore_icon_overlay_delete",
                    handler: this.deleteRow.bind(this)
                },
                {
                    iconCls: "pimcore_icon_empty",
                    handler: this.refreshStoreGrid.bind(this, [
                        [" "]
                    ])
                }
            ]
        });

        this.grid = Ext.create('Ext.grid.Panel', gridConfig);
        this.grid.render(this.id);
    },

    initStore: function (data) {
        var storeFields = [];
        if (data[0]) {
            for (var i = 0; i < data[0].length; i++) {
                storeFields.push({
                    name: "col_" + i
                });
            }
        }

        this.store = new Ext.data.ArrayStore({
            fields: storeFields
        });

        this.store.loadData(data);
    },

    addColumn : function  () {

        var currentData = this.getValue();

        for (var i = 0; i < currentData.length; i++) {
            currentData[i].push(" ");
        }

        this.refreshStoreGrid(currentData);
    },

    addRow: function  () {
        var initData = {};

        var columnnManager = this.grid.getColumnManager();
        var columns = columnnManager.getColumns();

        for (var o = 0; o < columns.length; o++) {
            initData["col_" + o] = " ";
        }

        this.store.add(initData);
    },

    deleteRow : function  () {
        var selected = this.grid.getSelectionModel();
        if (selected.selection) {
            this.store.remove(selected.selection.record);
            this.grid.editingPlugin.view.refresh();  // Prevents the editor from being garbage collected
        }
    },

    deleteColumn: function () {
        var selected = this.grid.getSelectionModel();

        if (selected.selection) {
            var column = selected.selection.colIdx;

            var currentData = this.getValue();

            for (var i = 0; i < currentData.length; i++) {
                currentData[i].splice(column, 1);
            }

            this.refreshStoreGrid(currentData);
        }
    },

    getValue: function () {
        var data = this.store.queryBy(function(record, id) {
            return true;
        });

        var fields = this.store.getInitialConfig().fields;

        var storedData = [];
        var tmData = [];
        for (var i = 0; i < data.items.length; i++) {
            tmData = [];

            for (var u = 0; u < fields.length; u++) {
                tmData.push(data.items[i].data[fields[u].name]);
            }
            storedData.push(tmData);
        }

        return storedData;
    },

    getType: function () {
        return "table";
    }
});


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

pimcore.registerNS("pimcore.document.editables.video");
pimcore.document.editables.video = Class.create(pimcore.document.editable, {

    initialize: function(id, name, config, data, inherited) {
        this.id = id;
        this.name = name;
        this.inherited = inherited;

        this.config = this.parseConfig(config);
        this.data = data;
    },

    render: function () {
        this.setupWrapper();

        var element = Ext.get("pimcore_video_" + this.name);

        var button = new Ext.Button({
            iconCls: "pimcore_icon_edit",
            cls: "pimcore_edit_link_button",
            handler: this.openEditor.bind(this)
        });
        button.render(element.insertHtml("afterBegin", '<div class="pimcore_video_edit_button"></div>'));
        if (this.inherited) {
            button.hide();
        }
        this.button = button;
        var emptyContainer = element.query(".pimcore_editable_video_empty")[0];
        if(emptyContainer) {
            emptyContainer = Ext.get(emptyContainer);
            emptyContainer.on("click", this.openEditor.bind(this));
        }
    },

    openEditor: function () {

        // disable the global dnd handler in this editmode/frame
        window.dndManager.disable();

        this.window = pimcore.helpers.editmode.openVideoEditPanel(this.data, {
            save: this.save.bind(this),
            cancel: this.cancel.bind(this)
        });
    },

    save: function () {

        // enable the global dnd dropzone again
        window.dndManager.enable();

        // close window
        this.window.hide();

        var values = this.window.getComponent("form").getForm().getFieldValues();
        this.data = values;



        this.reloadDocument();
    },

    cancel: function () {

        // enable the global dnd dropzone again
        window.dndManager.enable();

        this.window.hide();
    },

    getValue: function () {
        return this.data;
    },

    getType: function () {
        return "video";
    },

    setInherited: function(inherited, el) {
        this.inherited = inherited;

        // if an element given is as optional second parameter we use this for the mask
        if(!(el instanceof Ext.Element)) {
            el = Ext.get(this.id);
        }

        // check for inherited elements, and mask them if necessary
        if(this.inherited) {
            var mask = el.mask();
            new Ext.ToolTip({
                target: mask,
                showDelay: 100,
                trackMouse:true,
                html: t("click_right_to_overwrite")
            });
            mask.on("contextmenu", function (e) {
                var menu = new Ext.menu.Menu();
                menu.add(new Ext.menu.Item({
                    text: t('overwrite'),
                    iconCls: "pimcore_icon_overwrite",
                    handler: function (item) {
                        this.button.show();
                        this.setInherited(false);
                    }.bind(this)
                }));
                menu.showAt(e.getXY());

                e.stopEvent();
            }.bind(this));
        } else {
            el.unmask();
        }
    },
});


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

pimcore.registerNS("pimcore.document.editables.multiselect");
pimcore.document.editables.multiselect = Class.create(pimcore.document.editable, {

    initialize: function(id, name, config, data, inherited) {
        this.id = id;
        this.name = name;
        this.data = data;

        config = this.parseConfig(config);
        config.name = id + "_editable";
        if(data) {
            config.value = data;
        }
        config.valueField = "id";

        config.listeners = {};

        if (config["reload"]) {
            config.listeners.change = this.reloadDocument;
        }

        if (typeof config.store !== "undefined") {
            config.store = Ext.create('Ext.data.ArrayStore', {
                fields: ['id', 'text'],
                data: config.store
            });
        }

        this.config = config;
    },

    render: function () {
        this.setupWrapper();
        this.element = Ext.create('Ext.ux.form.MultiSelect', this.config);
        this.element.render(this.id);
    },

    getValue: function () {
        if(this.element) {
            return this.element.getValue();
        }

        return this.data;
    },

    getType: function () {
        return "multiselect";
    }
});


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

pimcore.registerNS("pimcore.document.area_abstract");
pimcore.document.area_abstract = Class.create(pimcore.document.editable, {
    dialogBoxes: {},

    openEditableDialogBox: function (element, dialogBoxDiv) {
        let id = dialogBoxDiv.dataset.dialogId;
        let jsonConfig = document.getElementById('dialogBoxConfig-' + id).innerHTML;
        var config = JSON.parse(jsonConfig);

        var editablesInBox = this.getEditablesInDialogBox(id);
        let items = this.buildEditableDialogLayout(config["items"], editablesInBox, 1);

        if(!this.dialogBoxes[id]) {
            this.dialogBoxes[id] = new Ext.Window({
                closeAction: 'hide',
                width: Math.min(config["width"], Ext.getBody().getViewSize().width),
                height: Math.min(config["height"], Ext.getBody().getViewSize().height),
                items: items,
                bodyStyle: 'padding: 10px',
                scrollable: 'y',
                cls: 'pimcore_areablock_dialogBox',
                listeners: {
                    afterrender: function (win, eOpts) {
                        // render editables in window
                        // we need a bit of a timeout, since it seems the layout (especially when using tabs) isn't
                        // completely done in terms of the right dimensions, which has bad effects on the size
                        // of editables where the size matters, e.g. the image editable
                        window.setTimeout(function () {
                            Object.keys(editablesInBox).forEach(function (editableName) {
                                if (typeof editablesInBox[editableName]["renderInDialogBox"] === "function") {
                                    editablesInBox[editableName].renderInDialogBox();
                                } else {
                                    editablesInBox[editableName].render();
                                }
                            });
                        }, 200);
                    }
                },
                buttons: ['->', {
                    text: t("close"),
                    listeners: {
                        "click": function () {
                            this.dialogBoxes[id].close();
                            if(config["reloadOnClose"]) {
                                this.reloadDocument();
                            }
                        }.bind(this)
                    },
                    iconCls: "pimcore_icon_save"
                }]
            })
        }

        this.dialogBoxes[id].show();
    },

    getEditablesInDialogBox: function (id) {
        let editablesInDialogBox = {};
        Object.values(editableManager.getEditables()).forEach(editable => {
            if(editable.getInDialogBox() === id) {
                editablesInDialogBox[editable.getRealName()] = editable;
            }
        });

        return editablesInDialogBox;
    },

    buildEditableDialogLayout: function (config, editablesInBox, level) {
        var nextLevel = level+1;
        if(Array.isArray(config)) {
            var items = [];
            config.forEach(function (itemConfig) {
                let item = this.buildEditableDialogLayout(itemConfig, editablesInBox, nextLevel);
                if(item) {
                    items.push(item);
                }
            }.bind(this));

            if(level === 1) {
                return {
                    xtype: 'container',
                    items: items
                };
            }

            return items;
        } else if(editablesInBox[config['name']]) {
            let templateId = 'template__' + editablesInBox[config['name']].getId();
            var templateEl = document.getElementById(templateId);
            if(templateEl) {
                if(typeof editablesInBox[config['name']]['renderInDialogBox'] === "function") {
                    if (editablesInBox[config['name']]['config']) {
                        editablesInBox[config['name']]['config']['label'] = config['label'] ?? config['name'];
                    }
                    return {
                        xtype: 'container',
                        html: templateEl.innerHTML
                    };
                } else {
                    return {
                        xtype: 'fieldset',
                        title: config['label'] ?? config['name'],
                        html: templateEl.innerHTML
                    };
                }
            }
        } else if(config['items']) {
            let container = {
                xtype: config['type'],
                bodyStyle: 'padding: 10px',
                deferredRender: false,
                manageHeight: false,
                items: this.buildEditableDialogLayout(config['items'], editablesInBox, nextLevel)
            };
            let allowedConfigElements = [
                'layout',
                'flex',
                'defaults',
                'title'
            ];
            for (let i in allowedConfigElements) {
                let cfgElement = allowedConfigElements[i];
                if(config[cfgElement]) {
                    container[cfgElement] = config[cfgElement];
                }
            }

            return container;
        }
    },

});


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

pimcore.registerNS("pimcore.document.editables.areablock");
pimcore.document.editables.areablock = Class.create(pimcore.document.area_abstract, {

    dialogBoxes: {},

    initialize: function(id, name, config, data, inherited) {

        this.initalConfig = config;
        this.id = id;
        this.name = name;
        this.elements = [];
        this.config = this.parseConfig(config);
        this.toolbarGlobalVar = this.getType() + "toolbar";
        this.applyFallbackIcons();

        if(typeof this.config["toolbar"] == "undefined" || this.config["toolbar"] != false) {
            this.createToolBar();
        }

        this.visibilityButtons = {};

        // reload or not => default not
        if(typeof this.config["reload"] == "undefined") {
            this.config.reload = false;
        }

        if(!this.config['controlsTrigger']) {
            this.config['controlsTrigger'] = 'hover';
        }

        // type mapping
        this.typeNameMappings = {};
        this.allowedTypes = []; // this is for the toolbar to check if an brick can be dropped to this areablock
        for (var i=0; i<this.config.types.length; i++) {
            this.typeNameMappings[this.config.types[i].type] = {
                name: this.config.types[i].name,
                description: this.config.types[i].description,
                icon: this.config.types[i].icon
            };

            this.allowedTypes.push(this.config.types[i].type);
        }

        // click outside, hide all block buttons
        if(this.config['controlsTrigger'] === 'hover') {
            Ext.getBody().on('click', function (event) {
                if (Ext.get(id) && !Ext.get(id).isAncestor(event.target)) {
                    Ext.get(id).query('.pimcore_area_buttons', false).forEach(function (el) {
                        el.hide();
                    });
                }
            });
        }
    },

    refresh: function() {
        var plusButton, minusButton, upButton, downButton, optionsButton, plusDiv, minusDiv, upDiv, downDiv, optionsDiv,
            typeDiv, typeButton, labelText, editDiv, editButton, visibilityDiv, labelDiv, plusUpDiv, plusUpButton,
            dialogBoxDiv, dialogBoxButton;

        this.elements = Ext.get(this.id).query('.pimcore_block_entry[data-name="' + this.name + '"][key]');


        this.brickTypeUsageCounter = [];
        var limitReached = false;
        if(this.config["limit"] && this.elements.length >= this.config.limit) {
            limitReached = true;
        }


        if (this.elements.length < 1) {
            this.createInitalControls();
        }
        else {
            var hideTimeout, activeBlockEl;

            for (var i = 0; i < this.elements.length; i++) {

                this.elements[i].type = this.elements[i].getAttribute("type");
                this.brickTypeUsageCounter[this.elements[i].type] = this.brickTypeUsageCounter[this.elements[i].type]+1 || 1;

                if(this.elements[i].key) {
                    continue;
                }

                this.elements[i].key = this.elements[i].getAttribute("key");

                if(!limitReached) {
                    // plus buttons
                    plusUpDiv = Ext.get(this.elements[i]).query('.pimcore_block_plus_up[data-name="' + this.name + '"]')[0];
                    plusUpButton = new Ext.Button({
                        cls: "pimcore_block_button_plus",
                        iconCls: "pimcore_icon_plus_up",
                        arrowVisible: false,
                        menu: this.getTypeMenu(this, this.elements[i], "before")
                    });
                    plusUpButton.render(plusUpDiv);

                    plusDiv = Ext.get(this.elements[i]).query('.pimcore_block_plus[data-name="' + this.name + '"]')[0];
                    plusButton = new Ext.Button({
                        cls: "pimcore_block_button_plus",
                        iconCls: "pimcore_icon_plus_down",
                        arrowVisible: false,
                        menu: this.getTypeMenu(this, this.elements[i], "after")
                    });
                    plusButton.render(plusDiv);
                }

                // minus button
                minusDiv = Ext.get(this.elements[i]).query('.pimcore_block_minus[data-name="' + this.name + '"]')[0];
                minusButton = new Ext.Button({
                    cls: "pimcore_block_button_minus",
                    iconCls: "pimcore_icon_minus",
                    listeners: {
                        "click": this.removeBlock.bind(this, this.elements[i])
                    }
                });
                minusButton.render(minusDiv);

                // up button
                upDiv = Ext.get(this.elements[i]).query('.pimcore_block_up[data-name="' + this.name + '"]')[0];
                upButton = new Ext.Button({
                    cls: "pimcore_block_button_up",
                    iconCls: "pimcore_icon_white_up",
                    listeners: {
                        "click": this.moveBlockUp.bind(this, this.elements[i])
                    }
                });
                upButton.render(upDiv);

                // down button
                downDiv = Ext.get(this.elements[i]).query('.pimcore_block_down[data-name="' + this.name + '"]')[0];
                downButton = new Ext.Button({
                    cls: "pimcore_block_button_down",
                    iconCls: "pimcore_icon_white_down",
                    listeners: {
                        "click": this.moveBlockDown.bind(this, this.elements[i])
                    }
                });
                downButton.render(downDiv);

                typeDiv = Ext.get(this.elements[i]).query('.pimcore_block_type[data-name="' + this.name + '"]')[0];
                typeButton = new Ext.Button({
                    cls: "pimcore_block_button_type",
                    handleMouseEvents: false,
                    tooltip: t("drag_me"),
                    iconCls: "pimcore_icon_white_move",
                    style: "cursor: move;"
                });
                typeButton.on("afterrender", function (index, v) {

                    var element = this.elements[index];

                    v.dragZone = new Ext.dd.DragZone(v.getEl(), {
                        hasOuterHandles: true,
                        getDragData: function(e) {
                            var sourceEl = element;

                            // only use the button as proxy element
                            proxyEl = v.getEl().dom;

                            if (sourceEl) {
                                var d = proxyEl.cloneNode(true);
                                d.id = Ext.id();

                                return v.dragData = {
                                    sourceEl: sourceEl,
                                    repairXY: Ext.fly(sourceEl).getXY(),
                                    ddel: d
                                };
                            }
                        },

                        onStartDrag: this.startDragDrop.bind(this),
                        afterDragDrop: this.endDragDrop.bind(this),
                        afterInvalidDrop: this.endDragDrop.bind(this),
                        beforeDragOut: function (target) {
                            return target ? true : false;
                        },
                        getRepairXY: function() {
                            return this.dragData.repairXY;
                        }
                    });
                }.bind(this, i));
                typeButton.render(typeDiv);


                // option button
                optionsDiv = Ext.get(this.elements[i]).query('.pimcore_block_options[data-name="' + this.name + '"]')[0];
                optionsButton = new Ext.Button({
                    cls: "pimcore_block_button_options",
                    iconCls: "pimcore_icon_white_copy",
                    listeners: {
                        "click": this.optionsClickhandler.bind(this, this.elements[i])
                    }
                });
                optionsButton.render(optionsDiv);

                visibilityDiv = Ext.get(this.elements[i]).query('.pimcore_block_visibility[data-name="' + this.name + '"]')[0];
                this.visibilityButtons[this.elements[i].key] = new Ext.Button({
                    cls: "pimcore_block_button_visibility",
                    iconCls: "pimcore_icon_white_hide",
                    enableToggle: true,
                    pressed: (this.elements[i].dataset.hidden == "true"),
                    toggleHandler: function (index, el) {
                        Ext.get(this.elements[index]).toggleCls('pimcore_area_hidden');
                    }.bind(this, i)
                });
                this.visibilityButtons[this.elements[i].key].render(visibilityDiv);
                if(this.elements[i].dataset.hidden == "true") {
                    Ext.get(this.elements[i]).addCls('pimcore_area_hidden');
                }


                dialogBoxDiv = Ext.get(this.elements[i]).query('.pimcore_block_dialog[data-name="' + this.name + '"]')[0];
                if(dialogBoxDiv) {
                    dialogBoxButton = new Ext.Button({
                        cls: "pimcore_block_button_dialog",
                        iconCls: "pimcore_icon_white_edit",
                        listeners: {
                            "click": this.openEditableDialogBox.bind(this, this.elements[i], dialogBoxDiv)
                        }
                    });
                    dialogBoxButton.render(dialogBoxDiv);
                }

                labelDiv = Ext.get(Ext.get(this.elements[i]).query('.pimcore_block_label[data-name="' + this.name + '"]')[0]);
                labelText = "<b>"  + this.elements[i].type + "</b>";
                if(this.typeNameMappings[this.elements[i].type]
                    && typeof this.typeNameMappings[this.elements[i].type].name != "undefined") {
                    labelText = "<b>" + this.typeNameMappings[this.elements[i].type].name + "</b> "
                        + this.typeNameMappings[this.elements[i].type].description;
                }
                labelDiv.setHtml(labelText);


                var buttonContainer = Ext.get(this.elements[i]).selectNode('.pimcore_area_buttons', false);
                if (this.config['controlsAlign']) {
                    buttonContainer.addCls(this.config['controlsAlign']);
                } else {
                    // top is default
                    buttonContainer.addCls('top');
                }

                buttonContainer.addCls(this.config['controlsTrigger']);

                if(this.config['controlsTrigger'] === 'hover') {
                    Ext.get(this.elements[i]).on('mouseenter', function (event) {

                        if (Ext.dd.DragDropMgr.dragCurrent) {
                            return;
                        }

                        if (hideTimeout) {
                            window.clearTimeout(hideTimeout);
                        }

                        Ext.get(this.id).query('.pimcore_area_buttons', false).forEach(function (el) {
                            if (event.target != el.dom) {
                                el.hide();
                            }
                        });

                        var buttonContainer = Ext.get(event.target).selectNode('.pimcore_area_buttons', false);
                        buttonContainer.show();

                        if (activeBlockEl != event.target) {
                            Ext.menu.Manager.hideAll();
                        }
                        activeBlockEl = event.target;
                    }.bind(this));

                    Ext.get(this.elements[i]).on('mouseleave', function (event) {
                        hideTimeout = window.setTimeout(function () {
                            Ext.get(event.target).selectNode('.pimcore_area_buttons', false).hide();
                            hideTimeout = null;
                        }, 10000);
                    });
                }
            }
        }

        this.updateDropZones();
    },

    render: function () {
        this.refresh();
    },

    applyFallbackIcons: function() {
        // this contains fallback-icons
        var iconStore = ["circuit","display","biomass","deployment","electrical_sensor","dam",
            "light_at_the_end_of_tunnel","like","icons8_cup","sports_mode","landscape","selfie","cable_release",
            "bookmark","briefcase","graduation_cap","in_transit","diploma_2","circuit","display","biomass","deployment",
            "electrical_sensor","dam",
            "light_at_the_end_of_tunnel","like","icons8_cup","sports_mode","landscape","selfie","cable_release",
            "bookmark","briefcase","graduation_cap","in_transit","diploma_2"];

        if (this.config.types) {
            for (var i = 0; i < this.config.types.length; i++) {

                var brick = this.config.types[i];

                if (!brick.icon) {
                    brick.icon = "/bundles/pimcoreadmin/img/flat-color-icons/" + iconStore[i + 1] + ".svg";
                }
            }
        }
    },

    copyToClipboard: function (element) {

        var areaIdentifier = {
            name: this.getName(),
            realName: this.getRealName(),
            key: element.getAttribute("key")
        };

        var item = {
            identifier: areaIdentifier,
            type: element.getAttribute("type"),
            values: {}
        };

        // check which editables are inside this area and get the data
        Object.values(editableManager.getEditables()).forEach(editable => {
            try {
                if (!editable.getName()) {
                    return;
                }

                var editableData = this.copyData(areaIdentifier, editable);
                if (editableData) {
                    item.values[editable.getName()] = editableData;
                }
            } catch (e) {
                console.error(e);
            }
        });

        pimcore.globalmanager.add("areablock_clipboard", Ext.encode(item));
    },

    copyData: function (areaIdentifier, editable) {
        var areaBaseName = areaIdentifier.name + ':' + areaIdentifier.key + '.';

        if (editable.getName().indexOf(areaBaseName) !== 0) {
            return false; // editable is not inside area
        }

        // remove common base name (= parent area identifier) from relative name
        var relativeName = editable.getName().replace(new RegExp('^' + areaBaseName), '');
        var itemParts = relativeName.split('.');

        // last part is the real name
        itemParts.pop();

        var parents = [];
        if (itemParts.length > 0) {
            Ext.each(itemParts, function(parent) {
                var parentParts = parent.split(':');
                var parentEntry = {
                    name: parentParts[0],
                    key: null
                };

                if (parentParts.length > 1) {
                    parentEntry.key = parentParts[1];
                }

                parents.push(parentEntry);
            });
        }

        parents = parents || [];

        return {
            name: editable.getName(),
            realName: editable.getRealName(),
            data: editable.getValue(),
            type: editable.getType(),
            parents: parents
        };
    },

    getPasteName: function(areaIdentifier, item, editableData) {
        var editableName;

        // base name is area identifier + key
        var editableParts = [
            areaIdentifier.name + ':' + areaIdentifier.key
        ];

        // add relative parent paths as parsed when copying
        if (editableData.parents.length > 0) {
            Ext.each(editableData.parents, function (parentEntry) {
                var pathPart = parentEntry.name;
                if (null !== parentEntry.key) {
                    pathPart += ':' + parentEntry.key;
                }

                editableParts.push(pathPart);
            });
        }

        // add the real name as last part
        editableParts.push(editableData.realName);

        // join parts together with .
        editableName = editableParts.join('.');

        return editableName;
    },

    optionsClickhandler: function (element, btn, e) {
        var menu = new Ext.menu.Menu();

        if(element != false) {
            menu.add(new Ext.menu.Item({
                text: t('copy'),
                iconCls: "pimcore_icon_copy",
                handler: function (item) {
                    item.parentMenu.destroy();
                    this.copyToClipboard(element);
                }.bind(this)
            }));

            menu.add(new Ext.menu.Item({
                text: t('cut'),
                iconCls: "pimcore_icon_cut",
                handler: function (item) {
                    item.parentMenu.destroy();
                    this.copyToClipboard(element);
                    this.removeBlock(element);
                }.bind(this)
            }));
        }

        if(pimcore.globalmanager.exists("areablock_clipboard")) {
            menu.add(new Ext.menu.Item({
                text: t('paste'),
                iconCls: "pimcore_icon_paste",
                handler: function (item) {
                    item.parentMenu.destroy();
                    item = pimcore.globalmanager.get("areablock_clipboard");
                    /*
                    This occurs for the following reason: properties of object.prototype like toString()
                    and hasOwnProperty directly linked to window in which object was created
                     */
                    item = Ext.decode(item);

                    var areaIdentifier = {
                        name: this.getName(),
                        key: (this.getNextKey() + 1)
                    };

                    var that = this;

                    // push the data as an object compatible to the pimcore.document.editable interface to the rest of
                    // available editables so that they get read by pimcore.document.edit.getValues()
                    Ext.iterate(item.values, function (key, value, object) {
                        var editableName = that.getPasteName(areaIdentifier, item, value);

                        editableManager.add({
                            getName: function () {
                                return editableName;
                            },
                            getRealName: function() {
                                return value.realName;
                            },
                            getValue: function () {
                                return value.data;
                            },
                            getInherited: function () {
                                return false;
                            },
                            getType: function () {
                                return value.type;
                            }
                        });
                    });

                    this.addBlockAfter(element, item.type, true);
                    this.reloadDocument();
                }.bind(this)
            }));
        }

        if(!menu.items || !menu.items.getCount()) {
            menu.add(new Ext.menu.Item({
                text: t('no_action_available')
            }));
        }

        menu.showAt(e.getXY());
        e.stopEvent();
    },

    setInherited: function ($super, inherited) {
        var elements = Ext.get(this.id).query('.pimcore_area_buttons[data-name="' + this.name + '"]');
        if(elements.length > 0) {
            for(var i=0; i<elements.length; i++) {
                $super(inherited, Ext.get(elements[i]));
            }
        }
    },

    startDragDrop: function () {
        Ext.getBody().addCls('pimcore_drag_drop_active');
        Ext.get(this.id).addCls('pimcore_editable_areablock_dropzones_active');
    },

    endDragDrop: function () {
        Ext.getBody().removeCls('pimcore_drag_drop_active');
        Ext.get(this.id).removeCls('pimcore_editable_areablock_dropzones_active');
    },

    updateDropZones: function () {

        if(this.inherited) {
            return;
        }

        var dropZones = Ext.get(this.id).query("div.pimcore_area_dropzone");
        for(var i=0; i<dropZones.length; i++) {
            dropZones[i].dropZone.unreg();
            Ext.get(dropZones[i]).remove();
        }

        if(this.elements.length > 0) {
            for (var i = 0; i < this.elements.length; i++) {
                if (this.elements[i]) {
                    if(i == 0) {
                        var b = Ext.DomHelper.insertBefore(this.elements[i], {
                            tag: "div",
                            index: i,
                            "class": "pimcore_area_dropzone"
                        });
                        this.addDropZoneToElement(b);
                    }
                    var a = Ext.DomHelper.insertAfter(this.elements[i], {
                        tag: "div",
                        index: i+1,
                        "class": "pimcore_area_dropzone"
                    });

                    this.addDropZoneToElement(a);
                }
            }
        } else {
            // this is only for inserting when no element is in the areablock
            var c = Ext.DomHelper.append(Ext.get(this.id), {
                tag: "div",
                index: i+1,
                "class": "pimcore_area_dropzone"
            });

            this.addDropZoneToElement(c);
        }
    },

    addDropZoneToElement: function (el) {
        el.dropZone = new Ext.dd.DropZone(el, {

            getTargetFromEvent: function(e) {
                return el;
            },

            onNodeEnter : function(target, dd, e, data){
                Ext.fly(target).addCls('pimcore_area_dropzone_hover');
            },

            onNodeOut : function(target, dd, e, data){
                Ext.fly(target).removeCls('pimcore_area_dropzone_hover');
            },

            onNodeOver : function(target, dd, e, data){
                return Ext.dd.DropZone.prototype.dropAllowed;
            },

            onNodeDrop : function(target, dd, e, data){
                if(data.fromToolbar) {
                    this.addBlockAt(data.brick.type, target.getAttribute("index"));
                    return true;
                } else {
                    this.moveBlockTo(data.sourceEl, target.getAttribute("index"));
                    return true;
                }
            }.bind(this)
        });
    },

    createInitalControls: function () {

        var plusEl = document.createElement("div");
        plusEl.setAttribute("class", "pimcore_block_plus");
        plusEl.setAttribute("data-name", this.name);

        var optionsEl = document.createElement("div");
        optionsEl.setAttribute("class", "pimcore_block_options");
        optionsEl.setAttribute("data-name", this.name);

        var clearEl = document.createElement("div");
        clearEl.setAttribute("class", "pimcore_block_clear");
        clearEl.setAttribute("data-name", this.name);

        Ext.get(this.id).appendChild(plusEl);
        Ext.get(this.id).appendChild(optionsEl);
        Ext.get(this.id).appendChild(clearEl);

        // plus button
        var plusButton = new Ext.Button({
            cls: "pimcore_block_button_plus",
            arrowVisible: false,
            iconCls: "pimcore_icon_plus",
            menu: this.getTypeMenu(this, null)
        });
        plusButton.render(plusEl);

        // options button
        var optionsButton = new Ext.Button({
            cls: "pimcore_block_button_options",
            iconCls: "pimcore_icon_white_copy",
            listeners: {
                click: this.optionsClickhandler.bind(this, false)
            }
        });
        optionsButton.render(optionsEl);
    },

    getTypeMenu: function (scope, element, insertPosition) {
        var menu = [];
        var groupMenu;
        var limits = this.config["limits"] || {};

        if(typeof this.config.group != "undefined") {
            var groups = Object.keys(this.config.group);
            for (var g=0; g<groups.length; g++) {
                if(groups[g].length > 0) {
                    groupMenu = {
                        text: groups[g],
                        hideOnClick: false,
                        menu: []
                    };

                    for (var i=0; i<this.config.types.length; i++) {
                        if(in_array(this.config.types[i].type,this.config.group[groups[g]])) {
                            let type = this.config.types[i].type;
                            if (typeof limits[type] == "undefined" ||
                                typeof this.brickTypeUsageCounter[type] == "undefined" || this.brickTypeUsageCounter[type] < limits[type]) {
                                    groupMenu.menu.push(this.getMenuConfigForBrick(this.config.types[i], scope, element, insertPosition));
                            }
                        }
                    }
                    menu.push(groupMenu);
                }
            }
        } else {
            for (var i=0; i<this.config.types.length; i++) {
                let type = this.config.types[i].type;
                if (typeof limits[type] == "undefined" ||
                    typeof this.brickTypeUsageCounter[type] == "undefined" || this.brickTypeUsageCounter[type] < limits[type]) {
                    menu.push(this.getMenuConfigForBrick(this.config.types[i], scope, element, insertPosition));
                }
            }
        }

        return menu;
    },

    getMenuConfigForBrick: function (brick, scope, element, insertPosition) {

        var menuText = brick.name;
        if(brick.description) {
            menuText += " | " + brick.description;
        }

        if(!insertPosition) {
            insertPosition = 'after';
        }

        var addBLockFunction = "addBlock" + ucfirst(insertPosition);

        var tmpEntry = {
            text: menuText,
            iconCls: "pimcore_icon_area",
            listeners: {
                "click": this[addBLockFunction].bind(scope, element, brick.type)
            }
        };

        if(brick.icon) {
            delete tmpEntry.iconCls;
            tmpEntry.icon = brick.icon;
        }

        return tmpEntry;
    },

    getNextKey: function () {
        var nextKey = 0;
        var currentKey;

        for (var i = 0; i < this.elements.length; i++) {
            currentKey = intval(this.elements[i].key);
            if (currentKey > nextKey) {
                nextKey = currentKey;
            }
        }

        return nextKey;
    },

    addBlockAfter : function (element, type, forceReload) {
        var index = this.getElementIndex(element) + 1;

        this.addBlockAt(type, index, forceReload);
    },

    addBlockBefore : function (element, type) {
        var index = this.getElementIndex(element);
        this.addBlockAt(type, index);
    },

    addBlockAt: function (type, index, forceReload) {
        var limits = this.config["limits"] || {};
        if (!this.elements.length) {
            index = 0;
        }

        if(typeof this.config["limit"] != "undefined" && this.elements.length >= this.config.limit) {
            Ext.MessageBox.alert(t("error"), t("limit_reached"));
            return;
        }

        let brickName = type;
        let brickIndex = this.allowedTypes.indexOf(brickName);

        if(typeof limits[type] != "undefined" && this.brickTypeUsageCounter[type] >= limits[type]) {
            if (brickIndex >= 0 && typeof this.config.types[brickIndex].name != "undefined") {
                brickName = this.config.types[brickIndex].name;
            }
            Ext.MessageBox.alert(t("error"), t("brick_limit_reached", null ,{bricklimit: limits[type], brickname: brickName}));
            return;
        }

        var nextKey = this.getNextKey();
        nextKey++;

        if(this.config.types[brickIndex]['needsReload'] || forceReload === true) {
            editWindow.lastScrollposition = '#' + this.id + ' .pimcore_block_entry[data-name="' + this.name + '"][key="' + nextKey + '"]';

            this.elements.splice.apply(this.elements, [index, 0, {
                key: nextKey,
                type: type
            }]);

            this.reloadDocument();
        } else {
            let saveData = this.getValue();
            saveData.splice.apply(saveData, [index, 0, {
                key: nextKey,
                type: type
            }]);

            Ext.Ajax.request({
                url: Routing.generate('pimcore_admin_document_page_areabrick-render-index-editmode'),
                method: 'post',
                params: {
                    documentId: window.editWindow.document.id,
                    name: this.getName(),
                    realName: this.getRealName(),
                    index: index,
                    blockStateStack: this.config['blockStateStack'],
                    areablockConfig: Ext.encode(this.initalConfig),
                    areablockData: Ext.encode(saveData)
                },
                success: function (response) {
                    let res = Ext.decode(response.responseText);
                    if(!this.elements.length) {
                        Ext.get(this.id).setHtml(res['htmlCode']);
                    } else if (this.elements[index-1]) {
                        Ext.get(this.elements[index-1]).insertHtml('afterEnd', res['htmlCode'], true);
                    } else if (this.elements[index]) {
                        Ext.get(this.elements[index]).insertHtml('beforeBegin', res['htmlCode'], true);
                    }

                    res['editableDefinitions'].forEach(editableDef => {
                        editableManager.addByDefinition(editableDef);
                    });

                    this.refresh();

                }.bind(this)
            });
        }
    },

    removeBlock: function (element) {
        let container = Ext.get(element);
        let editablesContainer = container.query('[data-block-names]');
        editablesContainer.forEach(editableDiv => {
            editableManager.remove(editableDiv.dataset.name);
        });

        container.remove();

        this.refresh();
    },

    moveBlockTo: function (block, toIndex) {

        toIndex = intval(toIndex);

        var currentIndex = this.getElementIndex(block);
        if(currentIndex < toIndex) {
            toIndex--;
        }

        if(this.elements[toIndex]) {
            Ext.get(block).insertBefore(this.elements[toIndex]);
        } else {
            // to the last position
            Ext.get(block).insertAfter(this.elements[this.elements.length-1]);
        }

        this.refresh();

        if(this.config.reload) {
            this.reloadDocument();
        }
    },

    moveBlockDown: function (element) {

        var index = this.getElementIndex(element);

        if (index < (this.elements.length-1)) {
            this.moveBlockTo(element, index+2);
        }
    },

    moveBlockUp: function (element) {

        var index = this.getElementIndex(element);

        if (index > 0) {
            this.moveBlockTo(element, index-1);
        }
    },

    getElementIndex: function (element) {

        try {
            var key = Ext.get(element).dom.key;
            for (var i = 0; i < this.elements.length; i++) {
                if (this.elements[i].key == key) {
                    var index = i;
                    break;
                }
            }
        }
        catch (e) {
            return 0;
        }

        return index;
    },



    createToolBar: function () {
        var buttons = [];
        var button;
        var bricksInThisArea = [];
        var groupsInThisArea = {};
        var areaBlockToolbarSettings = this.config["areablock_toolbar"];
        var itemCount = 0;

        if(pimcore.document.editables[this.toolbarGlobalVar] != false
                                                && pimcore.document.editables[this.toolbarGlobalVar].itemCount) {
            itemCount = pimcore.document.editables[this.toolbarGlobalVar].itemCount;
        }

        if(typeof this.config.group != "undefined") {
            var groupMenu;
            var groupItemCount = 0;
            var isExistingGroup;
            var brickKey;
            var groups = Object.keys(this.config.group);

            for (var g=0; g<groups.length; g++) {
                groupMenu = null;
                isExistingGroup = false;
                if(groups[g].length > 0) {

                    if(pimcore.document.editables[this.toolbarGlobalVar] != false) {
                        if(pimcore.document.editables[this.toolbarGlobalVar]["groups"][groups[g]]) {
                            groupMenu = pimcore.document.editables[this.toolbarGlobalVar]["groups"][groups[g]];
                            isExistingGroup = true;
                        }
                    }

                    if(!groupMenu) {
                        groupMenu = new Ext.Button({
                            xtype: "button",
                            text: groups[g],
                            textAlign: "left",
                            hideOnClick: false,
                            width: areaBlockToolbarSettings.buttonWidth,
                            menu: [],
                            menuAlign: 'tl-tr',
                            listeners: {
                                mouseover: function (el) {
                                    el.showMenu();
                                }
                            }
                        });
                    }

                    groupsInThisArea[groups[g]] = groupMenu;

                    for (var i=0; i<this.config.types.length; i++) {
                        if(in_array(this.config.types[i].type,this.config.group[groups[g]])) {
                            itemCount++;
                            brickKey = groups[g] + " - " + this.config.types[i].type;
                            button = this.getToolBarButton(this.config.types[i], brickKey, itemCount, "menu");
                            if(button) {
                                bricksInThisArea.push(brickKey);
                                groupMenu.menu.add(button);
                                groupItemCount++;
                            }
                        }
                    }

                    if(!isExistingGroup && groupItemCount > 0) {
                        buttons.push(groupMenu);
                    }
                }
            }
        } else {
            for (var i=0; i<this.config.types.length; i++) {
                var brick = this.config.types[i];
                itemCount++;

                brickKey = brick.type;
                button = this.getToolBarButton(brick, brickKey, itemCount);
                if(button) {
                    bricksInThisArea.push(brickKey);
                    buttons.push(button);
                }
            }
        }

        // only initialize the toolbar once, even when there are more than one area on the page
        if(pimcore.document.editables[this.toolbarGlobalVar] == false) {

            var toolbar = new Ext.Window({
                title: areaBlockToolbarSettings.title,
                width: areaBlockToolbarSettings.width,
                border:false,
                shadow: false,
                resizable: false,
                autoHeight: true,
                draggable: false,
                header: false,
                style: "position:fixed;",
                collapsible: false,
                cls: "pimcore_areablock_toolbar",
                closable: false,
                x: -1000,
                y: 1,
                items: buttons
            });

            toolbar.show();

            pimcore.document.editables[this.toolbarGlobalVar] = {
                toolbar: toolbar,
                groups: groupsInThisArea,
                bricks: bricksInThisArea,
                areablocks: [this],
                itemCount: buttons.length
            };

            window.editWindow.areaToolbarTrigger.show();
            window.editWindow.areaToolbarTrigger.areaToolbarElement = toolbar;

            // click outside, hide toolbar
            Ext.getBody().on('click', function (event) {
                if(!toolbar.getEl().isAncestor(event.target)) {
                    window.editWindow.areaToolbarTrigger.toggle(false);
                    toolbar.setLocalX(-1000);
                }
            });
        } else {
            pimcore.document.editables[this.toolbarGlobalVar].toolbar.add(buttons);
            pimcore.document.editables[this.toolbarGlobalVar].bricks =
                                    array_merge(pimcore.document.editables[this.toolbarGlobalVar].bricks, bricksInThisArea);
            pimcore.document.editables[this.toolbarGlobalVar].groups =
                                    array_merge(pimcore.document.editables[this.toolbarGlobalVar].groups, groupsInThisArea);
            pimcore.document.editables[this.toolbarGlobalVar].itemCount += buttons.length;
            pimcore.document.editables[this.toolbarGlobalVar].areablocks.push(this);
            pimcore.document.editables[this.toolbarGlobalVar].toolbar.updateLayout();
        }

    },

    getToolBarButton: function (brick, key, itemCount, type) {

        if(pimcore.document.editables[this.toolbarGlobalVar] != false) {
            if(in_array(key, pimcore.document.editables[this.toolbarGlobalVar].bricks)) {
                return;
            }
        }

        var areaBlockToolbarSettings = this.config["areablock_toolbar"];
        var maxButtonCharacters = areaBlockToolbarSettings.buttonMaxCharacters;

        var button = {
            xtype: "button",
            textAlign: "left",
            icon: brick.icon,
            cls: 'pimcore_cursor_move',
            text: brick.name.length > maxButtonCharacters ? brick.name.substr(0,maxButtonCharacters) + "..."
                : brick.name,
            width: areaBlockToolbarSettings.buttonWidth,
            handler: function () {
                Ext.MessageBox.alert(t("info"), t("area_brick_assign_info_message"));
            },
            listeners: {
                "afterrender": function (brick, v) {

                    let menuLink = v.getEl().down('a', true);
                    if(menuLink) {
                        // the menu item has a <a> tag, with href=#, which causes dnd to not work properly
                        // and also shows the link target next to the mouse pointer while dragging
                        // -> removing the href attribute fixes the issue
                        menuLink.removeAttribute('href');
                    }

                    v.dragZone = new Ext.dd.DragZone(v.getEl(), {
                        getDragData: function(e) {
                            var sourceEl = v.getEl().dom;
                            if (sourceEl) {
                                var d = sourceEl.cloneNode(true);
                                d.id = Ext.id();
                                return v.dragData = {
                                    sourceEl: sourceEl,
                                    repairXY: Ext.fly(sourceEl).getXY(),
                                    ddel: d,
                                    fromToolbar: true,
                                    brick: brick
                                }
                            }
                        },

                        onStartDrag: function () {

                            // hide control bars
                            Ext.get(this.id).query('.pimcore_area_buttons', false).forEach(function (el) {
                                el.hide();
                            });

                            // create drop zones
                            var areablocks = pimcore.document.editables[this.toolbarGlobalVar].areablocks;
                            for(var i=0; i<areablocks.length; i++) {
                                if(in_array(brick.type, areablocks[i].allowedTypes)) {
                                    areablocks[i].startDragDrop();
                                }
                            }
                        }.bind(this),
                        afterDragDrop: function () {
                            var areablocks = pimcore.document.editables[this.toolbarGlobalVar].areablocks;
                            for(var i=0; i<areablocks.length; i++) {
                                areablocks[i].endDragDrop();
                            }

                            Ext.menu.Manager.hideAll();
                        }.bind(this),
                        beforeDragOut: function (target) {
                            return target ? true : false;
                        },
                        afterInvalidDrop: function () {
                            var areablocks = pimcore.document.editables[this.toolbarGlobalVar].areablocks;
                            for(var i=0; i<areablocks.length; i++) {
                                areablocks[i].endDragDrop();
                            }
                        }.bind(this),

                        getRepairXY: function() {
                            return this.dragData.repairXY;
                        }
                    });
                }.bind(this, brick)
            }
        };

        if(brick.description) {
            button["tooltip"] = brick.description;
        }

        if(type == "menu") {
            delete button["width"];
            delete button["xtype"];
            button["text"] = brick.name;// not shortened
        }

        return button;
    },

    getValue: function () {
        var data = [];
        var hidden = false;
        for (var i = 0; i < this.elements.length; i++) {
            if (this.elements[i]) {
                if (this.elements[i].key) {
                    hidden = false;
                    if(this.visibilityButtons[this.elements[i].key]) {
                        hidden = this.visibilityButtons[this.elements[i].key].pressed;
                    }

                    data.push({
                        key: this.elements[i].key,
                        type: this.elements[i].type,
                        hidden: hidden
                    });
                }
            }
        }

        return data;
    },

    getType: function () {
        return "areablock";
    }
});

pimcore.document.editables.areablocktoolbar = false;



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

pimcore.registerNS("pimcore.document.editables.area");
pimcore.document.editables.area = Class.create(pimcore.document.area_abstract, {

    initialize: function(id, name, config, data, inherited) {

        this.id = id;
        this.name = name;
        this.elements = [];
        this.config = this.parseConfig(config);

        //editable dialog box button
        try {
            var dialogBoxDiv = Ext.get(id).query('.pimcore_area_dialog[data-name="' + this.name + '"]')[0];
            if (dialogBoxDiv) {
                var dialogBoxButton = new Ext.Button({
                    cls: "pimcore_block_button_dialog",
                    iconCls: "pimcore_icon_white_edit",
                    listeners: {
                        "click": this.openEditableDialogBox.bind(this, Ext.get(id), dialogBoxDiv)
                    }
                });
                dialogBoxButton.render(dialogBoxDiv);
            }
        } catch (e) {
            console.log(e);
        }

    },

    setInherited: function ($super, inherited) {
        // disable masking for this datatype (overwrite), because it's actually not needed, otherwise call $super()
        this.inherited = inherited;
    },

    getValue: function () {
        var data = [];
        for (var i = 0; i < this.elements.length; i++) {
            if (this.elements[i]) {
                if (this.elements[i].key) {
                    data.push({
                        key: this.elements[i].key,
                        type: this.elements[i].type
                    });
                }
            }
        }

        return data;
    },

    getType: function () {
        return "area";
    }
});


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

pimcore.registerNS("pimcore.document.editables.pdf");
pimcore.document.editables.pdf = Class.create(pimcore.document.editable, {

    initialize: function(id, name, config, data, inherited) {
        this.id = id;
        this.name = name;
        this.data = {};

        this.config = this.parseConfig(config);

        if (!this.config["height"]) {
            this.config.height = 100;
        }

        this.config.name = id + "_editable";

        if (data) {
            this.data = data;
        }
    },

    render: function () {
        this.setupWrapper();
        this.element = new Ext.Panel(this.config);
        this.element.on("render", function (el) {

            // contextmenu
            el.getEl().on("contextmenu", this.onContextMenu.bind(this));

            // register at global DnD manager
            dndManager.addDropTarget(el.getEl(), this.onNodeOver.bind(this), this.onNodeDrop.bind(this));

            el.getEl().setStyle({
                position: "relative"
            });

            var body = this.getBody();
            body.insertHtml("beforeEnd",'<div class="pimcore_editable_droptarget"></div>');
            body.addCls("pimcore_editable_image_empty");
        }.bind(this));

        this.element.render(this.id);

        pimcore.helpers.registerAssetDnDSingleUpload(this.element.getEl().dom, this.config["uploadPath"], 'path', function (e) {
            if (e['asset']['type'] === "document" && !this.inherited) {
                this.resetData();
                this.data.id = e['asset']['id'];

                this.updateImage();
                this.reload();

                return true;
            } else {
                pimcore.helpers.showNotification(t("error"), t('unsupported_filetype'), "error");
            }
        }.bind(this));

        // insert image
        if (this.data) {
            this.updateImage();
        }
    },

    onContextMenu: function (e) {

        var menu = new Ext.menu.Menu();

        if(this.data.id) {
            menu.add(new Ext.menu.Item({
                text: t('empty'),
                iconCls: "pimcore_icon_delete",
                handler: function (item) {
                    item.parentMenu.destroy();

                    this.empty();

                }.bind(this)
            }));
            menu.add(new Ext.menu.Item({
                text: t('open'),
                iconCls: "pimcore_icon_open",
                handler: function (item) {
                    item.parentMenu.destroy();
                    pimcore.helpers.openAsset(this.data.id, "document");
                }.bind(this)
            }));

            if (pimcore.elementservice.showLocateInTreeButton("document")) {
                menu.add(new Ext.menu.Item({
                    text: t('show_in_tree'),
                    iconCls: "pimcore_icon_show_in_tree",
                    handler: function (item) {
                        item.parentMenu.destroy();
                        pimcore.treenodelocator.showInTree(this.data.id, "asset");
                    }.bind(this)
                }));
            }
        }

        menu.add(new Ext.menu.Item({
            text: t('search'),
            iconCls: "pimcore_icon_search",
            handler: function (item) {
                item.parentMenu.destroy();
                this.openSearchEditor();
            }.bind(this)
        }));

        menu.add(new Ext.menu.Item({
            text: t('upload'),
            iconCls: "pimcore_icon_upload",
            handler: function (item) {
                item.parentMenu.destroy();
                this.uploadDialog();
            }.bind(this)
        }));

        menu.showAt(e.getXY());
        e.stopEvent();
    },

    uploadDialog: function () {
        pimcore.helpers.assetSingleUploadDialog(this.config["uploadPath"], "path", function (res) {
            try {
                var data = Ext.decode(res.response.responseText);
                if(data["id"] && data["type"] == "document") {
                    this.resetData();
                    this.data.id = data["id"];

                    this.updateImage();
                    this.reload();
                }
            } catch (e) {
                console.log(e);
            }
        }.bind(this));
    },

    onNodeOver: function(target, dd, e, data) {
        if (data.records.length === 1 && this.dndAllowed(data.records[0])) {
            return Ext.dd.DropZone.prototype.dropAllowed;
        }
        else {
            return Ext.dd.DropZone.prototype.dropNotAllowed;
        }
    },

    onNodeDrop: function (target, dd, e, data) {

        if(!pimcore.helpers.dragAndDropValidateSingleItem(data)) {
            return false;
        }

        data = data.records[0].data;
        if (data.elementType === "asset" && data.type === "document") {
            this.resetData();
            this.data.id = data.id;

            this.updateImage();
            this.reload();

            return true;
        }
    },

    dndAllowed: function(record) {

        if(record.data.elementType !== "asset" || record.data.type !== "document"){
            return false;
        } else {
            return true;
        }

    },

    openSearchEditor: function () {
        pimcore.helpers.itemselector(false, this.addDataFromSelector.bind(this), {
            type: ["asset"],
            subtype: {
                asset: ["document"]
            }
        },
            {
                context: this.getContext()
            });
    },

    addDataFromSelector: function (item) {
        if(item) {
            this.resetData();
            this.data.id = item.id;

            this.updateImage();
            this.reload();

            return true;
        }
    },

    resetData: function () {
        this.data = {
            id: null
        };
    },

    empty: function () {

        this.resetData();

        this.updateImage();
        this.getBody().addCls("pimcore_editable_image_empty");
        this.reload();
    },

    getBody: function () {
        // get the id from the body element of the panel because there is no method to set body's html
        // (only in configure)
        var body = Ext.get(this.element.getEl().query("." + Ext.baseCSSPrefix + "autocontainer-innerCt")[0]);
        return body;
    },

    updateImage: function () {
        var existingImage = this.getBody().dom.getElementsByTagName("img")[0];
        if (existingImage) {
            Ext.get(existingImage).remove();
        }

        if (!this.data.id) {
            return;
        }

        var params = this.data;
        params['width'] = this.element.getEl().getWidth();
        params['aspectratio'] = true;

        var path = Routing.generate('pimcore_admin_asset_getdocumentthumbnail', params)

        var image = document.createElement("img");
        image.src = path;

        this.getBody().appendChild(image);
        this.getBody().removeCls("pimcore_editable_image_empty");

        this.updateCounter = 0;
        this.updateDimensionsInterval = window.setInterval(this.updateDimensions.bind(this), 1000);
    },

    reload : function () {
        this.reloadDocument();
    },

    updateDimensions: function () {

        var image = this.element.getEl().dom.getElementsByTagName("img")[0];
        if (!image) {
            return;
        }
        image = Ext.get(image);

        var width = image.getWidth();
        var height = image.getHeight();

        if (width > 1 && height > 1) {
            this.element.setWidth(width);
            this.element.setHeight(height);

            clearInterval(this.updateDimensionsInterval);
        }

        if (this.updateCounter > 20) {
            // only wait 20 seconds until image must be loaded
            clearInterval(this.updateDimensionsInterval);
        }

        this.updateCounter++;
    },

    getValue: function () {
        return this.data;
    },

    getType: function () {
        return "pdf";
    }
});



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

pimcore.registerNS("pimcore.document.editables.embed");
pimcore.document.editables.embed = Class.create(pimcore.document.editable, {

    initialize: function(id, name, config, data, inherited) {
        this.id = id;
        this.name = name;
        this.config = this.parseConfig(config);
        this.data = data;
    },

    render: function () {
        this.setupWrapper();

        this.element = Ext.get(this.id);

        let button = new Ext.Button({
            iconCls: "pimcore_icon_embed pimcore_icon_overlay_edit",
            cls: "pimcore_edit_link_button",
            handler: this.openEditor.bind(this)
        });
        button.render(this.element.insertHtml("afterBegin", '<div class="pimcore_video_edit_button"></div>'));

        if(empty(this.data["url"])) {
            this.element.addCls("pimcore_editable_embed_empty");
            this.element.on("click", this.openEditor.bind(this));
        }
    },

    openEditor: function () {

        // disable the global dnd handler in this editmode/frame
        window.dndManager.disable();

        parent.Ext.MessageBox.prompt("", 'URL (eg. https://www.youtube.com/watch?v=nPntDiARQYw)',
        function (button, value, object) {
            if(button == "ok") {
                this.data["url"] = value;
                this.reloadDocument();
            }
        }.bind(this), this, false, this.data["url"]);
    },

    getValue: function () {
        return this.data;
    },

    getType: function () {
        return "embed";
    }
});


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

pimcore.registerNS("pimcore.document.editables.manager");
pimcore.document.editables.manager = Class.create({

    editables: {},
    requiredEditables:{},
    initialized: false,

    addByDefinition: function (definition) {
        let type = definition.type
        let name = definition.name;
        let inherited = false;
        if(typeof definition["inherited"] != "undefined") {
            inherited = definition["inherited"];
        }

        let EditableClass = pimcore.document.editables[type];

        if (typeof EditableClass !== 'function') {
            throw 'Editable of type `' + type + '` with name `' + name + '` could not be found.';
        }

        if (definition.inDialogBox && typeof EditableClass.prototype['render'] !== 'function') {
            throw 'Editable of type `' + type + '` with name `' + name + '` does not support the use in the dialog box.';
        }

        let editable = new EditableClass(definition.id, name, definition.config, definition.data, inherited);
        editable.setRealName(definition.realName);
        editable.setInDialogBox(definition.inDialogBox);

        if (!definition.inDialogBox) {
            if (typeof editable['render'] === 'function') {
                editable.render();
            }
            editable.setInherited(inherited);
        }

        this.editables[definition['name']] = editable;
        if (definition['config']['required']) {
            this.requiredEditables[definition['name']] = editable;
        }
    },

    add: function(editable) {
        this.editables[editable.getName()] = editable;
    },

    remove: function(name) {
        delete this.editables[name];
        delete this.requiredEditables[name];
    },

    getEditables: function() {
        return this.editables;
    },

    getRequiredEditables: function() {
        return this.requiredEditables;
    },

    setInitialized: function(state) {
        this.initialized = state;
    },

    isInitialized: function() {
        return this.initialized;
    }
});



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

pimcore.edithelpers = {};

// disable reload & links, this function is here because it has to be in the header (body attribute)
function pimcoreOnUnload() {
    editWindow.protectLocation();
}

pimcore.edithelpers.frame = {
    active: false,
    topEl: null,
    bottomEl: null,
    rightEl: null,
    leftEl: null,
    timeout: null
};

 pimcore.edithelpers.pasteHtmlAtCaret = function (html, selectPastedContent) {
     var sel, range;
     if (window.getSelection) {
         // IE9 and non-IE
         sel = window.getSelection();
         if (sel.getRangeAt && sel.rangeCount) {
             range = sel.getRangeAt(0);
             range.deleteContents();

             // Range.createContextualFragment() would be useful here but is
             // only relatively recently standardized and is not supported in
             // some browsers (IE9, for one)
             var el = document.createElement("div");
             el.innerHTML = html;
             var frag = document.createDocumentFragment(), node, lastNode;
             while ((node = el.firstChild)) {
                 lastNode = frag.appendChild(node);
             }
             var firstNode = frag.firstChild;
             range.insertNode(frag);

             // Preserve the selection
             if (lastNode) {
                 range = range.cloneRange();
                 range.setStartAfter(lastNode);
                 if (selectPastedContent) {
                     range.setStartBefore(firstNode);
                 } else {
                     range.collapse(true);
                 }
                 sel.removeAllRanges();
                 sel.addRange(range);
             }
         }
     }
 };



