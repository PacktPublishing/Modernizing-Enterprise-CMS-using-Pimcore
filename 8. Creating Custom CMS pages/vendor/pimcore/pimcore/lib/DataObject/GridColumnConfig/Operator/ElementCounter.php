<?php
/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @category   Pimcore
 * @package    Object
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace Pimcore\DataObject\GridColumnConfig\Operator;

class ElementCounter extends AbstractOperator
{
    /** @var bool */
    private $countEmpty;

    public function __construct(\stdClass $config, $context = null)
    {
        parent::__construct($config, $context);

        $this->countEmpty = $config->countEmpty ?? false;
    }

    public function getLabeledValue($element)
    {
        $result = new \stdClass();
        $result->label = $this->label;

        $childs = $this->getChilds();
        $count = 0;

        foreach ($childs as $c) {
            $childResult = $c->getLabeledValue($element);
            $childValues = $childResult->value ?? null;

            if ($this->getCountEmpty()) {
                if (is_array($childValues)) {
                    $count += count($childValues);
                } else {
                    $count++;
                }
            } else {
                if (is_array($childValues)) {
                    foreach ($childValues as $childValue) {
                        if ($childValue) {
                            $count++;
                        }
                    }
                } elseif ($childValues) {
                    $count++;
                }
            }
        }

        $result->value = $count;

        return $result;
    }

    /**
     * @return bool
     */
    public function getCountEmpty()
    {
        return $this->countEmpty;
    }

    /**
     * @param bool $countEmpty
     */
    public function setCountEmpty($countEmpty)
    {
        $this->countEmpty = $countEmpty;
    }
}
