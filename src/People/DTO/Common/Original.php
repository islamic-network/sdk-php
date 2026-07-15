<?php

declare(strict_types=1);

namespace IslamicNetwork\People\DTO\Common;

/** The quote as uttered or written — the source rendition. */
final class Original
{
    public function __construct(
        public readonly string $language,
        public readonly string $text,
    ) {
    }
}
