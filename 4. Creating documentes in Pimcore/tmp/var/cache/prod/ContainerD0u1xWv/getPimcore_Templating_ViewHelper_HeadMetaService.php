<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'pimcore.templating.view_helper.head_meta' shared autowired service.

@trigger_error('The "pimcore.templating.view_helper.head_meta" service is deprecated and will be removed in Pimcore 7', E_USER_DEPRECATED);

return $this->services['pimcore.templating.view_helper.head_meta'] = new \Pimcore\Templating\Helper\HeadMeta(($this->services['pimcore.templating.view_helper.placeholder.container_service'] ?? $this->load('getPimcore_Templating_ViewHelper_Placeholder_ContainerServiceService.php')));