<?php


use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use \Pimcore\Model\DataObject;


$max=$this->numeric('elements')->getData();
if($max<1)
{
    $max=10;
}

$entries = new DataObject\Article\Listing();

$entries->setLimit($max );
$entries->setOrderKey("o_creationDate");
$entries->setOrder("desc");
$entries->load();

        

?>



<?php if(!$this->select("template")->isEmpty()) {
  
  echo  $this->template("views/Areas/blog-roll/template/".$this->select("template")->getData().".php",[
        "items" => $entries
    ]);
} ?>





