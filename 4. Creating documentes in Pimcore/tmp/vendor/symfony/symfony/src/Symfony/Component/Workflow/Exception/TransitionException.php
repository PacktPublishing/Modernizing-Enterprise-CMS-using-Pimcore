<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Workflow\Exception;

use Symfony\Component\Workflow\WorkflowInterface;

/**
 * @author Andrew Tch <andrew.tchircoff@gmail.com>
 * @author Grégoire Pineau <lyrixx@lyrixx.info>
 */
class TransitionException extends LogicException
{
    private $subject;
    private $transitionName;
    private $workflow;

    public function __construct($subject, string $transitionName, WorkflowInterface $workflow, string $message)
    {
        parent::__construct($message);

        $this->subject = $subject;
        $this->transitionName = $transitionName;
        $this->workflow = $workflow;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function getTransitionName(): string
    {
        return $this->transitionName;
    }

    public function getWorkflow(): WorkflowInterface
    {
        return $this->workflow;
    }
}
