<?php

namespace Pimcore\Model\Paginator\EventSubscriber;

use Knp\Component\Pager\Event\ItemsEvent;
use Pimcore\Model\Paginator\PaginateListingInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class PaginateListingSubscriber implements EventSubscriberInterface
{
    public function items(ItemsEvent $event)
    {
        $paginationAdapter = $event->target;

        if ($paginationAdapter instanceof PaginateListingInterface) {
            $event->count = $paginationAdapter->count();
            $items = $paginationAdapter->getItems($event->getOffset(), $event->getLimit());
            $event->items = $items;
            $event->stopPropagation();
        }

        if (!$event->isPropagationStopped()) {
            throw new \RuntimeException('Paginator only accepts instances of the type ' .
                PaginateListingInterface::class . ' or types defined here: https://github.com/KnpLabs/KnpPaginatorBundle#controller');
        }
    }

    public static function getSubscribedEvents(): array
    {
        return [
            'knp_pager.items' => ['items', -5/* other data listeners should be analyzed first*/],
        ];
    }
}
