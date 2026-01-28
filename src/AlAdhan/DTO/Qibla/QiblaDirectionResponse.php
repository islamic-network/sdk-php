<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\DTO\Qibla;

final class QiblaDirectionResponse
{
    public function __construct(
        public readonly int $code,
        public readonly string $status,
        public readonly QiblaDirection $data,
    ) {
    }
}
