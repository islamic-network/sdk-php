<?php

declare(strict_types=1);

namespace IslamicNetwork\Pray\DTO\Days;

use IslamicNetwork\Pray\DTO\Common\MonthRef;

/** GET /days list entry. */
final class DaySummary
{
    /** @var array<non-empty-string, string> */
    public readonly array $name;

    /**
     * @param array<non-empty-string, string> $name
     */
    public function __construct(
        public readonly string $id,
        public readonly int $number,
        public readonly string $slug,
        public readonly MonthRef $month,
        public readonly string $url,
        array $name,
    ) {
        $this->name = $name;
    }
}
