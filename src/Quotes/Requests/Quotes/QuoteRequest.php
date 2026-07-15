<?php

declare(strict_types=1);

namespace IslamicNetwork\Quotes\Requests\Quotes;

/** GET /quotes/{id} — the id is the original quotes.islamic.network numeric id. */
final class QuoteRequest
{
    public function __construct(public readonly int $id)
    {
    }

    public function path(): string
    {
        return '/quotes/' . $this->id;
    }
}
