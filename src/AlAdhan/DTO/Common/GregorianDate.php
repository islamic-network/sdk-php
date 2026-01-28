<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\DTO\Common;

final class GregorianDate
{
    public function __construct(
        public readonly string $date,
        public readonly string $format,
        public readonly string $day,
        public readonly Weekday $weekday,
        public readonly Month $month,
        public readonly string $year,
        public readonly DateDesignation $designation,
        public readonly ?bool $lunarSighting = null,
    ) {
    }
}
