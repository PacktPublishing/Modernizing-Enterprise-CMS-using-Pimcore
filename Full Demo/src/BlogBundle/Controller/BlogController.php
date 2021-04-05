<?php

namespace BlogBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use \Pimcore\Model\DataObject;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use \Symfony\Component\HttpKernel\Exception\NotFoundHttpException; 
use Symfony\Component\Intl\Exception\NotImplementedException;

use Pimcore\Model\DataObject\Data\UrlSlug;

class BlogController extends FrontendController
{

    /**
     *
     * @Template() 
     */   
    // get list of categories
    public function blogAction(Request $request) {
        // get all categories
        $categories = new DataObject\BlogCategory\Listing();
        foreach ($categories as $category) {
            $articles = new DataObject\BlogArticle\Listing();
            $articles->setCondition('Category__id = ' . $category->getId());       
            $category->ACount = $articles->getTotalCount();
            if( !empty( $category->getSlug()[0]->getSlug()) ) {
                $category->link = $category->getSlug()[0]->getSlug();
            }
        
        }
        $this->view->categories = $categories;

    }


    /**
     * The annotation will automatically resolve the view to MyController/myAnnotatedAction.html.twig
     * 
     * @Template() 
     */   
    // get detail of article
    public function articleAction(Request $request,$page) {
        // by id
        if (intval($page)) {
            $article = DataObject\BlogArticle::getById($page);
        }
        else {
            $slug = UrlSlug::resolveSlug("/$page");

            if ($slug instanceof UrlSlug) {
                $id = $slug->getObjectId();
                if (intval($id) && $id > 0) {
                    $article =  DataObject\BlogArticle::getById($id);
                }
            }
               
        }
      
        if (!($article instanceof DataObject\BlogArticle && ($article->isPublished() || $this->verifyPreviewRequest($request, $article)))) {
            // if elemento not found, redirect to blog
            return $this->redirect('/blog');
            // or throw new exception 404
            throw new NotFoundHttpException('Article not found.');
        }

        // get all categories for widget
        $this->view->categories = $this->getAllCategories();
        
        $this->view->article = $article;
    }

     /**
     * The annotation will automatically resolve the view to MyController/myAnnotatedAction.html.twig
     * 
     * @Template() 
     */   
    // get list article by category
    public function categoryAction(Request $request, $page) {
        
        if (intval($page)) {
            $category = DataObject\BlogCategory::getById($page);
        }
        else {
            $slug = UrlSlug::resolveSlug("/$page");
            
            if ($slug instanceof UrlSlug) {

                $id = $slug->getObjectId();
                if (intval($id) && $id > 0) {
                    $category = DataObject\BlogCategory::getById($id);
                }
            }
               
        }
      
        if (!($category instanceof DataObject\BlogCategory && ($category->isPublished() || $this->verifyPreviewRequest($request, $category)))) {
            // if elemento not found, redirect to blog
            //return $this->redirect('/blog');
            // or throw new exception 404
            throw new NotFoundHttpException('category not found.');
        }
        
        $articles = new DataObject\BlogArticle\Listing();
        $articles->setCondition('Category__id = ' . $category->getId()); 
        $this->view->articles = $articles;

        // get all categories for widget
        $this->view->categories = $this->getAllCategories();

    }

     
    /**
     * The annotation will automatically resolve the view to MyController/myAnnotatedAction.html.twig
     * 
     * @Template() 
     */   
    public function defaultAction(Request $request) {
       
    }

    public  function getAllCategories() {
        // get all categories for widget
        $categories = new DataObject\BlogCategory\Listing();
        
        foreach ($categories as $category) {
            if( !empty( $category->getSlug()[0]->getSlug()) ) {
                $category->link = $category->getSlug()[0]->getSlug();
            }
        }

        return $categories;

    }

    
}