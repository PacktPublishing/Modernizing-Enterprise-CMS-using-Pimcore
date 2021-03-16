<?php 

/** 
Fields Summary: 
- size [select]
- has_heel [checkbox]
- heel_height [quantityValue]
*/ 


return Pimcore\Model\DataObject\Objectbrick\Definition::__set_state(array(
   'classDefinitions' => 
  array (
    0 => 
    array (
      'classname' => 'Product',
      'fieldname' => 'attributes',
    ),
  ),
   'dao' => NULL,
   'key' => 'ShoesAttributes',
   'parentClass' => '',
   'implementsInterfaces' => '',
   'title' => '',
   'group' => '',
   'layoutDefinitions' => 
  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
     'fieldtype' => 'panel',
     'labelWidth' => 100,
     'layout' => NULL,
     'border' => false,
     'name' => NULL,
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
      Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
         'fieldtype' => 'panel',
         'labelWidth' => 100,
         'layout' => NULL,
         'border' => false,
         'name' => 'Shoes Attributes',
         'type' => NULL,
         'region' => NULL,
         'title' => 'Shoes Attributes',
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
          Pimcore\Model\DataObject\ClassDefinition\Layout\Region::__set_state(array(
             'fieldtype' => 'region',
             'name' => 'Attributes Region',
             'type' => NULL,
             'region' => NULL,
             'title' => '',
             'width' => NULL,
             'height' => 200,
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
                 'name' => 'Size Panel',
                 'type' => NULL,
                 'region' => 'center',
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
                  0 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                     'fieldtype' => 'select',
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => '15',
                        'value' => '1',
                        'id' => 'extModel14096-1',
                      ),
                      1 => 
                      array (
                        'key' => '15.5',
                        'value' => '2',
                        'id' => 'extModel14096-2',
                      ),
                      2 => 
                      array (
                        'key' => '16',
                        'value' => '3',
                        'id' => 'extModel14096-3',
                      ),
                      3 => 
                      array (
                        'key' => '16.5',
                        'value' => '4',
                        'id' => 'extModel14096-4',
                      ),
                      4 => 
                      array (
                        'key' => '17',
                        'value' => '5',
                        'id' => 'extModel14096-5',
                      ),
                      5 => 
                      array (
                        'key' => '17.5',
                        'value' => '6',
                        'id' => 'extModel14096-6',
                      ),
                      6 => 
                      array (
                        'key' => '18',
                        'value' => '7',
                        'id' => 'extModel14096-7',
                      ),
                      7 => 
                      array (
                        'key' => '18.5',
                        'value' => '8',
                        'id' => 'extModel14096-8',
                      ),
                      8 => 
                      array (
                        'key' => '19',
                        'value' => '9',
                        'id' => 'extModel14096-9',
                      ),
                      9 => 
                      array (
                        'key' => '19.5',
                        'value' => '10',
                        'id' => 'extModel14096-10',
                      ),
                      10 => 
                      array (
                        'key' => '20',
                        'value' => '11',
                        'id' => 'extModel14096-11',
                      ),
                      11 => 
                      array (
                        'key' => '20.5',
                        'value' => '12',
                        'id' => 'extModel14096-12',
                      ),
                      12 => 
                      array (
                        'key' => '21',
                        'value' => '13',
                        'id' => 'extModel14096-13',
                      ),
                      13 => 
                      array (
                        'key' => '21.5',
                        'value' => '14',
                        'id' => 'extModel14096-14',
                      ),
                      14 => 
                      array (
                        'key' => '22',
                        'value' => '15',
                        'id' => 'extModel14096-15',
                      ),
                      15 => 
                      array (
                        'key' => '22.5',
                        'value' => '16',
                        'id' => 'extModel14096-16',
                      ),
                      16 => 
                      array (
                        'key' => '23',
                        'value' => '17',
                        'id' => 'extModel14096-17',
                      ),
                      17 => 
                      array (
                        'key' => '23.5',
                        'value' => '18',
                        'id' => 'extModel14096-18',
                      ),
                      18 => 
                      array (
                        'key' => '24',
                        'value' => '19',
                        'id' => 'extModel14096-19',
                      ),
                      19 => 
                      array (
                        'key' => '24.5',
                        'value' => '20',
                        'id' => 'extModel14096-20',
                      ),
                      20 => 
                      array (
                        'key' => '25',
                        'value' => '21',
                        'id' => 'extModel14096-21',
                      ),
                      21 => 
                      array (
                        'key' => '25.5',
                        'value' => '22',
                        'id' => 'extModel14096-22',
                      ),
                      22 => 
                      array (
                        'key' => '26',
                        'value' => '23',
                        'id' => 'extModel14096-23',
                      ),
                      23 => 
                      array (
                        'key' => '26.5',
                        'value' => '24',
                        'id' => 'extModel14096-24',
                      ),
                      24 => 
                      array (
                        'key' => '27',
                        'value' => '25',
                        'id' => 'extModel14096-25',
                      ),
                      25 => 
                      array (
                        'key' => '27.5',
                        'value' => '26',
                        'id' => 'extModel14096-26',
                      ),
                      26 => 
                      array (
                        'key' => '28',
                        'value' => '27',
                        'id' => 'extModel14096-27',
                      ),
                      27 => 
                      array (
                        'key' => '28.5',
                        'value' => '28',
                        'id' => 'extModel14096-28',
                      ),
                      28 => 
                      array (
                        'key' => '29',
                        'value' => '29',
                        'id' => 'extModel14096-29',
                      ),
                      29 => 
                      array (
                        'key' => '29.5',
                        'value' => '30',
                        'id' => 'extModel14096-30',
                      ),
                      30 => 
                      array (
                        'key' => '30',
                        'value' => '31',
                        'id' => 'extModel14096-31',
                      ),
                      31 => 
                      array (
                        'key' => '30.5',
                        'value' => '32',
                        'id' => 'extModel14096-32',
                      ),
                      32 => 
                      array (
                        'key' => '31',
                        'value' => '33',
                        'id' => 'extModel14096-33',
                      ),
                      33 => 
                      array (
                        'key' => '31.5',
                        'value' => '34',
                        'id' => 'extModel14096-34',
                      ),
                      34 => 
                      array (
                        'key' => '32',
                        'value' => '35',
                        'id' => 'extModel14096-35',
                      ),
                      35 => 
                      array (
                        'key' => '32.5',
                        'value' => '36',
                        'id' => 'extModel14096-36',
                      ),
                      36 => 
                      array (
                        'key' => '33',
                        'value' => '37',
                        'id' => 'extModel14096-37',
                      ),
                      37 => 
                      array (
                        'key' => '33.5',
                        'value' => '38',
                        'id' => 'extModel14096-38',
                      ),
                      38 => 
                      array (
                        'key' => '34',
                        'value' => '39',
                        'id' => 'extModel14096-39',
                      ),
                      39 => 
                      array (
                        'key' => '34.5',
                        'value' => '40',
                        'id' => 'extModel14096-40',
                      ),
                      40 => 
                      array (
                        'key' => '35',
                        'value' => '41',
                        'id' => 'extModel14096-41',
                      ),
                      41 => 
                      array (
                        'key' => '35.5',
                        'value' => '42',
                        'id' => 'extModel14096-42',
                      ),
                      42 => 
                      array (
                        'key' => '36',
                        'value' => '43',
                        'id' => 'extModel14096-43',
                      ),
                      43 => 
                      array (
                        'key' => '36.5',
                        'value' => '44',
                        'id' => 'extModel14096-44',
                      ),
                      44 => 
                      array (
                        'key' => '37',
                        'value' => '45',
                        'id' => 'extModel14096-45',
                      ),
                      45 => 
                      array (
                        'key' => '37.5',
                        'value' => '46',
                        'id' => 'extModel14096-46',
                      ),
                      46 => 
                      array (
                        'key' => '38',
                        'value' => '47',
                        'id' => 'extModel14096-47',
                      ),
                      47 => 
                      array (
                        'key' => '38.5',
                        'value' => '48',
                        'id' => 'extModel14096-48',
                      ),
                      48 => 
                      array (
                        'key' => '39',
                        'value' => '49',
                        'id' => 'extModel14096-49',
                      ),
                      49 => 
                      array (
                        'key' => '39.5',
                        'value' => '50',
                        'id' => 'extModel14096-50',
                      ),
                      50 => 
                      array (
                        'key' => '40',
                        'value' => '51',
                        'id' => 'extModel14096-51',
                      ),
                      51 => 
                      array (
                        'key' => '40.5',
                        'value' => '52',
                        'id' => 'extModel14096-52',
                      ),
                      52 => 
                      array (
                        'key' => '41',
                        'value' => '53',
                        'id' => 'extModel14096-53',
                      ),
                      53 => 
                      array (
                        'key' => '41.5',
                        'value' => '54',
                        'id' => 'extModel14096-54',
                      ),
                      54 => 
                      array (
                        'key' => '42',
                        'value' => '55',
                        'id' => 'extModel14096-55',
                      ),
                      55 => 
                      array (
                        'key' => '42.5',
                        'value' => '56',
                        'id' => 'extModel14096-56',
                      ),
                      56 => 
                      array (
                        'key' => '43',
                        'value' => '57',
                        'id' => 'extModel14096-57',
                      ),
                      57 => 
                      array (
                        'key' => '43.5',
                        'value' => '58',
                        'id' => 'extModel14096-58',
                      ),
                      58 => 
                      array (
                        'key' => '44',
                        'value' => '59',
                        'id' => 'extModel14096-59',
                      ),
                      59 => 
                      array (
                        'key' => '44.5',
                        'value' => '60',
                        'id' => 'extModel14096-60',
                      ),
                      60 => 
                      array (
                        'key' => '45',
                        'value' => '61',
                        'id' => 'extModel14096-61',
                      ),
                      61 => 
                      array (
                        'key' => '45.5',
                        'value' => '62',
                        'id' => 'extModel14096-62',
                      ),
                      62 => 
                      array (
                        'key' => '46',
                        'value' => '63',
                        'id' => 'extModel14096-63',
                      ),
                      63 => 
                      array (
                        'key' => '46.5',
                        'value' => '64',
                        'id' => 'extModel14096-64',
                      ),
                      64 => 
                      array (
                        'key' => '47',
                        'value' => '65',
                        'id' => 'extModel14096-65',
                      ),
                      65 => 
                      array (
                        'key' => '47.5',
                        'value' => '66',
                        'id' => 'extModel14096-66',
                      ),
                      66 => 
                      array (
                        'key' => '48',
                        'value' => '67',
                        'id' => 'extModel14096-67',
                      ),
                      67 => 
                      array (
                        'key' => '48.5',
                        'value' => '68',
                        'id' => 'extModel14096-68',
                      ),
                      68 => 
                      array (
                        'key' => '49',
                        'value' => '69',
                        'id' => 'extModel14096-69',
                      ),
                      69 => 
                      array (
                        'key' => '49.5',
                        'value' => '70',
                        'id' => 'extModel14096-70',
                      ),
                      70 => 
                      array (
                        'key' => '50',
                        'value' => '71',
                        'id' => 'extModel14096-71',
                      ),
                      71 => 
                      array (
                        'key' => '50.5',
                        'value' => '72',
                        'id' => 'extModel14096-72',
                      ),
                      72 => 
                      array (
                        'key' => '51',
                        'value' => '73',
                        'id' => 'extModel14096-73',
                      ),
                      73 => 
                      array (
                        'key' => '51.5',
                        'value' => '74',
                        'id' => 'extModel14096-74',
                      ),
                      74 => 
                      array (
                        'key' => '52',
                        'value' => '75',
                        'id' => 'extModel14096-75',
                      ),
                      75 => 
                      array (
                        'key' => '',
                        'value' => '',
                        'id' => 'extModel14096-76',
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
                     'name' => 'size',
                     'title' => 'Size',
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
                 'name' => 'Heel Panel',
                 'type' => NULL,
                 'region' => 'east',
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
                  0 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                     'fieldtype' => 'fieldset',
                     'labelWidth' => 100,
                     'name' => 'Heel',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Heel',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox::__set_state(array(
                         'fieldtype' => 'checkbox',
                         'defaultValue' => NULL,
                         'queryColumnType' => 'tinyint(1)',
                         'columnType' => 'tinyint(1)',
                         'phpdocType' => 'bool',
                         'name' => 'has_heel',
                         'title' => 'Has Heel',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                         'fieldtype' => 'quantityValue',
                         'width' => NULL,
                         'unitWidth' => NULL,
                         'defaultValue' => NULL,
                         'defaultUnit' => '2',
                         'validUnits' => 
                        array (
                          0 => '2',
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
                         'name' => 'heel_height',
                         'title' => 'Heel Height',
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
                    ),
                     'locked' => false,
                  )),
                ),
                 'locked' => false,
                 'icon' => '',
              )),
            ),
             'locked' => false,
             'icon' => NULL,
          )),
        ),
         'locked' => false,
         'icon' => '',
      )),
    ),
     'locked' => false,
     'icon' => NULL,
  )),
   'generateTypeDeclarations' => false,
));
