<?php

declare(strict_types=1);

namespace IslamicNetwork\BoycottIsraeli\Requests\Companies;

final class CompanyRequest
{
    public function __construct(public readonly string $id)
    {
    }

    public function path(): string
    {
        return '/companies/' . rawurlencode($this->id);
    }
}
