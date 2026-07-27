<?php

declare(strict_types=1);

namespace IslamicNetwork\Pray\DTO\Recitations;

use IslamicNetwork\Ilm\DTO\Prose;

/** GET /{salawaats|adhkaars|duas}/{slug} — the full entry. */
final class RecitationDetail
{
    /** @var array<non-empty-string, string> */
    public readonly array $name;

    /** @var array<non-empty-string, string>|null */
    public readonly ?array $translations;

    /** @var array<non-empty-string, Prose>|null */
    public readonly ?array $description;

    /** @var list<RecitationDetailMonth> */
    public readonly array $months;

    /** @var list<RecitationDayRef> */
    public readonly array $days;

    /**
     * @param array<non-empty-string, string> $name
     * @param array<non-empty-string, string>|null $translations
     * @param array<non-empty-string, Prose>|null $description
     * @param list<RecitationDetailMonth> $months
     * @param list<RecitationDayRef> $days
     */
    public function __construct(
        public readonly string $id,
        public readonly string $slug,
        public readonly string $url,
        public readonly string $formula,
        array $name,
        ?array $translations = null,
        ?array $description = null,
        public readonly ?string $source = null,
        array $months = [],
        array $days = [],
    ) {
        $this->name = $name;
        $this->translations = $translations;
        $this->description = $description;
        $this->months = $months;
        $this->days = $days;
    }
}
