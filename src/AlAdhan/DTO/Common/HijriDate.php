<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\DTO\Common;

final class HijriDate
{
    /** @var list<string> */
    public readonly array $holidays;

    /** @var list<string> */
    public readonly array $adjustedHolidays;

    /**
     * @param list<string> $holidays
     * @param list<string> $adjustedHolidays
     */
    public function __construct(
        public readonly string $date,
        public readonly string $format,
        public readonly string $day,
        public readonly Weekday $weekday,
        public readonly Month $month,
        public readonly string $year,
        public readonly DateDesignation $designation,
        array $holidays = [],
        array $adjustedHolidays = [],
        public readonly ?string $method = null,
    ) {
        $this->holidays = $holidays;
        $this->adjustedHolidays = $adjustedHolidays;
    }
}
