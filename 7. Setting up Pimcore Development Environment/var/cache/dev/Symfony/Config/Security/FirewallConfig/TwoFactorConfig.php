<?php

namespace Symfony\Config\Security\FirewallConfig;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class TwoFactorConfig 
{
    private $checkPath;
    private $postOnly;
    private $authFormPath;
    private $alwaysUseDefaultTargetPath;
    private $defaultTargetPath;
    private $successHandler;
    private $failureHandler;
    private $authenticationRequiredHandler;
    private $authCodeParameterName;
    private $trustedParameterName;
    private $multiFactor;
    private $prepareOnLogin;
    private $prepareOnAccessDenied;
    private $enableCsrf;
    private $csrfParameter;
    private $csrfTokenId;
    private $provider;
    
    /**
     * @default '/2fa_check'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function checkPath($value): self
    {
        $this->checkPath = $value;
    
        return $this;
    }
    
    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function postOnly($value): self
    {
        $this->postOnly = $value;
    
        return $this;
    }
    
    /**
     * @default '/2fa'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function authFormPath($value): self
    {
        $this->authFormPath = $value;
    
        return $this;
    }
    
    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function alwaysUseDefaultTargetPath($value): self
    {
        $this->alwaysUseDefaultTargetPath = $value;
    
        return $this;
    }
    
    /**
     * @default '/'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function defaultTargetPath($value): self
    {
        $this->defaultTargetPath = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function successHandler($value): self
    {
        $this->successHandler = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function failureHandler($value): self
    {
        $this->failureHandler = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function authenticationRequiredHandler($value): self
    {
        $this->authenticationRequiredHandler = $value;
    
        return $this;
    }
    
    /**
     * @default '_auth_code'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function authCodeParameterName($value): self
    {
        $this->authCodeParameterName = $value;
    
        return $this;
    }
    
    /**
     * @default '_trusted'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function trustedParameterName($value): self
    {
        $this->trustedParameterName = $value;
    
        return $this;
    }
    
    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function multiFactor($value): self
    {
        $this->multiFactor = $value;
    
        return $this;
    }
    
    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function prepareOnLogin($value): self
    {
        $this->prepareOnLogin = $value;
    
        return $this;
    }
    
    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function prepareOnAccessDenied($value): self
    {
        $this->prepareOnAccessDenied = $value;
    
        return $this;
    }
    
    /**
     * @default false
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function enableCsrf($value): self
    {
        $this->enableCsrf = $value;
    
        return $this;
    }
    
    /**
     * @default '_csrf_token'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function csrfParameter($value): self
    {
        $this->csrfParameter = $value;
    
        return $this;
    }
    
    /**
     * @default 'two_factor'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function csrfTokenId($value): self
    {
        $this->csrfTokenId = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function provider($value): self
    {
        $this->provider = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['check_path'])) {
            $this->checkPath = $value['check_path'];
            unset($value['check_path']);
        }
    
        if (isset($value['post_only'])) {
            $this->postOnly = $value['post_only'];
            unset($value['post_only']);
        }
    
        if (isset($value['auth_form_path'])) {
            $this->authFormPath = $value['auth_form_path'];
            unset($value['auth_form_path']);
        }
    
        if (isset($value['always_use_default_target_path'])) {
            $this->alwaysUseDefaultTargetPath = $value['always_use_default_target_path'];
            unset($value['always_use_default_target_path']);
        }
    
        if (isset($value['default_target_path'])) {
            $this->defaultTargetPath = $value['default_target_path'];
            unset($value['default_target_path']);
        }
    
        if (isset($value['success_handler'])) {
            $this->successHandler = $value['success_handler'];
            unset($value['success_handler']);
        }
    
        if (isset($value['failure_handler'])) {
            $this->failureHandler = $value['failure_handler'];
            unset($value['failure_handler']);
        }
    
        if (isset($value['authentication_required_handler'])) {
            $this->authenticationRequiredHandler = $value['authentication_required_handler'];
            unset($value['authentication_required_handler']);
        }
    
        if (isset($value['auth_code_parameter_name'])) {
            $this->authCodeParameterName = $value['auth_code_parameter_name'];
            unset($value['auth_code_parameter_name']);
        }
    
        if (isset($value['trusted_parameter_name'])) {
            $this->trustedParameterName = $value['trusted_parameter_name'];
            unset($value['trusted_parameter_name']);
        }
    
        if (isset($value['multi_factor'])) {
            $this->multiFactor = $value['multi_factor'];
            unset($value['multi_factor']);
        }
    
        if (isset($value['prepare_on_login'])) {
            $this->prepareOnLogin = $value['prepare_on_login'];
            unset($value['prepare_on_login']);
        }
    
        if (isset($value['prepare_on_access_denied'])) {
            $this->prepareOnAccessDenied = $value['prepare_on_access_denied'];
            unset($value['prepare_on_access_denied']);
        }
    
        if (isset($value['enable_csrf'])) {
            $this->enableCsrf = $value['enable_csrf'];
            unset($value['enable_csrf']);
        }
    
        if (isset($value['csrf_parameter'])) {
            $this->csrfParameter = $value['csrf_parameter'];
            unset($value['csrf_parameter']);
        }
    
        if (isset($value['csrf_token_id'])) {
            $this->csrfTokenId = $value['csrf_token_id'];
            unset($value['csrf_token_id']);
        }
    
        if (isset($value['provider'])) {
            $this->provider = $value['provider'];
            unset($value['provider']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->checkPath) {
            $output['check_path'] = $this->checkPath;
        }
        if (null !== $this->postOnly) {
            $output['post_only'] = $this->postOnly;
        }
        if (null !== $this->authFormPath) {
            $output['auth_form_path'] = $this->authFormPath;
        }
        if (null !== $this->alwaysUseDefaultTargetPath) {
            $output['always_use_default_target_path'] = $this->alwaysUseDefaultTargetPath;
        }
        if (null !== $this->defaultTargetPath) {
            $output['default_target_path'] = $this->defaultTargetPath;
        }
        if (null !== $this->successHandler) {
            $output['success_handler'] = $this->successHandler;
        }
        if (null !== $this->failureHandler) {
            $output['failure_handler'] = $this->failureHandler;
        }
        if (null !== $this->authenticationRequiredHandler) {
            $output['authentication_required_handler'] = $this->authenticationRequiredHandler;
        }
        if (null !== $this->authCodeParameterName) {
            $output['auth_code_parameter_name'] = $this->authCodeParameterName;
        }
        if (null !== $this->trustedParameterName) {
            $output['trusted_parameter_name'] = $this->trustedParameterName;
        }
        if (null !== $this->multiFactor) {
            $output['multi_factor'] = $this->multiFactor;
        }
        if (null !== $this->prepareOnLogin) {
            $output['prepare_on_login'] = $this->prepareOnLogin;
        }
        if (null !== $this->prepareOnAccessDenied) {
            $output['prepare_on_access_denied'] = $this->prepareOnAccessDenied;
        }
        if (null !== $this->enableCsrf) {
            $output['enable_csrf'] = $this->enableCsrf;
        }
        if (null !== $this->csrfParameter) {
            $output['csrf_parameter'] = $this->csrfParameter;
        }
        if (null !== $this->csrfTokenId) {
            $output['csrf_token_id'] = $this->csrfTokenId;
        }
        if (null !== $this->provider) {
            $output['provider'] = $this->provider;
        }
    
        return $output;
    }
    

}
