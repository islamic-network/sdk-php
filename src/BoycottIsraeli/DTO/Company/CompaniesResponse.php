<?php

declare(strict_types=1);

namespace IslamicNetwork\BoycottIsraeli\DTO\Company;

final class CompaniesResponse
{
    /** @var list<Company> */
    public readonly array $data;

    /**
     * @param list<Company> $data
     */
    public function __construct(
        public readonly int $code,
        public readonly string $status,
        array $data,
    ) {
        $this->data = $data;
    }
}
