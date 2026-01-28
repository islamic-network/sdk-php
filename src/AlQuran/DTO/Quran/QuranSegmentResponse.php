<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\DTO\Quran;

final class QuranSegmentResponse
{
    public function __construct(
        public readonly int $code,
        public readonly string $status,
        public readonly QuranSegment $data,
    ) {
    }
}
