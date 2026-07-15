<?php

declare(strict_types=1);

namespace IslamicNetwork\People\DTO\People;

/** GET /people/{slug}/events — the person block plus their full event list. */
final class PersonEventsData
{
    /** @var list<EventRef> */
    public readonly array $events;

    /**
     * @param list<EventRef> $events
     */
    public function __construct(
        public readonly PersonSummary $person,
        array $events = [],
    ) {
        $this->events = $events;
    }
}
