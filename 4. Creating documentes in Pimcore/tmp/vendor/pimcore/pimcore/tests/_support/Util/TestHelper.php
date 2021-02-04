<?php

namespace Pimcore\Tests\Util;

use Pimcore\Model\Asset;
use Pimcore\Model\DataObject\AbstractObject;
use Pimcore\Model\DataObject as ObjectModel;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\Unittest;
use Pimcore\Model\Document;
use Pimcore\Model\Element\AbstractElement;
use Pimcore\Model\Element\ElementInterface;
use Pimcore\Model\Property;
use Pimcore\Tests\Helper\DataType\TestDataHelper;
use Pimcore\Tool;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;

class TestHelper
{
    /**
     * Constant will be defined upon suite initialization and will result to true
     * if we have a valid DB configuration.
     *
     * @return bool
     */
    public static function supportsDbTests()
    {
        return defined('PIMCORE_TEST_DB_INITIALIZED') ? PIMCORE_TEST_DB_INITIALIZED : false;
    }

    /**
     * Check DB support and mark test skipped if DB connection wasn't established
     */
    public static function checkDbSupport()
    {
        if (!static::supportsDbTests()) {
            throw new \PHPUnit\Framework\SkippedTestError('Not running test as DB is not connected');
        }
    }

    /**
     * @param \Pimcore\Model\Property[] $properties
     *
     * @return array
     *
     * @throws \Exception
     */
    protected static function createPropertiesComparisonString(array $properties)
    {
        $propertiesStringArray = [];

        ksort($properties);

        if (is_array($properties)) {
            foreach ($properties as $key => $value) {
                if (in_array($value->getType(), ['document', 'asset', 'object'])) {
                    if ($value->getData() instanceof ElementInterface) {
                        $propertiesStringArray['property_' . $key . '_' . $value->getType()] = 'property_' . $key . '_' . $value->getType() . ':' . $value->getData()->getId();
                    } else {
                        $propertiesStringArray['property_' . $key . '_' . $value->getType()] = 'property_' . $key . '_' . $value->getType() . ': null';
                    }
                } elseif ($value->getType() === 'date') {
                    if ($value->getData() instanceof \DateTimeInterface) {
                        $propertiesStringArray['property_' . $key . '_' . $value->getType()] = 'property_' . $key . '_' . $value->getType() . ':' . $value->getData()->getTimestamp();
                    }
                } elseif ($value->getType() === 'bool') {
                    $propertiesStringArray['property_' . $key . '_' . $value->getType()] = 'property_' . $key . '_' . $value->getType() . ':' . (bool)$value->getData();
                } elseif (in_array($value->getType(), ['text', 'select'])) {
                    $propertiesStringArray['property_' . $key . '_' . $value->getType()] = 'property_' . $key . '_' . $value->getType() . ':' . $value->getData();
                } else {
                    throw new \Exception('Unknown property of type [ ' . $value->getType() . ' ]');
                }
            }
        }

        return $propertiesStringArray;
    }

    /**
     * @param Asset $asset
     * @param bool $ignoreCopyDifferences
     *
     * @return string|null
     */
    public static function createAssetComparisonString(Asset $asset, $ignoreCopyDifferences = false)
    {
        if ($asset instanceof Asset) {
            $a = [];

            // custom settings
            if (is_array($asset->getCustomSettings())) {
                $a['customSettings'] = serialize($asset->getCustomSettings());
            }

            if ($asset->getData()) {
                $a['data'] = base64_encode($asset->getData());
            }

            if (!$ignoreCopyDifferences) {
                $a['filename'] = $asset->getFilename();
                $a['id'] = $asset->getId();
                $a['modification'] = $asset->getModificationDate();
                $a['creation'] = $asset->getCreationDate();
                $a['userModified'] = $asset->getUserModification();
                $a['parentId'] = $asset->getParentId();
                $a['path'] = $asset->getPath();
            }

            $a['userOwner'] = $asset->getUserOwner();

            $properties = $asset->getProperties();

            $a = array_merge($a, self::createPropertiesComparisonString($properties));

            return implode(',', $a);
        } else {
            return null;
        }
    }

