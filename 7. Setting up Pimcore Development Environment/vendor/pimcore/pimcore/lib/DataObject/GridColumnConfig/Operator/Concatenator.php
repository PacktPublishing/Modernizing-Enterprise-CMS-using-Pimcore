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

namespace Pimcore\DataObject\GridColumnConfig\Operator;

/**
 * @internal
 */
final class Concatenator extends AbstractOperator
{
    /**
     * @var string
     */
    private $glue;

    /**
     * @var bool
     */
    private $forceValue;

    /**
     * {@inheritdoc}
     */
    public function __construct(\stdClass $config, $context = null)
    {
        parent::__construct($config, $context);

        $this->glue = $config->glue ?? '';
        $this->forceValue = $config->forceValue ?? false;
    }

    /**
     * {@inheritdoc}
     */
    public function getLabeledValue($element)
    {
        $result = new \stdClass();
        $result->label = $this->label;

        $hasValue = true;
        if (!$this->forceValue) {
            $hasValue = false;
        }

        $childs = $this->getChilds();
        $valueArray = [];

        foreach ($childs as $c) {
            $childResult = $c->getLabeledValue($element);
            $childValues = (array)($childResult->value ?? []);

            foreach ($childValues as $value) {
                if (!$hasValue) {
                    if (!empty($value) || (method_exists($value, 'isEmpty') && !$value->isEmpty())) {
                        $hasValue = true;
                    }
                }

                if ($value !== null) {
                    $valueArray[] = $value;
                }
            }
        }

        if ($hasValue) {
            $result->value = implode($this->glue, $valueArray);

            return $result;
        }

        $result->empty = true;

        return $result;
    }
}
