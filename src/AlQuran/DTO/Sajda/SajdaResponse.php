<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\DTO\Sajda;

final class SajdaResponse
{
    public function __construct(
        public readonly int $code,
        public readonly string $status,
        public readonly SajdaData $data,
    ) {
    }
}
