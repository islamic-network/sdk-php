<?php

declare(strict_types=1);

namespace IslamicNetwork\Pray\DTO\Calendar;

use IslamicNetwork\Pray\DTO\Common\MonthRef;

/** The next upcoming day record, wrapping across the year. */
final class NextDay
{
    /** @var array<non-empty-string, string> */
    public readonly array $name;

    /**
     * @param array<non-empty-string, string> $name
     */
    public function __construct(
        public readonly int $number,
        public readonly string $slug,
        public readonly MonthRef $month,
        public readonly string $url,
        array $name,
    ) {
        $this->name = $name;
    }
}
