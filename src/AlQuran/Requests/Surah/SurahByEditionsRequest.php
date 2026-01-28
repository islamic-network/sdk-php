<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\Requests\Surah;

use IslamicNetwork\AlQuran\Requests\Sections\SectionOptions;
use InvalidArgumentException;

final class SurahByEditionsRequest
{
    /** @var list<string> */
    public readonly array $editions;

    public readonly SectionOptions $options;

    /**
     * @param list<string> $editions
     */
    public function __construct(
        public readonly int $number,
        array $editions,
        ?SectionOptions $options = null,
    ) {
        if ($editions === []) {
            throw new InvalidArgumentException('At least one edition is required.');
        }

        $this->editions = $editions;
        $this->options = $options ?? new SectionOptions();
    }

    public function path(): string
    {
        return '/surah/' . $this->number . '/editions/' . implode(',', $this->editions);
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
