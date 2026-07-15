<?php

declare(strict_types=1);

namespace IslamicNetwork\Events\DTO\People;

use IslamicNetwork\Events\DTO\Events\EventSummary;

/** GET /people/{slug}/events — the person block plus their events. */
final class PersonEventsData
{
    /** @var list<EventSummary> */
    public readonly array $events;

    /**
     * @param list<EventSummary> $events
     */
    public function __construct(
        public readonly PersonHeader $person,
        array $events = [],
    ) {
        $this->events = $events;
    }
}
