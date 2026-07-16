<?php

declare(strict_types=1);

namespace IslamicNetwork\People\DTO\People;

/**
 * Counts of what the ecosystem holds about a person, on list summaries —
 * derived from the sync-time aggregations. Keys are omitted at zero; the
 * whole block is omitted when the ecosystem has nothing.
 */
final class Traces
{
    public function __construct(
        public readonly ?int $events = null,
        public readonly ?int $quotes = null,
        public readonly ?int $stories = null,
    ) {
    }
}
