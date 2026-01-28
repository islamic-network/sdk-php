<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\Requests\AsmaAlHusna;

use IslamicNetwork\AlAdhan\Enums\ContentEncoding;

final class AsmaAlHusnaAllRequest
{
    public function __construct(public readonly ?ContentEncoding $acceptEncoding = null)
    {
    }

    public function path(): string
    {
        return '/asmaAlHusna';
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
