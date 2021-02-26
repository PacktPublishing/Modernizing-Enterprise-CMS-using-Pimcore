<?php


namespace BlogBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;
use Pimcore\Model\Document\Tag\Area\Info;
use Symfony\Component\HttpFoundation\RedirectResponse;

class Row extends AbstractTemplateAreabrick
{
    public function getName()
    {
        return 'Row';
    }

    public function getDescription()
    {
        return 'Row';
    }

    public function getTemplateLocation()
    {
        return static::TEMPLATE_LOCATION_BUNDLE;
    }
    public function hasEditTemplate()
    {
        return false;
    }

    public function action(Info $info)
    {   
        $view=$info->getView();          
        $view->id= "cl".$info->getEditable()->getName();
        
    }
   
    public function getTemplateSuffix()
    {
        return static::TEMPLATE_SUFFIX_TWIG;
    }
    
    public function getHtmlTagOpen(Info $info)
    {    
       
        return "<div class='row'>".parent::getHtmlTagOpen($info);
    }

    public function getHtmlTagClose(Info $info)
    {
        return parent::getHtmlTagClose($info).'</div>';
    }
}