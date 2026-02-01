<?php

declare(strict_types=1);

namespace IslamicNetwork\Sermons\Requests;

final class SourcesRequest
{
    public function path(): string
    {
        return '/sources.json';
    }
}
