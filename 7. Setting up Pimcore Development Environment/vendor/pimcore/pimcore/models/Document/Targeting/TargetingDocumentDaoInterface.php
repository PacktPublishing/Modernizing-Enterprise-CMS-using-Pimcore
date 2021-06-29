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

namespace Pimcore\Model\Document\Targeting;

interface TargetingDocumentDaoInterface
{
    /**
     * Checks if the document has targeting specific elements
     *
     * @return bool
     */
    public function hasTargetGroupSpecificEditables(): bool;

    /**
     * Returns targeting specific element names
     *
     * @return array
     */
    public function getTargetGroupSpecificEditableNames(): array;
}
