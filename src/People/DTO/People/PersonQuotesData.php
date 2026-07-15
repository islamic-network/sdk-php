<?php

declare(strict_types=1);

namespace IslamicNetwork\People\DTO\People;

/** GET /people/{slug}/quotes — the person block plus their full quote list. */
final class PersonQuotesData
{
    /** @var list<QuoteRef> */
    public readonly array $quotes;

    /**
     * @param list<QuoteRef> $quotes
     */
    public function __construct(
        public readonly PersonSummary $person,
        array $quotes = [],
    ) {
        $this->quotes = $quotes;
    }
}
