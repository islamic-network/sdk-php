<?php

declare(strict_types=1);

namespace IslamicNetwork\Pray\DTO\Calendar;

/** A recitation recommended in a month, as listed on the month detail. */
final class MonthDetailRecitation
{
    /** @var array<non-empty-string, string> */
    public readonly array $name;

    /** @param array<non-empty-string, string> $name */
    public function __construct(
        public readonly string $id,
        public readonly string $slug,
        public readonly string $url,
        array $name,
        public readonly ?string $note = null,
    ) {
        $this->name = $name;
    }
}
