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

use Pimcore\Localization\LocaleServiceInterface;

/**
 * @internal
 */
final class LocaleSwitcher extends AbstractOperator
{
    /**
     * @var LocaleServiceInterface
     */
    private $localeService;

    /**
     * @var string|null
     */
    private $locale;

    /**
     * {@inheritdoc}
     */
    public function __construct(LocaleServiceInterface $localeService, \stdClass $config, $context = null)
    {
        parent::__construct($config, $context);

        $this->localeService = $localeService;
        $this->locale = $config->locale ?? null;
    }

    /**
     * {@inheritdoc}
     */
    public function getLabeledValue($element)
    {
        $result = new \stdClass();
        $result->label = $this->label;

        $childs = $this->getChilds();

        if (!$childs) {
            return $result;
        } else {
            $c = $childs[0];

            $currentLocale = $this->localeService->getLocale();

            $this->localeService->setLocale($this->locale);

            $result = $c->getLabeledValue($element);

            $this->localeService->setLocale($currentLocale);
        }

        return $result;
    }
}
