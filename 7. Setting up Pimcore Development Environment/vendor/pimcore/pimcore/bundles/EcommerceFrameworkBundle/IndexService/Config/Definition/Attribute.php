<?php

declare(strict_types=1);

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

namespace Pimcore\Bundle\EcommerceFrameworkBundle\IndexService\Config\Definition;

use Pimcore\Bundle\EcommerceFrameworkBundle\IndexService\Config\ConfigInterface;
use Pimcore\Bundle\EcommerceFrameworkBundle\IndexService\Getter\ExtendedGetterInterface;
use Pimcore\Bundle\EcommerceFrameworkBundle\IndexService\Getter\GetterInterface;
use Pimcore\Bundle\EcommerceFrameworkBundle\IndexService\Interpreter\InterpreterInterface;
use Pimcore\Bundle\EcommerceFrameworkBundle\Model\IndexableInterface;

class Attribute
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $fieldName;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $locale;

    /**
     * @var string
     */
    private $filterGroup;

    /**
     * @var array
     */
    private $options = [];

    /**
     * @var GetterInterface
     */
    private $getter;

    /**
     * @var array
     */
    private $getterOptions = [];

    /**
     * @var InterpreterInterface
     */
    private $interpreter;

    /**
     * @var array
     */
    private $interpreterOptions = [];

    /**
     * @var bool
     */
    private $hideInFieldlistDatatype = false;

    public function __construct(
        string $name,
        string $fieldName = null,
        string $type = null,
        string $locale = null,
        string $filterGroup = null,
        array $options = [],
        GetterInterface $getter = null,
        array $getterOptions = [],
        InterpreterInterface $interpreter = null,
        array $interpreterOptions = [],
        bool $hideInFieldlistDatatype = false
    ) {
        $this->name = $name;
        $this->fieldName = $fieldName ?? $name;
        $this->type = $type;
        $this->locale = $locale;
        $this->filterGroup = $filterGroup;
        $this->options = $options;

        $this->getter = $getter;
        $this->getterOptions = $getterOptions;

        $this->interpreter = $interpreter;
        $this->interpreterOptions = $interpreterOptions;

        $this->hideInFieldlistDatatype = $hideInFieldlistDatatype;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getFieldName(): string
    {
        return $this->fieldName;
    }

    /**
     * @return string|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string|null
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @return string|null
     */
    public function getFilterGroup()
    {
        return $this->filterGroup;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    public function getOption(string $name, $defaultValue = null)
    {
        return $this->options[$name] ?? $defaultValue;
    }

    /**
     * @return GetterInterface|null
     */
    public function getGetter()
    {
        return $this->getter;
    }

    public function getGetterOptions(): array
    {
        return $this->getterOptions;
    }

    /**
     * @return InterpreterInterface|null
     */
    public function getInterpreter()
    {
        return $this->interpreter;
    }

    public function getInterpreterOptions(): array
    {
        return $this->interpreterOptions;
    }

    public function getHideInFieldlistDatatype(): bool
    {
        return $this->hideInFieldlistDatatype;
    }

    /**
     * Get value from object, running through getter if defined
     *
     * @param IndexableInterface $object
     * @param int|null $subObjectId
     * @param ConfigInterface|null $tenantConfig
     * @param mixed $default
     *
     * @return mixed
     */
    public function getValue(IndexableInterface $object, $subObjectId = null, ConfigInterface $tenantConfig = null, $default = null)
    {
        if (null !== $this->getter) {
            if ($this->getter instanceof ExtendedGetterInterface) {
                return $this->getter->get($object, $this->getterOptions, $subObjectId, $tenantConfig);
            } else {
                return $this->getter->get($object, $this->getterOptions);
            }
        }

        $getter = 'get' . ucfirst($this->fieldName);
        if (method_exists($object, $getter)) {
            return $object->$getter($this->locale);
        }

        return $default;
    }

    /**
     * Interpret value with interpreter if defined
     *
     * @param mixed $value
     *
     * @return mixed
     */
    public function interpretValue($value)
    {
        if (null !== $this->interpreter) {
            return $this->interpreter->interpret($value, $this->interpreterOptions);
        }

        return $value;
    }
}
