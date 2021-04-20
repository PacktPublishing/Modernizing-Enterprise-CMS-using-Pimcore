<?php

declare(strict_types=1);

/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace Pimcore\Document\Editable;

use Pimcore\Model\Document\Editable;

final class EditmodeEditableDefinitionCollector
{
    private bool $stopped = false;

    /**
     * @var array
     */
    private array $editableDefinitions = [];

    /**
     * @var Editable[]
     */
    private array $stash = [];

    /**
     * @param Editable $editable
     *
     * @throws \Exception
     */
    public function add(Editable $editable): void
    {
        if ($this->stopped) {
            return;
        }

        $this->editableDefinitions[$editable->getName()] = $editable->getEditmodeDefinition();
    }

    public function remove(Editable $editable): void
    {
        if ($this->stopped) {
            return;
        }

        if (isset($this->editableDefinitions[$editable->getName()])) {
            unset($this->editableDefinitions[$editable->getName()]);
        }
    }

    public function start(): void
    {
        $this->stopped = false;
    }

    public function stop(): void
    {
        $this->stopped = true;
    }

    public function stashPush(): void
    {
        $this->stash = $this->editableDefinitions;
        $this->editableDefinitions = [];
    }

    public function stashPull(): void
    {
        $this->editableDefinitions = $this->stash;
    }

    /**
     * @param mixed $value
     *
     * @return mixed
     */
    private function clearConfig($value)
    {
        if (is_array($value)) {
            foreach ($value as &$item) {
                $item = $this->clearConfig($item);
            }
        } elseif (!is_scalar($value)) {
            $value = null;
        }

        return $value;
    }

    public function getDefinitions(): array
    {
        $configs = [];
        foreach ($this->editableDefinitions as $definition) {
            $configs[] = $this->clearConfig($definition);
        }

        return $configs;
    }

    private function getJson(): string
    {
        return json_encode($this->getDefinitions(), JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR);
    }

    public function getHtml(): string
    {
        $code = '
            <script>
                var editableDefinitions = ' . $this->getJson() . ';
            </script>
        ';

        return $code;
    }
}
