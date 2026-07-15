<?php

declare(strict_types=1);

namespace IslamicNetwork\Stories\DTO\Tags;

/** GET /tags entry — the site's tag index: slug, name, count and the filtered list URL. */
final class Tag
{
    public function __construct(
        public readonly string $slug,
        public readonly string $name,
        public readonly int $stories,
        public readonly string $url,
    ) {
    }
}
