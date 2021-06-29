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
final class Anonymizer extends AbstractOperator
{
    /**
     * @var string
     */
    private $mode;

    /**
     * {@inheritdoc}
     */
    public function __construct(\stdClass $config, $context = null)
    {
        parent::__construct($config, $context);

        $this->mode = $config->mode ?? '';
    }

    /**
     * {@inheritdoc}
     */
    public function getLabeledValue($element)
    {
        $result = new \stdClass();
        $result->label = $this->label;
        $result->isArrayType = true;

        $childs = $this->getChilds();
        $resultItems = [];

        foreach ($childs as $c) {
            $childResult = $c->getLabeledValue($element);
            $childValues = $childResult->value;

            if ($childValues) {
                if ($this->mode === 'md5') {
                    $childValues = md5($childValues);
                } elseif ($this->mode === 'bcrypt') {
                    $childValues = password_hash($childValues, PASSWORD_BCRYPT);
                }
                $resultItems[] = $childValues;
            } else {
                $resultItems[] = null;
            }
        }

        if (count($childs) == 1) {
            $result->value = $resultItems[0];
        } else {
            $result->value = $resultItems;
        }

        return $result;
    }
}
