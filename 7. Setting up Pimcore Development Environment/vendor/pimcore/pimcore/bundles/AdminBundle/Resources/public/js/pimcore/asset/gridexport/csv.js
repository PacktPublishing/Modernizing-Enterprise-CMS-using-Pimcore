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

pimcore.registerNS("pimcore.asset.gridexport.csv");
pimcore.asset.gridexport.csv = Class.create(pimcore.element.gridexport.abstract, {
    name: "csv",
    text: t("export_csv"),
    warningText: t('asset_export_warning'),

    getExportSettingsContainer: function () {
        return new Ext.form.FieldSet({
            title: t('csv_settings'),
            items: [
                new Ext.form.TextField({
                    fieldLabel: t('delimiter'),
                    name: 'delimiter',
                    maxLength: 1,
                    labelWidth: 200,
                    value: ';',
                    allowBlank: false
                })
            ]
        });
    },

    getDownloadUrl: function(fileHandle) {
         return Routing.generate('pimcore_admin_asset_assethelper_downloadcsvfile', {fileHandle: fileHandle});
    }
});

pimcore.globalmanager.get("pimcore.asset.gridexport").push(new pimcore.asset.gridexport.csv());
