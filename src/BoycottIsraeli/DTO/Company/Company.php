<?php

declare(strict_types=1);

namespace IslamicNetwork\BoycottIsraeli\DTO\Company;

use IslamicNetwork\BoycottIsraeli\DTO\Category\Category;
use IslamicNetwork\BoycottIsraeli\DTO\Common\Logo;

final class Company
{
    /** @var list<Category> */
    public readonly array $categories;

    /** @var list<CompanyAlternative> */
    public readonly array $alternatives;

    /**
     * @param list<Category> $categories
     * @param list<CompanyAlternative> $alternatives
     */
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly ?string $description = null,
        public readonly ?string $type = null,
        public readonly ?string $website = null,
        public readonly ?Logo $logo = null,
        array $categories = [],
        array $alternatives = [],
    ) {
        $this->categories = $categories;
        $this->alternatives = $alternatives;
    }
}
