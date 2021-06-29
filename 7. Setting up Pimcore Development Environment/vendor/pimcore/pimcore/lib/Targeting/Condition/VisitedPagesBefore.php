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

namespace Pimcore\Targeting\Condition;

use Pimcore\Event\TargetingEvents;
use Pimcore\Targeting\DataProvider\VisitedPagesCounter;
use Pimcore\Targeting\DataProviderDependentInterface;
use Pimcore\Targeting\Model\VisitorInfo;
use Pimcore\Targeting\Service\VisitedPagesCounter as VisitedPagesCounterService;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

class VisitedPagesBefore extends AbstractVariableCondition implements DataProviderDependentInterface, EventDispatchingConditionInterface
{
    /**
     * @var int
     */
    private $count;

    public function __construct(int $count)
    {
        $this->count = $count;
    }

    /**
     * {@inheritdoc}
     */
    public static function fromConfig(array $config)
    {
        return new static($config['number'] ?? 0);
    }

    /**
     * {@inheritdoc}
     */
    public function getDataProviderKeys(): array
    {
        return [VisitedPagesCounter::PROVIDER_KEY];
    }

    /**
     * {@inheritdoc}
     */
    public function canMatch(): bool
    {
        return $this->count > 0;
    }

    /**
     * {@inheritdoc}
     */
    public function match(VisitorInfo $visitorInfo): bool
    {
        /** @var VisitedPagesCounterService $counter */
        $counter = $visitorInfo->get(VisitedPagesCounter::PROVIDER_KEY);
        $count = $counter->getCount($visitorInfo);

        if ($count >= $this->count) {
            $this->setMatchedVariable('visited_pages_count', $count);

            return true;
        }

        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function postMatch(VisitorInfo $visitorInfo, EventDispatcherInterface $eventDispatcher)
    {
        // emit event which instructs VisitedPagesCountListener to increment the count after matching
        $eventDispatcher->dispatch(new GenericEvent(), TargetingEvents::VISITED_PAGES_COUNT_MATCH);
    }

    /**
     * {@inheritdoc}
     */
    public function preMatch(VisitorInfo $visitorInfo, EventDispatcherInterface $eventDispatcher)
    {
        // noop
    }
}
