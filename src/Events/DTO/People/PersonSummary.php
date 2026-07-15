<?php

declare(strict_types=1);

namespace IslamicNetwork\Events\DTO\People;

/** GET /people list entry: a referenced person with their event count. */
final class PersonSummary
{
    /** @var array<non-empty-string, string> */
    public readonly array $name;

    /**
     * @param array<non-empty-string, string> $name
     */
    public function __construct(
        public readonly string $slug,
        public readonly int $events,
        public readonly string $url,
        public readonly string $registry,
        array $name,
    ) {
        $this->name = $name;
    }
}
