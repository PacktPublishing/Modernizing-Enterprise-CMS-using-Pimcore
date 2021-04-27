<?php

namespace AppBundle\Import\Operators;

use Pimcore\DataObject\Import\ColumnConfig\Operator\AbstractOperator;
use Pimcore\Model\DataObject\ClassDefinition;

class SelectOperator extends AbstractOperator{
    
    protected $additionalData;
    
    public function __construct(\stdClass $config, $context = null) {
        parent::__construct($config, $context);

        $this->additionalData = json_decode($config->additionalData, true);
    }
    
    public function process($element, &$target, array &$rowData, $colIndex, array &$context = array()) {  
        
        $value = $rowData[$colIndex];
        $field = $this->additionalData["field"];

        $target->set($field, $this->getValueByDisplayName($target->getClass(), $field, $value));
    }
    
    public function getValueByDisplayName(ClassDefinition $class, $field, $displayName){
        $fieldDefinition = $class->getFieldDefinition($field);
        
        if(in_array($fieldDefinition->getFieldtype(), array("select", "multiselect"))){
            $options = $fieldDefinition->getOptions();
            $option = array_search(strtolower($displayName), array_map('strtolower', array_column($options, "key")));
            return $option !== false ? $options[$option]["value"] : null;
        }
        
        return null;
    }

}