    /**
     * @param  Asset $asset1
     * @param  Asset $asset2
     * @param bool $ignoreCopyDifferences
     * @param bool $id
     *
     * @return bool
     */
    public static function assetsAreEqual(Asset $asset1, Asset $asset2, $ignoreCopyDifferences = false, $id = false)
    {
        if ($asset1 instanceof Asset and $asset2 instanceof Asset) {
            $a1Hash = self::createAssetComparisonString($asset1, $ignoreCopyDifferences);
            $a2Hash = self::createAssetComparisonString($asset2, $ignoreCopyDifferences);

            return $a1Hash === $a2Hash ? true : false;
        } else {
            return false;
        }
    }

    /**
     * @param Document $document
     * @param bool $ignoreCopyDifferences
     *
     * @return string
     */
    public static function createDocumentComparisonString(Document $document, $ignoreCopyDifferences = false)
    {
        if ($document instanceof Document) {
            $d = [];

            if ($document instanceof Document\PageSnippet) {
                $editables = $document->getEditables();

                ksort($editables);

                /** @var Document\Tag $value */
                foreach ($editables as $key => $value) {
                    if ($value instanceof Document\Tag\Video) {
                        // with video can't use frontend(), it includes random id
                        $d['editable_' . $key] = $value->getName() . ':' . $value->type . '_' . $value->id;
                    } elseif (!$value instanceof Document\Tag\Block) {
                        $d['editable_' . $key] = $value->getName() . ':' . $value->frontend();
                    } else {
                        $d['editable_' . $key] = $value->getName();
                    }
                }

                if ($document instanceof Document\Page) {
                    $d['title'] = $document->getTitle();
                    $d['description'] = $document->getDescription();
                }

                $d['published'] = $document->isPublished();
            }

            if ($document instanceof Document\Link) {
                $d['link'] = $document->getHtml();
            }

            if (!$ignoreCopyDifferences) {
                $d['key'] = $document->getKey();
                $d['id'] = $document->getId();
                $d['modification'] = $document->getModificationDate();
                $d['creation'] = $document->getCreationDate();
                $d['userModified'] = $document->getUserModification();
                $d['parentId'] = $document->getParentId();
                $d['path'] = $document->getPath();
            }

            $d['userOwner'] = $document->getUserOwner();

            $properties = $document->getProperties();

            $d = array_merge($d, self::createPropertiesComparisonString($properties));

            return implode(',', $d);
        } else {
            return null;
        }
    }

    /**
     * @param Document $doc1
     * @param Document $doc2
     * @param bool $ignoreCopyDifferences
     *
     * @return bool
     */
    public static function documentsAreEqual(Document $doc1, Document $doc2, $ignoreCopyDifferences = false)
    {
        if ($doc1 instanceof Document and $doc2 instanceof Document) {
            $d1Hash = self::createDocumentComparisonString($doc1, $ignoreCopyDifferences);
            $d2Hash = self::createDocumentComparisonString($doc2, $ignoreCopyDifferences);

            return $d1Hash === $d2Hash ? true : false;
        } else {
            return false;
        }
    }

