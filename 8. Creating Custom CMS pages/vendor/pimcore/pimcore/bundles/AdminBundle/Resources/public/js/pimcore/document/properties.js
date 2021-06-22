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

pimcore.registerNS("pimcore.document.properties");
pimcore.document.properties = Class.create(pimcore.element.properties, {


    disallowedKeys: ["language", "navigation_exclude", "navigation_name", "navigation_title", "navigation_relation",
        "navigation_parameters", "navigation_anchor", "navigation_target", "navigation_class",
        "navigation_tabindex", "navigation_accesskey"],

    inheritableKeys: ["language"],

    getPropertyData: function (name) {

        if (this.element.data.properties[name]) {
            return this.element.data.properties[name]["data"];
        }

        return null;
    },


    getLayout: function ($super) {

        if (!this.layout) {

            this.layout = $super();

            var languageData = this.getPropertyData("language");

            var languagestore = [["", t("none")]];
            var websiteLanguages = pimcore.settings.websiteLanguages;
            var selectContent = "";
            for (var i = 0; i < websiteLanguages.length; i++) {
                selectContent = pimcore.available_languages[websiteLanguages[i]] + " [" + websiteLanguages[i] + "]";
                languagestore.push([websiteLanguages[i], selectContent]);
            }

            var setLanguageIcon = function (select) {
                if (!select.labelEl["originalClass"]) {
                    select.labelEl.originalClass = select.labelEl.getAttribute("class");
                }

                var classNames = select.labelEl.originalClass;

                if (select.getValue()) {
                    classNames += " pimcore_icon_language_" + select.getValue().toLowerCase();
                    classNames += " pimcore_document_property_language_label";
                }

                select.labelEl.dom.className = classNames;
            };

            var language = new Ext.form.ComboBox({
                fieldLabel: t('language'),
                name: "language",
                store: languagestore,
                editable: false,
                triggerAction: 'all',
                mode: "local",
                value: languageData,
                width: 260,
                listeners: {
                    "afterrender": setLanguageIcon,
                    "select": setLanguageIcon
                }
            });

            this.languagesPanel = new Ext.form.FormPanel({
                bodyStyle: "padding: 10px;",
                autoWidth: true,
                height: 65,
                collapsible: false,
                items: [language]
            });

            var systempropertiesItems = [this.languagesPanel];

            if (this.element.type == "page" || this.element.type == "link" || this.element.type == "folder") {
                this.layout.setTitle(t("navigation") + ' &amp; ' + t("properties"));
                var items = [{
                    xtype: "textfield",
                    fieldLabel: t("name"),
                    value: this.getPropertyData("navigation_name"),
                    name: "navigation_name"
                }, {
                    xtype: "textfield",
                    fieldLabel: t('title'),
                    name: "navigation_title",
                    value: this.getPropertyData("navigation_title")
                }];

                if (this.element.type != "folder") {
                    items.push({
                        xtype: "combo",
                        fieldLabel: t('navigation_target'),
                        name: "navigation_target",
                        store: ["", "_blank", "_self", "_top", "_parent"],
                        value: this.getPropertyData("navigation_target"),
                        editable: true,
                        triggerAction: 'all',
                        mode: "local",
                        width: 200,
                        listWidth: 200
                    });
                }

                items.push({
                    xtype: "checkbox",
                    fieldLabel:
                        t('navigation_exclude'),
                    name:
                        "navigation_exclude",
                    checked:
                        this.getPropertyData("navigation_exclude")

                });


                var navigationBasic = new Ext.form.FieldSet({
                    title: t('basic'),
                    autoHeight: true,
                    collapsible: true,
                    collapsed: false,
                    defaults: {
                        width: 230
                    },
                    items: items

                });

                items = [{
                    xtype: "textfield",
                    fieldLabel: t('class'),
                    name: 'navigation_class',
                    value: this.getPropertyData("navigation_class")
                }];

                if (this.element.type != "folder") {
                    items.push({
                        xtype: "textfield",
                        fieldLabel: t('anchor'),
                        name: 'navigation_anchor',
                        value: this.getPropertyData("navigation_anchor")
                    });

                    items.push({
                        xtype: "textfield",
                        fieldLabel: t('parameters'),
                        name: "navigation_parameters",
                        value: this.getPropertyData("navigation_parameters")
                    });

                    items.push({
                        xtype: "textfield",
                        fieldLabel: t('relation'),
                        name: "navigation_relation",
                        value: this.getPropertyData("navigation_relation")
                    });

                    items.push({
                        xtype: "textfield",
                        fieldLabel: t('accesskey'),
                        name: "navigation_accesskey",
                        value: this.getPropertyData("navigation_accesskey")
                    });

                    items.push({
                            xtype: "textfield",
                            fieldLabel: t('tabindex'),
                            name: "navigation_tabindex",
                            value: this.getPropertyData("navigation_tabindex")
                        });
                }

                var navigationEnhanced = new Ext.form.FieldSet({
                    title: t('advanced'),
                    autoHeight: true,
                    collapsible: true,
                    collapsed: true,
                    defaults: {
                        width: 230
                    },
                    items: items

                });

                this.navigationPanel = new Ext.form.FormPanel({
                    title: t("navigation"),
                    bodyStyle: "padding: 10px;",
                    autoWidth: true,
                    autoHeight: true,
                    collapsible: false,
                    items: [navigationBasic, navigationEnhanced]
                });

                systempropertiesItems.push(this.navigationPanel);
            }

            this.systemPropertiesPanel = new Ext.Panel({
                width: 300,
                region: "east",
                autoScroll: true,
                collapsible: true,
                items: systempropertiesItems
            });

            this.layout.add(this.systemPropertiesPanel);
        }
        return this.layout;
    },

    getValues: function ($super) {

        var values = $super();
        var record;

        var systemValues = this.languagesPanel.getForm().getFieldValues();

        if (this["navigationPanel"]) {
            var navigationValues = this.navigationPanel.getForm().getFieldValues();
            systemValues = array_merge(systemValues, navigationValues);
        }

        for (var i = 0; i < this.disallowedKeys.length; i++) {

            var name = this.disallowedKeys[i];

            var addProperty = true;
            if (typeof systemValues[name] != "undefined") {

                if (in_array(name, this.inheritableKeys)) {
                    if (this.element.data.properties[name]) {
                        record = this.element.data.properties[name];
                        if (record["inherited"] && record["data"] == systemValues[name]) {
                            addProperty = false;
                        }
                    }
                }

                if (addProperty) {
                    values[name] = {
                        data: systemValues[name],
                        type: (typeof systemValues[name] === "boolean") ? "bool" : "text",
                        inheritable: in_array(name, this.inheritableKeys)
                    };
                }
            }

            if (!addProperty) {
                if (values[name]) {
                    delete values[name];
                }
            }

        }
        return values;
    }

});
