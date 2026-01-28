<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\Requests\Edition;

use IslamicNetwork\AlQuran\Enums\ContentEncoding;

final class EditionFormatsRequest
{
    public function __construct(public readonly ?ContentEncoding $acceptEncoding = null)
    {
    }

    public function path(): string
    {
        return '/edition/format';
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
