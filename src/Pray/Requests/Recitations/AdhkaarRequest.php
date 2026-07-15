<?php

declare(strict_types=1);

namespace IslamicNetwork\Pray\Requests\Recitations;

final class AdhkaarRequest
{
    public function __construct(public readonly string $slug)
    {
    }

    public function path(): string
    {
        return '/adhkaars/' . rawurlencode($this->slug);
    }
}
