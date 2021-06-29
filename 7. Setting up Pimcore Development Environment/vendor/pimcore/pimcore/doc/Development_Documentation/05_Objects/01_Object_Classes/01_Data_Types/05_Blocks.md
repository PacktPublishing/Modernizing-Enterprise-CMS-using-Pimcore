# Blocks

The block data type acts as a simple container for other data fields. 
Similar to a field collection, an unlimited number of block elements can be created.

A block element can be placed into a localized field but can also contain a localized field itself. 
Nesting is not possible.

![Block data type](../../../img/ObjectsBlocks_data_container.jpg)

![Block, edit peview](../../../img/ObjectsBlocks_edit_preview.png)


> The block data basically just gets serialized into a single database column. 
> As a consequence, this container type is not suitable, if you are planning to query the data.

### API Usage

Let us consider the following class definition

![Class Definition](../../../img/block-classdefinition.png)

and object data
 
 ![Class Definition](../../../img/block-values.png)

The value of the second input field can be retrieved as follows:

```php
        $object = DataObject\BlockClass::getById(48);
        /** @var  $blockData DataObject\ClassDefinition\Data\Block */
        $blockItems = $object->getBlockElement1();
        /** @var  $firstBlockItem DataObject\Data\BlockElement */
        $firstBlockItem = $blockItems[0];
        echo($firstBlockItem["input2"]->getData());
```

The output will be "value2".

The value can be updated in a similar way.

```php
        // ... same as above ...
        $firstBlockItem["input2"]->setData(time());
        $object->save();
```

Get Values of Localized Block Entries:

```php
        $object = DataObject\BlockClass::getById(48);
        /** @var  $blockData DataObject\ClassDefinition\Data\Block */
        $blockItems = $object->getBlockElement1();
        /** @var  $firstBlockItem DataObject\Data\BlockElement */
        $firstBlockItem = $blockItems[0];
        $localizedfields = $firstBlockItem["localizedfields"]->getData();
        // after that use it as you would to it with `Pimcore\Model\DataObject\LocalizedField::getLocalizedValue`
```

Create a Block:

```php
/** 
 * @var DataObject\Data\BlockElement $blockElement 
 * 
 * BlockElement( name, type, data )
 */
 $object = DataObject::getById(4);
 
 $data = [
    "input1" => new BlockElement('input1', 'input', 'NewValue1'),
    "input2" => new BlockElement('input2', 'input', 'NewValue2'),
    "myhref" => new BlockElement('myhref', 'manyToManyRelation', [$object])
    ];
 
 $blockElement = new BlockClass();
 $blockElement->setBlockElement1([$data]);
```

Create a Block with localized fields:
```php
$object = DataObject::getById(4);

$data = [
    "input1" => new BlockElement('input1', 'input', 'NewValue1'),
    "input2" => new BlockElement('input2', 'input', 'NewValue2'),
    "myhref" => new BlockElement('myhref', 'manyToManyRelation', [$object]),
    "localizedfields" => new BlockElement('localizedfields', 'localizedfields', new Localizedfield([
        "de" => [
            "localizedInput" => "Mein deutscher Text"
        ],
        "en" => [
            "localizedInput" => "My English text"
        ]
    ]))
];

$object->setMyBlockField([$data]); 
```
