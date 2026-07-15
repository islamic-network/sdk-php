<?php

declare(strict_types=1);

namespace IslamicNetwork\Pray\DTO\Salaats;

use IslamicNetwork\Pray\DTO\Common\MonthRef;

/** GET /salaats list entry. */
final class SalaatSummary
{
    /** @var array<non-empty-string, string> */
    public readonly array $name;

    /** @var array<non-empty-string, list<string>>|null */
    public readonly ?array $highlights;

    /** @var list<MonthRef> */
    public readonly array $months;

    /** @var list<SalaatSummaryDay> */
    public readonly array $days;

    /**
     * @param array<non-empty-string, string> $name
     * @param array<non-empty-string, list<string>>|null $highlights
     * @param list<MonthRef> $months
     * @param list<SalaatSummaryDay> $days
     */
    public function __construct(
        public readonly string $id,
        public readonly string $slug,
        public readonly string $url,
        array $name,
        ?array $highlights = null,
        array $months = [],
        array $days = [],
    ) {
        $this->name = $name;
        $this->highlights = $highlights;
        $this->months = $months;
        $this->days = $days;
    }
}
