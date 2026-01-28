<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\Requests\Qibla;

use IslamicNetwork\AlAdhan\Enums\ContentEncoding;

final class QiblaCompassRequest
{
    public function __construct(
        public readonly float $latitude,
        public readonly float $longitude,
        public readonly ?ContentEncoding $acceptEncoding = null,
    ) {
    }

    public function path(): string
    {
        return "/qibla/{$this->latitude}/{$this->longitude}/compass";
    }

    /**
     * @return array<string, string>
     */
    public function toHeaders(): array
    {
        if ($this->acceptEncoding === null) {
            return [];
        }

        return ['Accept-Encoding' => $this->acceptEncoding->value];
    }
}
