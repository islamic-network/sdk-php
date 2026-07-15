<?php

declare(strict_types=1);

namespace IslamicNetwork\Quotes\DTO\Quotes;

/** A rendition with its pedigree — audit trail ("this is how the copy was made"). */
final class Translation
{
    public function __construct(
        public readonly string $text,
        public readonly ?string $provenance = null,
    ) {
    }
}
