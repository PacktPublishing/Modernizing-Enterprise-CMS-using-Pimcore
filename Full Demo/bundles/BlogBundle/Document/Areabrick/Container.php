<?php


namespace BlogBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;
use Pimcore\Extension\Document\Areabrick\EditableDialogBoxInterface;
use Pimcore\Extension\Document\Areabrick\EditableDialogBoxConfiguration;
use Pimcore\Model\Document\Editable\Area\Info;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Pimcore\Model\Document;
use Pimcore\Model\Document\Tag;

class Container extends AbstractTemplateAreabrick implements EditableDialogBoxInterface
{

    public function getName()
    {
        return 'Container';
    }

    public function getDescription()
    {
        return 'Container';
    }

    public function getTemplateLocation()
    {
        return static::TEMPLATE_LOCATION_BUNDLE;
    }


    public function action(Info $info)
    {  
        $request=$info->getRequest();
    
        

        $layout=$this->getDocumentEditable($info->getDocument(), 'select', 'layout')->getData();
        if(!$layout)
        {
            $layout='one.html.twig';
        }
        $info->setParam('layout',"@Blog/areas/container/templates/$layout");        
       
    }

    public function getEditableDialogBoxConfiguration(Document\Editable $area, ?Info $info): EditableDialogBoxConfiguration
    {
        $config = new EditableDialogBoxConfiguration();
        $config->setWidth(600);
        $config->setItems([
            'type' => 'tabpanel',
            'items' => [
                [
                    'type' => 'panel',
                    'title' => 'Column settings',
                    'items' => [
                        [
                            'type' => 'select',
                            'label' => 'Layout',
                            'name' => 'layout',
                            'config' => [
                                'store' => [
                                    ['one.html.twig', 'One column'],
                                    ['two-50-50.html.twig', 'Two column 50-50'],
                                    ['two-30-70.html.twig', 'Tre column 30-70'],
                                ]
                            ]
                        ]
                        
            ]
            ]
        ]]);


        return $config;
    }

}