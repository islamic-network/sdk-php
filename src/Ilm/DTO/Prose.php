<?php

declare(strict_types=1);

namespace IslamicNetwork\Ilm\DTO;

/** A prose rendition: raw is the authored Markdown, html is rendered from it. */
final class Prose
{
    public function __construct(
        public readonly string $raw,
        public readonly string $html,
    ) {
    }
}