    /**
     * @param string $key
     * @param ObjectModel\ClassDefinition\Data $fd
     * @param AbstractObject $object
     *
     * @return string
     */
    public static function getComparisonDataForField($key, ObjectModel\ClassDefinition\Data $fd, AbstractObject $object)
    {
        // omit password, this one we don't get through WS,
        // omit non owner objects, they don't get through WS,
        // plus omit fields which don't have get method
        $getter = 'get' . ucfirst($key);

        if (method_exists($object, $getter) && $fd instanceof ObjectModel\ClassDefinition\Data\Fieldcollections) {
            if ($object->$getter()) {
                /** @var ObjectModel\Fieldcollection $collection */
                $collection = $object->$getter();
                $items = $collection->getItems();

                if (is_array($items)) {
                    $returnValue = [];
                    $counter = 0;

                    /** @var ObjectModel\Fieldcollection\Data\AbstractData $item */
                    foreach ($items as $item) {
                        $def = $item->getDefinition();

                        foreach ($def->getFieldDefinitions() as $k => $v) {
                            $getter = 'get' . ucfirst($v->getName());
                            $fieldValue = $item->$getter();

                            if ($v instanceof ObjectModel\ClassDefinition\Data\Link) {
                                $fieldValue = serialize($v);
                            } elseif ($v instanceof ObjectModel\ClassDefinition\Data\Password || $fd instanceof ObjectModel\ClassDefinition\Data\ReverseManyToManyObjectRelation) {
                                $fieldValue = null;
                            } else {
                                $fieldValue = $v->getForCsvExport($item);
                            }

                            $returnValue[$counter][$k] = $fieldValue;
                        }

                        $counter++;
                    }

                    return serialize($returnValue);
                }
            }
        } elseif (method_exists($object, $getter) && $fd instanceof ObjectModel\ClassDefinition\Data\Localizedfields) {
            $data = $object->$getter();
            $lData = [];

            if (!$data instanceof ObjectModel\Localizedfield) {
                return [];
            }

            $localeService = \Pimcore::getContainer()->get('pimcore.locale');
            $localeBackup = $localeService->getLocale();

            $validLanguages = Tool::getValidLanguages();

            foreach ($validLanguages as $language) {
                /** @var ObjectModel\ClassDefinition\Data $nestedFd */
                foreach ($fd->getFieldDefinitions() as $nestedFd) {
                    $localeService->setLocale($language);
                    $lData[$language][$nestedFd->getName()] = self::getComparisonDataForField($nestedFd->getName(), $nestedFd, $object);
                }
            }

            $localeService->setLocale($localeBackup);

            return serialize($lData);
        } elseif (method_exists($object, $getter) && $fd instanceof ObjectModel\Data\Link) {
            return serialize($fd);
        } elseif (method_exists($object, $getter) && !$fd instanceof ObjectModel\ClassDefinition\Data\Password && !$fd instanceof ObjectModel\ClassDefinition\Data\ReverseManyToManyObjectRelation) {
            return $fd->getForCsvExport($object);
        }
    }

    /**
     * @param AbstractObject $object
     * @param bool $ignoreCopyDifferences
     *
     * @return string
     */
    public static function createObjectComparisonString(AbstractObject $object, $ignoreCopyDifferences = false)
    {
        if ($object instanceof AbstractObject) {
            $o = [];

            if ($object instanceof Concrete) {
                foreach ($object->getClass()->getFieldDefinitions() as $key => $value) {
                    $o[$key] = self::getComparisonDataForField($key, $value, $object);
                }

                $o['published'] = $object->isPublished();
            }
            if (!$ignoreCopyDifferences) {
                $o['id'] = $object->getId();
                $o['key'] = $object->getKey();
                $o['modification'] = $object->getModificationDate();
                $o['creation'] = $object->getCreationDate();
                $o['userModified'] = $object->getUserModification();
                $o['parentId'] = $object->getParentId();
                $o['path'] = $object->getPath();
            }

            $o['userOwner'] = $object->getUserOwner();

            $properties = $object->getProperties();

            $o = array_merge($o, self::createPropertiesComparisonString($properties));

            return implode(',', $o);
        } else {
            return null;
        }
    }

    /**
     * @param AbstractObject $object1
     * @param AbstractObject $object2
     * @param bool $ignoreCopyDifferences
     *
     * @return bool
     */
    public static function objectsAreEqual(AbstractObject $object1, AbstractObject $object2, $ignoreCopyDifferences = false)
    {
        if ($object1 instanceof AbstractObject and $object2 instanceof AbstractObject) {
            $o1Hash = self::createObjectComparisonString($object1, $ignoreCopyDifferences);
            $o2Hash = self::createObjectComparisonString($object2, $ignoreCopyDifferences);

            $id = uniqid();

            return $o1Hash === $o2Hash ? true : false;
        } else {
            return false;
        }
    }

    /**
     * @param string $keyPrefix
     * @param bool $save
     * @param bool $publish
     * @param string|null $type
     *
     * @return Concrete|Unittest
     */
    public static function createEmptyObject($keyPrefix = '', $save = true, $publish = true, $type = null)
    {
        if (null === $keyPrefix) {
            $keyPrefix = '';
        }

        if (null === $type) {
            $type = Unittest::class;
        }

        /** @var Concrete $emptyObject */
        $emptyObject = new $type();
        $emptyObject->setOmitMandatoryCheck(true);
        $emptyObject->setParentId(1);
        $emptyObject->setUserOwner(1);
        $emptyObject->setUserModification(1);
        $emptyObject->setCreationDate(time());
        $emptyObject->setKey($keyPrefix . uniqid() . rand(10, 99));

        if ($publish) {
            $emptyObject->setPublished(true);
        }

        if ($save) {
            $emptyObject->save();
        }

        return $emptyObject;
    }

