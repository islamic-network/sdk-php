<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\Requests\Sajda;

use IslamicNetwork\AlQuran\Enums\ContentEncoding;

final class SajdaRequest
{
    public function __construct(public readonly ?ContentEncoding $acceptEncoding = null)
    {
    }

    public function path(): string
    {
        return '/sajda';
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
