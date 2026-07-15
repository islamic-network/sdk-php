<?php

declare(strict_types=1);

namespace IslamicNetwork\People\DTO\People;

/** Envelope for GET /people/{slug}. */
final class PersonResponse
{
    public function __construct(
        public readonly int $code,
        public readonly string $status,
        public readonly PersonDetail $data,
    ) {
    }
}
