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

pimcore.registerNS('pimcore.object.classes.data.geopolygon');
pimcore.object.classes.data.geopolygon = Class.create(pimcore.object.classes.data.geo.abstract, {

    type: 'geopolygon',

    initialize: function (treeNode, initData) {
        this.type = 'geopolygon';

        this.initData(initData);

        // overwrite default settings
        this.availableSettingsFields = ['name','title','mandatory','noteditable','invisible','style'];

        this.treeNode = treeNode;
    },

    getTypeName: function () {
        return t('geopolygon');
    },

    getGroup: function () {
            return 'geo';
    },

    getIconClass: function () {
        return 'pimcore_icon_geopolygon';
    }

});