    /**
     * @param string $keyPrefix
     * @param bool   $save
     *
     * @return ObjectModel\Folder
     */
    public static function createObjectFolder($keyPrefix = '', $save = true)
    {
        if (null === $keyPrefix) {
            $keyPrefix = '';
        }

        $folder = new ObjectModel\Folder();
        $folder->setParentId(1);
        $folder->setUserOwner(1);
        $folder->setUserModification(1);
        $folder->setCreationDate(time());
        $folder->setKey($keyPrefix . uniqid() . rand(10, 99));

        if ($save) {
            $folder->save();
        }

        return $folder;
    }

    /**
     * @param string $keyPrefix
     * @param bool $save
     * @param int $count
     *
     * @return Unittest[]
     */
    public static function createEmptyObjects($keyPrefix = '', $save = true, $count = 10)
    {
        $result = [];
        for ($i = 0; $i < $count; $i++) {
            $result[] = self::createEmptyObject($keyPrefix, $save);
        }

        return $result;
    }

    /**
     * @param TestDataHelper $testDataHelper
     * @param string         $keyPrefix
     * @param bool           $save
     * @param bool           $publish
     * @param int            $seed
     *
     * @return Unittest
     */
    public static function createFullyFledgedObject(TestDataHelper $testDataHelper, $keyPrefix = '', $save = true, $publish = true, $seed = 1)
    {
        if (null === $keyPrefix) {
            $keyPrefix = '';
        }

        $object = new Unittest();
        $object->setOmitMandatoryCheck(true);
        $object->setParentId(1);
        $object->setUserOwner(1);
        $object->setUserModification(1);
        $object->setCreationDate(time());
        $object->setKey($keyPrefix . uniqid() . rand(10, 99));

        if ($publish) {
            $object->setPublished(true);
        }

        $testDataHelper->fillInput($object, 'input', $seed);
        $testDataHelper->fillNumber($object, 'number', $seed);
        $testDataHelper->fillTextarea($object, 'textarea', $seed);
        $testDataHelper->fillSlider($object, 'slider', $seed);
        $testDataHelper->fillHref($object, 'href', $seed);
        $testDataHelper->fillMultihref($object, 'multihref', $seed);
        $testDataHelper->fillImage($object, 'image', $seed);
        $testDataHelper->fillHotspotImage($object, 'hotspotimage', $seed);
        $testDataHelper->fillLanguage($object, 'languagex', $seed);
        $testDataHelper->fillCountry($object, 'country', $seed);
        $testDataHelper->fillDate($object, 'date', $seed);
        $testDataHelper->fillDate($object, 'datetime', $seed);
        $testDataHelper->fillTime($object, 'time', $seed);
        $testDataHelper->fillSelect($object, 'select', $seed);
        $testDataHelper->fillMultiSelect($object, 'multiselect', $seed);
        $testDataHelper->fillUser($object, 'user', $seed);
        $testDataHelper->fillCheckbox($object, 'checkbox', $seed);
        $testDataHelper->fillBooleanSelect($object, 'booleanSelect', $seed);
        $testDataHelper->fillWysiwyg($object, 'wysiwyg', $seed);
        $testDataHelper->fillPassword($object, 'password', $seed);
        $testDataHelper->fillMultiSelect($object, 'countries', $seed);
        $testDataHelper->fillMultiSelect($object, 'languages', $seed);
        $testDataHelper->fillGeopoint($object, 'point', $seed);
        $testDataHelper->fillGeobounds($object, 'bounds', $seed);
        $testDataHelper->fillGeopolygon($object, 'poly', $seed);
        $testDataHelper->fillTable($object, 'table', $seed);
        $testDataHelper->fillLink($object, 'link', $seed);
        $testDataHelper->fillStructuredTable($object, 'structuredtable', $seed);
        $testDataHelper->fillObjects($object, 'objects', $seed);
        $testDataHelper->fillObjectsWithMetadata($object, 'objectswithmetadata', $seed);

        $testDataHelper->fillInput($object, 'linput', $seed, 'de');
        $testDataHelper->fillInput($object, 'linput', $seed, 'en');

        $testDataHelper->fillObjects($object, 'lobjects', $seed, 'de');
        $testDataHelper->fillObjects($object, 'lobjects', $seed, 'en');

        $testDataHelper->fillBricks($object, 'mybricks', $seed);
        $testDataHelper->fillFieldCollection($object, 'myfieldcollection', $seed);

        if ($save) {
            $object->save();
        }

        return $object;
    }

