<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'fos_js_routing.serializer' shared service.

include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/SerializerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/Normalizer/NormalizerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/Normalizer/ContextAwareNormalizerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/Normalizer/DenormalizerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/Normalizer/ContextAwareDenormalizerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/Encoder/EncoderInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/Encoder/ContextAwareEncoderInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/Encoder/DecoderInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/Encoder/ContextAwareDecoderInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/Serializer.php';
include_once \dirname(__DIR__, 4).'/vendor/friendsofsymfony/jsrouting-bundle/Serializer/Normalizer/RouteCollectionNormalizer.php';
include_once \dirname(__DIR__, 4).'/vendor/friendsofsymfony/jsrouting-bundle/Serializer/Normalizer/RoutesResponseNormalizer.php';
include_once \dirname(__DIR__, 4).'/vendor/friendsofsymfony/jsrouting-bundle/Serializer/Denormalizer/RouteCollectionDenormalizer.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/Encoder/JsonEncoder.php';

return $this->services['fos_js_routing.serializer'] = new \Symfony\Component\Serializer\Serializer([0 => new \FOS\JsRoutingBundle\Serializer\Normalizer\RouteCollectionNormalizer(), 1 => new \FOS\JsRoutingBundle\Serializer\Normalizer\RoutesResponseNormalizer(), 2 => new \FOS\JsRoutingBundle\Serializer\Denormalizer\RouteCollectionDenormalizer()], ['json' => new \Symfony\Component\Serializer\Encoder\JsonEncoder()]);
