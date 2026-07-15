<?php

declare(strict_types=1);

namespace IslamicNetwork\People\DTO\People;

/** What the events domain knows about a person: count, preview (up to 3), full-list URL. */
final class EventsAggregation
{
    /** @var list<EventRef> */
    public readonly array $preview;

    /**
     * @param list<EventRef> $preview
     */
    public function __construct(
        public readonly int $total,
        public readonly string $url,
        array $preview = [],
    ) {
        $this->preview = $preview;
    }
}
