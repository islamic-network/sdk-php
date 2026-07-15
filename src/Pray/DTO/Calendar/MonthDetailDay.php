<?php

declare(strict_types=1);

namespace IslamicNetwork\Pray\DTO\Calendar;

/** A day record as listed on a month detail. */
final class MonthDetailDay
{
    /** @var array<non-empty-string, string> */
    public readonly array $name;

    /**
     * @param array<non-empty-string, string> $name
     */
    public function __construct(
        public readonly int $number,
        public readonly string $slug,
        public readonly string $url,
        array $name,
    ) {
        $this->name = $name;
    }
}
