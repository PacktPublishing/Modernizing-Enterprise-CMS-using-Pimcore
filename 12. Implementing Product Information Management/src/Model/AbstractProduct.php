<?php

namespace App\Model;

use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields;
use Pimcore\Model\DataObject\Fieldcollection;

class AbstractProduct extends DataObject\Concrete
{
    /**
     * The getChildren function natively returns
     * objects of type 'object' or 'folder'.
     * 
     * The 'variant' type must be explicitly specified
     * @return self[]
     */
    public function getVariants(){
        $variantType = self::OBJECT_TYPE_VARIANT; //variant
        $variants = $this->getChildren(array($variantType));
        return $variants;
    }

    public function checkBaseDataCompleted(){
        return !empty($this->get("sku")) && !empty($this->get("price"));
    }

    public function checkTranslationsCompleted(){
        $config = \Pimcore\Config::getSystemConfiguration();
        $languages = explode(",",$config["general"]["valid_languages"]);

        /**@var Localizedfields $localizedFields */
        $localizedFields = $this->getClass()->getFieldDefinition("localizedfields");
        $fields = $localizedFields->getFieldDefinitions(); 
        
        foreach ($fields as $field) {
            $fielname = $field->getName();

            foreach ($languages as $lang) {
                if(empty($this->get($fielname, $lang))){
                    return false;
                }
            }
        }

        return true;
    }

    public function checkImagesInserted(){
        /** @var Fieldcollection $images */
        $images = $this->get("images");

        return !empty($images) && count($images->getItems()) > 0;
    }
}
