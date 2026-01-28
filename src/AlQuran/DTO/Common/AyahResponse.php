<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\DTO\Common;

final class AyahResponse
{
    public function __construct(
        public readonly int $code,
        public readonly string $status,
        public readonly Ayah $data,
    ) {
    }
}