    /**
     * @param string $keyPrefix
     * @param bool   $save
     * @param bool   $publish
     *
     * @return Document\Page
     */
    public static function createEmptyDocumentPage($keyPrefix = '', $save = true, $publish = true)
    {
        if (null === $keyPrefix) {
            $keyPrefix = '';
        }

        $document = new Document\Page();
        $document->setType('page');
        $document->setParentId(1);
        $document->setUserOwner(1);
        $document->setUserModification(1);
        $document->setCreationDate(time());
        $document->setKey($keyPrefix . uniqid() . rand(10, 99));

        if ($publish) {
            $document->setPublished(true);
        }

        if ($save) {
            $document->save();
        }

        return $document;
    }

    /**
     * @param string $keyPrefix
     * @param bool   $save
     *
     * @return Document\Folder
     */
    public static function createDocumentFolder($keyPrefix = '', $save = true)
    {
        if (null === $keyPrefix) {
            $keyPrefix = '';
        }

        $folder = new Document\Folder();
        $folder->setParentId(1);
        $folder->setUserOwner(1);
        $folder->setUserModification(1);
        $folder->setCreationDate(time());
        $folder->setKey($keyPrefix . uniqid() . rand(10, 99));

        if ($save) {
            $folder->save();
        }

        return $folder;
    }

    /**
     * @param string $keyPrefix
     * @param string|null $data
     * @param bool $save
     *
     * @return Asset\Image
     */
    public static function createImageAsset($keyPrefix = '', $data = null, $save = true)
    {
        if (!$data) {
            $path = static::resolveFilePath('assets/images/image5.jpg');
            if (!file_exists($path)) {
                throw new \RuntimeException(sprintf('Path %s was not found', $path));
            }

            $data = file_get_contents($path);
        }

        $asset = new Asset\Image();
        $asset->setParentId(1);
        $asset->setUserOwner(1);
        $asset->setUserModification(1);
        $asset->setCreationDate(time());
        $asset->setData($data);
        $asset->setType('image');

        $property = new Property();
        $property->setName('propname');
        $property->setType('text');
        $property->setData('bla');

        $properties = [$property];
        $asset->setProperties($properties);

        $asset->setFilename($keyPrefix . uniqid() . rand(10, 99) . '.jpg');

        if ($save) {
            $asset->save();
        }

        return $asset;
    }

    /**
     * @param string $keyPrefix
     * @param string|null $data
     * @param bool $save
     *
     * @return Asset\Document
     */
    public static function createDocumentAsset($keyPrefix = '', $data = null, $save = true)
    {
        if (!$data) {
            $path = static::resolveFilePath('assets/document/sonnenblume.pdf');
            if (!file_exists($path)) {
                throw new \RuntimeException(sprintf('Path %s was not found', $path));
            }

            $data = file_get_contents($path);
        }

        $asset = new Asset\Document();
        $asset->setParentId(1);
        $asset->setUserOwner(1);
        $asset->setUserModification(1);
        $asset->setCreationDate(time());
        $asset->setData($data);
        $asset->setType('document');

        $property = new Property();
        $property->setName('propname');
        $property->setType('text');
        $property->setData('bla');

        $properties = [$property];
        $asset->setProperties($properties);

        $asset->setFilename($keyPrefix . uniqid() . rand(10, 99) . '.pdf');

        if ($save) {
            $asset->save();
        }

        return $asset;
    }

    /**
     * @param string $keyPrefix
     * @param string|null $data
     * @param bool $save
     *
     * @return Asset\Video
     */
    public static function createVideoAsset($keyPrefix = '', $data = null, $save = true)
    {
        if (!$data) {
            $path = static::resolveFilePath('assets/video/example.mp4');
            if (!file_exists($path)) {
                throw new \RuntimeException(sprintf('Path %s was not found', $path));
            }

            $data = file_get_contents($path);
        }

        $asset = new Asset\Video();
        $asset->setParentId(1);
        $asset->setUserOwner(1);
        $asset->setUserModification(1);
        $asset->setCreationDate(time());
        $asset->setData($data);
        $asset->setType('video');

        $property = new Property();
        $property->setName('propname');
        $property->setType('text');
        $property->setData('bla');

        $properties = [$property];
        $asset->setProperties($properties);

        $asset->setFilename($keyPrefix . uniqid() . rand(10, 99) . '.mp4');

        if ($save) {
            $asset->save();
        }

        return $asset;
    }

