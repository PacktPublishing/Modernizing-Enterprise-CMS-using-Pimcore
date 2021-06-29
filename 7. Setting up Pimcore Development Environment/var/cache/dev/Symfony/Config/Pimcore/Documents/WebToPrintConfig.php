<?php

namespace Symfony\Config\Pimcore\Documents;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class WebToPrintConfig 
{
    private $pdfCreationPhpMemoryLimit;
    private $defaultControllerPrintPage;
    private $defaultControllerPrintContainer;
    
    /**
     * @default '2048M'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function pdfCreationPhpMemoryLimit($value): self
    {
        $this->pdfCreationPhpMemoryLimit = $value;
    
        return $this;
    }
    
    /**
     * @default 'App\\Controller\\Web2printController::defaultAction'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function defaultControllerPrintPage($value): self
    {
        $this->defaultControllerPrintPage = $value;
    
        return $this;
    }
    
    /**
     * @default 'App\\Controller\\Web2printController::containerAction'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function defaultControllerPrintContainer($value): self
    {
        $this->defaultControllerPrintContainer = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['pdf_creation_php_memory_limit'])) {
            $this->pdfCreationPhpMemoryLimit = $value['pdf_creation_php_memory_limit'];
            unset($value['pdf_creation_php_memory_limit']);
        }
    
        if (isset($value['default_controller_print_page'])) {
            $this->defaultControllerPrintPage = $value['default_controller_print_page'];
            unset($value['default_controller_print_page']);
        }
    
        if (isset($value['default_controller_print_container'])) {
            $this->defaultControllerPrintContainer = $value['default_controller_print_container'];
            unset($value['default_controller_print_container']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->pdfCreationPhpMemoryLimit) {
            $output['pdf_creation_php_memory_limit'] = $this->pdfCreationPhpMemoryLimit;
        }
        if (null !== $this->defaultControllerPrintPage) {
            $output['default_controller_print_page'] = $this->defaultControllerPrintPage;
        }
        if (null !== $this->defaultControllerPrintContainer) {
            $output['default_controller_print_container'] = $this->defaultControllerPrintContainer;
        }
    
        return $output;
    }
    

}
