<?php
/**
 * @var \Pimcore\Templating\PhpEngine $this
 * @var \Pimcore\Templating\PhpEngine $view
 * @var \Pimcore\Templating\GlobalVariables $app
 */

$this->extend('layout.html.php');


$this->headMeta()->appendName('title', 'My SEO description for my awesome page');
?>

<h1><?= $this->article->get("Title") ?></h1>

<div>
<?= $this->article->get("Category") ?>
</div>
<div>
    <?= $this->article->get("Body") ?>
</div>
