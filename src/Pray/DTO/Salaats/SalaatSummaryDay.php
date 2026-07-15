<?php

declare(strict_types=1);

namespace IslamicNetwork\Pray\DTO\Salaats;

/** A day link on a prayer summary: {month, day, name}. */
final class SalaatSummaryDay
{
    /** @var array<non-empty-string, string> */
    public readonly array $name;

    /**
     * @param array<non-empty-string, string> $name
     */
    public function __construct(
        public readonly int $month,
        public readonly int $day,
        array $name,
    ) {
        $this->name = $name;
    }
}
