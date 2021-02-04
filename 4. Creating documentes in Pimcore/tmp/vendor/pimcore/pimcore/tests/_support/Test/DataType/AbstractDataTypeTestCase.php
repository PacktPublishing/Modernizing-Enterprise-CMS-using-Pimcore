<?php

namespace Pimcore\Tests\Test\DataType;

use Pimcore\Cache;
use Pimcore\Model\DataObject\AbstractObject;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\Data\UrlSlug;
use Pimcore\Model\DataObject\Unittest;
use Pimcore\Tests\Helper\DataType\TestDataHelper;
use Pimcore\Tests\Test\TestCase;
use Pimcore\Tests\Util\TestHelper;

abstract class AbstractDataTypeTestCase extends TestCase
{
    /**
     * @var bool
     */
    protected $cleanupDbInSetup = true;

    /**
     * @var TestDataHelper
     */
    protected $testDataHelper;

    /**
     * @var int
     */
    protected $seed = 1;

    /**
     * @var Unittest
     */
    protected $testObject;

    /**
     * @var Unittest
     */
    protected $comparisonObject;

    /**
     * @param TestDataHelper $testData
     */
    public function _inject(TestDataHelper $testData)
    {
        $this->testDataHelper = $testData;
    }

    /**
     * @inheritDoc
     */
    protected function needsDb()
    {
        return true;
    }

    /**
     * @param array|string $fields
     *
     * @return Unittest
     */
    abstract protected function createTestObject($fields = []);

    /**
     * Calls fill* methods on the object as needed in test
     *
     * @param Concrete     $object
     * @param array|string $fields
     */
    protected function fillObject(Concrete $object, $fields = [])
    {
        // allow to pass only a string (e.g. input) -> fillInput($object, "input", $seed)
        if (!is_array($fields)) {
            $fields = [
                [
                    'method' => 'fill' . ucfirst($fields),
                    'field' => $fields,
                ],
            ];
        }

        if (!is_array($fields)) {
            throw new \InvalidArgumentException('Fields needs to be an array');
        }

        foreach ($fields as $field) {
            $method = $field['method'];

            if (!$method) {
                throw new \InvalidArgumentException(sprintf('Need a method to call'));
            }

            if (!method_exists($this->testDataHelper, $method)) {
                throw new \InvalidArgumentException(sprintf('Method %s does not exist', $method));
            }

            $methodArguments = [$object, $field['field'], $this->seed];

            $additionalArguments = isset($field['arguments']) ? $field['arguments'] : [];
            foreach ($additionalArguments as $aa) {
                $methodArguments[] = $aa;
            }

            call_user_func_array([$this->testDataHelper, $method], $methodArguments);
        }
    }

    public function testInput()
    {
        $this->createTestObject('input');

        $this->testDataHelper->assertInput($this->testObject, 'input', $this->seed);
    }

    public function testNumber()
    {
        $this->createTestObject('number');

        $this->testDataHelper->assertNumber($this->testObject, 'number', $this->seed);
    }

    public function testTextarea()
    {
        $this->createTestObject('textarea');

        $this->testDataHelper->assertTextarea($this->testObject, 'textarea', $this->seed);
    }

    public function testSlider()
    {
        $this->createTestObject('slider');

        $this->testDataHelper->assertSlider($this->testObject, 'slider', $this->seed);
    }

    public function testHref()
    {
        TestHelper::createEmptyObjects();
        $this->createTestObject('href');

        $this->testDataHelper->assertHref($this->testObject, 'href', $this->seed);
    }

    public function testMultiHref()
    {
        TestHelper::createEmptyObjects();
        $this->createTestObject('multihref');

        $this->testDataHelper->assertMultihref($this->testObject, 'multihref', $this->seed);
    }

    public function testImage()
    {
        $this->createTestObject('image');

        $this->assertNotNull($this->testObject->getImage());

        if (null !== $this->comparisonObject) {
            $this->assertNotNull($this->comparisonObject->getImage());
        }

        $this->testDataHelper->assertImage($this->testObject, 'image', $this->seed);
    }

    public function testHotspotImage()
    {
        $this->createTestObject([
            [
                'method' => 'fillHotspotImage',
                'field' => 'hotspotimage',
            ],
        ]);

        $this->assertNotNull($this->testObject->getHotspotImage());

        if (null !== $this->comparisonObject) {
            $this->assertNotNull($this->comparisonObject->getHotspotImage());
        }

        $this->testDataHelper->assertHotspotImage($this->testObject, 'hotspotimage', $this->seed);
    }

    public function testLanguage()
    {
        $this->createTestObject([
            [
                'method' => 'fillLanguage',
                'field' => 'languagex',
            ],
        ]);

        $this->testDataHelper->assertLanguage($this->testObject, 'languagex', $this->seed);
    }

