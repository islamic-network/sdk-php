<?php

declare(strict_types=1);

namespace IslamicNetwork\BoycottIsraeli\DTO\Company;

use IslamicNetwork\BoycottIsraeli\DTO\Common\Logo;

final class CompanyAlternative
{
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly ?string $description = null,
        public readonly ?string $website = null,
        public readonly ?Logo $logo = null,
    ) {
    }
}
