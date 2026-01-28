<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\DTO\IslamicCalendar;

final class IslamicCalendarMethod
{
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $description,
        public readonly string $validity,
    ) {
    }
}
