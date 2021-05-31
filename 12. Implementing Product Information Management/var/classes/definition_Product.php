<?php 

/** 
* Inheritance: yes
* Variants: yes


Fields Summary: 
- marking [select]
- sku [input]
- price [quantityValue]
- bundlePrice [numeric]
- localizedfields [localizedfields]
-- name [input]
-- short_description [textarea]
-- description [wysiwyg]
- bundle_products [manyToManyObjectRelation]
- brand [select]
- made_in [country]
- category [manyToOneRelation]
- materials [advancedManyToManyObjectRelation]
- color [manyToOneRelation]
- attributes [objectbricks]
- images [fieldcollections]
*/ 


return Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'id' => 'PRD',
   'name' => 'Product',
   'description' => '',
   'creationDate' => 0,
   'modificationDate' => 1622053991,
   'userOwner' => 0,
   'userModification' => 2,
   'parentClass' => 'App\\Model\\AbstractProduct',
   'implementsInterfaces' => '',
   'listingParentClass' => '',
   'useTraits' => '',
   'listingUseTraits' => '',
   'encryption' => false,
   'encryptedTables' => 
  array (
  ),
   'allowInherit' => true,
   'allowVariants' => true,
   'showVariants' => true,
   'fieldDefinitions' => 
  array (
  ),
   'layoutDefinitions' => 
  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
     'fieldtype' => 'panel',
     'layout' => NULL,
     'border' => false,
     'name' => 'pimcore_root',
     'type' => NULL,
     'region' => NULL,
     'title' => NULL,
     'width' => 0,
     'height' => 0,
     'collapsible' => false,
     'collapsed' => false,
     'bodyStyle' => NULL,
     'datatype' => 'layout',
     'permissions' => NULL,
     'childs' => 
    array (
      0 => 
      Pimcore\Model\DataObject\ClassDefinition\Layout\Tabpanel::__set_state(array(
         'fieldtype' => 'tabpanel',
         'border' => false,
         'tabPosition' => NULL,
         'name' => 'Product Data',
         'type' => NULL,
         'region' => NULL,
         'title' => 'Product Data',
         'width' => NULL,
         'height' => NULL,
         'collapsible' => false,
         'collapsed' => false,
         'bodyStyle' => '',
         'datatype' => 'layout',
         'permissions' => NULL,
         'childs' => 
        array (
          0 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'layout' => NULL,
             'border' => false,
             'name' => 'Product Information',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Product Information',
             'width' => '',
             'height' => '',
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'permissions' => NULL,
             'childs' => 
            array (
              0 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                 'fieldtype' => 'select',
                 'width' => '',
                 'defaultValue' => '',
                 'optionsProviderClass' => '@pimcore.workflow.place-options-provider',
                 'optionsProviderData' => 'product_workflow',
                 'columnLength' => 190,
                 'dynamicOptions' => false,
                 'name' => 'marking',
                 'title' => 'Marking State',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => true,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'relationType' => false,
                 'invisible' => true,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'defaultValueGenerator' => '',
              )),
              1 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                 'fieldtype' => 'input',
                 'width' => '',
                 'defaultValue' => NULL,
                 'columnLength' => 190,
                 'regex' => '',
                 'unique' => true,
                 'showCharCount' => false,
                 'name' => 'sku',
                 'title' => 'SKU',
                 'tooltip' => '',
                 'mandatory' => true,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'defaultValueGenerator' => '',
              )),
              2 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                 'fieldtype' => 'quantityValue',
                 'width' => '',
                 'unitWidth' => '',
                 'defaultValue' => NULL,
                 'defaultUnit' => '1',
                 'validUnits' => 
                array (
                  0 => '1',
                ),
                 'decimalPrecision' => NULL,
                 'autoConvert' => false,
                 'name' => 'price',
                 'title' => 'Price',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'defaultValueGenerator' => '',
              )),
              3 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                 'fieldtype' => 'numeric',
                 'width' => '',
                 'defaultValue' => NULL,
                 'integer' => false,
                 'unsigned' => false,
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'unique' => false,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
                 'name' => 'bundlePrice',
                 'title' => 'Bundle Price',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => true,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'defaultValueGenerator' => '',
              )),
              4 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
                 'fieldtype' => 'localizedfields',
                 'childs' => 
                array (
                  0 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'fieldtype' => 'input',
                     'width' => '',
                     'defaultValue' => NULL,
                     'columnLength' => 190,
                     'regex' => '',
                     'unique' => false,
                     'showCharCount' => false,
                     'name' => 'name',
                     'title' => 'Product Name',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'defaultValueGenerator' => '',
                  )),
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                     'fieldtype' => 'textarea',
                     'width' => 500,
                     'height' => 100,
                     'maxLength' => NULL,
                     'showCharCount' => false,
                     'excludeFromSearchIndex' => false,
                     'name' => 'short_description',
                     'title' => 'Short Description',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                  )),
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Wysiwyg::__set_state(array(
                     'fieldtype' => 'wysiwyg',
                     'width' => '',
                     'height' => '',
                     'toolbarConfig' => '',
                     'excludeFromSearchIndex' => false,
                     'name' => 'description',
                     'title' => 'Description',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                  )),
                ),
                 'name' => 'localizedfields',
                 'region' => NULL,
                 'layout' => NULL,
                 'title' => 'Name and Description',
                 'width' => '',
                 'height' => '',
                 'maxTabs' => NULL,
                 'border' => false,
                 'provideSplitView' => false,
                 'tabPosition' => NULL,
                 'hideLabelsWhenTabsReached' => NULL,
                 'referencedFields' => 
                array (
                ),
                 'fieldDefinitionsCache' => NULL,
                 'permissionView' => 
                array (
                ),
                 'permissionEdit' => 
                array (
                ),
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => NULL,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => true,
                 'visibleSearch' => true,
                 'blockedVarsForExport' => 
                array (
                ),
                 'labelWidth' => NULL,
                 'labelAlign' => 'left',
              )),
              5 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                 'fieldtype' => 'manyToManyObjectRelation',
                 'width' => '',
                 'height' => '',
                 'maxItems' => '',
                 'relationType' => true,
                 'visibleFields' => 'id,sku,name',
                 'allowToCreateNewObject' => false,
                 'optimizedAdminLoading' => false,
                 'visibleFieldDefinitions' => 
                array (
                ),
                 'classes' => 
                array (
                  0 => 
                  array (
                    'classes' => 'Product',
                  ),
                ),
                 'pathFormatterClass' => '',
                 'name' => 'bundle_products',
                 'title' => 'Bundle Products',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
              )),
            ),
             'locked' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'icon' => NULL,
             'labelWidth' => 100,
             'labelAlign' => 'left',
          )),
          1 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'layout' => NULL,
             'border' => false,
             'name' => 'Categorization',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Categorization',
             'width' => NULL,
             'height' => NULL,
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'permissions' => NULL,
             'childs' => 
            array (
              0 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                 'fieldtype' => 'select',
                 'options' => 
                array (
                  0 => 
                  array (
                    'key' => 'Nike',
                    'value' => '1',
                  ),
                  1 => 
                  array (
                    'key' => 'Ralph Lauren',
                    'value' => '2',
                  ),
                  2 => 
                  array (
                    'key' => 'Hugo Boss',
                    'value' => '3',
                  ),
                  3 => 
                  array (
                    'key' => 'Tommy Hilfiger',
                    'value' => '4',
                  ),
                  4 => 
                  array (
                    'key' => 'Levi Strauss & Co.',
                    'value' => '5',
                  ),
                  5 => 
                  array (
                    'key' => 'Burberry',
                    'value' => '6',
                  ),
                  6 => 
                  array (
                    'key' => 'Gucci',
                    'value' => '7',
                  ),
                  7 => 
                  array (
                    'key' => 'Adidas',
                    'value' => '8',
                  ),
                  8 => 
                  array (
                    'key' => 'Lacoste',
                    'value' => '9',
                  ),
                  9 => 
                  array (
                    'key' => 'Versace',
                    'value' => '10',
                  ),
                  10 => 
                  array (
                    'key' => 'The North Face',
                    'value' => '11',
                  ),
                  11 => 
                  array (
                    'key' => 'Louis Vuitton',
                    'value' => '12',
                  ),
                  12 => 
                  array (
                    'key' => 'Rolex',
                    'value' => '13',
                  ),
                  13 => 
                  array (
                    'key' => 'Calvin Klein',
                    'value' => '14',
                  ),
                  14 => 
                  array (
                    'key' => 'Diesel',
                    'value' => '15',
                  ),
                  15 => 
                  array (
                    'key' => 'Prada',
                    'value' => '16',
                  ),
                  16 => 
                  array (
                    'key' => 'Armani Exchange',
                    'value' => '17',
                  ),
                  17 => 
                  array (
                    'key' => 'Tom Ford',
                    'value' => '18',
                  ),
                  18 => 
                  array (
                    'key' => 'Zara',
                    'value' => '19',
                  ),
                  19 => 
                  array (
                    'key' => 'Givenchy',
                    'value' => '20',
                  ),
                  20 => 
                  array (
                    'key' => 'Armani',
                    'value' => '21',
                  ),
                  21 => 
                  array (
                    'key' => 'Emporio Armani',
                    'value' => '22',
                  ),
                  22 => 
                  array (
                    'key' => 'The Timberland Company',
                    'value' => '23',
                  ),
                  23 => 
                  array (
                    'key' => 'Champion',
                    'value' => '24',
                  ),
                  24 => 
                  array (
                    'key' => 'Under Armour',
                    'value' => '25',
                  ),
                  25 => 
                  array (
                    'key' => 'Vans',
                    'value' => '26',
                  ),
                  26 => 
                  array (
                    'key' => 'H&M',
                    'value' => '27',
                  ),
                  27 => 
                  array (
                    'key' => 'Guess',
                    'value' => '28',
                  ),
                  28 => 
                  array (
                    'key' => 'Hollister Co.',
                    'value' => '29',
                  ),
                  29 => 
                  array (
                    'key' => 'Hermès',
                    'value' => '30',
                  ),
                  30 => 
                  array (
                    'key' => 'Abercrombie & Fitch',
                    'value' => '31',
                  ),
                  31 => 
                  array (
                    'key' => 'J. Crew',
                    'value' => '32',
                  ),
                  32 => 
                  array (
                    'key' => 'Dolce & Gabbana',
                    'value' => '33',
                  ),
                  33 => 
                  array (
                    'key' => 'Christian Dior',
                    'value' => '34',
                  ),
                  34 => 
                  array (
                    'key' => 'Supreme',
                    'value' => '35',
                  ),
                  35 => 
                  array (
                    'key' => 'American Eagle Outfitters',
                    'value' => '36',
                  ),
                  36 => 
                  array (
                    'key' => 'Michael Kors',
                    'value' => '37',
                  ),
                  37 => 
                  array (
                    'key' => 'Banana Republic',
                    'value' => '38',
                  ),
                  38 => 
                  array (
                    'key' => 'Balenciaga',
                    'value' => '39',
                  ),
                  39 => 
                  array (
                    'key' => 'Fendi',
                    'value' => '40',
                  ),
                  40 => 
                  array (
                    'key' => 'Fred Perry',
                    'value' => '41',
                  ),
                  41 => 
                  array (
                    'key' => 'Stone Island',
                    'value' => '42',
                  ),
                  42 => 
                  array (
                    'key' => 'Converse',
                    'value' => '43',
                  ),
                  43 => 
                  array (
                    'key' => 'Nautica',
                    'value' => '44',
                  ),
                  44 => 
                  array (
                    'key' => 'Off-White',
                    'value' => '45',
                  ),
                  45 => 
                  array (
                    'key' => 'Uniqlo',
                    'value' => '46',
                  ),
                  46 => 
                  array (
                    'key' => 'Patagonia',
                    'value' => ' Inc.',
                  ),
                  47 => 
                  array (
                    'key' => 'A Bathing Ape',
                    'value' => '48',
                  ),
                  48 => 
                  array (
                    'key' => 'Gap Inc.',
                    'value' => '49',
                  ),
                  49 => 
                  array (
                    'key' => 'Cartier',
                    'value' => '50',
                  ),
                  50 => 
                  array (
                    'key' => 'Fila',
                    'value' => '51',
                  ),
                  51 => 
                  array (
                    'key' => 'Puma',
                    'value' => '52',
                  ),
                  52 => 
                  array (
                    'key' => 'Wrangler',
                    'value' => '53',
                  ),
                  53 => 
                  array (
                    'key' => 'Oakley',
                    'value' => ' Inc.',
                  ),
                  54 => 
                  array (
                    'key' => 'Vineyard Vines',
                    'value' => '55',
                  ),
                  55 => 
                  array (
                    'key' => 'Lee',
                    'value' => '56',
                  ),
                  56 => 
                  array (
                    'key' => 'New Balance',
                    'value' => '57',
                  ),
                  57 => 
                  array (
                    'key' => 'Marc Jacobs',
                    'value' => '58',
                  ),
                  58 => 
                  array (
                    'key' => 'Salvatore Ferragamo',
                    'value' => '59',
                  ),
                  59 => 
                  array (
                    'key' => 'DKNY',
                    'value' => '60',
                  ),
                  60 => 
                  array (
                    'key' => 'Bulgari',
                    'value' => '61',
                  ),
                  61 => 
                  array (
                    'key' => 'Reebok',
                    'value' => '62',
                  ),
                  62 => 
                  array (
                    'key' => 'Topman',
                    'value' => '63',
                  ),
                  63 => 
                  array (
                    'key' => 'Kenneth Cole',
                    'value' => '64',
                  ),
                  64 => 
                  array (
                    'key' => 'Yves Saint Laurent',
                    'value' => '65',
                  ),
                  65 => 
                  array (
                    'key' => 'Pull & Bear',
                    'value' => '66',
                  ),
                  66 => 
                  array (
                    'key' => 'Palace',
                    'value' => '67',
                  ),
                  67 => 
                  array (
                    'key' => 'Columbia',
                    'value' => '68',
                  ),
                  68 => 
                  array (
                    'key' => 'Carrhart',
                    'value' => '69',
                  ),
                  69 => 
                  array (
                    'key' => 'Kappa',
                    'value' => '70',
                  ),
                  70 => 
                  array (
                    'key' => 'Aéropostale',
                    'value' => '71',
                  ),
                  71 => 
                  array (
                    'key' => 'Quicksilver',
                    'value' => '72',
                  ),
                  72 => 
                  array (
                    'key' => 'Moncler',
                    'value' => '73',
                  ),
                  73 => 
                  array (
                    'key' => 'French Connection',
                    'value' => '74',
                  ),
                  74 => 
                  array (
                    'key' => 'Ted Baker',
                    'value' => '75',
                  ),
                  75 => 
                  array (
                    'key' => 'Express',
                    'value' => ' Inc.',
                  ),
                  76 => 
                  array (
                    'key' => 'Tiffany & Co.',
                    'value' => '77',
                  ),
                  77 => 
                  array (
                    'key' => 'Massimo Dutti',
                    'value' => '78',
                  ),
                  78 => 
                  array (
                    'key' => 'Gant',
                    'value' => '79',
                  ),
                  79 => 
                  array (
                    'key' => 'Ellesse',
                    'value' => '80',
                  ),
                  80 => 
                  array (
                    'key' => 'Paul Smith',
                    'value' => '81',
                  ),
                  81 => 
                  array (
                    'key' => 'Billabong',
                    'value' => '82',
                  ),
                  82 => 
                  array (
                    'key' => 'Kenzo',
                    'value' => '83',
                  ),
                  83 => 
                  array (
                    'key' => 'Helly Hansen',
                    'value' => '84',
                  ),
                  84 => 
                  array (
                    'key' => 'Clarks',
                    'value' => '85',
                  ),
                  85 => 
                  array (
                    'key' => 'Diamond Supply Co.',
                    'value' => '86',
                  ),
                  86 => 
                  array (
                    'key' => 'Valentino',
                    'value' => '87',
                  ),
                  87 => 
                  array (
                    'key' => 'G-Star Raw',
                    'value' => '88',
                  ),
                  88 => 
                  array (
                    'key' => 'Ermenegildo Zegna',
                    'value' => '89',
                  ),
                  89 => 
                  array (
                    'key' => 'Scotch & Soda',
                    'value' => '90',
                  ),
                  90 => 
                  array (
                    'key' => 'Forever 21',
                    'value' => '91',
                  ),
                  91 => 
                  array (
                    'key' => 'Hackett London',
                    'value' => '92',
                  ),
                  92 => 
                  array (
                    'key' => 'Louis Phillipe',
                    'value' => '93',
                  ),
                  93 => 
                  array (
                    'key' => 'Marc O\'Polo',
                    'value' => '94',
                  ),
                  94 => 
                  array (
                    'key' => 'Everlast',
                    'value' => '95',
                  ),
                  95 => 
                  array (
                    'key' => 'Bombay Shades',
                    'value' => '96',
                  ),
                  96 => 
                  array (
                    'key' => 'Schott NYC',
                    'value' => '97',
                  ),
                  97 => 
                  array (
                    'key' => 'Sail Racing',
                    'value' => '98',
                  ),
                  98 => 
                  array (
                    'key' => 'C&A',
                    'value' => '99',
                  ),
                  99 => 
                  array (
                    'key' => 'Umbro',
                    'value' => '100',
                  ),
                ),
                 'width' => '',
                 'defaultValue' => '',
                 'optionsProviderClass' => '',
                 'optionsProviderData' => '',
                 'columnLength' => 190,
                 'dynamicOptions' => false,
                 'name' => 'brand',
                 'title' => 'Brand',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'defaultValueGenerator' => '',
              )),
              1 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Country::__set_state(array(
                 'fieldtype' => 'country',
                 'width' => '',
                 'restrictTo' => '',
                 'defaultValue' => NULL,
                 'optionsProviderClass' => NULL,
                 'optionsProviderData' => NULL,
                 'columnLength' => 190,
                 'dynamicOptions' => false,
                 'name' => 'made_in',
                 'title' => 'Made In',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'defaultValueGenerator' => '',
              )),
              2 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                 'fieldtype' => 'manyToOneRelation',
                 'width' => '',
                 'assetUploadPath' => '',
                 'relationType' => true,
                 'objectsAllowed' => true,
                 'assetsAllowed' => false,
                 'assetTypes' => 
                array (
                ),
                 'documentsAllowed' => false,
                 'documentTypes' => 
                array (
                ),
                 'classes' => 
                array (
                  0 => 
                  array (
                    'classes' => 'Category',
                  ),
                ),
                 'pathFormatterClass' => '',
                 'name' => 'category',
                 'title' => 'Category',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
              )),
            ),
             'locked' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'icon' => NULL,
             'labelWidth' => 100,
             'labelAlign' => 'left',
          )),
          2 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'layout' => NULL,
             'border' => false,
             'name' => 'Composition',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Composition',
             'width' => NULL,
             'height' => NULL,
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'permissions' => NULL,
             'childs' => 
            array (
              0 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\AdvancedManyToManyObjectRelation::__set_state(array(
                 'allowedClassId' => 'Material',
                 'visibleFields' => 'key,code,name,typology',
                 'columns' => 
                array (
                  0 => 
                  array (
                    'type' => 'text',
                    'position' => 1,
                    'key' => 'percent',
                    'id' => 'extModel7626-1',
                    'label' => 'Percent',
                  ),
                ),
                 'columnKeys' => 
                array (
                  0 => 'percent',
                ),
                 'fieldtype' => 'advancedManyToManyObjectRelation',
                 'enableBatchEdit' => false,
                 'allowMultipleAssignments' => false,
                 'visibleFieldDefinitions' => 
                array (
                ),
                 'width' => '',
                 'height' => '',
                 'maxItems' => '',
                 'relationType' => true,
                 'allowToCreateNewObject' => true,
                 'optimizedAdminLoading' => false,
                 'classes' => 
                array (
                ),
                 'pathFormatterClass' => '',
                 'name' => 'materials',
                 'title' => 'Materials',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
              )),
            ),
             'locked' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'icon' => NULL,
             'labelWidth' => 100,
             'labelAlign' => 'left',
          )),
          3 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'layout' => NULL,
             'border' => false,
             'name' => 'Attributes',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Attributes',
             'width' => NULL,
             'height' => NULL,
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'permissions' => NULL,
             'childs' => 
            array (
              0 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                 'fieldtype' => 'manyToOneRelation',
                 'width' => '',
                 'assetUploadPath' => '',
                 'relationType' => true,
                 'objectsAllowed' => true,
                 'assetsAllowed' => false,
                 'assetTypes' => 
                array (
                ),
                 'documentsAllowed' => false,
                 'documentTypes' => 
                array (
                ),
                 'classes' => 
                array (
                  0 => 
                  array (
                    'classes' => 'Color',
                  ),
                ),
                 'pathFormatterClass' => '',
                 'name' => 'color',
                 'title' => 'Color',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
              )),
              1 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Objectbricks::__set_state(array(
                 'fieldtype' => 'objectbricks',
                 'allowedTypes' => 
                array (
                  0 => 'ShirtsAttributes',
                  1 => 'ShoesAttributes',
                ),
                 'maxItems' => 1,
                 'border' => false,
                 'name' => 'attributes',
                 'title' => 'Attributes',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
              )),
            ),
             'locked' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'icon' => NULL,
             'labelWidth' => 100,
             'labelAlign' => 'left',
          )),
          4 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'layout' => NULL,
             'border' => false,
             'name' => 'Images',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Images',
             'width' => NULL,
             'height' => NULL,
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'permissions' => NULL,
             'childs' => 
            array (
              0 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Fieldcollections::__set_state(array(
                 'fieldtype' => 'fieldcollections',
                 'allowedTypes' => 
                array (
                  0 => 'ImageInfo',
                ),
                 'lazyLoading' => true,
                 'maxItems' => '',
                 'disallowAddRemove' => false,
                 'disallowReorder' => false,
                 'collapsed' => false,
                 'collapsible' => false,
                 'border' => false,
                 'name' => 'images',
                 'title' => 'Images',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
              )),
            ),
             'locked' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'icon' => NULL,
             'labelWidth' => 100,
             'labelAlign' => 'left',
          )),
        ),
         'locked' => false,
         'blockedVarsForExport' => 
        array (
        ),
      )),
    ),
     'locked' => false,
     'blockedVarsForExport' => 
    array (
    ),
     'icon' => NULL,
     'labelWidth' => 100,
     'labelAlign' => 'left',
  )),
   'icon' => '',
   'previewUrl' => '',
   'group' => '',
   'showAppLoggerTab' => false,
   'linkGeneratorReference' => '',
   'previewGeneratorReference' => '',
   'compositeIndices' => 
  array (
  ),
   'generateTypeDeclarations' => false,
   'showFieldLookup' => false,
   'propertyVisibility' => 
  array (
    'grid' => 
    array (
      'id' => true,
      'key' => false,
      'path' => true,
      'published' => true,
      'modificationDate' => true,
      'creationDate' => true,
    ),
    'search' => 
    array (
      'id' => true,
      'key' => false,
      'path' => true,
      'published' => true,
      'modificationDate' => true,
      'creationDate' => true,
    ),
  ),
   'enableGridLocking' => false,
   'dao' => NULL,
   'blockedVarsForExport' => 
  array (
  ),
));
