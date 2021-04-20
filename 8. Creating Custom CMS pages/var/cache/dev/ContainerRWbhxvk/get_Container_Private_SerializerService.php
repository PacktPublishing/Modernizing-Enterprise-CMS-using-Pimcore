<?php

namespace ContainerRWbhxvk;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_Container_Private_SerializerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public '.container.private.serializer' shared service.
     *
     * @return \Symfony\Component\Serializer\Serializer
     */
    public static function do($container, $lazyLoad = true)
    {
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
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/SerializerAwareInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/Normalizer/CacheableSupportsMethodInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/SerializerAwareTrait.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/Normalizer/UnwrappingDenormalizer.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/Normalizer/ProblemNormalizer.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/Normalizer/UidNormalizer.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/Normalizer/ObjectToPopulateTrait.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/Normalizer/AbstractNormalizer.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/Normalizer/JsonSerializableNormalizer.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/Normalizer/DateTimeNormalizer.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/Normalizer/ConstraintViolationListNormalizer.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/NameConverter/NameConverterInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/NameConverter/AdvancedNameConverterInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/NameConverter/MetadataAwareNameConverter.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/Mapping/Factory/ClassMetadataFactoryInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/Mapping/Factory/ClassResolverTrait.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/Mapping/Factory/CacheClassMetadataFactory.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/Mapping/Factory/ClassMetadataFactory.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/Mapping/Loader/LoaderInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/Mapping/Loader/LoaderChain.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/Normalizer/MimeMessageNormalizer.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/Normalizer/AbstractObjectNormalizer.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/Normalizer/PropertyNormalizer.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/Mapping/ClassDiscriminatorResolverInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/Mapping/ClassDiscriminatorFromClassMetadata.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/Normalizer/DateTimeZoneNormalizer.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/Normalizer/DateIntervalNormalizer.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/Normalizer/FormErrorNormalizer.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/Normalizer/DataUriNormalizer.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/Normalizer/ArrayDenormalizer.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/Normalizer/ObjectNormalizer.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/Encoder/NormalizationAwareInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/Encoder/XmlEncoder.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/Encoder/JsonEncoder.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/Encoder/YamlEncoder.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Serializer/Encoder/CsvEncoder.php';

        $a = ($container->privates['property_accessor'] ?? $container->load('getPropertyAccessorService'));
        $b = new \Symfony\Component\Serializer\Mapping\Factory\CacheClassMetadataFactory(new \Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory(new \Symfony\Component\Serializer\Mapping\Loader\LoaderChain([])), \Symfony\Component\Cache\Adapter\PhpArrayAdapter::create(($container->targetDir.''.'/serialization.php'), ($container->privates['cache.serializer'] ?? $container->getCache_SerializerService())));

        $c = new \Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter($b);
        $d = new \Symfony\Component\Serializer\Mapping\ClassDiscriminatorFromClassMetadata($b);

        return $container->services['.container.private.serializer'] = new \Symfony\Component\Serializer\Serializer([0 => new \Symfony\Component\Serializer\Normalizer\UnwrappingDenormalizer($a), 1 => new \Symfony\Component\Serializer\Normalizer\ProblemNormalizer(true), 2 => new \Symfony\Component\Serializer\Normalizer\UidNormalizer(), 3 => new \Symfony\Component\Serializer\Normalizer\JsonSerializableNormalizer(), 4 => new \Symfony\Component\Serializer\Normalizer\DateTimeNormalizer(), 5 => new \Symfony\Component\Serializer\Normalizer\ConstraintViolationListNormalizer([], $c), 6 => new \Symfony\Component\Serializer\Normalizer\MimeMessageNormalizer(new \Symfony\Component\Serializer\Normalizer\PropertyNormalizer($b, $c, NULL, $d, NULL, [])), 7 => new \Symfony\Component\Serializer\Normalizer\DateTimeZoneNormalizer(), 8 => new \Symfony\Component\Serializer\Normalizer\DateIntervalNormalizer(), 9 => new \Symfony\Component\Serializer\Normalizer\FormErrorNormalizer(), 10 => new \Symfony\Component\Serializer\Normalizer\DataUriNormalizer(($container->privates['mime_types'] ?? $container->load('getMimeTypesService'))), 11 => new \Symfony\Component\Serializer\Normalizer\ArrayDenormalizer(), 12 => new \Symfony\Component\Serializer\Normalizer\ObjectNormalizer($b, $c, $a, NULL, $d, NULL, [])], [0 => new \Symfony\Component\Serializer\Encoder\XmlEncoder(), 1 => new \Symfony\Component\Serializer\Encoder\JsonEncoder(), 2 => new \Symfony\Component\Serializer\Encoder\YamlEncoder(), 3 => new \Symfony\Component\Serializer\Encoder\CsvEncoder()]);
    }
}
