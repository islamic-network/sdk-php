<?php

declare(strict_types=1);

namespace IslamicNetwork\Quotes\DTO\People;

use IslamicNetwork\Quotes\DTO\Quotes\Original;

/** A person's quote as listed on /people/{slug}/quotes — the full renditions live at the url. */
final class QuoteSummary
{
    public function __construct(
        public readonly int $id,
        public readonly Original $original,
        public readonly string $url,
        public readonly ?string $source = null,
    ) {
    }
}
