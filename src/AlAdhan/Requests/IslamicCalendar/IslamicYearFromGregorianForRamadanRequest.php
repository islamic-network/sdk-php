<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\Requests\IslamicCalendar;

use IslamicNetwork\AlAdhan\Enums\ContentEncoding;

final class IslamicYearFromGregorianForRamadanRequest
{
    public function __construct(
        public readonly int $year,
        public readonly ?ContentEncoding $acceptEncoding = null,
    ) {
    }

    public function path(): string
    {
        return "/islamicYearFromGregorianForRamadan/{$this->year}";
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
