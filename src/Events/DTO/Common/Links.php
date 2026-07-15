<?php

declare(strict_types=1);

namespace IslamicNetwork\Events\DTO\Common;

/** Cross-links into sibling APIs; present only when there is somewhere to point. */
final class Links
{
    public function __construct(
        public readonly ?string $day = null,
    ) {
    }
}
