<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\DTO\Qibla;

final class QiblaDirection
{
    public function __construct(
        public readonly float $latitude,
        public readonly float $longitude,
        public readonly float $direction,
    ) {
    }
}
