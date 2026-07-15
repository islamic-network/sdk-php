<?php

declare(strict_types=1);

namespace IslamicNetwork\Events\Requests\Events;

final class EventRequest
{
    public function __construct(public readonly string $slug)
    {
    }

    public function path(): string
    {
        return '/events/' . rawurlencode($this->slug);
    }
}
