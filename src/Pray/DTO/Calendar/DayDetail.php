<?php

declare(strict_types=1);

namespace IslamicNetwork\Pray\DTO\Calendar;

use IslamicNetwork\Ilm\DTO\Prose;
use IslamicNetwork\Pray\DTO\Common\DayEvent;
use IslamicNetwork\Pray\DTO\Common\MonthSummary;
use IslamicNetwork\Pray\DTO\Recitations\RecitationEmbedded;

/** GET /calendar/{month}/{day} — the flagship day record. */
final class DayDetail
{
    /** @var array<non-empty-string, string> */
    public readonly array $name;

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
     * @param array<non-empty-string, string> $name
     * @param array<non-empty-string, Prose>|null $description
     * @param list<DayEvent> $events
     * @param array<non-empty-string, Prose>|null $what_to_do
     * @param list<DayDetailSalaat> $salaats
     * @param list<RecitationEmbedded> $salawaats
     * @param list<RecitationEmbedded> $adhkaars
     * @param list<RecitationEmbedded> $duas
     */
    public function __construct(
        public readonly string $id,
        public readonly string $slug,
        public readonly string $url,
        public readonly int $number,
        public readonly MonthSummary $month,
        array $name,
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
