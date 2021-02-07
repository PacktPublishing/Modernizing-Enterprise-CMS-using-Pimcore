<?php

namespace AppBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Pimcore\Controller\Configuration\ResponseHeader;

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
     * @Template()
     */
    public function headerAction(Request $request)
    {
        // using code:
        $this->addResponseHeader('X-Foo', 'bar', false, $request);
    }

    /**
     * Using a non standard template
     * @Template()
     */
    public function differentPathAction()
    {
        return $this->render(":Default:default.html.twig", ["foo" => "bar"]);
    }


    public function jsonAction(Request $request)
    {
        return $this->json(array('key' => 'value'));
    }



}
