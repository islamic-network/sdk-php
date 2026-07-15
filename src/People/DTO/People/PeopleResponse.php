<?php

declare(strict_types=1);

namespace IslamicNetwork\People\DTO\People;

use IslamicNetwork\Ilm\DTO\Meta;

/** Envelope for GET /people. */
final class PeopleResponse
{
    /** @var list<PersonSummary> */
    public readonly array $data;

    /**
     * @param list<PersonSummary> $data
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
