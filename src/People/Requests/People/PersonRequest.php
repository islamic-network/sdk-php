<?php

declare(strict_types=1);

namespace IslamicNetwork\People\Requests\People;

final class PersonRequest
{
    public function __construct(public readonly string $slug)
    {
    }

    public function path(): string
    {
        return '/people/' . rawurlencode($this->slug);
    }
}
