<?php


namespace BlogBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;
use Pimcore\Model\Document\Editable\Area\Info;
use Symfony\Component\HttpFoundation\RedirectResponse;

class SlideShow extends AbstractTemplateAreabrick
{
    public function getName()
    {
        return 'SlideShow';
    }

    public function getDescription()
    {
        return 'SlideShow';
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
        // $document = $info->getDocument();
        //$documentElement=$info->getDocumentElement("name")
        $request=$info->getRequest();
        $view=$info->getView();
        //$info->getParam("name")
        //$params=$info->getParams();

       
        
    }
    public function sendEmail($name,$email,$subject,$message)
    {
            //IMPLEMENT SEND HERE
            return true;        
    }
    public function getTemplateSuffix()
    {
        return static::TEMPLATE_SUFFIX_TWIG;
    }
    
}