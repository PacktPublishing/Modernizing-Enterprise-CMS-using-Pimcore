# Block Editable

## General

The block element is an iterating component which is really powerful.
Basically a block is only a loop, but you can use other editables within this loop, so it's possible to repeat a set of 
editables to create structured content (eg. a link list, or a image gallery).
The items in the loop as well as their order can be defined by the editor with the block controls provided in the editmode. 

## Configuration

| Name        | Type      | Description                                                                                                                  |
|-------------|-----------|------------------------------------------------------------------------------------------------------------------------------|
| `limit`     | integer   | Max. amount of iterations.                                                                                                   |
| `default`   | integer   | If block is empty, this specifies the iterations at startup.                                                                 |
| `manual`    | bool      | Forces the manual mode, which enables a complete custom HTML implementation for blocks, for example using `<table>` elements |
| `class`     | string    | A CSS class that is added to the surrounding container of this element in editmode                                           |

## Methods

| Name            | Return    | Description                                                   |
|-----------------|-----------|---------------------------------------------------------------|
| `isEmpty()`     | bool      | Whether the editable is empty or not.                         |
| `getCount()`    | int       | Get the total amount of iterations.                           |
| `getCurrent()`  | int       | Get the current index while looping.                          |
| `getElements()` | array     | Return a array for every loop to access the defined children. |

## The Block Controls

| Control                                   | Operation                                |
|-------------------------------------------|------------------------------------------|
| ![+](../../img/block_plus.png)            | Add a new block at the current position. |
| ![-](../../img/block_x.png)               | Remove the current block.                |
| ![up and down](../../img/block_order.png) | Move Block up and down.                  |

## Basic Usage

Please use the `loop()` method to iterate through all block elements. This makes sure the correct indices are set internally
to reference the right elements within a block.

As Twig does not provide a `while` construct, there's a specialized function `pimcore_iterate_block` which allows you
to iterate through all block elements.

<div class="code-section">

```php
<?php while($this->block("contentblock")->loop()) { ?>
    <h2><?= $this->input("subline"); ?></h2>
    <?= $this->wysiwyg("content"); ?>
<?php } ?>
```

```twig
{% for i in pimcore_iterate_block(pimcore_block('contentblock')) %}
    <h2>{{ pimcore_input('subline') }}</h2>
    {{ pimcore_wysiwyg('content') }}
{% endfor %}
```

</div>

The result in editmode should looks like to following: 
![Block in editmode](../../img/block_editmode.png)

And in the frontend of the application:
![Block in the frontend](../../img/block_frontend_preview.png)

## Advanced Usage
### Advanced Usage with Different Includes.

```php
<?php while($this->block("contentblock")->loop()) { ?>
    <?php if($this->editmode) { ?>
        <?= $this->select("blocktype", [
            "store" => [
                ["wysiwyg", "WYSIWYG"],
                ["contentimages", "WYSIWYG with images"],
                ["video", "Video"]
            ],
            "reload" => true
        ]); ?>
    <?php } ?>
     
    <?php if(!$this->select("blocktype")->isEmpty()) {
        $this->template("content/blocks/".$this->select("blocktype")->getData().".php");
    } ?>
<?php } ?>
 
<?php while($this->block("teasers", ["limit" => 2])->loop()) { ?>
    <?= $this->snippet("teaser") ?>
<?php } ?>
```

### Example for `getCurrent()`
```php
<?php while ($this->block("myBlock")->loop()) { ?>
    <?php if ($this->block("myBlock")->getCurrent() > 0) { ?>
        Insert this line only after the first iteration<br />
        <br />
    <?php } ?>
    <h2><?= $this->input("subline"); ?></h2>
     
<?php } ?>
```

### Using Manual Mode

The manual mode offers you the possibility to deal with block the way you like, this is for example useful with tables: 

<div class="code-section">

```php
<?php $block = $this->block("gridblock", ["manual" => true])->start(); ?>
<table>
    <tr>
        <?php while ($block->loop()) { ?>
            <?php $block->blockConstruct(); ?>
                <td customAttribute="<?= $this->input("myInput")->getData() ?>">
                    <?php $block->blockStart(); ?>
                        <div style="width:200px; height:200px;border:1px solid black;">
                            <?= $this->input("myInput"); ?>
                        </div>
                    <?php $block->blockEnd(); ?>
                </td>
            <?php $block->blockDestruct(); ?>
        <?php } ?>
    </tr>
</table>
<?php $block->end(); ?>
```

```twig
{% set block = pimcore_block('gridblock', {'manual' : true, 'limit' : 6}).start() %}
<table>
    <tr>
        {% for b in pimcore_iterate_block(block) %}
            {% do block.blockConstruct() %}
              <td customAttribute="{{ pimcore_input("myInput").getData() }}">
                    {% do block.blockStart() %}
                        <div style="width:200px; height:200px;border:1px solid black;">
                            {{ pimcore_input("myInput") }}
                        </div>
                    {% do block.blockEnd() %}
                </td>
            {% do block.blockDestruct() %}
        {% endfor %}
    </tr>
</table>
{% do block.end() %}
```

</div>

### Using Manual Mode with custom button position

If you want to wrap buttons in a div or change the Position.

```php
<?php $block = $this->block("gridblock", ["manual" => true])->start(); ?>
<table>
    <tr>
        <?php while ($block->loop()) { ?>
            <?php $block->blockConstruct(); ?>
                <td customAttribute="<?= $this->input("myInput")->getData() ?>">
                    <?php $block->blockStart('false'); ?>
                        <div style="background-color: #fc0; margin-bottom: 10px; padding: 5px; border: 1px solid black;">
                            <?php $block->blockControls(); ?>
                        </div>
                        <div style="width:200px; height:200px;border:1px solid black;">
                            <?= $this->input("myInput"); ?>
                        </div>
                    <?php $block->blockEnd(); ?>
                </td>
            <?php $block->blockDestruct(); ?>
        <?php } ?>
    </tr>
</table>
<?php $block->end(); ?>
```


### Accessing Data Within a Block Element

Bricks and structure refer to the CMS demo (content/default template).

```php
<?php
// load document
$document = \Pimcore\Model\Document\Page::getByPath('/en/basic-examples/galleries');
 
// Bsp #1 | get the first picture from the first "gallery-single-images" brick
$image = $document
    ->getElement('content')                             // view.html.php > $this->areablock('content')
        ->getElement('gallery-single-images')[0]        // get the first entry for this brick
            ->getBlock('gallery')->getElements()[0]     // view.html.php > $this->block("gallery")->loop()
                ->getImage('image')                     // view.html.php > $this->image("image")
;
 
 
var_dump("Bsp #1: " . $image->getSrc());
```
