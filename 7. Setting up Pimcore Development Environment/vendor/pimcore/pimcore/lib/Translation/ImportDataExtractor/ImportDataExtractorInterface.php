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

namespace Pimcore\Translation\ImportDataExtractor;

use Pimcore\Translation\AttributeSet\AttributeSet;

interface ImportDataExtractorInterface
{
    /**
     * @param string $importId
     * @param int $stepId
     *
     * @return AttributeSet|null
     *
     * @throws \Exception
     */
    public function extractElement(string $importId, int $stepId): ?AttributeSet;

    /**
     * @param string $importId
     *
     * @return string
     */
    public function getImportFilePath(string $importId): string;

    /**
     * @param string $importId
     *
     * @return int
     *
     * @throws \Exception
     */
    public function countSteps(string $importId): int;
}
