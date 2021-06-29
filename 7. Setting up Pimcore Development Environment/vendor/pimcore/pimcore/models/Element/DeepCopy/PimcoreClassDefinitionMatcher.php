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

namespace Pimcore\Model\Element\DeepCopy;

use DeepCopy\Matcher\Matcher;
use Pimcore\Model\DataObject\ClassDefinition;
use Pimcore\Model\DataObject\Concrete;

/**
 * @internal
 */
class PimcoreClassDefinitionMatcher implements Matcher
{
    /** @var string $matchType */
    private $matchType;

    /**
     * PimcoreClassDefinitionMatcher constructor.
     *
     * @param string $matchType
     */
    public function __construct(string $matchType)
    {
        $this->matchType = $matchType;
    }

    /**
     * @param object $object
     * @param string $property
     *
     * @return bool
     */
    public function matches($object, $property): bool
    {
        // TODO check if matcher only works for container type object (but not for localized fields, bricks, etc...)

        if ($object instanceof Concrete) {
            // do not call getClass on the object as this will set the class again
            $def = ClassDefinition::getById($object->getClassId());
            if ($def) {
                return $def->getFieldDefinition($property) instanceof $this->matchType;
            }
        }

        return false;
    }
}
