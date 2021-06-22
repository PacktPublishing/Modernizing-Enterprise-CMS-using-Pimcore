<?php 

/** 
*/ 


return Pimcore\Model\DataObject\ClassDefinition\CustomLayout::__set_state(array(
   'id' => 'translations',
   'name' => 'Translations',
   'description' => '',
   'creationDate' => 1622049843,
   'modificationDate' => 1622049867,
   'userOwner' => 2,
   'userModification' => 0,
   'classId' => 'PRD',
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
    ),
     'locked' => false,
     'blockedVarsForExport' => 
    array (
    ),
     'icon' => NULL,
     'labelWidth' => 100,
     'labelAlign' => 'left',
  )),
   'default' => 0,
   'dao' => NULL,
   'blockedVarsForExport' => 
  array (
  ),
));
