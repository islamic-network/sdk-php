<?php

declare(strict_types=1);

namespace IslamicNetwork\Pray\DTO\Calendar;

use IslamicNetwork\Ilm\DTO\Prose;

/** GET /calendar/{month} — month detail: description, day records, prayers. */
final class MonthDetail
{
    /** @var array<non-empty-string, string> */
    public readonly array $name;

    /** @var array<non-empty-string, Prose>|null */
    public readonly ?array $description;

    /** @var list<MonthDetailDay> */
    public readonly array $days;

    /** @var list<MonthDetailSalaat> */
    public readonly array $salaats;

    /**
     * @param array<non-empty-string, string> $name
     * @param array<non-empty-string, Prose>|null $description
     * @param list<MonthDetailDay> $days
     * @param list<MonthDetailSalaat> $salaats
     */
    public function __construct(
        public readonly int $number,
        public readonly string $url,
        array $name,
        ?array $description = null,
        array $days = [],
        array $salaats = [],
    ) {
        $this->name = $name;
        $this->description = $description;
        $this->days = $days;
        $this->salaats = $salaats;
    }
}
