<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\DTO\IslamicCalendar;

final class SpecialDay
{
    public function __construct(
        public readonly int $month,
        public readonly int $day,
        public readonly string $name,
    ) {
    }
}
