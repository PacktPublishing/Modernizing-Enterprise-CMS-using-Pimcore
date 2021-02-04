<?php

declare(strict_types=1);

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

namespace Pimcore\Bundle\EcommerceFrameworkBundle\DependencyInjection;

use Pimcore\Bundle\CoreBundle\DependencyInjection\Config\Processor\PlaceholderProcessor;
use Pimcore\Bundle\EcommerceFrameworkBundle\CartManager\AbstractCart;
use Pimcore\Bundle\EcommerceFrameworkBundle\CartManager\Cart;
use Pimcore\Bundle\EcommerceFrameworkBundle\CartManager\CartFactory;
use Pimcore\Bundle\EcommerceFrameworkBundle\CartManager\CartPriceCalculator;
use Pimcore\Bundle\EcommerceFrameworkBundle\CartManager\CartPriceCalculatorFactory;
use Pimcore\Bundle\EcommerceFrameworkBundle\CartManager\MultiCartManager;
use Pimcore\Bundle\EcommerceFrameworkBundle\CartManager\SessionCart;
use Pimcore\Bundle\EcommerceFrameworkBundle\CheckoutManager\CheckoutManagerFactory;
use Pimcore\Bundle\EcommerceFrameworkBundle\CheckoutManager\CommitOrderProcessor;
use Pimcore\Bundle\EcommerceFrameworkBundle\DependencyInjection\Config\Processor\TenantProcessor;
use Pimcore\Bundle\EcommerceFrameworkBundle\DependencyInjection\IndexService\DefaultWorkerConfigMapper;
use Pimcore\Bundle\EcommerceFrameworkBundle\Factory;
use Pimcore\Bundle\EcommerceFrameworkBundle\FilterService\FilterService;
use Pimcore\Bundle\EcommerceFrameworkBundle\IndexService\Config\DefaultMysql;
use Pimcore\Bundle\EcommerceFrameworkBundle\IndexService\IndexService;
use Pimcore\Bundle\EcommerceFrameworkBundle\IndexService\Worker\ProductCentricBatchProcessingWorker;
use Pimcore\Bundle\EcommerceFrameworkBundle\OfferTool\DefaultService as DefaultOfferToolService;
use Pimcore\Bundle\EcommerceFrameworkBundle\OrderManager\Order\AgentFactory;
use Pimcore\Bundle\EcommerceFrameworkBundle\OrderManager\Order\Listing;
use Pimcore\Bundle\EcommerceFrameworkBundle\OrderManager\OrderManager;
use Pimcore\Bundle\EcommerceFrameworkBundle\PaymentManager\PaymentManager;
use Pimcore\Bundle\EcommerceFrameworkBundle\PricingManager\Environment;
use Pimcore\Bundle\EcommerceFrameworkBundle\PricingManager\PriceInfo;
use Pimcore\Bundle\EcommerceFrameworkBundle\PricingManager\PricingManager;
use Pimcore\Bundle\EcommerceFrameworkBundle\PricingManager\Rule;
use Pimcore\Bundle\EcommerceFrameworkBundle\SessionEnvironment;
use Pimcore\Bundle\EcommerceFrameworkBundle\Tracking\TrackingItemBuilder;
use Pimcore\Bundle\EcommerceFrameworkBundle\Tracking\TrackingManager;
use Pimcore\Bundle\EcommerceFrameworkBundle\VoucherService\DefaultService as DefaultVoucherService;
use Pimcore\Bundle\EcommerceFrameworkBundle\VoucherService\TokenManager\TokenManagerFactory;
use Pimcore\Model\DataObject\OfferToolOffer;
use Pimcore\Model\DataObject\OfferToolOfferItem;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\NodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\VariableNodeDefinition;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

class Configuration implements ConfigurationInterface
{
    /**
     * @var TenantProcessor
     */
    private $tenantProcessor;

    /**
     * @var PlaceholderProcessor
     */
    private $placeholderProcessor;

    /**
     * @var DefaultWorkerConfigMapper
     */
    private $indexWorkerConfigMapper;

    public function __construct()
    {
        $this->tenantProcessor = new TenantProcessor();
        $this->placeholderProcessor = new PlaceholderProcessor();

        $this->indexWorkerConfigMapper = new DefaultWorkerConfigMapper();
    }

