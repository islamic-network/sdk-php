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

    /** @var list<MonthDetailRecitation> */
    public readonly array $salawaats;

    /** @var list<MonthDetailRecitation> */
    public readonly array $adhkaars;

    /** @var list<MonthDetailRecitation> */
    public readonly array $duas;

    /**
     * @param array<non-empty-string, string> $name
     * @param array<non-empty-string, Prose>|null $description
     * @param list<MonthDetailDay> $days
     * @param list<MonthDetailSalaat> $salaats
     * @param list<MonthDetailRecitation> $salawaats
     * @param list<MonthDetailRecitation> $adhkaars
     * @param list<MonthDetailRecitation> $duas
     */
    public function __construct(
        public readonly int $number,
        public readonly string $url,
        array $name,
        ?array $description = null,
        array $days = [],
        array $salaats = [],
        array $salawaats = [],
        array $adhkaars = [],
        array $duas = [],
    ) {
        $this->name = $name;
        $this->description = $description;
        $this->days = $days;
        $this->salaats = $salaats;
        $this->salawaats = $salawaats;
        $this->adhkaars = $adhkaars;
        $this->duas = $duas;
    }
}
