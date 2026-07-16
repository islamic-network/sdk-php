<?php

declare(strict_types=1);

namespace IslamicNetwork\People\DTO\Common;

/**
 * The person's imagery — a photograph for recent figures, associated imagery
 * otherwise; the url is the API's gateway-cached /assets passthrough.
 */
final class Image
{
    /** @param array<non-empty-string, string>|null $alt Language-keyed alt text, omitted when the CMS has none. */
    public function __construct(
        public readonly string $id,
        public readonly string $url,
        public readonly ?array $alt = null,
    ) {
    }
}
