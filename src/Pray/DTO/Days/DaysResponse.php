<?php

declare(strict_types=1);

namespace IslamicNetwork\Pray\DTO\Days;

use IslamicNetwork\Ilm\DTO\Meta;

/** Envelope for GET /days. */
final class DaysResponse
{
    /** @var list<DaySummary> */
    public readonly array $data;

    /**
     * @param list<DaySummary> $data
     */
    public function __construct(
        public readonly int $code,
        public readonly string $status,
        array $data,
        public readonly ?Meta $meta = null,
    ) {
        $this->data = $data;
    }
}