    public function testCountry()
    {
        $this->createTestObject('country');

        $this->testDataHelper->assertCountry($this->testObject, 'country', $this->seed);
    }

    public function testDate()
    {
        $this->createTestObject('date');

        $this->testDataHelper->assertDate($this->testObject, 'date', $this->seed);
    }

    public function testDateTime()
    {
        $this->createTestObject([
            [
                'method' => 'fillDate',
                'field' => 'datetime',
            ],
        ]);

        $this->testDataHelper->assertDate($this->testObject, 'datetime', $this->seed);
    }

    public function testTime()
    {
        $this->createTestObject('time');

        $this->testDataHelper->assertTime($this->testObject, 'time', $this->seed);
    }

    public function testSelect()
    {
        $this->createTestObject('select');

        $this->testDataHelper->assertSelect($this->testObject, 'select', $this->seed);
    }

    public function testMultiSelect()
    {
        $this->createTestObject([
            [
                'method' => 'fillMultiSelect',
                'field' => 'multiselect',
            ],
        ]);

        $this->testDataHelper->assertMultiSelect($this->testObject, 'multiselect', $this->seed);
    }

    public function testUser()
    {
        $this->createTestObject('user');

        $this->testDataHelper->assertUser($this->testObject, 'user', $this->seed);
    }

    public function testCheckbox()
    {
        $this->createTestObject('checkbox');

        $this->testDataHelper->assertCheckbox($this->testObject, 'checkbox', $this->seed);
    }

    public function testBooleanSelect()
    {
        $this->createTestObject('booleanSelect');

        $this->testDataHelper->assertBooleanSelect($this->testObject, 'booleanSelect', $this->seed);
    }

    public function testWysiwyg()
    {
        $this->createTestObject('wysiwyg');

        $this->testDataHelper->assertWysiwyg($this->testObject, 'wysiwyg', $this->seed);
    }

    public function testPassword()
    {
        $this->createTestObject('password');

        $this->testDataHelper->assertPassword($this->testObject, 'password', $this->seed);
    }

    public function testCountryMultiSelect()
    {
        $this->createTestObject([
            [
                'method' => 'fillMultiSelect',
                'field' => 'countries',
            ],
        ]);

        $this->testDataHelper->assertCountryMultiSelect($this->testObject, 'countries', $this->seed);
    }

    public function testLanguageMultiSelect()
    {
        $this->createTestObject([
            [
                'method' => 'fillMultiSelect',
                'field' => 'languages',
            ],
        ]);

        $this->testDataHelper->assertCountryMultiSelect($this->testObject, 'languages', $this->seed);
    }

    public function testGeopoint()
    {
        $this->createTestObject([
            [
                'method' => 'fillGeopoint',
                'field' => 'point',
            ],
        ]);

        $this->testDataHelper->assertGeopoint($this->testObject, 'point', $this->seed);
    }

    public function testGeobounds()
    {
        $this->createTestObject([
            [
                'method' => 'fillGeobounds',
                'field' => 'bounds',
            ],
        ]);

        $this->testDataHelper->assertGeobounds($this->testObject, 'bounds', $this->comparisonObject, $this->seed);
    }

    public function testGeopolygon()
    {
        $this->createTestObject([
            [
                'method' => 'fillGeopolygon',
                'field' => 'poly',
            ],
        ]);

        $this->testDataHelper->assertGeopolygon($this->testObject, 'poly', $this->comparisonObject, $this->seed);
    }

    public function testTable()
    {
        $this->createTestObject('table');

        $this->testDataHelper->assertTable($this->testObject, 'table', $this->comparisonObject, $this->seed);
    }

    public function testLink()
    {
        $this->createTestObject('link');

        $this->testDataHelper->assertLink($this->testObject, 'link', $this->seed);
    }

    public function testStructuredTable()
    {
        $this->createTestObject([
            [
                'method' => 'fillStructuredTable',
                'field' => 'structuredtable',
            ],
        ]);

        $this->testDataHelper->assertStructuredTable($this->testObject, 'structuredtable', $this->comparisonObject, $this->seed);
    }

    public function testObjects()
    {
        // // this will create a couple of objects which can be used for references
        TestHelper::createEmptyObjects();

        $this->createTestObject('objects');

        $this->testDataHelper->assertObjects($this->testObject, 'objects', $this->seed);
    }

    public function testObjectsWithMetadata()
    {
        TestHelper::createEmptyObjects();

        $this->createTestObject([
            [
                'method' => 'fillObjectsWithMetadata',
                'field' => 'objectswithmetadata',
            ],
        ]);

        $this->testDataHelper->assertObjectsWithmetadata($this->testObject, 'objectswithmetadata', $this->comparisonObject, $this->seed);
    }

