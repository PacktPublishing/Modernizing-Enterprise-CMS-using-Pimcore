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
use Pimcore\Model\Asset;

class BlogController extends FrontendController
{

    /**
     *
     * @Template() 
     */   
    // get list of categories: /blog
    public function blogAction(Request $request) {
        // get all categories
        $this->view->categories = $this->getAllCategories();
    }


    /**
     *  get detail of article: /blog/article/id|slug
     * @Template() 
     */   
    public function articleAction(Request $request,$page) {
        // by id
        if (intval($page)) {
            $article = DataObject\BlogArticle::getById($page);
        }
        else { // by slug
            $slug = UrlSlug::resolveSlug("/$page");

            if ($slug instanceof UrlSlug) {
                $id = $slug->getObjectId();
                if (intval($id) && $id > 0) {
                    $article =  DataObject\BlogArticle::getById($id);
                }
            }
               
        }
      
        if ( !( $article instanceof DataObject\BlogArticle || $article->isPublished() ) ) {
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
     * get list article by category: /blog/category/id|slug
     * @Template() 
     */   
    public function categoryAction(Request $request, $page) {
        
        if (intval($page)) {
            $category = DataObject\BlogCategory::getById($page);
        } else {
            $slug = UrlSlug::resolveSlug("/$page");
            
            if ($slug instanceof UrlSlug) {
                $id = $slug->getObjectId();
                if (intval($id) && $id > 0) {
                    $category = DataObject\BlogCategory::getById($id);
                }
            }
               
        }
      
        if ( !( $category instanceof DataObject\BlogCategory || $category->isPublished() ) ) {
            // if elemento not found, redirect to blog
            //return $this->redirect('/blog');
            // or throw new exception 404
            throw new NotFoundHttpException('category not found.');
        }
        
        $articles = new DataObject\BlogArticle\Listing();
        $articles->setCondition('Category__id = ' . $category->getId()); 
        
        $this->view->category = $category;
        $this->view->articles = $articles;

        // get all categories for widget
        $this->view->categories = $this->getAllCategories();

    }


    /**
     * get author page info: /blog/author/id|slug
     * @Template() 
     */   
    public function authorAction(Request $request, $page) {
        
        if (intval($page)) {
            $author = DataObject\BlogAuthor::getById($page);
        }
        else {
            $slug = UrlSlug::resolveSlug("/$page");
            
            if ($slug instanceof UrlSlug) {

                $id = $slug->getObjectId();
                if (intval($id) && $id > 0) {
                    $author = DataObject\BlogAuthor::getById($id);
                }
            }
               
        }
      
        if ( !( $author instanceof DataObject\BlogAuthor || $author->isPublished() ) ) {
            // if elemento not found, redirect to blog
            //return $this->redirect('/blog');
            // or throw new exception 404
            throw new NotFoundHttpException('author not found.');
        }
        
        $articles = new DataObject\BlogArticle\Listing();
        $articles->setCondition('Author__id = ' . $author->getId()); 
        $this->view->articles = $articles;

        // set thumbnails
        $photoId = $author->getPhoto()->getId();
        $img = Asset::getById($photoId)->getThumbnail(["width" => 220])->getHtml(["class" => ""]);
        $author->photo = $img;
        
        $this->view->author = $author;

    }
     
    /**
     * 
     * @Template() 
     */   

    public function defaultAction(Request $request) {
       
    }



    /**
     * get a complete list of categories for blog
     */
    public  function getAllCategories() {

         // get all categories
         $categories = new DataObject\BlogCategory\Listing();

         foreach ($categories as $category) {
             $articles = new DataObject\BlogArticle\Listing();
             $articles->setCondition('Category__id = ' . $category->getId());       
             $category->ArticleCount = $articles->getTotalCount();
             if( !empty( $category->getSlug()[0]->getSlug()) ) {
                 $category->link = $category->getSlug()[0]->getSlug();
             }
         
         }

        return $categories;

    }

    
}