<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\DTO\Common;

final class GeoLocation
{
    public function __construct(
        public readonly float $latitude,
        public readonly float $longitude,
    ) {
    }
}
