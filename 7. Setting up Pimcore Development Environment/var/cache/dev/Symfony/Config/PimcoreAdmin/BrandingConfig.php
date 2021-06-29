<?php

namespace Symfony\Config\PimcoreAdmin;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class BrandingConfig 
{
    private $loginScreenInvertColors;
    private $colorLoginScreen;
    private $colorAdminInterface;
    private $loginScreenCustomImage;
    
    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function loginScreenInvertColors($value): self
    {
        $this->loginScreenInvertColors = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function colorLoginScreen($value): self
    {
        $this->colorLoginScreen = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function colorAdminInterface($value): self
    {
        $this->colorAdminInterface = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function loginScreenCustomImage($value): self
    {
        $this->loginScreenCustomImage = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['login_screen_invert_colors'])) {
            $this->loginScreenInvertColors = $value['login_screen_invert_colors'];
            unset($value['login_screen_invert_colors']);
        }
    
        if (isset($value['color_login_screen'])) {
            $this->colorLoginScreen = $value['color_login_screen'];
            unset($value['color_login_screen']);
        }
    
        if (isset($value['color_admin_interface'])) {
            $this->colorAdminInterface = $value['color_admin_interface'];
            unset($value['color_admin_interface']);
        }
    
        if (isset($value['login_screen_custom_image'])) {
            $this->loginScreenCustomImage = $value['login_screen_custom_image'];
            unset($value['login_screen_custom_image']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->loginScreenInvertColors) {
            $output['login_screen_invert_colors'] = $this->loginScreenInvertColors;
        }
        if (null !== $this->colorLoginScreen) {
            $output['color_login_screen'] = $this->colorLoginScreen;
        }
        if (null !== $this->colorAdminInterface) {
            $output['color_admin_interface'] = $this->colorAdminInterface;
        }
        if (null !== $this->loginScreenCustomImage) {
            $output['login_screen_custom_image'] = $this->loginScreenCustomImage;
        }
    
        return $output;
    }
    

}
