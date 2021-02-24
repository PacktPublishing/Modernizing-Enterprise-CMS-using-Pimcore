<?php

namespace BlogBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Pimcore\Model\Asset;

class SlideShowController extends FrontendController
{
      /**
     * 
     * @Template() 
     */    
    public function galleryAction(Request $request)
    {
        if ('asset' === $request->get('type')) {
            $asset = Asset::getById($request->get('id'));
            if ('folder' === $asset->getType()) {
                $this->view->assets = $asset->getChildren();
            }
        }
    }

}
