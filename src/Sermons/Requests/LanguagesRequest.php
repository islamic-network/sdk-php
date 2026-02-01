<?php

declare(strict_types=1);

namespace IslamicNetwork\Sermons\Requests;

final class LanguagesRequest
{
    public function path(): string
    {
        return '/languages.json';
    }
}
