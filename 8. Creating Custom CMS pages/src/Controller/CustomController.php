<?php

namespace App\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Pimcore\Controller\Configuration\ResponseHeader;
use Pimcore\Model\Asset;

class CustomController extends FrontendController
{
    /**
     * The annotation will automatically resolve the view to MyController/myAnnotatedAction.html.twig
     * 
     * @Template() 
     */    
    public function customAction(Request $request)
    {
    }

    /**
     * This example uses parameter from static route and diplays
     * 
     * /custom_data/mypar/
     * 
     * @Template() 
     */    
    public function dataAction(Request $request)
    {
        $input=$request->get('data');
        $this->view->content = "data to show $input";
    }

    /**
     * Using annotation:
     * @ResponseHeader("X-Foo", values={"123456", "98765"})
     */
    public function headerAction(Request $request): Response
    {
        $response = new Response();
        // using code:
        $response->headers->set('X-Foo', 'bar');
        return $response;
    }

    /**
     * Using a non standard template
     * @Template()
     */
    public function differentPathAction()
    {
        return $this->render("Default/default.html.twig", ["foo" => "bar"]);
    }


    public function jsonAction(Request $request)
    {
        return $this->json(array('key' => 'value'));
    }

    /**
     * This example uses renderlet input for rendering a gallery
     * 
     * /custom_data/mypar/
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
