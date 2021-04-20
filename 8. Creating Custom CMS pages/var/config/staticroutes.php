<?php 

return [
    1 => [
        "id" => 1,
        "name" => "custom",
        "pattern" => "/\\/custom_data\\/(.*)?\\//",
        "reverse" => "/custom_data/%data/",
        "module" => NULL,
        "controller" => "@App\\Controller\\CustomController",
        "action" => "data",
        "variables" => "data,",
        "defaults" => "empty",
        "siteId" => [

        ],
        "methods" => [

        ],
        "priority" => 1,
        "creationDate" => 1612695952,
        "modificationDate" => 1612696747
    ]
];
