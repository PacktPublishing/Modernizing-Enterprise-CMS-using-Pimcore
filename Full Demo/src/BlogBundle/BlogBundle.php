<?php

namespace BlogBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class BlogBundle extends AbstractPimcoreBundle
{
    public function getJsPaths()
    {
        return [
            '/bundles/blog/js/pimcore/startup.js'
        ];
    }

    public function getInstaller()
    {        
        return $this->container->get(Setup\BlogInstaller::class);      
    }
}