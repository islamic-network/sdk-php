<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\DTO\PrayerTimes;

use IslamicNetwork\AlAdhan\DTO\Common\GeoLocation;

final class PrayerMethodDefinition
{
    /** @var array<string, float|int|string|bool|null> */
    public readonly array $params;

    /**
     * @param array<string, float|int|string|bool|null> $params
     */
    public function __construct(
        public readonly int $id,
        array $params,
        public readonly ?string $name = null,
        public readonly ?GeoLocation $location = null,
    ) {
        $this->params = $params;
    }
}
