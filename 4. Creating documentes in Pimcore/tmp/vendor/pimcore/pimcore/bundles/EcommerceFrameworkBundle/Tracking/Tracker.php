<?php
/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace Pimcore\Bundle\EcommerceFrameworkBundle\Tracking;

use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

abstract class Tracker implements TrackerInterface
{
    /**
     * @var TrackingItemBuilderInterface
     */
    protected $trackingItemBuilder;

    /**
     * @var EngineInterface
     */
    protected $templatingEngine;

    /**
     * @var string
     */
    protected $templatePrefix;

    /**
     * @var string
     */
    protected $templateExtension;

    /**
     * @var array
     */
    protected $assortmentTenants;

    /**
     * @var array
     */
    protected $checkoutTenants;

    /**
     * Tracker constructor.
     *
     * @param TrackingItemBuilderInterface $trackingItemBuilder
     * @param EngineInterface $templatingEngine
     * @param array $options
     * @param array $assortmentTenants
     * @param array $checkoutTenants
     */
    public function __construct(
        TrackingItemBuilderInterface $trackingItemBuilder,
        EngineInterface $templatingEngine,
        array $options = [],
        $assortmentTenants = [],
        $checkoutTenants = []
    ) {
        $this->trackingItemBuilder = $trackingItemBuilder;
        $this->templatingEngine = $templatingEngine;

        $resolver = new OptionsResolver();
        $this->configureOptions($resolver);
        $this->processOptions($resolver->resolve($options));

        $this->assortmentTenants = $assortmentTenants;
        $this->checkoutTenants = $checkoutTenants;
    }

    protected function processOptions(array $options)
    {
        $this->templatePrefix = $options['template_prefix'];
        $this->templateExtension = $options['template_extension'];
    }

    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setRequired(['template_prefix', 'template_extension']);
        $resolver->setDefaults([
            'template_extension' => 'php',
        ]);

        $resolver->setAllowedTypes('template_prefix', 'string');
        $resolver->setAllowedTypes('template_extension', 'string');
    }

    protected function getTemplatePath(string $name)
    {
        return sprintf(
            '%s:%s.js.%s',
            $this->templatePrefix,
            $name,
            $this->templateExtension
        );
    }

    protected function renderTemplate(string $name, array $parameters): string
    {
        return $this->templatingEngine->render(
            $this->getTemplatePath($name),
            $parameters
        );
    }

    /**
     * Remove null values from an object, keep protected keys in any case
     *
     * @param array $data
     * @param array $protectedKeys
     *
     * @return array
     */
    protected function filterNullValues(array $data, array $protectedKeys = [])
    {
        $result = [];
        foreach ($data as $key => $value) {
            $isProtected = in_array($key, $protectedKeys);
            if (null !== $value || $isProtected) {
                $result[$key] = $value;
            }
        }

        return $result;
    }

    /**
     * @inheritdoc
     */
    public function getAssortmentTenants(): array
    {
        return $this->assortmentTenants;
    }

    /**
     * @inheritdoc
     */
    public function getCheckoutTenants(): array
    {
        return $this->checkoutTenants;
    }
}
