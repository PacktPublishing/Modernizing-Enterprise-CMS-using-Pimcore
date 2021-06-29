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

namespace Pimcore\Image\Optimizer;

use Pimcore\Exception\ImageOptimizationFailedException;

interface OptimizerInterface
{
    /**
     * @param string $input
     * @param string $output
     *
     * @return string
     *
     * @throws ImageOptimizationFailedException
     */
    public function optimizeImage(string $input, string $output): string;

    /**
     * @param string $mimeType
     *
     * @return bool
     */
    public function supports(string $mimeType): bool;
}
