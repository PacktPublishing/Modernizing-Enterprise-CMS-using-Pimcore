<?php

declare(strict_types=1);

/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Commercial License (PCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 *  @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 *  @license    http://www.pimcore.org/license     GPLv3 and PCL
 */

namespace Pimcore\Bundle\EcommerceFrameworkBundle\CartManager;

use Pimcore\Bundle\EcommerceFrameworkBundle\EnvironmentInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CartPriceCalculatorFactory implements CartPriceCalculatorFactoryInterface
{
    /**
     * @var EnvironmentInterface
     */
    protected $environment;

    /**
     * @var array
     */
    protected $modificatorConfig;

    /**
     * @var array
     */
    protected $options;

    /**
     * @param array $modificatorConfig
     * @param array $options
     */
    public function __construct(array $modificatorConfig, array $options = [])
    {
        $this->modificatorConfig = $modificatorConfig;

        $resolver = new OptionsResolver();
        $this->configureOptions($resolver);

        $this->options = $resolver->resolve($options);
    }

    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setRequired('class');

        $resolver->setDefaults([
            'class' => CartPriceCalculator::class,
        ]);

        $resolver->setAllowedTypes('class', 'string');
    }

    public function create(EnvironmentInterface $environment, CartInterface $cart): CartPriceCalculatorInterface
    {
        $class = $this->options['class'];

        return new $class($environment, $cart, $this->modificatorConfig);
    }
}
