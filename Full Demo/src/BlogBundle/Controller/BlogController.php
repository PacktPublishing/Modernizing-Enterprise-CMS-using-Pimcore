<?php

namespace BlogBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use \Pimcore\Model\DataObject;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class BlogController extends FrontendController
{

    /**
     * The annotation will automatically resolve the view to MyController/myAnnotatedAction.html.twig
     * 
     * @Template() 
     */   
    public function articleAction(Request $request, $page)
    {
        
        $this->view->page = $page;
        $myObject = DataObject\BLOGARTICLE::getById( $page);
        $this->view->article = $myObject;
    }

     /**
     * The annotation will automatically resolve the view to MyController/myAnnotatedAction.html.twig
     * 
     * @Template() 
     */   
    public function categoryAction(Request $request)
    {

    }


     /**
     *
     * @Template() 
     */   
    public function blogAction(Request $request)
    {
       
    }

    /**
     * The annotation will automatically resolve the view to MyController/myAnnotatedAction.html.twig
     * 
     * @Template() 
     */   
    public function defaultAction(Request $request)
    {
        $slug = $request->get('slug');
       // $entries = new DataObject\Article\Listing();

      //  $entries->setCondition("slug LIKE ?", [$slug]);
      //  $entries->load();

    
       // foreach($entries as $entry) {
       //     $this->view->article =$entry;
        //}     
    }
}