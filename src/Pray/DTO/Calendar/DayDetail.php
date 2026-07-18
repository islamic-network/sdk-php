<?php

declare(strict_types=1);

namespace IslamicNetwork\Pray\DTO\Calendar;

use IslamicNetwork\Ilm\DTO\Prose;
use IslamicNetwork\Pray\DTO\Common\DayEvent;
use IslamicNetwork\Pray\DTO\Common\MonthSummary;
use IslamicNetwork\Pray\DTO\Recitations\RecitationEmbedded;

/**
 * GET /calendar/{month}/{day} — the flagship day. Every valid Hijri date
 * resolves: a date with no authored day record serves the unnamed variant,
 * where `id`/`slug`/`name` and the editorial prose are absent, the
 * date-matched events are present, and the devotional lists are empty.
 */
final class DayDetail
{
    /** @var array<non-empty-string, string>|null Absent on unnamed days. */
    public readonly ?array $name;

    /** @var array<non-empty-string, Prose>|null */
    public readonly ?array $description;

    /** @var list<DayEvent> */
    public readonly array $events;

    /** @var array<non-empty-string, Prose>|null */
    public readonly ?array $what_to_do;

    /** @var list<DayDetailSalaat> */
    public readonly array $salaats;

    /** @var list<RecitationEmbedded> */
    public readonly array $salawaats;

    /** @var list<RecitationEmbedded> */
    public readonly array $adhkaars;

    /** @var list<RecitationEmbedded> */
    public readonly array $duas;

    /**
     * @param array<non-empty-string, string>|null $name
     * @param array<non-empty-string, Prose>|null $description
     * @param list<DayEvent> $events
     * @param array<non-empty-string, Prose>|null $what_to_do
     * @param list<DayDetailSalaat> $salaats
     * @param list<RecitationEmbedded> $salawaats
     * @param list<RecitationEmbedded> $adhkaars
     * @param list<RecitationEmbedded> $duas
     */
    public function __construct(
        public readonly string $url,
        public readonly int $number,
        public readonly MonthSummary $month,
        public readonly ?string $id = null,
        public readonly ?string $slug = null,
        ?array $name = null,
        ?array $description = null,
        array $events = [],
        ?array $what_to_do = null,
        array $salaats = [],
        array $salawaats = [],
        array $adhkaars = [],
        array $duas = [],
    ) {
        $this->name = $name;
        $this->description = $description;
        $this->events = $events;
        $this->what_to_do = $what_to_do;
        $this->salaats = $salaats;
        $this->salawaats = $salawaats;
        $this->adhkaars = $adhkaars;
        $this->duas = $duas;
    }
}
