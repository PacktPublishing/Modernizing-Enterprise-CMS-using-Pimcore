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

namespace Pimcore\DataObject\Import\ColumnConfig\Value;

use Pimcore\DataObject\Import\ColumnConfig\AbstractConfigElement;
use Pimcore\Model\DataObject\ClassDefinition;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\Objectbrick\Data\AbstractData;
use Pimcore\Model\DataObject\Objectbrick\Definition;

class DefaultValue extends AbstractConfigElement implements ValueInterface
{
    /**
     * @var string
     */
    private $mode;

    /**
     * @var bool
     */
    private $doNotOverwrite;

    /**
     * @var bool
     */
    private $skipEmptyValues;

    public function __construct(\stdClass $config, $context = null)
    {
        parent::__construct($config, $context);

        $this->mode = $config->mode ?? 'default';
        $this->doNotOverwrite = $config->doNotOverwrite ?? false;
        $this->skipEmptyValues = $config->skipEmptyValues ?? false;
    }

    public function process($element, &$target, array &$rowData, $colIndex, array &$context = [])
    {
        /** @var ClassDefinition|Definition $container */
        $container = null;

        /** @var string $realAttribute */
        $realAttribute = null;

        if ($target instanceof Concrete) {
            $realAttribute = $this->attribute;
            $container = $target->getClass();
        } elseif ($target instanceof AbstractData) {
            if (strpos($this->attribute, '~') !== false) {
                $keyParts = explode('~', $this->attribute);
                [$brickType, $realAttribute] = $keyParts;
                $container = Definition::getByKey($brickType);
            } else {
                $realAttribute = $this->attribute;
                $container = $target->getDefinition();
            }
        }

        if (null === $container) {
            throw new \RuntimeException('Container could not be resolved');
        }

        $fd = $container->getFieldDefinition($realAttribute);

        if (!$fd) {
            /** @var ClassDefinition\Data\Localizedfields $lfDef */
            $lfDef = $container->getFieldDefinition('localizedfields');

            if ($lfDef) {
                $fd = $lfDef->getFieldDefinition($realAttribute);
            }
        }

        if (!$fd) {
            return;
        }

        $data = $rowData[$colIndex];

        if ($this->skipEmptyValues && !$data) {
            return;
        }

        if ($this->mode != 'direct') {
            $data = $fd->getFromCsvImport($data, $target);
        }

        $setter = 'set' . ucfirst($realAttribute);
        if ($this->doNotOverwrite) {
            $getter = 'get' . ucfirst($realAttribute);
            $currentValue = $target->$getter();
            if ($currentValue) {
                return;
            }
        }

        $target->$setter($data);
    }
}
