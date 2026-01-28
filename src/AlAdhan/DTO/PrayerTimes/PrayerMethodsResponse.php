<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\DTO\PrayerTimes;

final class PrayerMethodsResponse
{
    /** @var array<string, PrayerMethodDefinition> */
    public readonly array $data;

    /**
     * @param array<string, PrayerMethodDefinition> $data
     */
    public function __construct(
        public readonly int $code,
        public readonly string $status,
        array $data,
    ) {
        $this->data = $data;
    }
}
