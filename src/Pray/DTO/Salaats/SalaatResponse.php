<?php

declare(strict_types=1);

namespace IslamicNetwork\Pray\DTO\Salaats;

/** Envelope for GET /salaats/{slug}. */
final class SalaatResponse
{
    public function __construct(
        public readonly int $code,
        public readonly string $status,
        public readonly SalaatDetail $data,
    ) {
    }
}
