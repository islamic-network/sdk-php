<?php

declare(strict_types=1);

namespace IslamicNetwork\Events\DTO\Common;

/** {month, day} — the Hijri anniversary an event is observed on. */
final class EventDate
{
    public function __construct(
        public readonly int $month,
        public readonly int $day,
    ) {
    }
}
