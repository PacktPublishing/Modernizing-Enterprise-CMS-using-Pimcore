<?php 

/** 
* Inheritance: yes
* Variants: yes


Fields Summary: 
- sku [input]
- price [quantityValue]
- bundlePrice [numeric]
- localizedfields [localizedfields]
-- translationCompleted [calculatedValue]
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
   'modificationDate' => 1616533873,
   'userOwner' => 0,
   'userModification' => 2,
   'parentClass' => '',
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
   'layoutDefinitions' => 
  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
     'fieldtype' => 'panel',
     'labelWidth' => 100,
     'layout' => NULL,
     'border' => false,
     'name' => 'pimcore_root',
     'type' => NULL,
     'region' => NULL,
     'title' => NULL,
     'width' => NULL,
     'height' => NULL,
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
             'labelWidth' => 100,
             'layout' => NULL,
             'border' => false,
             'name' => 'Product Information',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Product Information',
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
              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                 'fieldtype' => 'input',
                 'width' => NULL,
                 'defaultValue' => NULL,
                 'queryColumnType' => 'varchar',
                 'columnType' => 'varchar',
                 'columnLength' => 190,
                 'phpdocType' => 'string',
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
                 'defaultValueGenerator' => '',
              )),
              1 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                 'fieldtype' => 'quantityValue',
                 'width' => NULL,
                 'unitWidth' => NULL,
                 'defaultValue' => NULL,
                 'defaultUnit' => '1',
                 'validUnits' => 
                array (
                  0 => '1',
                ),
                 'decimalPrecision' => NULL,
                 'autoConvert' => false,
                 'queryColumnType' => 
                array (
                  'value' => 'double',
                  'unit' => 'bigint(20)',
                ),
                 'columnType' => 
                array (
                  'value' => 'double',
                  'unit' => 'bigint(20)',
                ),
                 'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\QuantityValue',
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
                 'defaultValueGenerator' => '',
              )),
              2 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                 'fieldtype' => 'numeric',
                 'width' => '',
                 'defaultValue' => NULL,
                 'queryColumnType' => 'double',
                 'columnType' => 'double',
                 'phpdocType' => 'float',
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
                 'defaultValueGenerator' => '',
              )),
              3 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
                 'fieldtype' => 'text',
                 'html' => '',
                 'renderingClass' => 'AppBundle\\CalculatedValue\\DataQualityCalculator',
                 'renderingData' => '',
                 'border' => false,
                 'name' => 'TranslationSummary',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => '',
                 'width' => NULL,
                 'height' => NULL,
                 'collapsible' => false,
                 'collapsed' => false,
                 'bodyStyle' => '',
                 'datatype' => 'layout',
                 'permissions' => NULL,
                 'childs' => 
                array (
                ),
                 'locked' => false,
              )),
              4 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
                 'fieldtype' => 'localizedfields',
                 'phpdocType' => '\\Pimcore\\Model\\DataObject\\Localizedfield',
                 'childs' => 
                array (
                  0 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\CalculatedValue::__set_state(array(
                     'fieldtype' => 'calculatedValue',
                     'elementType' => 'input',
                     'width' => 200,
                     'calculatorClass' => 'AppBundle\\CalculatedValue\\DataQualityCalculator',
                     'queryColumnType' => 'varchar',
                     'columnLength' => 190,
                     'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\CalculatedValue',
                     'name' => 'translationCompleted',
                     'title' => 'Translations Completed',
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
                  )),
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'fieldtype' => 'input',
                     'width' => NULL,
                     'defaultValue' => NULL,
                     'queryColumnType' => 'varchar',
                     'columnType' => 'varchar',
                     'columnLength' => 190,
                     'phpdocType' => 'string',
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
                     'defaultValueGenerator' => '',
                  )),
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                     'fieldtype' => 'textarea',
                     'width' => 500,
                     'height' => 100,
                     'maxLength' => NULL,
                     'showCharCount' => false,
                     'excludeFromSearchIndex' => false,
                     'queryColumnType' => 'longtext',
                     'columnType' => 'longtext',
                     'phpdocType' => 'string',
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
                  )),
                  3 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Wysiwyg::__set_state(array(
                     'fieldtype' => 'wysiwyg',
                     'width' => '',
                     'height' => '',
                     'queryColumnType' => 'longtext',
                     'columnType' => 'longtext',
                     'phpdocType' => 'string',
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
                  )),
                ),
                 'name' => 'localizedfields',
                 'region' => NULL,
                 'layout' => NULL,
                 'title' => 'Name and Description',
                 'width' => '',
                 'height' => '',
                 'maxTabs' => NULL,
                 'labelWidth' => NULL,
                 'border' => false,
                 'provideSplitView' => false,
                 'tabPosition' => NULL,
                 'hideLabelsWhenTabsReached' => NULL,
                 'referencedFields' => 
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
              )),
              5 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                 'fieldtype' => 'manyToManyObjectRelation',
                 'width' => '',
                 'height' => '',
                 'maxItems' => '',
                 'queryColumnType' => 'text',
                 'phpdocType' => 'array',
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
              )),
            ),
             'locked' => false,
             'icon' => '',
          )),
          1 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 100,
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
                 'queryColumnType' => 'varchar',
                 'columnType' => 'varchar',
                 'columnLength' => 190,
                 'phpdocType' => 'string',
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
                 'defaultValueGenerator' => '',
              )),
              1 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Country::__set_state(array(
                 'fieldtype' => 'country',
                 'restrictTo' => '',
                 'options' => 
                array (
                  0 => 
                  array (
                    'key' => 'Afghanistan',
                    'value' => 'AF',
                  ),
                  1 => 
                  array (
                    'key' => 'Albania',
                    'value' => 'AL',
                  ),
                  2 => 
                  array (
                    'key' => 'Algeria',
                    'value' => 'DZ',
                  ),
                  3 => 
                  array (
                    'key' => 'American Samoa',
                    'value' => 'AS',
                  ),
                  4 => 
                  array (
                    'key' => 'Andorra',
                    'value' => 'AD',
                  ),
                  5 => 
                  array (
                    'key' => 'Angola',
                    'value' => 'AO',
                  ),
                  6 => 
                  array (
                    'key' => 'Anguilla',
                    'value' => 'AI',
                  ),
                  7 => 
                  array (
                    'key' => 'Antarctica',
                    'value' => 'AQ',
                  ),
                  8 => 
                  array (
                    'key' => 'Antigua & Barbuda',
                    'value' => 'AG',
                  ),
                  9 => 
                  array (
                    'key' => 'Argentina',
                    'value' => 'AR',
                  ),
                  10 => 
                  array (
                    'key' => 'Armenia',
                    'value' => 'AM',
                  ),
                  11 => 
                  array (
                    'key' => 'Aruba',
                    'value' => 'AW',
                  ),
                  12 => 
                  array (
                    'key' => 'Ascension Island',
                    'value' => 'AC',
                  ),
                  13 => 
                  array (
                    'key' => 'Australia',
                    'value' => 'AU',
                  ),
                  14 => 
                  array (
                    'key' => 'Austria',
                    'value' => 'AT',
                  ),
                  15 => 
                  array (
                    'key' => 'Azerbaijan',
                    'value' => 'AZ',
                  ),
                  16 => 
                  array (
                    'key' => 'Bahamas',
                    'value' => 'BS',
                  ),
                  17 => 
                  array (
                    'key' => 'Bahrain',
                    'value' => 'BH',
                  ),
                  18 => 
                  array (
                    'key' => 'Bangladesh',
                    'value' => 'BD',
                  ),
                  19 => 
                  array (
                    'key' => 'Barbados',
                    'value' => 'BB',
                  ),
                  20 => 
                  array (
                    'key' => 'Belarus',
                    'value' => 'BY',
                  ),
                  21 => 
                  array (
                    'key' => 'Belgium',
                    'value' => 'BE',
                  ),
                  22 => 
                  array (
                    'key' => 'Belize',
                    'value' => 'BZ',
                  ),
                  23 => 
                  array (
                    'key' => 'Benin',
                    'value' => 'BJ',
                  ),
                  24 => 
                  array (
                    'key' => 'Bermuda',
                    'value' => 'BM',
                  ),
                  25 => 
                  array (
                    'key' => 'Bhutan',
                    'value' => 'BT',
                  ),
                  26 => 
                  array (
                    'key' => 'Bolivia',
                    'value' => 'BO',
                  ),
                  27 => 
                  array (
                    'key' => 'Bosnia & Herzegovina',
                    'value' => 'BA',
                  ),
                  28 => 
                  array (
                    'key' => 'Botswana',
                    'value' => 'BW',
                  ),
                  29 => 
                  array (
                    'key' => 'Brazil',
                    'value' => 'BR',
                  ),
                  30 => 
                  array (
                    'key' => 'British Indian Ocean Territory',
                    'value' => 'IO',
                  ),
                  31 => 
                  array (
                    'key' => 'British Virgin Islands',
                    'value' => 'VG',
                  ),
                  32 => 
                  array (
                    'key' => 'Brunei',
                    'value' => 'BN',
                  ),
                  33 => 
                  array (
                    'key' => 'Bulgaria',
                    'value' => 'BG',
                  ),
                  34 => 
                  array (
                    'key' => 'Burkina Faso',
                    'value' => 'BF',
                  ),
                  35 => 
                  array (
                    'key' => 'Burundi',
                    'value' => 'BI',
                  ),
                  36 => 
                  array (
                    'key' => 'Cambodia',
                    'value' => 'KH',
                  ),
                  37 => 
                  array (
                    'key' => 'Cameroon',
                    'value' => 'CM',
                  ),
                  38 => 
                  array (
                    'key' => 'Canada',
                    'value' => 'CA',
                  ),
                  39 => 
                  array (
                    'key' => 'Canary Islands',
                    'value' => 'IC',
                  ),
                  40 => 
                  array (
                    'key' => 'Cape Verde',
                    'value' => 'CV',
                  ),
                  41 => 
                  array (
                    'key' => 'Caribbean Netherlands',
                    'value' => 'BQ',
                  ),
                  42 => 
                  array (
                    'key' => 'Cayman Islands',
                    'value' => 'KY',
                  ),
                  43 => 
                  array (
                    'key' => 'Central African Republic',
                    'value' => 'CF',
                  ),
                  44 => 
                  array (
                    'key' => 'Ceuta & Melilla',
                    'value' => 'EA',
                  ),
                  45 => 
                  array (
                    'key' => 'Chad',
                    'value' => 'TD',
                  ),
                  46 => 
                  array (
                    'key' => 'Chile',
                    'value' => 'CL',
                  ),
                  47 => 
                  array (
                    'key' => 'China',
                    'value' => 'CN',
                  ),
                  48 => 
                  array (
                    'key' => 'Christmas Island',
                    'value' => 'CX',
                  ),
                  49 => 
                  array (
                    'key' => 'Cocos (Keeling) Islands',
                    'value' => 'CC',
                  ),
                  50 => 
                  array (
                    'key' => 'Colombia',
                    'value' => 'CO',
                  ),
                  51 => 
                  array (
                    'key' => 'Comoros',
                    'value' => 'KM',
                  ),
                  52 => 
                  array (
                    'key' => 'Congo - Brazzaville',
                    'value' => 'CG',
                  ),
                  53 => 
                  array (
                    'key' => 'Congo - Kinshasa',
                    'value' => 'CD',
                  ),
                  54 => 
                  array (
                    'key' => 'Cook Islands',
                    'value' => 'CK',
                  ),
                  55 => 
                  array (
                    'key' => 'Costa Rica',
                    'value' => 'CR',
                  ),
                  56 => 
                  array (
                    'key' => 'Croatia',
                    'value' => 'HR',
                  ),
                  57 => 
                  array (
                    'key' => 'Cuba',
                    'value' => 'CU',
                  ),
                  58 => 
                  array (
                    'key' => 'Curaçao',
                    'value' => 'CW',
                  ),
                  59 => 
                  array (
                    'key' => 'Cyprus',
                    'value' => 'CY',
                  ),
                  60 => 
                  array (
                    'key' => 'Czechia',
                    'value' => 'CZ',
                  ),
                  61 => 
                  array (
                    'key' => 'Côte d’Ivoire',
                    'value' => 'CI',
                  ),
                  62 => 
                  array (
                    'key' => 'Denmark',
                    'value' => 'DK',
                  ),
                  63 => 
                  array (
                    'key' => 'Diego Garcia',
                    'value' => 'DG',
                  ),
                  64 => 
                  array (
                    'key' => 'Djibouti',
                    'value' => 'DJ',
                  ),
                  65 => 
                  array (
                    'key' => 'Dominica',
                    'value' => 'DM',
                  ),
                  66 => 
                  array (
                    'key' => 'Dominican Republic',
                    'value' => 'DO',
                  ),
                  67 => 
                  array (
                    'key' => 'Ecuador',
                    'value' => 'EC',
                  ),
                  68 => 
                  array (
                    'key' => 'Egypt',
                    'value' => 'EG',
                  ),
                  69 => 
                  array (
                    'key' => 'El Salvador',
                    'value' => 'SV',
                  ),
                  70 => 
                  array (
                    'key' => 'Equatorial Guinea',
                    'value' => 'GQ',
                  ),
                  71 => 
                  array (
                    'key' => 'Eritrea',
                    'value' => 'ER',
                  ),
                  72 => 
                  array (
                    'key' => 'Estonia',
                    'value' => 'EE',
                  ),
                  73 => 
                  array (
                    'key' => 'Eswatini',
                    'value' => 'SZ',
                  ),
                  74 => 
                  array (
                    'key' => 'Ethiopia',
                    'value' => 'ET',
                  ),
                  75 => 
                  array (
                    'key' => 'Falkland Islands',
                    'value' => 'FK',
                  ),
                  76 => 
                  array (
                    'key' => 'Faroe Islands',
                    'value' => 'FO',
                  ),
                  77 => 
                  array (
                    'key' => 'Fiji',
                    'value' => 'FJ',
                  ),
                  78 => 
                  array (
                    'key' => 'Finland',
                    'value' => 'FI',
                  ),
                  79 => 
                  array (
                    'key' => 'France',
                    'value' => 'FR',
                  ),
                  80 => 
                  array (
                    'key' => 'French Guiana',
                    'value' => 'GF',
                  ),
                  81 => 
                  array (
                    'key' => 'French Polynesia',
                    'value' => 'PF',
                  ),
                  82 => 
                  array (
                    'key' => 'French Southern Territories',
                    'value' => 'TF',
                  ),
                  83 => 
                  array (
                    'key' => 'Gabon',
                    'value' => 'GA',
                  ),
                  84 => 
                  array (
                    'key' => 'Gambia',
                    'value' => 'GM',
                  ),
                  85 => 
                  array (
                    'key' => 'Georgia',
                    'value' => 'GE',
                  ),
                  86 => 
                  array (
                    'key' => 'Germany',
                    'value' => 'DE',
                  ),
                  87 => 
                  array (
                    'key' => 'Ghana',
                    'value' => 'GH',
                  ),
                  88 => 
                  array (
                    'key' => 'Gibraltar',
                    'value' => 'GI',
                  ),
                  89 => 
                  array (
                    'key' => 'Greece',
                    'value' => 'GR',
                  ),
                  90 => 
                  array (
                    'key' => 'Greenland',
                    'value' => 'GL',
                  ),
                  91 => 
                  array (
                    'key' => 'Grenada',
                    'value' => 'GD',
                  ),
                  92 => 
                  array (
                    'key' => 'Guadeloupe',
                    'value' => 'GP',
                  ),
                  93 => 
                  array (
                    'key' => 'Guam',
                    'value' => 'GU',
                  ),
                  94 => 
                  array (
                    'key' => 'Guatemala',
                    'value' => 'GT',
                  ),
                  95 => 
                  array (
                    'key' => 'Guernsey',
                    'value' => 'GG',
                  ),
                  96 => 
                  array (
                    'key' => 'Guinea',
                    'value' => 'GN',
                  ),
                  97 => 
                  array (
                    'key' => 'Guinea-Bissau',
                    'value' => 'GW',
                  ),
                  98 => 
                  array (
                    'key' => 'Guyana',
                    'value' => 'GY',
                  ),
                  99 => 
                  array (
                    'key' => 'Haiti',
                    'value' => 'HT',
                  ),
                  100 => 
                  array (
                    'key' => 'Honduras',
                    'value' => 'HN',
                  ),
                  101 => 
                  array (
                    'key' => 'Hong Kong SAR China',
                    'value' => 'HK',
                  ),
                  102 => 
                  array (
                    'key' => 'Hungary',
                    'value' => 'HU',
                  ),
                  103 => 
                  array (
                    'key' => 'Iceland',
                    'value' => 'IS',
                  ),
                  104 => 
                  array (
                    'key' => 'India',
                    'value' => 'IN',
                  ),
                  105 => 
                  array (
                    'key' => 'Indonesia',
                    'value' => 'ID',
                  ),
                  106 => 
                  array (
                    'key' => 'Iran',
                    'value' => 'IR',
                  ),
                  107 => 
                  array (
                    'key' => 'Iraq',
                    'value' => 'IQ',
                  ),
                  108 => 
                  array (
                    'key' => 'Ireland',
                    'value' => 'IE',
                  ),
                  109 => 
                  array (
                    'key' => 'Isle of Man',
                    'value' => 'IM',
                  ),
                  110 => 
                  array (
                    'key' => 'Israel',
                    'value' => 'IL',
                  ),
                  111 => 
                  array (
                    'key' => 'Italy',
                    'value' => 'IT',
                  ),
                  112 => 
                  array (
                    'key' => 'Jamaica',
                    'value' => 'JM',
                  ),
                  113 => 
                  array (
                    'key' => 'Japan',
                    'value' => 'JP',
                  ),
                  114 => 
                  array (
                    'key' => 'Jersey',
                    'value' => 'JE',
                  ),
                  115 => 
                  array (
                    'key' => 'Jordan',
                    'value' => 'JO',
                  ),
                  116 => 
                  array (
                    'key' => 'Kazakhstan',
                    'value' => 'KZ',
                  ),
                  117 => 
                  array (
                    'key' => 'Kenya',
                    'value' => 'KE',
                  ),
                  118 => 
                  array (
                    'key' => 'Kiribati',
                    'value' => 'KI',
                  ),
                  119 => 
                  array (
                    'key' => 'Kosovo',
                    'value' => 'XK',
                  ),
                  120 => 
                  array (
                    'key' => 'Kuwait',
                    'value' => 'KW',
                  ),
                  121 => 
                  array (
                    'key' => 'Kyrgyzstan',
                    'value' => 'KG',
                  ),
                  122 => 
                  array (
                    'key' => 'Laos',
                    'value' => 'LA',
                  ),
                  123 => 
                  array (
                    'key' => 'Latvia',
                    'value' => 'LV',
                  ),
                  124 => 
                  array (
                    'key' => 'Lebanon',
                    'value' => 'LB',
                  ),
                  125 => 
                  array (
                    'key' => 'Lesotho',
                    'value' => 'LS',
                  ),
                  126 => 
                  array (
                    'key' => 'Liberia',
                    'value' => 'LR',
                  ),
                  127 => 
                  array (
                    'key' => 'Libya',
                    'value' => 'LY',
                  ),
                  128 => 
                  array (
                    'key' => 'Liechtenstein',
                    'value' => 'LI',
                  ),
                  129 => 
                  array (
                    'key' => 'Lithuania',
                    'value' => 'LT',
                  ),
                  130 => 
                  array (
                    'key' => 'Luxembourg',
                    'value' => 'LU',
                  ),
                  131 => 
                  array (
                    'key' => 'Macao SAR China',
                    'value' => 'MO',
                  ),
                  132 => 
                  array (
                    'key' => 'Madagascar',
                    'value' => 'MG',
                  ),
                  133 => 
                  array (
                    'key' => 'Malawi',
                    'value' => 'MW',
                  ),
                  134 => 
                  array (
                    'key' => 'Malaysia',
                    'value' => 'MY',
                  ),
                  135 => 
                  array (
                    'key' => 'Maldives',
                    'value' => 'MV',
                  ),
                  136 => 
                  array (
                    'key' => 'Mali',
                    'value' => 'ML',
                  ),
                  137 => 
                  array (
                    'key' => 'Malta',
                    'value' => 'MT',
                  ),
                  138 => 
                  array (
                    'key' => 'Marshall Islands',
                    'value' => 'MH',
                  ),
                  139 => 
                  array (
                    'key' => 'Martinique',
                    'value' => 'MQ',
                  ),
                  140 => 
                  array (
                    'key' => 'Mauritania',
                    'value' => 'MR',
                  ),
                  141 => 
                  array (
                    'key' => 'Mauritius',
                    'value' => 'MU',
                  ),
                  142 => 
                  array (
                    'key' => 'Mayotte',
                    'value' => 'YT',
                  ),
                  143 => 
                  array (
                    'key' => 'Mexico',
                    'value' => 'MX',
                  ),
                  144 => 
                  array (
                    'key' => 'Micronesia',
                    'value' => 'FM',
                  ),
                  145 => 
                  array (
                    'key' => 'Moldova',
                    'value' => 'MD',
                  ),
                  146 => 
                  array (
                    'key' => 'Monaco',
                    'value' => 'MC',
                  ),
                  147 => 
                  array (
                    'key' => 'Mongolia',
                    'value' => 'MN',
                  ),
                  148 => 
                  array (
                    'key' => 'Montenegro',
                    'value' => 'ME',
                  ),
                  149 => 
                  array (
                    'key' => 'Montserrat',
                    'value' => 'MS',
                  ),
                  150 => 
                  array (
                    'key' => 'Morocco',
                    'value' => 'MA',
                  ),
                  151 => 
                  array (
                    'key' => 'Mozambique',
                    'value' => 'MZ',
                  ),
                  152 => 
                  array (
                    'key' => 'Myanmar (Burma)',
                    'value' => 'MM',
                  ),
                  153 => 
                  array (
                    'key' => 'Namibia',
                    'value' => 'NA',
                  ),
                  154 => 
                  array (
                    'key' => 'Nauru',
                    'value' => 'NR',
                  ),
                  155 => 
                  array (
                    'key' => 'Nepal',
                    'value' => 'NP',
                  ),
                  156 => 
                  array (
                    'key' => 'Netherlands',
                    'value' => 'NL',
                  ),
                  157 => 
                  array (
                    'key' => 'New Caledonia',
                    'value' => 'NC',
                  ),
                  158 => 
                  array (
                    'key' => 'New Zealand',
                    'value' => 'NZ',
                  ),
                  159 => 
                  array (
                    'key' => 'Nicaragua',
                    'value' => 'NI',
                  ),
                  160 => 
                  array (
                    'key' => 'Niger',
                    'value' => 'NE',
                  ),
                  161 => 
                  array (
                    'key' => 'Nigeria',
                    'value' => 'NG',
                  ),
                  162 => 
                  array (
                    'key' => 'Niue',
                    'value' => 'NU',
                  ),
                  163 => 
                  array (
                    'key' => 'Norfolk Island',
                    'value' => 'NF',
                  ),
                  164 => 
                  array (
                    'key' => 'North Korea',
                    'value' => 'KP',
                  ),
                  165 => 
                  array (
                    'key' => 'North Macedonia',
                    'value' => 'MK',
                  ),
                  166 => 
                  array (
                    'key' => 'Northern Mariana Islands',
                    'value' => 'MP',
                  ),
                  167 => 
                  array (
                    'key' => 'Norway',
                    'value' => 'NO',
                  ),
                  168 => 
                  array (
                    'key' => 'Oman',
                    'value' => 'OM',
                  ),
                  169 => 
                  array (
                    'key' => 'Pakistan',
                    'value' => 'PK',
                  ),
                  170 => 
                  array (
                    'key' => 'Palau',
                    'value' => 'PW',
                  ),
                  171 => 
                  array (
                    'key' => 'Palestinian Territories',
                    'value' => 'PS',
                  ),
                  172 => 
                  array (
                    'key' => 'Panama',
                    'value' => 'PA',
                  ),
                  173 => 
                  array (
                    'key' => 'Papua New Guinea',
                    'value' => 'PG',
                  ),
                  174 => 
                  array (
                    'key' => 'Paraguay',
                    'value' => 'PY',
                  ),
                  175 => 
                  array (
                    'key' => 'Peru',
                    'value' => 'PE',
                  ),
                  176 => 
                  array (
                    'key' => 'Philippines',
                    'value' => 'PH',
                  ),
                  177 => 
                  array (
                    'key' => 'Pitcairn Islands',
                    'value' => 'PN',
                  ),
                  178 => 
                  array (
                    'key' => 'Poland',
                    'value' => 'PL',
                  ),
                  179 => 
                  array (
                    'key' => 'Portugal',
                    'value' => 'PT',
                  ),
                  180 => 
                  array (
                    'key' => 'Pseudo-Accents',
                    'value' => 'XA',
                  ),
                  181 => 
                  array (
                    'key' => 'Pseudo-Bidi',
                    'value' => 'XB',
                  ),
                  182 => 
                  array (
                    'key' => 'Puerto Rico',
                    'value' => 'PR',
                  ),
                  183 => 
                  array (
                    'key' => 'Qatar',
                    'value' => 'QA',
                  ),
                  184 => 
                  array (
                    'key' => 'Romania',
                    'value' => 'RO',
                  ),
                  185 => 
                  array (
                    'key' => 'Russia',
                    'value' => 'RU',
                  ),
                  186 => 
                  array (
                    'key' => 'Rwanda',
                    'value' => 'RW',
                  ),
                  187 => 
                  array (
                    'key' => 'Réunion',
                    'value' => 'RE',
                  ),
                  188 => 
                  array (
                    'key' => 'Samoa',
                    'value' => 'WS',
                  ),
                  189 => 
                  array (
                    'key' => 'San Marino',
                    'value' => 'SM',
                  ),
                  190 => 
                  array (
                    'key' => 'Saudi Arabia',
                    'value' => 'SA',
                  ),
                  191 => 
                  array (
                    'key' => 'Senegal',
                    'value' => 'SN',
                  ),
                  192 => 
                  array (
                    'key' => 'Serbia',
                    'value' => 'RS',
                  ),
                  193 => 
                  array (
                    'key' => 'Seychelles',
                    'value' => 'SC',
                  ),
                  194 => 
                  array (
                    'key' => 'Sierra Leone',
                    'value' => 'SL',
                  ),
                  195 => 
                  array (
                    'key' => 'Singapore',
                    'value' => 'SG',
                  ),
                  196 => 
                  array (
                    'key' => 'Sint Maarten',
                    'value' => 'SX',
                  ),
                  197 => 
                  array (
                    'key' => 'Slovakia',
                    'value' => 'SK',
                  ),
                  198 => 
                  array (
                    'key' => 'Slovenia',
                    'value' => 'SI',
                  ),
                  199 => 
                  array (
                    'key' => 'Solomon Islands',
                    'value' => 'SB',
                  ),
                  200 => 
                  array (
                    'key' => 'Somalia',
                    'value' => 'SO',
                  ),
                  201 => 
                  array (
                    'key' => 'South Africa',
                    'value' => 'ZA',
                  ),
                  202 => 
                  array (
                    'key' => 'South Georgia & South Sandwich Islands',
                    'value' => 'GS',
                  ),
                  203 => 
                  array (
                    'key' => 'South Korea',
                    'value' => 'KR',
                  ),
                  204 => 
                  array (
                    'key' => 'South Sudan',
                    'value' => 'SS',
                  ),
                  205 => 
                  array (
                    'key' => 'Spain',
                    'value' => 'ES',
                  ),
                  206 => 
                  array (
                    'key' => 'Sri Lanka',
                    'value' => 'LK',
                  ),
                  207 => 
                  array (
                    'key' => 'St. Barthélemy',
                    'value' => 'BL',
                  ),
                  208 => 
                  array (
                    'key' => 'St. Helena',
                    'value' => 'SH',
                  ),
                  209 => 
                  array (
                    'key' => 'St. Kitts & Nevis',
                    'value' => 'KN',
                  ),
                  210 => 
                  array (
                    'key' => 'St. Lucia',
                    'value' => 'LC',
                  ),
                  211 => 
                  array (
                    'key' => 'St. Martin',
                    'value' => 'MF',
                  ),
                  212 => 
                  array (
                    'key' => 'St. Pierre & Miquelon',
                    'value' => 'PM',
                  ),
                  213 => 
                  array (
                    'key' => 'St. Vincent & Grenadines',
                    'value' => 'VC',
                  ),
                  214 => 
                  array (
                    'key' => 'Sudan',
                    'value' => 'SD',
                  ),
                  215 => 
                  array (
                    'key' => 'Suriname',
                    'value' => 'SR',
                  ),
                  216 => 
                  array (
                    'key' => 'Svalbard & Jan Mayen',
                    'value' => 'SJ',
                  ),
                  217 => 
                  array (
                    'key' => 'Sweden',
                    'value' => 'SE',
                  ),
                  218 => 
                  array (
                    'key' => 'Switzerland',
                    'value' => 'CH',
                  ),
                  219 => 
                  array (
                    'key' => 'Syria',
                    'value' => 'SY',
                  ),
                  220 => 
                  array (
                    'key' => 'São Tomé & Príncipe',
                    'value' => 'ST',
                  ),
                  221 => 
                  array (
                    'key' => 'Taiwan',
                    'value' => 'TW',
                  ),
                  222 => 
                  array (
                    'key' => 'Tajikistan',
                    'value' => 'TJ',
                  ),
                  223 => 
                  array (
                    'key' => 'Tanzania',
                    'value' => 'TZ',
                  ),
                  224 => 
                  array (
                    'key' => 'Thailand',
                    'value' => 'TH',
                  ),
                  225 => 
                  array (
                    'key' => 'Timor-Leste',
                    'value' => 'TL',
                  ),
                  226 => 
                  array (
                    'key' => 'Togo',
                    'value' => 'TG',
                  ),
                  227 => 
                  array (
                    'key' => 'Tokelau',
                    'value' => 'TK',
                  ),
                  228 => 
                  array (
                    'key' => 'Tonga',
                    'value' => 'TO',
                  ),
                  229 => 
                  array (
                    'key' => 'Trinidad & Tobago',
                    'value' => 'TT',
                  ),
                  230 => 
                  array (
                    'key' => 'Tristan da Cunha',
                    'value' => 'TA',
                  ),
                  231 => 
                  array (
                    'key' => 'Tunisia',
                    'value' => 'TN',
                  ),
                  232 => 
                  array (
                    'key' => 'Turkey',
                    'value' => 'TR',
                  ),
                  233 => 
                  array (
                    'key' => 'Turkmenistan',
                    'value' => 'TM',
                  ),
                  234 => 
                  array (
                    'key' => 'Turks & Caicos Islands',
                    'value' => 'TC',
                  ),
                  235 => 
                  array (
                    'key' => 'Tuvalu',
                    'value' => 'TV',
                  ),
                  236 => 
                  array (
                    'key' => 'U.S. Outlying Islands',
                    'value' => 'UM',
                  ),
                  237 => 
                  array (
                    'key' => 'U.S. Virgin Islands',
                    'value' => 'VI',
                  ),
                  238 => 
                  array (
                    'key' => 'Uganda',
                    'value' => 'UG',
                  ),
                  239 => 
                  array (
                    'key' => 'Ukraine',
                    'value' => 'UA',
                  ),
                  240 => 
                  array (
                    'key' => 'United Arab Emirates',
                    'value' => 'AE',
                  ),
                  241 => 
                  array (
                    'key' => 'United Kingdom',
                    'value' => 'GB',
                  ),
                  242 => 
                  array (
                    'key' => 'United States',
                    'value' => 'US',
                  ),
                  243 => 
                  array (
                    'key' => 'Uruguay',
                    'value' => 'UY',
                  ),
                  244 => 
                  array (
                    'key' => 'Uzbekistan',
                    'value' => 'UZ',
                  ),
                  245 => 
                  array (
                    'key' => 'Vanuatu',
                    'value' => 'VU',
                  ),
                  246 => 
                  array (
                    'key' => 'Vatican City',
                    'value' => 'VA',
                  ),
                  247 => 
                  array (
                    'key' => 'Venezuela',
                    'value' => 'VE',
                  ),
                  248 => 
                  array (
                    'key' => 'Vietnam',
                    'value' => 'VN',
                  ),
                  249 => 
                  array (
                    'key' => 'Wallis & Futuna',
                    'value' => 'WF',
                  ),
                  250 => 
                  array (
                    'key' => 'Western Sahara',
                    'value' => 'EH',
                  ),
                  251 => 
                  array (
                    'key' => 'Yemen',
                    'value' => 'YE',
                  ),
                  252 => 
                  array (
                    'key' => 'Zambia',
                    'value' => 'ZM',
                  ),
                  253 => 
                  array (
                    'key' => 'Zimbabwe',
                    'value' => 'ZW',
                  ),
                  254 => 
                  array (
                    'key' => 'Åland Islands',
                    'value' => 'AX',
                  ),
                ),
                 'width' => '',
                 'defaultValue' => NULL,
                 'optionsProviderClass' => NULL,
                 'optionsProviderData' => NULL,
                 'queryColumnType' => 'varchar',
                 'columnType' => 'varchar',
                 'columnLength' => 190,
                 'phpdocType' => 'string',
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
                 'defaultValueGenerator' => '',
              )),
              2 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                 'fieldtype' => 'manyToOneRelation',
                 'width' => '',
                 'assetUploadPath' => '',
                 'relationType' => true,
                 'queryColumnType' => 
                array (
                  'id' => 'int(11)',
                  'type' => 'enum(\'document\',\'asset\',\'object\')',
                ),
                 'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
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
              )),
            ),
             'locked' => false,
             'icon' => '',
          )),
          2 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 100,
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
                 'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\ObjectMetadata[]',
                 'enableBatchEdit' => false,
                 'allowMultipleAssignments' => false,
                 'visibleFieldDefinitions' => 
                array (
                ),
                 'width' => '',
                 'height' => '',
                 'maxItems' => '',
                 'queryColumnType' => 'text',
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
              )),
            ),
             'locked' => false,
             'icon' => '',
          )),
          3 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 100,
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
                 'queryColumnType' => 
                array (
                  'id' => 'int(11)',
                  'type' => 'enum(\'document\',\'asset\',\'object\')',
                ),
                 'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
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
              )),
              1 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Objectbricks::__set_state(array(
                 'fieldtype' => 'objectbricks',
                 'phpdocType' => '\\Pimcore\\Model\\DataObject\\Objectbrick',
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
              )),
            ),
             'locked' => false,
             'icon' => '',
          )),
          4 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 100,
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
                 'phpdocType' => '\\Pimcore\\Model\\DataObject\\Fieldcollection',
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
              )),
            ),
             'locked' => false,
             'icon' => '',
          )),
        ),
         'locked' => false,
      )),
    ),
     'locked' => false,
     'icon' => NULL,
  )),
   'icon' => '',
   'previewUrl' => '',
   'group' => '',
   'showAppLoggerTab' => false,
   'linkGeneratorReference' => '',
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
));
