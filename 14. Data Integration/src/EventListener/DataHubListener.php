<?php

namespace App\EventListener;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Pimcore\Bundle\DataHubBundle\Event\GraphQL\Model\MutationTypeEvent;
use Pimcore\Model\DataObject\Data\QuantityValue;
use Pimcore\Model\DataObject\Product;
use Pimcore\Model\DataObject\QuantityValue\Unit;

class DataHubListener {
     
    public function onMutationEventsPreBuild (MutationTypeEvent $event) {
        $config = $event->getConfig();

        $opName = "updateProductPrice";

        $inputType = new \GraphQL\Type\Definition\InputObjectType([
            'name' => "priceType",
            'fields' => [
                'priceValue' => [
                    'type' => Type::float()
                ],
                'unit' => [
                    'type' => Type::string()
                ]
            ]
        ]);

        $operation = [
            'type' => Type::string(),           // the result type
            'args' => [
                'id' => ['type' => Type::nonNull(Type::int())],
                'input' => ['type' => $inputType],
            ], 'resolve' => function ($source, $args, $context, ResolveInfo $info) {
                $id = $args['id'];

                $product = Product::getById($id);

                if(empty($product)){
                    throw new \Exception("Product with id '$id' does not exists.");
                }

                $value = $args['input']['priceValue'];
                $uom = $args['input']['unit'];

                $unit = Unit::getByAbbreviation($uom);

                if(empty($unit)){
                    throw new \Exception("Unit of measure '$uom' does not exists.");
                }

                $price = new QuantityValue();
                $price->setValue($value);
                $price->setUnitId($unit->getId());

                $product->setPrice($price);
                $product->save();

                return "Price updated for product with id '$id'";
            }

        ];

        $config['fields'][$opName] = $operation;
        $event->setConfig($config);
    }
}