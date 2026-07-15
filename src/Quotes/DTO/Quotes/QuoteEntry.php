<?php

declare(strict_types=1);

namespace IslamicNetwork\Quotes\DTO\Quotes;

/**
 * A quote, in full — lists, items and /quotes/random all serve this shape
 * (quotes are small; there is nothing to summarize away).
 */
final class QuoteEntry
{
    /** @var array<non-empty-string, Translation>|null keyed by BCP 47 tag; the original never appears here */
    public readonly ?array $translations;

    /** @var list<string>|null shared-taxonomy topic slugs */
    public readonly ?array $tags;

    /**
     * @param array<non-empty-string, Translation>|null $translations
     * @param list<string>|null $tags
     */
    public function __construct(
        public readonly int $id,
        public readonly string $url,
        public readonly Original $original,
        ?array $translations = null,
        public readonly ?Author $author = null,
        ?array $tags = null,
        public readonly ?string $source = null,
    ) {
        $this->translations = $translations;
        $this->tags = $tags;
    }
}
