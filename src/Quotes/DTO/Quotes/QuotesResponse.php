<?php

declare(strict_types=1);

namespace IslamicNetwork\Quotes\DTO\Quotes;

use IslamicNetwork\Ilm\DTO\Meta;

/** Envelope for GET /quotes. */
final class QuotesResponse
{
    /** @var list<QuoteEntry> */
    public readonly array $data;

    /**
     * @param list<QuoteEntry> $data
     */
    public function __construct(
        public readonly int $code,
        public readonly string $status,
        array $data,
        public readonly ?Meta $meta = null,
    ) {
        $this->data = $data;
    }
}
