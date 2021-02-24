
<?php

use Pimcore\Model\Asset;
use Pimcore\Model\Asset\Image;

$this->websiteConfig();

$headerText=$this->websiteConfig('SiteTitle');
$slogan=$this->websiteConfig('Slogan');
$imagePath=$this->websiteConfig('HeaderLogo');

$asset = Image::getByPath($imagePath);
?>

<div class="jumbotron">
  <h1><img src='<?= $asset->getFullPath() ;?>' /><?=$headerText?></h1>
  <p><?=$slogan?></p>
</div>