    /**
     * @inheritDoc
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();

        $rootNode = $treeBuilder->root('pimcore_ecommerce_framework');
        $rootNode->addDefaultsIfNotSet();

        $this->addRootNodeChildren($rootNode);

        $rootNode
            ->append($this->buildPimcoreNode())
            ->append($this->buildFactoryNode())
            ->append($this->buildEnvironmentNode())
            ->append($this->buildCartManagerNode())
            ->append($this->buildOrderManagerNode())
            ->append($this->buildPricingManagerNode())
            ->append($this->buildPriceSystemsNode())
            ->append($this->buildAvailabilitySystemsNode())
            ->append($this->buildCheckoutManagerNode())
            ->append($this->buildPaymentManagerNode())
            ->append($this->buildIndexServiceNode())
            ->append($this->buildFilterServiceNode())
            ->append($this->buildVoucherServiceNode())
            ->append($this->buildOfferToolNode())
            ->append($this->buildTrackingManagerNode());

        return $treeBuilder;
    }

    private function addRootNodeChildren(ArrayNodeDefinition $rootNode)
    {
        $rootNode
            ->children()
               ->integerNode('decimal_scale')
                    ->info('Default scale used for Decimal objects')
                    ->min(0)
                    ->defaultValue(4)
                ->end()
            ->end();
    }

    private function buildPimcoreNode(): NodeDefinition
    {
        $builder = new TreeBuilder();

        $pimcore = $builder->root('pimcore');
        $pimcore
            ->addDefaultsIfNotSet()
            ->info('Configuration of Pimcore backend menu entries');

        $pimcore
            ->children()
                ->arrayNode('menu')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode('pricing_rules')
                            ->addDefaultsIfNotSet()
                            ->canBeDisabled()
                            ->info('Enabling/Disabling Pricing Rules menu entry. User specific settings can be done via permissions.')
                        ->end()
                        ->arrayNode('order_list')
                            ->addDefaultsIfNotSet()
                            ->canBeDisabled()
                            ->info('Configuring order list menu - enabling/disabling and defining route of order list to inject custom implementations of order backend.')
                            ->children()
                                ->scalarNode('route')
                                    ->defaultValue('pimcore_ecommerce_backend_admin-order_list')
                                ->end()
                                ->scalarNode('path')
                                    ->defaultNull()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $pimcore;
    }

    private function buildFactoryNode(): NodeDefinition
    {
        $builder = new TreeBuilder();

        $factory = $builder->root('factory');
        $factory
            ->addDefaultsIfNotSet()
            ->info('Configuration of e-commerce framework factory');

        $factory
            ->children()
                ->scalarNode('factory_id')
                    ->defaultValue(Factory::class)
                    ->cannotBeEmpty()
                    ->info('Service Id of factory implementation')
                ->end()
                ->booleanNode('strict_tenants')
                    ->defaultFalse()
                    ->info('If true the factory will not fall back to the default tenant if a tenant is passed but not existing')
                ->end()
            ->end();

        return $factory;
    }

    private function buildEnvironmentNode(): NodeDefinition
    {
        $builder = new TreeBuilder();

        $environment = $builder->root('environment');
        $environment
            ->addDefaultsIfNotSet()
            ->info('Configuration of environment');
        $environment
            ->children()
                ->scalarNode('environment_id')
                    ->defaultValue(SessionEnvironment::class)
                ->end()
                ->append($this->buildOptionsNode('options'))
            ->end();

        return $environment;
    }

    private function buildCartManagerNode(): NodeDefinition
    {
        $builder = new TreeBuilder();

        $cartManager = $builder->root('cart_manager');
        $cartManager
            ->addDefaultsIfNotSet()
            ->info('Settings for cart manager');

        $cartManager
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('tenants')
                    ->info('Configuration per tenant. If a _defaults key is set, it will be merged into every tenant. It needs to be set in every file. A tenant named "default" is mandatory.')
                    ->example([
                        '_defaults' => [
                            'cart' => [
                                'factory_id' => 'CartFactory',
                            ],
                        ],
                        'default' => [
                            'cart' => [
                                'factory_options' => [
                                    'cart_class_name' => 'Pimcore\Bundle\EcommerceFrameworkBundle\CartManager\Cart',
                                ],
                            ],
                            'price_calculator' => [
                                'modificators' => [
                                    'shipping' => [
                                        'class' => 'Pimcore\Bundle\EcommerceFrameworkBundle\CartManager\CartPriceModificator\Shipping',
                                        'options' => [
                                            'charge' => '5.90',
                                        ],
                                    ],
                                ],
                            ],
                        ],
                        'noShipping' => [
                            'price_calculator' => [
                                'factory_id' => 'PriceCalculatorFactory',
                                'modificators' => '~',
                            ],
                        ],
                    ])
                    ->useAttributeAsKey('name')
                    ->validate()
                        ->ifTrue(function (array $v) {
                            return !array_key_exists('default', $v);
                        })
                        ->thenInvalid('Cart manager needs at least a default tenant')
                    ->end()
                    ->beforeNormalization()
                    ->always(function ($v) {
                        if (empty($v) || !is_array($v)) {
                            $v = [];
                        }

                        return $this->tenantProcessor->mergeTenantConfig($v);
                    })
                    ->end()
                    ->prototype('array')
                        ->children()
                            ->scalarNode('cart_manager_id')
                                ->defaultValue(MultiCartManager::class)
                                ->info('Service id of cart service')
                            ->end()
                            ->arrayNode('cart')
                                ->addDefaultsIfNotSet()
                                ->info('Configuration for carts')
                                ->children()
                                    ->scalarNode('factory_id')
                                        ->cannotBeEmpty()
                                        ->defaultValue(CartFactory::class)
                                        ->info('Service id of cart factory and configuration array')
                                    ->end()
                                    ->append($this->buildOptionsNode('factory_options', [
                                        'cart_class_name' => Cart::class,
                                        'guest_cart_class_name' => SessionCart::class,
                                        'cart_readonly_mode' => AbstractCart::CART_READ_ONLY_MODE_STRICT,
                                    ]))
                                ->end()
                            ->end()
                            ->arrayNode('price_calculator')
                                ->addDefaultsIfNotSet()
                                ->children()
                                    ->scalarNode('factory_id')
                                        ->cannotBeEmpty()
                                        ->defaultValue(CartPriceCalculatorFactory::class)
                                    ->end()
                                    ->append($this->buildOptionsNode(
                                        'factory_options',
                                        [
                                            'class' => CartPriceCalculator::class,
                                        ],
                                        "'class' defines a class name of the price calculator, which the factory instantiates. If you wish to replace or extend price calculation routine shipped with e-commerce framework provide your custom class name here."
                                    ))
                                    ->arrayNode('modificators')
                                        ->info('List price modificators for cart, e.g. for shipping-cost, special discounts, etc. Key is name of modificator.')
                                        ->useAttributeAsKey('name')
                                        ->prototype('array')
                                            ->children()
                                                ->scalarNode('class')->isRequired()->end()
                                                ->append($this->buildOptionsNode())
                                            ->end()
                                        ->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end();

        return $cartManager;
    }

    private function buildOrderManagerNode(): NodeDefinition
    {
        $builder = new TreeBuilder();

        $orderManager = $builder->root('order_manager');
        $orderManager
            ->info('Configuration of Order Manager')
            ->addDefaultsIfNotSet();

        $orderManager
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('tenants')
                    ->info('Configuration per tenant. If a _defaults key is set, it will be merged into every tenant. A tenant named "default" is mandatory.')
                    ->useAttributeAsKey('name')
                    ->validate()
                        ->ifTrue(function (array $v) {
                            return !array_key_exists('default', $v);
                        })
                        ->thenInvalid('Order manager needs at least a default tenant')
                    ->end()
                    ->beforeNormalization()
                    ->always(function ($v) {
                        if (empty($v) || !is_array($v)) {
                            $v = [];
                        }

                        return $this->tenantProcessor->mergeTenantConfig($v);
                    })
                    ->end()
                    ->prototype('array')
                        ->children()
                            ->scalarNode('order_manager_id')
                                ->info('Service id for order manager implementation')
                                ->defaultValue(OrderManager::class)
                            ->end()
                            ->arrayNode('options')
                                ->info('Options for order manager')
                                ->addDefaultsIfNotSet()
                                ->children()
                                    ->scalarNode('order_class')
                                        ->info('Pimcore object class for orders')
                                        ->defaultValue('\\Pimcore\\Model\\DataObject\\OnlineShopOrder')
                                        ->cannotBeEmpty()
                                    ->end()
                                    ->scalarNode('order_item_class')
                                        ->info('Pimcore object class for order items')
                                        ->defaultValue('\\Pimcore\\Model\\DataObject\\OnlineShopOrderItem')
                                        ->cannotBeEmpty()
                                    ->end()
                                    ->scalarNode('list_class')
                                        ->info('Class for order listing')
                                        ->defaultValue(Listing::class)
                                        ->cannotBeEmpty()
                                    ->end()
                                    ->scalarNode('list_item_class')
                                        ->info('Class for order item listing')
                                        ->defaultValue(Listing\Item::class)
                                        ->cannotBeEmpty()
                                    ->end()
                                    ->scalarNode('parent_order_folder')
                                        ->info('Default parent folder for new orders')
                                        ->defaultValue('/order/%%Y/%%m/%%d')
                                        ->cannotBeEmpty()
                                    ->end()
                                ->end()
                            ->end()
                            ->arrayNode('order_agent')
                                ->addDefaultsIfNotSet()
                                ->children()
                                    ->scalarNode('factory_id')
                                        ->info('Service id for order agent factory')
                                        ->defaultValue(AgentFactory::class)
                                        ->cannotBeEmpty()
                                    ->end()
                                    ->append($this->buildOptionsNode('factory_options'))
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end();

        return $orderManager;
    }

    private function buildPricingManagerNode(): NodeDefinition
    {
        $builder = new TreeBuilder();

        $pricingManager = $builder->root('pricing_manager');
        $pricingManager
            ->info('Configuration of Pricing Manager')
            ->addDefaultsIfNotSet();

        $pricingManager
            // support deprecated options at the root level of the pricing_manager
            // values set here will OVERWRITE the value in every tenant, even if the
            // tenant defines the value!
            // TODO remove in Pimcore 7
            ->validate()
                ->always(function ($v) {
                    $enabled = null;
                    if (isset($v['enabled']) && is_bool($v['enabled'])) {
                        $enabled = $v['enabled'];
                        unset($v['enabled']);
                    }

                    $pricingManagerId = null;
                    if (isset($v['pricing_manager_id'])) {
                        $pricingManagerId = $v['pricing_manager_id'];
                        unset($v['pricing_manager_id']);
                    }

                    $pricingManagerOptions = null;
                    if (isset($v['pricing_manager_options']) && !empty($v['pricing_manager_options'])) {
                        $pricingManagerOptions = $v['pricing_manager_options'];
                        unset($v['pricing_manager_options']);
                    }

                    if (null === $enabled && null === $pricingManagerId && null === $pricingManagerOptions) {
                        return $v;
                    }

                    foreach ($v['tenants'] as $tenant => &$tenantConfig) {
                        if (null !== $enabled) {
                            $tenantConfig['enabled'] = $enabled;
                        }

                        if (null !== $pricingManagerId) {
                            $tenantConfig['pricing_manager_id'] = $pricingManagerId;
                        }

                        if (null !== $pricingManagerOptions) {
                            $tenantConfig['pricing_manager_options'] = array_merge(
                                $tenantConfig['pricing_manager_options'],
                                $pricingManagerOptions
                            );
                        }
                    }

                    return $v;
                })
            ->end()
            ->children()
                ->booleanNode('enabled')
                    ->setDeprecated('The child node "%node%" at the root level path "%path%" is deprecated. Please migrate to the new tenant structure.')
                ->end()
                ->scalarNode('pricing_manager_id')
                    ->setDeprecated('The child node "%node%" at the root level path "%path%" is deprecated. Please migrate to the new tenant structure.')
                ->end()
                ->arrayNode('pricing_manager_options')
                    ->children()
                        ->scalarNode('rule_class')
                            ->setDeprecated('The child node "%node%" at the root level path "%path%" is deprecated. Please migrate to the new tenant structure.')
                        ->end()
                        ->scalarNode('price_info_class')
                            ->setDeprecated('The child node "%node%" at the root level path "%path%" is deprecated. Please migrate to the new tenant structure.')
                        ->end()
                        ->scalarNode('environment_class')
                            ->setDeprecated('The child node "%node%" at the root level path "%path%" is deprecated. Please migrate to the new tenant structure.')
                        ->end()
                    ->end()
                ->end()
                ->arrayNode('conditions')
                    ->info('Condition mapping from name to used class')
                    ->useAttributeAsKey('name')
                    ->prototype('scalar')
                        ->cannotBeEmpty()
                    ->end()
                ->end()
                ->arrayNode('actions')
                    ->info('Action mapping from name to used class')
                    ->useAttributeAsKey('name')
                    ->prototype('scalar')
                        ->cannotBeEmpty()
                    ->end()
                ->end()
                ->arrayNode('tenants')
                    ->info('Configuration per tenant. If a _defaults key is set, it will be merged into every tenant. A tenant named "default" is mandatory.')
                    ->useAttributeAsKey('name')
                    ->validate()
                        ->ifTrue(function (array $v) {
                            return !array_key_exists('default', $v);
                        })
                        ->thenInvalid('Pricing manager needs at least a default tenant')
                    ->end()
                    ->beforeNormalization()
                        ->always(function ($v) {
                            if (empty($v) || !is_array($v)) {
                                $v = [];
                            }

                            return $this->tenantProcessor->mergeTenantConfig($v);
                        })
                    ->end()
                    ->prototype('array')
                        ->canBeDisabled()
                        ->children()
                            ->scalarNode('pricing_manager_id')
                                ->info('Service id of pricing manager')
                                ->cannotBeEmpty()
                                ->defaultValue(PricingManager::class)
                            ->end()
                            ->arrayNode('pricing_manager_options')
                                ->info('Options for pricing manager')
                                ->addDefaultsIfNotSet()
                                ->children()
                                    ->scalarNode('rule_class')
                                        ->cannotBeEmpty()
                                        ->defaultValue(Rule::class)
                                    ->end()
                                    ->scalarNode('price_info_class')
                                        ->cannotBeEmpty()
                                        ->defaultValue(PriceInfo::class)
                                    ->end()
                                    ->scalarNode('environment_class')
                                        ->cannotBeEmpty()
                                        ->defaultValue(Environment::class)
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $pricingManager;
    }

    private function buildPriceSystemsNode(): NodeDefinition
    {
        $builder = new TreeBuilder();

        $priceSystems = $builder->root('price_systems');
        $priceSystems
            ->info('Configuration of price systems - key is name of price system.')
            ->useAttributeAsKey('name')
            ->prototype('array')
                ->beforeNormalization()
                    ->ifString()
                    ->then(function ($v) {
                        return ['id' => $v];
                    })
                ->end()
                ->children()
                    ->scalarNode('name')->end()
                    ->scalarNode('id')
                        ->isRequired()
                    ->end()
                ->end()
            ->end();

        return $priceSystems;
    }

    private function buildAvailabilitySystemsNode(): NodeDefinition
    {
        $builder = new TreeBuilder();

        $availabilitySystems = $builder->root('availability_systems');
        $availabilitySystems
            ->useAttributeAsKey('name')
            ->info('Configuration of availability systems - key is name of price system.')
            ->prototype('array')
                ->beforeNormalization()
                    ->ifString()
                    ->then(function ($v) {
                        return ['id' => $v];
                    })
                ->end()
                ->children()
                    ->scalarNode('name')->end()
                    ->scalarNode('id')
                        ->isRequired()
                    ->end()
                ->end()
            ->end();

        return $availabilitySystems;
    }

    private function buildCheckoutManagerNode(): NodeDefinition
    {
        $builder = new TreeBuilder();

        $checkoutManager = $builder->root('checkout_manager');
        $checkoutManager
            ->info('Configuration of checkout manager')
            ->addDefaultsIfNotSet();

        $checkoutManager
            ->children()
                ->arrayNode('tenants')
                    ->info('Configuration per tenant. If a _defaults key is set, it will be merged into every tenant. A tenant named "default" is mandatory.')
                    ->useAttributeAsKey('name')
                    ->validate()
                        ->ifTrue(function (array $v) {
                            return !array_key_exists('default', $v);
                        })
                        ->thenInvalid('Checkout manager needs at least a default tenant')
                    ->end()
                    ->beforeNormalization()
                        ->always(function ($v) {
                            if (empty($v) || !is_array($v)) {
                                $v = [];
                            }

                            return $this->tenantProcessor->mergeTenantConfig($v);
                        })
                    ->end()
                    ->prototype('array')
                        ->children()
                            ->scalarNode('factory_id')
                                ->defaultValue(CheckoutManagerFactory::class)
                                ->cannotBeEmpty()
                            ->end()
                            ->append($this->buildOptionsNode('factory_options'))
                            ->arrayNode('payment')
                                ->info('Define payment provider which should be used for payment. Payment providers are defined in payment_manager section.')
                                ->addDefaultsIfNotSet()
                                ->children()
                                    ->scalarNode('provider')
                                        ->defaultNull()
                                    ->end()
                                ->end()
                            ->end()
                            ->arrayNode('commit_order_processor')
                                ->info('Define used commit order processor')
                                ->addDefaultsIfNotSet()
                                ->children()
                                    ->scalarNode('id')
                                        ->defaultValue(CommitOrderProcessor::class)
                                        ->cannotBeEmpty()
                                    ->end()
                                    ->append($this->buildOptionsNode())
                                ->end()
                            ->end()
                            ->arrayNode('steps')
                                ->info('Define different checkout steps which need to be committed before commit of order is possible')
                                ->requiresAtLeastOneElement()
                                ->useAttributeAsKey('name')
                                ->prototype('array')
                                    ->children()
                                        ->scalarNode('class')
                                            ->isRequired()
                                        ->end()
                                        ->append($this->buildOptionsNode())
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $checkoutManager;
    }

    private function buildPaymentManagerNode(): NodeDefinition
    {
        $builder = new TreeBuilder();

        $paymentManager = $builder->root('payment_manager');
        $paymentManager
            ->info('Configuration of payment manager and payment providers')
            ->addDefaultsIfNotSet();

        $paymentManager
            ->children()
                ->scalarNode('payment_manager_id')
                    ->cannotBeEmpty()
                    ->defaultValue(PaymentManager::class)
                ->end()
                ->arrayNode('providers')
                    ->info('Configuration of payment providers, key is name of provider.')
                    ->useAttributeAsKey('name')
                    ->prototype('array')
                        ->children()
                            ->scalarNode('name')->end()
                            ->scalarNode('provider_id')
                                ->info('Service id of payment provider implementation')
                                ->isRequired()
                            ->end()
                            ->scalarNode('profile')
                                ->info('Currently active profile')
                                ->isRequired()
                            ->end()
                            ->arrayNode('profiles')
                                ->info('Available profiles with options')
                                ->beforeNormalization()
                                    ->always(function ($v) {
                                        if (empty($v) || !is_array($v)) {
                                            $v = [];
                                        }

                                        return $this->tenantProcessor->mergeTenantConfig($v);
                                    })
                                ->end()
                                ->useAttributeAsKey('name')
                                ->prototype('array')
                                    ->useAttributeAsKey('name')
                                    ->prototype('variable')->end()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $paymentManager;
    }

    private function buildIndexServiceNode(): NodeDefinition
    {
        $builder = new TreeBuilder();

        $indexService = $builder->root('index_service');
        $indexService
            ->addDefaultsIfNotSet()
            ->info('Configuration of index service');

        $indexService
            ->children()
                ->scalarNode('index_service_id')
                    ->cannotBeEmpty()
                    ->defaultValue(IndexService::class)
                ->end()
                // @TODO Pimcore 7 - remove this
                ->enumNode('worker_mode')
                    ->values([ProductCentricBatchProcessingWorker::WORKER_MODE_PRODUCT_CENTRIC, ProductCentricBatchProcessingWorker::WORKER_MODE_LEGACY])
                    ->cannotBeEmpty()
                    ->setDeprecated('will be removed in Pimcore 7 as then ' . ProductCentricBatchProcessingWorker::WORKER_MODE_PRODUCT_CENTRIC . ' will be default mode.')
                    ->info('Worker mode for ' . ProductCentricBatchProcessingWorker::class . ' workers.')
                    ->defaultValue(ProductCentricBatchProcessingWorker::WORKER_MODE_LEGACY)
                ->end()
                ->scalarNode('default_tenant')
                    ->cannotBeEmpty()
                    ->defaultValue('default')
                ->end()
                ->arrayNode('tenants')
                    ->info('Configure assortment tenants - at least one tenant has to be configured. If a _defaults key is set, it will be merged into every tenant.')
                    ->useAttributeAsKey('name', false)
                    ->validate()
                        ->always(function (array $v) {
                            // check if all search attributes are defined as attribute
                            foreach ($v as $tenant => $tenantConfig) {
                                foreach ($tenantConfig['search_attributes'] as $searchAttribute) {
                                    $attributeFound = false;
                                    if (isset($tenantConfig['attributes'][$searchAttribute])) {
                                        $attributeFound = true;
                                    }

                                    $delimiters = ['.', '^'];
                                    foreach ($delimiters as $delimiter) {
                                        if (!$attributeFound && strpos($searchAttribute, $delimiter) !== false) {
                                            $fieldNameParts = explode($delimiter, $searchAttribute);
                                            if (isset($tenantConfig['attributes'][$fieldNameParts[0]])) {
                                                $attributeFound = true;
                                            }
                                        }
                                    }

                                    if (!$attributeFound) {
                                        throw new InvalidConfigurationException(sprintf(
                                            'The search attribute "%s" in product index tenant "%s" is not defined as attribute.',
                                            $searchAttribute,
                                            $tenant
                                        ));
                                    }
                                }
                            }

                            return $v;
                        })
                    ->end()
                    ->beforeNormalization()
                        ->always(function ($v) {
                            if (empty($v) || !is_array($v)) {
                                $v = [];
                            }

                            $config = $this->tenantProcessor->mergeTenantConfig($v);

                            foreach ($config as $tenant => $tenantConfig) {
                                if (isset($tenantConfig['placeholders']) && is_array($tenantConfig['placeholders']) && count($tenantConfig['placeholders']) > 0) {
                                    $placeholders = $tenantConfig['placeholders'];

                                    // remove placeholders while replacing as we don't want to replace the placeholders
                                    unset($tenantConfig['placeholders']);

                                    $config[$tenant] = $this->placeholderProcessor->mergePlaceholders($tenantConfig, $placeholders);

                                    // re-add placeholders
                                    $config[$tenant]['placeholders'] = $placeholders;
                                }

                                $config[$tenant]['config_id'] = $config[$tenant]['config_id'] ?? null;
                                $config[$tenant]['worker_id'] = $config[$tenant]['worker_id'] ?? null;

                                // if only config or worker is set, try to auto resolve missing config/worker
                                if (!($config[$tenant]['config_id'] && $config[$tenant]['worker_id'])) {
                                    // nothing is set - set default value
                                    if (!$config[$tenant]['config_id'] && !$config[$tenant]['worker_id']) {
                                        $config[$tenant]['config_id'] = DefaultMysql::class;
                                    }

                                    // resolve default matching part
                                    if ($config[$tenant]['config_id']) {
                                        $config[$tenant]['worker_id'] = $this->indexWorkerConfigMapper->getWorkerForConfig($config[$tenant]['config_id']);
                                    } elseif ($config[$tenant]['worker_id']) {
                                        $config[$tenant]['config_id'] = $this->indexWorkerConfigMapper->getConfigForWorker($config[$tenant]['worker_id']);
                                    }
                                }
                            }

                            return $config;
                        })
                    ->end()
                    ->prototype('array')
                        ->addDefaultsIfNotSet()
                        ->canBeDisabled()
                        ->children()
                            ->scalarNode('config_id')
                                ->info('Service id of config implementation')
                                ->cannotBeEmpty()
                                ->defaultValue(DefaultMysql::class)
                            ->end()
                            ->append($this->buildOptionsNode('config_options'))
                            ->scalarNode('worker_id')
                                ->info('Worker id of worker implementation. Can be omitted, then default worker id of configured config is used.')
                                ->cannotBeEmpty()
                            ->end()
                            ->arrayNode('placeholders')
                                ->info('Placeholder values in this tenant attributes definition (locale: "%%locale%%") will be replaced by the given placeholder value (eg. "de_AT")')
                                ->example([
                                    'placeholders' => [
                                        '%%locale%%' => 'de_AT',
                                    ],
                                ])
                                ->defaultValue([])
                                ->beforeNormalization()
                                    ->castToArray()
                                ->end()
                                ->prototype('scalar')->end()
                            ->end()
                            ->arrayNode('search_attributes')
                                ->info('Add columns for general fulltext search index of product list - they must be part of the column configuration below')
                                ->defaultValue([])
                                ->beforeNormalization()
                                    ->castToArray()
                                ->end()
                                ->prototype('scalar')->end()
                            ->end()
                            ->arrayNode('attributes')
                                ->info('Attributes definition for product index - key is name of attribute')
                                ->useAttributeAsKey('name', false)
                                ->beforeNormalization()
                                    ->always(function ($v) {
                                        if (empty($v) || !is_array($v)) {
                                            $v = [];
                                        }

                                        // make sure the name property is set
                                        foreach (array_keys($v) as $name) {
                                            if (!isset($v[$name]['name'])) {
                                                $v[$name]['name'] = $name;
                                            }
                                        }

                                        return $v;
                                    })
                                ->end()
                                ->prototype('array')
                                    ->beforeNormalization()
                                        ->always(function ($v) {
                                            if (empty($v) || !is_array($v)) {
                                                return $v;
                                            }

                                            $v = $this->remapProperties($v, [
                                                'fieldname' => 'field_name',
                                                'filtergroup' => 'filter_group',
                                                'getter' => 'getter_id',
                                                'interpreter' => 'interpreter_id',
                                                'config' => 'options',
                                                'hideInFieldlistDatatype' => 'hide_in_fieldlist_datatype',
                                            ]);

                                            // this option was never properly supported
                                            // and is ignored
                                            if (isset($v['mapping'])) {
                                                @trigger_error('The "mapping" config entry on the ecommerce index attribute level is unsupported and will be removed in Pimcore 7. Please set "options.mapping" instead.', E_USER_DEPRECATED);
                                                unset($v['mapping']);
                                            }

                                            return $v;
                                        })
                                    ->end()
                                    ->children()
                                        ->scalarNode('name')->isRequired()->end()
                                        ->scalarNode('field_name')->defaultNull()->info('Defines object attribute field name, can be omitted if the same like name of index attribute')->end()
                                        ->scalarNode('type')->defaultNull()->info('Type of index attribute (database column or elastic search data type)')->end()
                                        ->scalarNode('locale')->defaultNull()->info('Locale for localized fields, can be omitted if not necessary')->end()
                                        ->scalarNode('filter_group')->defaultNull()->info('Defines filter group for filter definition in filter service')->end()
                                        ->append($this->buildOptionsNode())
                                        ->scalarNode('getter_id')->defaultNull()->info('Service id of getter for this field')->end()
                                        ->append($this->buildOptionsNode('getter_options'))
                                        ->scalarNode('interpreter_id')->defaultNull()->info('Service id of interpreter for this field')->end()
                                        ->append($this->buildOptionsNode('interpreter_options'))
                                        ->append($this->buildOptionsNode('mapping')) // TODO Symfony 3.4 set as deprecated. TODO Pimcore 7 remove option completely.
                                        ->booleanNode('hide_in_fieldlist_datatype')->defaultFalse()->info('Hides field in field list selection data type of filter service - default to false')->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $indexService;
    }

    private function buildFilterServiceNode(): NodeDefinition
    {
        $builder = new TreeBuilder();

        $filterService = $builder->root('filter_service');
        $filterService
            ->info('Configuration of filter service')
            ->addDefaultsIfNotSet();

        $filterService
            ->children()
                ->arrayNode('tenants')
                    ->info('Configuration per tenant. If a _defaults key is set, it will be merged into every tenant.')
                    ->useAttributeAsKey('name', false)
                    ->beforeNormalization()
                        ->always(function ($v) {
                            if (empty($v) || !is_array($v)) {
                                $v = [];
                            }

                            return $this->tenantProcessor->mergeTenantConfig($v);
                        })
                    ->end()
                    ->prototype('array')
                        ->addDefaultsIfNotSet()
                        ->canBeDisabled()
                        ->children()
                            ->scalarNode('service_id')
                                ->cannotBeEmpty()
                                ->defaultValue(FilterService::class)
                            ->end()
                            ->arrayNode('filter_types')
                                ->info('Assign backend implementations and views to filter type field collections')
                                ->useAttributeAsKey('name')
                                ->prototype('array')
                                    ->addDefaultsIfNotSet()
                                    ->beforeNormalization()
                                        ->always(function ($v) {
                                            if (empty($v) || !is_array($v)) {
                                                return $v;
                                            }

                                            return $this->remapProperties($v, [
                                                'class' => 'filter_type_id',
                                                'script' => 'template',
                                            ]);
                                        })
                                    ->end()
                                    ->children()
                                        ->scalarNode('filter_type_id')
                                            ->info('Service id for filter type implementation')
                                            ->isRequired()
                                        ->end()
                                        ->scalarNode('template')
                                            ->info('Default template for filter, can be overwritten in filter definition')
                                            ->isRequired()
                                        ->end()
                                        ->append($this->buildOptionsNode())
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $filterService;
    }

    private function buildVoucherServiceNode(): NodeDefinition
    {
        $builder = new TreeBuilder();

        $voucherService = $builder->root('voucher_service');
        $voucherService
            ->info('Configuration of voucher service')
            ->addDefaultsIfNotSet();
        $voucherService
            ->children()
                ->scalarNode('voucher_service_id')
                    ->info('Service id of voucher service implementation')
                    ->cannotBeEmpty()
                    ->defaultValue(DefaultVoucherService::class)
                ->end()
                ->arrayNode('voucher_service_options')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->integerNode('reservation_minutes_threshold')
                            ->info('Reservations older than x MINUTES get removed by maintenance task')
                            ->defaultValue(5)
                            ->min(0)
                        ->end()
                        ->integerNode('statistics_days_threshold')
                            ->info('Statistics older than x DAYS get removed by maintenance task')
                            ->defaultValue(30)
                            ->min(0)
                        ->end()
                    ->end()
                ->end()
                ->arrayNode('token_managers')
                    ->info('Configuration of token managers')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('factory_id')
                            ->info('Service id of token manager factory')
                            ->cannotBeEmpty()
                            ->defaultValue(TokenManagerFactory::class)
                        ->end()
                        ->arrayNode('mapping')
                            ->info('Mapping for token manager implementations')
                            ->useAttributeAsKey('name')
                            ->prototype('scalar')
                                ->cannotBeEmpty()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $voucherService;
    }

    private function buildOfferToolNode(): NodeDefinition
    {
        $builder = new TreeBuilder();

        $offerTool = $builder->root('offer_tool');
        $offerTool
            ->info('Configuration of offer tool')
            ->addDefaultsIfNotSet();

        $offerTool
            ->children()
                ->scalarNode('service_id')
                    ->info('Service id for offer tool service')
                    ->defaultValue(DefaultOfferToolService::class)
                    ->cannotBeEmpty()
                ->end()
                ->arrayNode('order_storage')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('offer_class')
                            ->info('Pimcore object class for offers')
                            ->cannotBeEmpty()
                            ->defaultValue(OfferToolOffer::class)
                        ->end()
                        ->scalarNode('offer_item_class')
                            ->info('Pimcore object class for offer items')
                            ->cannotBeEmpty()
                            ->defaultValue(OfferToolOfferItem::class)
                        ->end()
                        ->scalarNode('parent_folder_path')
                            ->info('default path for new offers')
                            ->cannotBeEmpty()
                            ->defaultValue('/offertool/offers/%%Y/%%m')
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $offerTool;
    }

    private function buildTrackingManagerNode(): NodeDefinition
    {
        $builder = new TreeBuilder();

        $trackingManager = $builder->root('tracking_manager');
        $trackingManager
            ->info('Configuration of Tracking Manager')
            ->addDefaultsIfNotSet();

        $trackingManager
            ->children()
                ->scalarNode('tracking_manager_id')
                    ->info('Service id of tracking manager')
                    ->defaultValue(TrackingManager::class)
                ->end()
                ->arrayNode('trackers')
                    ->info('Enable/Disable trackers and configure them')
                    ->useAttributeAsKey('name')
                    ->prototype('array')
                        ->canBeDisabled()
                        ->children()
                            ->scalarNode('id')
                                ->info('Service id for tracker')
                                ->isRequired()
                            ->end()
                            ->append($this->buildOptionsNode())
                            ->scalarNode('item_builder_id')
                                ->info('Service id for item builder for tracker')
                                ->defaultValue(TrackingItemBuilder::class)
                            ->end()
                            ->arrayNode('tenants')
                                ->addDefaultsIfNotSet()
                                ->info('List of assortment and checkout tenants where this tracker should be activated for.')
                                ->children()
                                    ->arrayNode('assortment')
                                        ->info('Add list of assortment tenants where the tracker should be activated for. Empty array means activated for all tenants.')
                                        ->defaultValue([])
                                        ->beforeNormalization()
                                            ->castToArray()
                                        ->end()
                                        ->prototype('scalar')->end()
                                    ->end()
                                    ->arrayNode('checkout')
                                        ->info('Add list of checkout tenants where the tracker should be activated for. Empty array means activated for all tenants.')
                                        ->defaultValue([])
                                        ->beforeNormalization()
                                            ->castToArray()
                                        ->end()
                                        ->prototype('scalar')->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $trackingManager;
    }

    private function buildOptionsNode(string $name = 'options', array $defaultValue = [], string $documentation = null): NodeDefinition
    {
        $node = new VariableNodeDefinition($name);
        if ($documentation) {
            $node->info($documentation);
        }

        $node
            ->defaultValue($defaultValue)
            ->treatNullLike([])
            ->beforeNormalization()
               ->castToArray()
            ->end();

        return $node;
    }

    /**
     * Normalizes properties from old to new names to easy migration
     *
     * @param array $data
     * @param array $map
     *
     * @return array
     */
    private function remapProperties(array $data, array $map): array
    {
        foreach ($map as $old => $new) {
            if (isset($data[$old]) && !isset($data[$new])) {
                $data[$new] = $data[$old];
                unset($data[$old]);
            }
        }

        return $data;
    }
}
