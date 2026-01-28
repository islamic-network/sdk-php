<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\DTO\Quran;

final class QuranResponse
{
    public function __construct(
        public readonly int $code,
        public readonly string $status,
        public readonly Quran $data,
    ) {
    }
}
