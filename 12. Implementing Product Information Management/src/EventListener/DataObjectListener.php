<?php

namespace App\EventListener;

use Pimcore\Event\Model\DataObjectEvent;
use Pimcore\Model\DataObject\Product;

class DataObjectListener {
     
    public function onObjectPostUpdate (DataObjectEvent $e) {
        $obj = $e->getObject(); 
        
        if($obj instanceof Product){
            $bundleProducts = $obj->getBundle_products();

            $currentPrice = $obj->getBundlePrice();

            if(count($bundleProducts) > 0){
                $bundlePrice = 0;
                
                foreach($bundleProducts as $product){
                    $price = $product->getPrice()->getValue();
                    $bundlePrice += $price;
                }

                /**
                 * substract the 20% of the sum
                 */
                $bundlePrice = round($bundlePrice*0.8,2);

                //Add this check to avoid circular saves
                if($bundlePrice != $currentPrice){
                    $obj->setBundlePrice($bundlePrice);
                    $obj->save();
                }
            }
        }
    }
}