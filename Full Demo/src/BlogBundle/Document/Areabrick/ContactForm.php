<?php


namespace BlogBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;
use Pimcore\Model\Document\Tag\Area\Info;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ContactForm extends AbstractTemplateAreabrick
{
    public function getName()
    {
        return 'ContactForm';
    }

    public function getDescription()
    {
        return 'ContactForm';
    }

    public function getTemplateLocation()
    {
        return static::TEMPLATE_LOCATION_BUNDLE;
    }
    public function hasEditTemplate()
    {
        return true;
    }

    public function action(Info $info)
    {  
        // $document = $info->getDocument();
        //$documentElement=$info->getDocumentElement("name")
        $request=$info->getRequest();
        $view=$info->getView();
        //$info->getParam("name")
        //$params=$info->getParams();

        $sendEmail=$request->get("sendEmail");
        if($sendEmail)
        {
            $name=$request->get("name");
            $email=$request->get("email");
            $subject=$request->get("subject");
            $message=$request->get("message");
            $recipient=$title = $this->getDocumentEditable($info->getDocument(), 'input', 'recipient')->getData();

            //send an email here
            $sent= $this->sendEmail($name,$email,$subject,$message, $recipient);
            if($sent)
            {
                $alert="the message is sent!";
            }
            else
            {
                $alert="there was an error, try later";
            }
            $view->name=$name;
            $view->email=$email;
            $view->subject=$subject;
            $view->message=$message;
            $view->alert=$alert;
        }
        
    }
    public function sendEmail($name,$email,$subject,$message)
    {
            //IMPLEMENT SEND HERE
            return true;        
    }
    public function getTemplateSuffix()
    {
        return static::TEMPLATE_SUFFIX_TWIG;
    }
    
}