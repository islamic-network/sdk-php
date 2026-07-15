<?php

declare(strict_types=1);

namespace IslamicNetwork\People\DTO\People;

use IslamicNetwork\People\DTO\Common\Original;

/** A quote by the person — id/original/source, linking to the quotes API. */
final class QuoteRef
{
    public function __construct(
        public readonly int $id,
        public readonly Original $original,
        public readonly string $url,
        public readonly ?string $source = null,
    ) {
    }
}
