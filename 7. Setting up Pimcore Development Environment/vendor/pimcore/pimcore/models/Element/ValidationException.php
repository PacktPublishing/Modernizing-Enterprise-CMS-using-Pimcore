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

namespace Pimcore\Model\Element;

class ValidationException extends \Exception
{
    /**
     * @var array
     */
    protected $contextStack = [];

    /** @var array */
    protected $subItems = [];

    /**
     * @return array
     */
    public function getSubItems()
    {
        return $this->subItems;
    }

    /**
     * @param array $subItems
     */
    public function setSubItems(array $subItems = [])
    {
        $this->subItems = $subItems;
    }

    /**
     * @param string $context
     */
    public function addContext($context)
    {
        $this->contextStack[] = $context;
    }

    /**
     * @return array
     */
    public function getContextStack()
    {
        return $this->contextStack;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $result = parent::__toString();
        if (is_array($this->subItems)) {
            foreach ($this->subItems as $subItem) {
                $result .= "\n\n";
                $result .= $subItem->__toString();
            }
        }

        return $result;
    }
}
