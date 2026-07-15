<?php

declare(strict_types=1);

namespace IslamicNetwork\Pray\Requests\Salaats;

final class SalaatRequest
{
    public function __construct(public readonly string $slug)
    {
    }

    public function path(): string
    {
        return '/salaats/' . rawurlencode($this->slug);
    }
}
