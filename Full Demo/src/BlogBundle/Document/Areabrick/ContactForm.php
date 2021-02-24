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
        $sendEmail=true;
        if(sendEmail)
        {
            $name="";
            $email="";
            $subject="";
            $message="";

            //send an email here
            $message="The email was successfully sent."
            $info->name=$name;
            $info->email=$email;
            $info->subject=$subject;
            $info->message=$message;
        }
        
    }
    public function getTemplateSuffix()
    {
        return static::TEMPLATE_SUFFIX_TWIG;
    }
    
}