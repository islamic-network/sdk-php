<?php

declare(strict_types=1);

namespace IslamicNetwork\Pray\DTO\Recitations;

/** A day record a recitation is recited on. */
final class RecitationDayRef
{
    /** @var array<non-empty-string, string> */
    public readonly array $name;

    /**
     * @param array<non-empty-string, string> $name
     */
    public function __construct(
        public readonly int $month,
        public readonly int $day,
        public readonly string $slug,
        public readonly string $url,
        array $name,
    ) {
        $this->name = $name;
    }
}
