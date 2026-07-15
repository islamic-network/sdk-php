<?php

declare(strict_types=1);

namespace IslamicNetwork\Pray\DTO\Salaats;

use IslamicNetwork\Ilm\DTO\Prose;

/** GET /salaats/{slug} — the full prayer. */
final class SalaatDetail
{
    /** @var array<non-empty-string, string> */
    public readonly array $name;

    /** @var array<non-empty-string, list<string>>|null */
    public readonly ?array $highlights;

    /** @var array<non-empty-string, Prose>|null */
    public readonly ?array $description;

    /** @var array<non-empty-string, Prose>|null */
    public readonly ?array $method;

    /** @var list<SalaatDetailMonth> */
    public readonly array $months;

    /** @var list<SalaatDetailDay> */
    public readonly array $days;

    /**
     * @param array<non-empty-string, string> $name
     * @param array<non-empty-string, list<string>>|null $highlights
     * @param array<non-empty-string, Prose>|null $description
     * @param array<non-empty-string, Prose>|null $method
     * @param list<SalaatDetailMonth> $months
     * @param list<SalaatDetailDay> $days
     */
    public function __construct(
        public readonly string $id,
        public readonly string $slug,
        public readonly string $url,
        array $name,
        ?array $highlights = null,
        ?array $description = null,
        ?array $method = null,
        public readonly ?string $source = null,
        array $months = [],
        array $days = [],
    ) {
        $this->name = $name;
        $this->highlights = $highlights;
        $this->description = $description;
        $this->method = $method;
        $this->months = $months;
        $this->days = $days;
    }
}
