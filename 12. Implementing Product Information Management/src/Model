<?php

namespace AppBundle\Model;

use Pimcore\Model\DataObject;

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
}
