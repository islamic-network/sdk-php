<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\Requests\Search;

use IslamicNetwork\AlQuran\Enums\ContentEncoding;

final class SearchRequest
{
    public function __construct(
        public readonly string $word,
        public readonly ?ContentEncoding $acceptEncoding = null,
    ) {
    }

    public function path(): string
    {
        return '/search/' . $this->word;
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
