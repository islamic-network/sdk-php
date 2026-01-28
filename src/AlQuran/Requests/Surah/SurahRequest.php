<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\Requests\Surah;

use IslamicNetwork\AlQuran\Requests\Sections\SectionOptions;

final class SurahRequest
{
    public readonly SectionOptions $options;

    public function __construct(
        public readonly int $number,
        ?SectionOptions $options = null,
    ) {
        $this->options = $options ?? new SectionOptions();
    }

    public function path(): string
    {
        return '/surah/' . $this->number;
    }

    /**
     * @return array<string, int>
     */
    public function toQuery(): array
    {
        return $this->options->toQuery();
    }

    /**
     * @return array<string, string>
     */
    public function toHeaders(): array
    {
        return $this->options->toHeaders();
    }
}
