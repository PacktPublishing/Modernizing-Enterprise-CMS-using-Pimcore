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
        $request=$info->getRequest();
    }
   
    public function getTemplateSuffix()
    {
        return static::TEMPLATE_SUFFIX_TWIG;
    }
    
}