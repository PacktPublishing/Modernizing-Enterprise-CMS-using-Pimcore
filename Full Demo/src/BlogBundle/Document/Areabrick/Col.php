<?php


namespace BlogBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;
use Pimcore\Model\Document\Tag\Area\Info;
use Symfony\Component\HttpFoundation\RedirectResponse;

class Col extends AbstractTemplateAreabrick
{
    public function getName()
    {
        return 'Col';
    }

    public function getDescription()
    {
        return 'Col';
    }

    public function getTemplateLocation()
    {
        return static::TEMPLATE_LOCATION_BUNDLE;
    }
    public function hasEditTemplate()
    {
        return true;
    }

    public function action(Info $info)
    {   
        $view=$info->getView();          
        $view->id= "cl".$info->getEditable()->getName();
        $tag=$info->getTag();
        $view->tag=$tag;
        $mehtods=get_class_methods ( $tag->getOptions());
        $view->tags=print_r($tag->getOptions(), true);//implode(',',$mehtods);
        
        $view->params=print_r($info->getParams(), true);
        
    }
   
    public function getTemplateSuffix()
    {
        return static::TEMPLATE_SUFFIX_TWIG;
    }

    public function getHtmlTagOpen(Info $info)
    {
      
        $colsize= $this->getDocumentEditable($info->getDocument(), 'select', 'colsize')->getData();
        return "<div class='col col-$colsize'>";
    }

    public function getHtmlTagClose(Info $info)
    {
        return '</div>';
    }
}