    /**
     * @param string $keyPrefix
     * @param bool   $save
     *
     * @return Asset\Folder
     */
    public static function createAssetFolder($keyPrefix = '', $save = true)
    {
        if (null === $keyPrefix) {
            $keyPrefix = '';
        }

        $folder = new Asset\Folder();
        $folder->setParentId(1);
        $folder->setUserOwner(1);
        $folder->setUserModification(1);
        $folder->setCreationDate(time());
        $folder->setFilename($keyPrefix . uniqid() . rand(10, 99));

        if ($save) {
            $folder->save();
        }

        return $folder;
    }

    /**
     * Clean up directory, deleting files one by one
     *
     * @param string|\Traversable|Finder $directory
     */
    public static function cleanupDirectory($directory)
    {
        $files = null;
        if ($directory instanceof \Traversable) {
            $files = $directory;
        } else {
            $files = new Finder();
            $files
                ->files()
                ->in($directory)
                ->ignoreDotFiles(true);
        }

        $filesystem = new Filesystem();
        $filesystem->remove($files);
    }

    /**
     * @param bool $cleanAssets
     * @param bool $cleanDocuments
     * @param bool $cleanObjects
     */
    public static function cleanUp($cleanObjects = true, $cleanDocuments = true, $cleanAssets = true)
    {
        \Pimcore::collectGarbage();

        if (!static::supportsDbTests()) {
            return;
        }

        if ($cleanObjects) {
            static::cleanUpTree(AbstractObject::getById(1), 'object');
            codecept_debug(sprintf('Number of objects is: %d', static::getObjectCount()));
        }

        if ($cleanAssets) {
            static::cleanUpTree(Asset::getById(1), 'asset');
            codecept_debug(sprintf('Number of assets is: %d', static::getAssetCount()));
        }

        if ($cleanDocuments) {
            static::cleanUpTree(Document::getById(1), 'document');
            codecept_debug(sprintf('Number of documents is: %d', static::getDocumentCount()));
        }

        \Pimcore::collectGarbage();
    }

    /**
     * @param AbstractElement $root
     * @param string $type
     */
    public static function cleanUpTree(AbstractElement $root, $type)
    {
        if (!($root instanceof AbstractObject || $root instanceof Document || $root instanceof Asset)) {
            throw new \InvalidArgumentException(sprintf('Cleanup root type for %s needs to be one of: AbstractObject, Document, Asset', $type));
        }

        if ($root instanceof AbstractObject) {
            $children = $root->getChildren([], true);
        } elseif ($root instanceof Document) {
            $children = $root->getChildren(true);
        } else {
            $children = $root->getChildren();
        }

        /** @var AbstractElement|AbstractObject|Document|Asset $child */
        foreach ($children as $child) {
            codecept_debug(sprintf('Deleting %s %s (%d)', $type, $child->getFullPath(), $child->getId()));
            $child->delete();
        }
    }

    /**
     * Returns the total number of objects.
     *
     * @return int
     */
    public static function getObjectCount()
    {
        $list = new ObjectModel\Listing();
        $childs = $list->load();

        return count($childs);
    }

    /**
     * Returns the total number of assets.
     *
     * @return int
     */
    public static function getAssetCount()
    {
        $list = new Asset\Listing();
        $children = $list->getAssets();

        return count($children);
    }

    /**
     * Returns the total number of documents.
     *
     * @return int
     */
    public static function getDocumentCount()
    {
        $list = new Document\Listing();
        $childs = $list->load();

        return count($childs);
    }

    /**
     * Resolve path to resource path
     *
     * @param string $path
     *
     * @return string
     */
    public static function resolveFilePath($path)
    {
        $path = __DIR__ . '/../Resources/' . ltrim($path, '/');

        return $path;
    }

    /**
     * @param int $length
     *
     * @return string
     */
    public static function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }
}
