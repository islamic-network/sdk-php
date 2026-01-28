<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\Requests\Sections;

final class HizbQuarterByEditionRequest
{
    public readonly SectionOptions $options;

    public function __construct(
        public readonly int $number,
        public readonly string $edition,
        ?SectionOptions $options = null,
    ) {
        $this->options = $options ?? new SectionOptions();
    }

    public function path(): string
    {
        return '/hizbQuarter/' . $this->number . '/' . $this->edition;
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
