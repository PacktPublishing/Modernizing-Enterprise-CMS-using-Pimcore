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
     * Get list of categories. route /blog
     * @Template() 
     */   
    public function blogAction(Request $request) {

        return $this->renderTemplate(
                '@Blog/Blog/blog.html.twig',array(
               'categories' => $this->getAllCategories() // get all categories for widget
        ));

    }


    /**
     *  Get detail of article. route: /blog/article/id|slug
     * @Template() 
     */   
    public function articleAction(Request $request,$page) {
       
        if (intval($page)) { // by id
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
            // article not found, redirect to blog
            return $this->redirect('/blog');
        }

        return $this->renderTemplate(
            '@Blog/Blog/article.html.twig',array(
                    'categories' => $this->getAllCategories(), // get all categories for widget
                    'article' => $article
            ));
    }

     /**
     * Get list article by category. route: /blog/category/id|slug
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
            return $this->redirect('/blog');
        }
        
        $articles = new DataObject\BlogArticle\Listing();
        $articles->setCondition('Category__id = ' . $category->getId()); 
        
        return $this->renderTemplate(
            '@Blog/Blog/category.html.twig',array(
                    'categories' => $this->getAllCategories(), // get all categories for widget
                    'articles'    => $articles,
                    'category'   => $category
        ));

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
            return $this->redirect('/blog');
        }
        
        $articles = new DataObject\BlogArticle\Listing();
        $articles->setCondition('Author__id = ' . $author->getId()); 

        // set thumbnails
        $photoId = $author->getPhoto()->getId();
        $img = Asset::getById($photoId)->getThumbnail(["width" => 220])->getHtml(["class" => ""]);
        $author->photo = $img;
        

        return $this->renderTemplate(
            '@Blog/Blog/author.html.twig',array(
                    'articles' => $articles,
                    'author' => $author
        ));

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