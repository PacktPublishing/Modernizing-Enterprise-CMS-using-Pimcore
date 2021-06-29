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
final class Arithmetic extends AbstractOperator
{
    /**
     * @var bool
     */
    private $skipNull;

    /**
     * @var string
     */
    private $operator;

    /**
     * {@inheritdoc}
     */
    public function __construct(\stdClass $config, $context = null)
    {
        parent::__construct($config, $context);

        $this->skipNull = $config->skipNull ?? false;
        $this->operator = $config->operator ?? '';
    }

    /**
     * {@inheritdoc}
     */
    public function getLabeledValue($element)
    {
        $result = new \stdClass();
        $result->label = $this->label;
        $result->value = 0;

        $childs = $this->getChilds();

        if (!in_array($this->getOperator(), ['+', '-', '*', '/'])) {
            return $result;
        }

        if (!$childs) {
            return $result;
        } else {
            $valueArray = [];
            foreach ($childs as $c) {
                $childResult = $c->getLabeledValue($element);
                $isArrayType = $childResult->isArrayType ?? false;
                $childValues = $childResult->value ?? null;
                if ($childValues && !$isArrayType) {
                    $childValues = [$childValues];
                }

                if (is_array($childValues)) {
                    foreach ($childValues as $value) {
                        if (is_null($value) && $this->skipNull) {
                            continue;
                        }
                        $valueArray[] = $value;
                    }
                } else {
                    if (!$this->skipNull) {
                        $valueArray[] = null;
                    }
                }
            }

            $resultValue = null;
            for ($i = 0; $i < count($valueArray); $i++) {
                $val = $valueArray[$i];

                if ($i == 0) {
                    $resultValue = $val;

                    continue;
                }

                if ($this->getOperator() == '+') {
                    $resultValue = $resultValue + $val;
                } elseif ($this->getOperator() == '-') {
                    $resultValue = $resultValue - $val;
                } elseif ($this->getOperator() == '*') {
                    $resultValue = $resultValue * $val;
                } elseif ($this->getOperator() == '/') {
                    if ($resultValue == 0) {
                        $result->value = 'NaN';

                        return $result;
                    }
                    $resultValue = $resultValue / $val;
                }
            }
            $result->value = $resultValue;
        }

        return $result;
    }

    /**
     * @return bool
     */
    public function getSkipNull()
    {
        return $this->skipNull;
    }

    /**
     * @param bool $skipNull
     */
    public function setSkipNull($skipNull)
    {
        $this->skipNull = $skipNull;
    }

    /**
     * @return string
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * @param string $operator
     */
    public function setOperator($operator)
    {
        $this->operator = $operator;
    }
}
