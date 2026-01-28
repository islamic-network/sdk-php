<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\DTO\Qibla;

final class QiblaCompassImage
{
    public function __construct(
        public readonly string $contentType,
        public readonly string $binary,
    ) {
    }
}
