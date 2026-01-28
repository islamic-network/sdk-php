<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\DTO\IslamicCalendar;

final class IslamicMonth
{
    public function __construct(
        public readonly int $number,
        public readonly string $en,
        public readonly string $ar,
    ) {
    }
}
