<?php

declare(strict_types=1);

namespace IslamicNetwork\Stories\Requests\Stories;

final class StoryRequest
{
    public function __construct(public readonly string $slug)
    {
    }

    public function path(): string
    {
        return '/stories/' . rawurlencode($this->slug);
    }
}
