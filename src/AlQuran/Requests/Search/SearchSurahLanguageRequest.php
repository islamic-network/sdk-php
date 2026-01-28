<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\Requests\Search;

use IslamicNetwork\AlQuran\Enums\ContentEncoding;

final class SearchSurahLanguageRequest
{
    public function __construct(
        public readonly string $word,
        public readonly string $surah,
        public readonly string $language,
        public readonly ?ContentEncoding $acceptEncoding = null,
    ) {
    }

    public function path(): string
    {
        return '/search/' . $this->word . '/' . $this->surah . '/' . $this->language;
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
