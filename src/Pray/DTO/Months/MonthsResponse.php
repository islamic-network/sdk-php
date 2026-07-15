<?php

declare(strict_types=1);

namespace IslamicNetwork\Pray\DTO\Months;

use IslamicNetwork\Pray\DTO\Common\MonthSummary;

/** GET /months — the 12 Hijri months (no meta; the collection is fixed). */
final class MonthsResponse
{
    /** @var list<MonthSummary> */
    public readonly array $data;

    /**
     * @param list<MonthSummary> $data
     */
    public function __construct(
        public readonly int $code,
        public readonly string $status,
        array $data,
    ) {
        $this->data = $data;
    }
}
