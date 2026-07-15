<?php

declare(strict_types=1);

namespace IslamicNetwork\Pray\DTO\Common;

/** {number, name, url} — the month everywhere it is summarized. */
final class MonthSummary
{
    /** @var array<non-empty-string, string> */
    public readonly array $name;

    /**
     * @param array<non-empty-string, string> $name
     */
    public function __construct(
        public readonly int $number,
        public readonly string $url,
        array $name,
    ) {
        $this->name = $name;
    }
}