    public function testLocalizedInput()
    {
        $this->createTestObject([
            [
                'method' => 'fillInput',
                'field' => 'linput',
                'arguments' => ['de'],
            ],
            [
                'method' => 'fillInput',
                'field' => 'linput',
                'arguments' => ['en'],
            ],
        ]);

        $this->testDataHelper->assertInput($this->testObject, 'linput', $this->seed, 'en');
        $this->testDataHelper->assertInput($this->testObject, 'linput', $this->seed, 'de');
    }

    public function testLocalizedObjects()
    {
        TestHelper::createEmptyObjects();

        $this->createTestObject([
            [
                'method' => 'fillObjects',
                'field' => 'lobjects',
                'arguments' => ['de'],
            ],
            [
                'method' => 'fillObjects',
                'field' => 'lobjects',
                'arguments' => ['en'],
            ],
        ]);

        $this->testDataHelper->assertObjects($this->testObject, 'lobjects', $this->seed, 'en');
        $this->testDataHelper->assertObjects($this->testObject, 'lobjects', $this->seed, 'de');
    }

    public function testLazyLocalizedMultihref()
    {
        TestHelper::createEmptyObjects();

        $this->createTestObject([
            [
                'method' => 'fillObjects',
                'field' => 'lmultihrefLazy',
                'arguments' => ['de'],
            ],
            [
                'method' => 'fillObjects',
                'field' => 'lmultihrefLazy',
                'arguments' => ['en'],
            ],
        ]);

        $this->testDataHelper->assertObjects($this->testObject, 'lmultihrefLazy', $this->seed, 'en');
        $this->testDataHelper->assertObjects($this->testObject, 'lmultihrefLazy', $this->seed, 'de');

        Cache::clearAll();
        Cache\Runtime::clear();

        $this->testObject = AbstractObject::getById($this->testObject->getId());

        $this->testDataHelper->assertObjects($this->testObject, 'lmultihrefLazy', $this->seed, 'en');
        $this->testDataHelper->assertObjects($this->testObject, 'lmultihrefLazy', $this->seed, 'de');
    }

    public function testBricks()
    {
        $this->createTestObject([
            [
                'method' => 'fillBricks',
                'field' => 'mybricks',
            ],
        ]);

        $this->testDataHelper->assertBricks($this->testObject, 'mybricks', $this->seed);
    }

    public function testFieldCollection()
    {
        $this->createTestObject([
            [
                'method' => 'fillFieldCollection',
                'field' => 'myfieldcollection',
            ],
        ]);

        $this->testDataHelper->assertFieldCollection($this->testObject, 'myfieldcollection', $this->seed);
    }

    public function testUrlSlug()
    {
        $this->createTestObject('urlSlug');

        $this->testDataHelper->assertUrlSlug($this->testObject, 'urlSlug', $this->seed);

        // test invalid slug

        $validSlug = new UrlSlug('/xyz/abc');
        $this->testObject->setUrlSlug([$validSlug]);
        $this->testObject->save();

        $invalidSlug = new UrlSlug('/xyz      /abc');
        $this->testObject->setUrlSlug([$invalidSlug]);
        $ex = null;
        try {
            $this->testObject->save();
        } catch (\Exception $e) {
            $ex = $e;
        }
        $this->assertNotNull($ex, 'invalid slug, expected an exception');

        // make sure the invalid slug wasn't save and get a fresh copy
        $this->testObject = Concrete::getById($this->testObject->getId(), true);

        // test lookup
        $slug = UrlSlug::resolveSlug('/xyz/abc');
        $this->assertTrue($slug instanceof UrlSlug, 'expected a slug');
        /** @var $slug UrlSlug */
        $action = $slug->getAction();
        $this->assertEquals('MyController::myAction', $action, 'wrong controller/action');

        // check uniqueness
        $ex = null;
        $duplicateSlug = new UrlSlug('/xyz/abc');
        $this->testObject->setUrlSlug2([$duplicateSlug]);
        $ex = null;
        try {
            $this->testObject->save();
        } catch (\Exception $e) {
            $ex = $e;
        }
        $this->assertNotNull($ex, 'duplicate slug, expected an exception');
    }

    public function testLocalizedUrlSlug()
    {
        $this->createTestObject([
            [
                'method' => 'fillUrlSlug',
                'field' => 'lurlSlug',
                'arguments' => ['de'],
            ],
            [
                'method' => 'fillUrlSlug',
                'field' => 'lurlSlug',
                'arguments' => ['en'],
            ],
        ]);

        $this->testObject = Concrete::getById($this->testObject->getId(), true);
        $this->testDataHelper->assertUrlSlug($this->testObject, 'lurlSlug', $this->seed, 'en');
        $this->testDataHelper->assertUrlSlug($this->testObject, 'lurlSlug', $this->seed, 'de');
    }
}
