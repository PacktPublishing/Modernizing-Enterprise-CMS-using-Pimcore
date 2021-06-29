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

namespace Pimcore\Event;

final class WorkflowEvents
{
    /**
     * Fired BEFORE a global action happens in the workflow. use this to hook into actions globally and define
     * your own logic. i.e. validation or checks on other system vars
     *
     * @Event("Pimcore\Event\Workflow\GlobalActionEvent")
     *
     * @var string
     */
    const PRE_GLOBAL_ACTION = 'pimcore.workflow.preGlobalAction';

    /**
     * 	Fired AFTER a global action happens in the workflow. Use this to hook into actions globally and
     * define your own logic. i.e. trigger an email or maintenance job.
     *
     * @Event("Pimcore\Event\Workflow\GlobalActionEvent")
     *
     * @var string
     */
    const POST_GLOBAL_ACTION = 'pimcore.workflow.postGlobalAction';
}
