<?php

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

namespace Pimcore\Tests\Model\Document;

use Pimcore\Model\Document;
use Pimcore\Model\Element\ElementInterface;
use Pimcore\Tests\Test\AbstractPropertiesTest;
use Pimcore\Tests\Util\TestHelper;

/**
 * @group properties
 */
class PropertiesTest extends AbstractPropertiesTest
{
    public function createElement(): ElementInterface
    {
        $this->testElement = TestHelper::createDocumentFolder();
        $this->testElement->save();

        $this->assertNotNull($this->testElement);
        $this->assertInstanceOf(Document::class, $this->testElement);

        return $this->testElement;
    }

    public function reloadElement(): ElementInterface
    {
        $this->testElement = Document::getById($this->testElement->getId(), true);

        return $this->testElement;
    }
}
