<?php

declare(strict_types=1);

namespace IslamicNetwork\Quotes\Requests\Quotes;

/** GET /quotes/random — never cached; accepts the same filters as the list. */
final class RandomQuoteRequest
{
    public function __construct(
        public readonly ?string $author = null,
        public readonly ?string $tag = null,
        public readonly ?string $lang = null,
        public readonly ?string $original = null,
    ) {
    }

    public function path(): string
    {
        return '/quotes/random';
    }

    /**
     * @return array<string, string>
     */
    public function toQuery(): array
    {
        $query = [];

        foreach (['author' => $this->author, 'tag' => $this->tag, 'lang' => $this->lang, 'original' => $this->original] as $key => $value) {
            if ($value !== null) {
                $query[$key] = $value;
            }
        }

        return $query;
    }
}
