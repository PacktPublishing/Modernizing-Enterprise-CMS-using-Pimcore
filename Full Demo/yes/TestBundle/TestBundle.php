<?php

namespace TestBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class TestBundle extends AbstractPimcoreBundle
{
    public function getJsPaths()
    {
        return [
            '/bundles/test/js/pimcore/startup.js'
        ];
    }
}