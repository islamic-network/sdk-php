<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\Requests\Ayah;

use IslamicNetwork\AlQuran\Enums\ContentEncoding;

final class AyahByNumberRequest
{
    public function __construct(
        public readonly int $number,
        public readonly ?ContentEncoding $acceptEncoding = null,
    ) {
    }

    public function path(): string
    {
        return '/ayah/' . $this->number;
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
