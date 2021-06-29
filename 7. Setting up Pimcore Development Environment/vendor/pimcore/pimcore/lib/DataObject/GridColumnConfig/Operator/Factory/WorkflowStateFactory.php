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

namespace Pimcore\DataObject\GridColumnConfig\Operator\Factory;

use Pimcore\DataObject\GridColumnConfig\Operator\OperatorInterface;
use Pimcore\DataObject\GridColumnConfig\Operator\WorkflowState;
use Pimcore\Workflow\Place\StatusInfo;

/**
 * @internal
 */
final class WorkflowStateFactory implements OperatorFactoryInterface
{
    /**
     * @var StatusInfo
     */
    private $workflowStatusInfo;

    /**
     * @param StatusInfo $workflowStatusInfo
     */
    public function __construct(StatusInfo $workflowStatusInfo)
    {
        $this->workflowStatusInfo = $workflowStatusInfo;
    }

    /**
     * {@inheritdoc}
     */
    public function build(\stdClass $configElement, $context = null): OperatorInterface
    {
        $operator = new WorkflowState($configElement, $context);
        $operator->setWorkflowStatusInfo($this->workflowStatusInfo);

        return $operator;
    }
}
