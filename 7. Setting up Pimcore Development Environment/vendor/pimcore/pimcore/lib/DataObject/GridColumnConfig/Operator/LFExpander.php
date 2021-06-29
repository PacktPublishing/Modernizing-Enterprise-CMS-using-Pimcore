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

use Pimcore\DataObject\GridColumnConfig\ResultContainer;
use Pimcore\Localization\LocaleServiceInterface;
use Pimcore\Tool;

/**
 * @internal
 */
final class LFExpander extends AbstractOperator
{
    /**
     * @var LocaleServiceInterface
     */
    private $localeService;

    /**
     * @var string[]
     */
    private $locales;

    /**
     * @var bool
     */
    private $asArray;

    /**
     * {@inheritdoc}
     */
    public function __construct(LocaleServiceInterface $localeService, \stdClass $config, $context = null)
    {
        parent::__construct($config, $context);

        $this->localeService = $localeService;

        $this->locales = $config->locales ?? [];
        $this->asArray = $config->asArray ?? false;
    }

    /**
     * {@inheritdoc}
     */
    public function getLabeledValue($element)
    {
        $childs = $this->getChilds();
        if (isset($childs[0])) {
            if ($this->getAsArray()) {
                $result = new ResultContainer();
                $result->label = $this->label;
                $resultValues = [];

                $currentLocale = $this->localeService->getLocale();

                $validLanguages = $this->getValidLanguages();
                foreach ($validLanguages as $validLanguage) {
                    $this->localeService->setLocale($validLanguage);

                    $childValue = $childs[0]->getLabeledValue($element);
                    if ($childValue && $childValue->value) {
                        $resultValues[] = $childValue;
                    } else {
                        $resultValues[] = null;
                    }
                }

                $this->localeService->setLocale($currentLocale);

                $result->value = $resultValues;

                return $result;
            } else {
                $value = $childs[0]->getLabeledValue($element);
            }

            return $value;
        }

        return null;
    }

    /**
     * @return bool
     */
    public function expandLocales()
    {
        return true;
    }

    /**
     * @return string[]
     */
    public function getValidLanguages()
    {
        if ($this->locales) {
            $validLanguages = $this->locales;
        } else {
            $validLanguages = Tool::getValidLanguages();
        }

        return $validLanguages;
    }

    /**
     * @return bool
     */
    public function getAsArray()
    {
        return $this->asArray;
    }

    /**
     * @param bool $asArray
     */
    public function setAsArray($asArray)
    {
        $this->asArray = $asArray;
    }
}
