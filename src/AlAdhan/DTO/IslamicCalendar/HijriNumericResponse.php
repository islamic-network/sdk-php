<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\DTO\IslamicCalendar;

final class HijriNumericResponse
{
    public function __construct(
        public readonly int $code,
        public readonly string $status,
        public readonly int $data,
    ) {
    }
}
