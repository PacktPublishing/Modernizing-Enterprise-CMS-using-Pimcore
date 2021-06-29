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

namespace Pimcore\Workflow\SupportStrategy;

use Pimcore\Workflow\ExpressionService;
use Symfony\Component\Workflow\SupportStrategy\WorkflowSupportStrategyInterface;
use Symfony\Component\Workflow\WorkflowInterface;

/**
 * @author Andreas Kleemann <akleemann@inviqa.com>
 */
class ExpressionSupportStrategy implements WorkflowSupportStrategyInterface
{
    /**
     * @var ExpressionService
     */
    private $expressionService;

    /**
     * @var string|string[]
     */
    private $className;

    /**
     * @var string
     */
    private $expression;

    /**
     * ExpressionSupportStrategy constructor.
     *
     * @param ExpressionService $expressionService
     * @param string|string[] $className a FQCN
     * @param string $expression
     */
    public function __construct(ExpressionService $expressionService, $className, string $expression)
    {
        $this->expressionService = $expressionService;
        $this->className = $className;
        $this->expression = $expression;
    }

    /**
     * {@inheritdoc}
     */
    public function supports(WorkflowInterface $workflow, $subject): bool
    {
        if (!$this->supportsClass($subject)) {
            return false;
        }

        return $this->expressionService->evaluateExpression($workflow, $subject, $this->expression);
    }

    private function supportsClass($subject)
    {
        if (is_string($this->className)) {
            return $subject instanceof $this->className;
        }

        if (is_array($this->className)) {
            foreach ($this->className as $className) {
                if ($subject instanceof $className) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * @return string
     */
    public function getClassName()
    {
        return $this->className;
    }
}
