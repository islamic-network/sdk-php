<?php

declare(strict_types=1);

namespace IslamicNetwork\Pray\DTO\Recitations;

/** Recitation list entry: the formula stays so a list renders without item calls. */
final class RecitationSummary
{
    /** @var array<non-empty-string, string> */
    public readonly array $name;

    /**
     * @param array<non-empty-string, string> $name
     */
    public function __construct(
        public readonly string $id,
        public readonly string $slug,
        public readonly string $formula,
        public readonly string $url,
        array $name,
    ) {
        $this->name = $name;
    }
}
