<?php

declare(strict_types=1);

namespace IslamicNetwork\Pray\DTO\Salaats;

use IslamicNetwork\Ilm\DTO\Meta;

/** Envelope for GET /salaats. */
final class SalaatsResponse
{
    /** @var list<SalaatSummary> */
    public readonly array $data;

    /**
     * @param list<SalaatSummary> $data
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
