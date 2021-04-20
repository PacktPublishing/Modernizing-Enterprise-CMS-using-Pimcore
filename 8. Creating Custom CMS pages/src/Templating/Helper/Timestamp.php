<?php
declare(strict_types=1);
namespace AppBundle\Templating\Helper;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;


class Timestamp  extends AbstractExtension
{
    
    public function getFunctions()
    {
        return [
            new TwigFunction('timestamp', [$this, 'timestamp']),
        ];
    }    

    public function timestamp(String $format)
    {     
       echo date($format);
    }
}