<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\Requests\Edition;

use IslamicNetwork\AlQuran\Enums\ContentEncoding;

final class EditionTypeRequest
{
    public function __construct(
        public readonly string $type,
        public readonly ?ContentEncoding $acceptEncoding = null,
    ) {
    }

    public function path(): string
    {
        return '/edition/type/' . $this->type;
    }

    /**
     * @return array<string, string>
     */
    public function toHeaders(): array
    {
        if ($this->acceptEncoding === null) {
            return [];
        }

        return ['Accept-Encoding' => $this->acceptEncoding->value];
    }
}
