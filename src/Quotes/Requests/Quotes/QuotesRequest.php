<?php

declare(strict_types=1);

namespace IslamicNetwork\Quotes\Requests\Quotes;

use IslamicNetwork\Ilm\Requests\PaginationOptions;

/**
 * GET /quotes — paginated, legacy-id order. Filters: `?author=<slug>`, `?tag=<slug>`,
 * `?lang=<code>` (only quotes having that rendition), `?original=<code>`.
 */
final class QuotesRequest
{
    public readonly PaginationOptions $options;

    public function __construct(
        public readonly ?string $author = null,
        public readonly ?string $tag = null,
        public readonly ?string $lang = null,
        public readonly ?string $original = null,
        ?PaginationOptions $options = null,
    ) {
        $this->options = $options ?? new PaginationOptions();
    }

    public function path(): string
    {
        return '/quotes';
    }

    /**
     * @return array<string, int|string>
     */
    public function toQuery(): array
    {
        $query = [];

        foreach (['author' => $this->author, 'tag' => $this->tag, 'lang' => $this->lang, 'original' => $this->original] as $key => $value) {
            if ($value !== null) {
                $query[$key] = $value;
            }
        }

        return array_merge($query, $this->options->toQuery());
    }
}
