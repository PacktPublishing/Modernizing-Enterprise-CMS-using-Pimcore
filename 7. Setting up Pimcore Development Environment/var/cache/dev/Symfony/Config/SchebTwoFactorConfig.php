<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'SchebTwoFactor'.\DIRECTORY_SEPARATOR.'GoogleConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class SchebTwoFactorConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $persister;
    private $modelManagerName;
    private $securityTokens;
    private $ipWhitelist;
    private $ipWhitelistProvider;
    private $twoFactorTokenFactory;
    private $twoFactorCondition;
    private $google;
    
    /**
     * @default 'scheb_two_factor.persister.doctrine'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function persister($value): self
    {
        $this->persister = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function modelManagerName($value): self
    {
        $this->modelManagerName = $value;
    
        return $this;
    }
    
    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function securityTokens($value): self
    {
        $this->securityTokens = $value;
    
        return $this;
    }
    
    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function ipWhitelist($value): self
    {
        $this->ipWhitelist = $value;
    
        return $this;
    }
    
    /**
     * @default 'scheb_two_factor.default_ip_whitelist_provider'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function ipWhitelistProvider($value): self
    {
        $this->ipWhitelistProvider = $value;
    
        return $this;
    }
    
    /**
     * @default 'scheb_two_factor.default_token_factory'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function twoFactorTokenFactory($value): self
    {
        $this->twoFactorTokenFactory = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function twoFactorCondition($value): self
    {
        $this->twoFactorCondition = $value;
    
        return $this;
    }
    
    public function google(array $value = []): \Symfony\Config\SchebTwoFactor\GoogleConfig
    {
        if (null === $this->google) {
            $this->google = new \Symfony\Config\SchebTwoFactor\GoogleConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "google()" has already been initialized. You cannot pass values the second time you call google().');
        }
    
        return $this->google;
    }
    
    public function getExtensionAlias(): string
    {
        return 'scheb_two_factor';
    }
            
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['persister'])) {
            $this->persister = $value['persister'];
            unset($value['persister']);
        }
    
        if (isset($value['model_manager_name'])) {
            $this->modelManagerName = $value['model_manager_name'];
            unset($value['model_manager_name']);
        }
    
        if (isset($value['security_tokens'])) {
            $this->securityTokens = $value['security_tokens'];
            unset($value['security_tokens']);
        }
    
        if (isset($value['ip_whitelist'])) {
            $this->ipWhitelist = $value['ip_whitelist'];
            unset($value['ip_whitelist']);
        }
    
        if (isset($value['ip_whitelist_provider'])) {
            $this->ipWhitelistProvider = $value['ip_whitelist_provider'];
            unset($value['ip_whitelist_provider']);
        }
    
        if (isset($value['two_factor_token_factory'])) {
            $this->twoFactorTokenFactory = $value['two_factor_token_factory'];
            unset($value['two_factor_token_factory']);
        }
    
        if (isset($value['two_factor_condition'])) {
            $this->twoFactorCondition = $value['two_factor_condition'];
            unset($value['two_factor_condition']);
        }
    
        if (isset($value['google'])) {
            $this->google = new \Symfony\Config\SchebTwoFactor\GoogleConfig($value['google']);
            unset($value['google']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->persister) {
            $output['persister'] = $this->persister;
        }
        if (null !== $this->modelManagerName) {
            $output['model_manager_name'] = $this->modelManagerName;
        }
        if (null !== $this->securityTokens) {
            $output['security_tokens'] = $this->securityTokens;
        }
        if (null !== $this->ipWhitelist) {
            $output['ip_whitelist'] = $this->ipWhitelist;
        }
        if (null !== $this->ipWhitelistProvider) {
            $output['ip_whitelist_provider'] = $this->ipWhitelistProvider;
        }
        if (null !== $this->twoFactorTokenFactory) {
            $output['two_factor_token_factory'] = $this->twoFactorTokenFactory;
        }
        if (null !== $this->twoFactorCondition) {
            $output['two_factor_condition'] = $this->twoFactorCondition;
        }
        if (null !== $this->google) {
            $output['google'] = $this->google->toArray();
        }
    
        return $output;
    }
    

}
