<?php

declare(strict_types=1);

namespace IslamicNetwork\Quotes\DTO\Quotes;

/** The quote as uttered or written — identity ("this is the source"). */
final class Original
{
    public function __construct(
        public readonly string $language,
        public readonly string $text,
    ) {
    }
}
