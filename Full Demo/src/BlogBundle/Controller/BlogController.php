<?php

namespace BlogBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use \Pimcore\Model\DataObject;

class BlogController extends FrontendController
{
    /**
     * The annotation will automatically resolve the view to MyController/myAnnotatedAction.html.twig
     * 
     * @Template() 
     */   
    public function defaultAction(Request $request)
    {
        $slug = $request->get('slug');
        $entries = new DataObject\Article\Listing();

        $entries->setCondition("slug LIKE ?", [$slug]);
        $entries->load();

    
        foreach($entries as $entry) {
            $this->view->article =$entry;
        }        
           
    
    }
}