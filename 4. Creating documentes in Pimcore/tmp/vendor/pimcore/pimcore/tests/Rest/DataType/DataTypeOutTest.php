<?php

namespace Pimcore\Tests\Rest\DataType;

use Pimcore\Model\DataObject\Unittest;
use Pimcore\Tests\Test\DataType\AbstractDataTypeRestTestCase;
use Pimcore\Tests\Util\TestHelper;

/**
 * @group dataTypeOut
 */
class DataTypeOutTest extends AbstractDataTypeRestTestCase
{
    /**
     * Creates and saves object locally and loads comparison object from API
     *
     * @inheritDoc
     */
    protected function createTestObject($fields = [])
    {
        $object = TestHelper::createEmptyObject('local', true, true);
        $this->fillObject($object, $fields);

        $object->save();

        /** @var Unittest $restObject */
        $restObject = $this->restClient->getObjectById($object->getId());

        $this->assertNotNull($restObject);
        $this->assertInstanceOf(Unittest::class, $restObject);

        $this->testObject = $restObject;
        $this->comparisonObject = $object;

        return $this->testObject;
    }
}
