<?php

namespace Symfony\Config\Pimcore;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class ErrorHandlingConfig 
{
    private $renderErrorDocument;
    
    /**
     * Render error document in case of an error instead of showing Symfony's error page
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function renderErrorDocument($value): self
    {
        $this->renderErrorDocument = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['render_error_document'])) {
            $this->renderErrorDocument = $value['render_error_document'];
            unset($value['render_error_document']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->renderErrorDocument) {
            $output['render_error_document'] = $this->renderErrorDocument;
        }
    
        return $output;
    }
    

}
