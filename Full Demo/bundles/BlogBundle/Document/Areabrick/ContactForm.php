<?php


namespace BlogBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;
use Pimcore\Extension\Document\Areabrick\EditableDialogBoxInterface;
use Pimcore\Extension\Document\Areabrick\EditableDialogBoxConfiguration;
use Pimcore\Model\Document\Editable\Area\Info;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Pimcore\Model\Document;
use Pimcore\Model\Document\Tag;

class ContactForm extends AbstractTemplateAreabrick implements EditableDialogBoxInterface
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
        $request=$info->getRequest();
    
        $id= $info->getEditable()->getName();
        $info->setParam('id', $id);

        $sendEmail=$request->get("sendEmail");
        if($sendEmail==$id)
        {
            $name=$request->get("name");
            $email=$request->get("email");
            $subject=$request->get("subject");
            $message=$request->get("message");
           
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
            $info->setParam('name',$name);
            $info->setParam('email',$email);
            $info->setParam('subject',$subject);
            $info->setParam('message',$message);
            $info->setParam('alert',$alert);
           
            
        }

        $recipient=$this->getDocumentEditable($info->getDocument(), 'input', 'recipient')->getData();
        $info->setParam('recipient',$recipient);        
        
    }

    public function getEditableDialogBoxConfiguration(Document\Editable $area, ?Info $info): EditableDialogBoxConfiguration
    {
        $config = new EditableDialogBoxConfiguration();
        $config->setWidth(600);
        //$config->setReloadOnClose(true);
        $config->setItems([
            'type' => 'tabpanel',
            'items' => [
                [
                    'type' => 'panel',
                    'title' => 'Contact Form Settings',
                    'items' => [
                        [
                            'type' => 'input',
                            'label' => 'Email Recipient',
                            'name' => 'recipient'
                        ]
                        
            ]
            ]
        ]]);


        return $config;
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