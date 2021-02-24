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

use Pimcore\Tool\Serialize;

class PHP extends AbstractOperator
{
    /** @var string */
    private $mode;

    public function __construct(\stdClass $config, $context = null)
    {
        parent::__construct($config, $context);

        $this->mode = $config->mode ?? '';
    }

    public function getLabeledValue($element)
    {
        $result = new \stdClass();
        $result->label = $this->label;

        $childs = $this->getChilds();

        if (!$childs) {
            return $result;
        } else {
            $c = $childs[0];

            $valueArray = [];

            $childResult = $c->getLabeledValue($element);

            $childValues = $childResult->value ?? null;
            $isArrayType = is_array($childValues);

            if ($childValues && !is_array($childValues)) {
                $childValues = [$childValues];
            }

            /** @var array $childValues */
            if (is_array($childValues)) {
                foreach ($childValues as $childValue) {
                    $valueArray[] = $childValue;
                }
            } else {
                $valueArray[] = null;
            }

            if ($isArrayType) {
                $result->value = $valueArray;
            } else {
                $result->value = $valueArray[0];
            }
        }

        if ($this->mode === 's') {
            $result->value = Serialize::serialize($result->value);
        } elseif ($this->mode === 'u') {
            $result->value = Serialize::unserialize($result->value);
        }

        return $result;
    }
}
