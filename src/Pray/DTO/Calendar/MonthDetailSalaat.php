<?php

declare(strict_types=1);

namespace IslamicNetwork\Pray\DTO\Calendar;

/** A prayer recommended in a month, as listed on the month detail. */
final class MonthDetailSalaat
{
    /** @var array<non-empty-string, string> */
    public readonly array $name;

    /** @var array<non-empty-string, list<string>>|null */
    public readonly ?array $highlights;

    /**
     * @param array<non-empty-string, string> $name
     * @param array<non-empty-string, list<string>>|null $highlights
     */
    public function __construct(
        public readonly string $id,
        public readonly string $slug,
        public readonly string $url,
        array $name,
        ?array $highlights = null,
        public readonly ?string $note = null,
    ) {
        $this->name = $name;
        $this->highlights = $highlights;
    }
}
