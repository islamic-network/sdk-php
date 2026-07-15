<?php

declare(strict_types=1);

namespace IslamicNetwork\Stories\DTO\Common;

/** The story's artwork; the url is this API's gateway-cached /assets passthrough. */
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
