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

pimcore.registerNS("pimcore.object.abstract");
pimcore.object.abstract = Class.create(pimcore.element.abstract, {

    selectInTree: function (type, button) {

        if(type != "variant" || this.data.general.showVariants) {
            try {
                pimcore.treenodelocator.showInTree(this.id, "object", button)
            } catch (e) {
                console.log(e);
            }
        }
    }
});