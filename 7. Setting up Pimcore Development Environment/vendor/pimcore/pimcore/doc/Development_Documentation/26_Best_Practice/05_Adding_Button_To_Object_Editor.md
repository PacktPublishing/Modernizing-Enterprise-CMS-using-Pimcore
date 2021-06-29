# Add a Button to Object Editor

Sometimes it might be useful to add additional buttons to the object editor (or any other editor) in Pimcore Backend 
Interface. In terms of product for example to add a download button for a product data sheet - like the following 
screen shot shows. 

![Button](img/button.jpg)


**Solution**

1) Create a bundle with a Pimcore Backend Interface java script extension as described 
[here](../../Development_Documentation/20_Extending_Pimcore/13_Bundle_Developers_Guide/06_Plugin_Backend_UI.md). 

2) Implement a listener for the `postOpenObject` event like follows: 

```javascript

pimcore.plugin.sample = Class.create(pimcore.plugin.admin, {

    postOpenObject: function (object, type) {
        
        if (object.data.general.o_className == 'ShopProduct') {
    
            object.toolbar.add({
                text: t('show-pdf'),
                iconCls: 'pimcore_icon_pdf',
                scale: 'small',
                handler: function (obj) {
                    //do some stuff here, e.g. open a new window with an PDF download
                }.bind(this, object)
            });
            pimcore.layout.refresh();
        }    
    }
});

```
