<?php

declare(strict_types=1);

namespace IslamicNetwork\Quotes\DTO\People;

/** GET /people/{slug}/quotes — the person block plus their quotes. */
final class PersonQuotesData
{
    /** @var list<QuoteSummary> */
    public readonly array $quotes;

    /**
     * @param list<QuoteSummary> $quotes
     */
    public function __construct(
        public readonly PersonBlock $person,
        array $quotes = [],
    ) {
        $this->quotes = $quotes;
    }
}
