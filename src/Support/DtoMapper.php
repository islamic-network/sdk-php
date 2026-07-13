<?php

declare(strict_types=1);

namespace IslamicNetwork\Support;

use CuyZ\Valinor\MapperBuilder;
use CuyZ\Valinor\Mapper\TreeMapper;

final class DtoMapper
{
    private readonly TreeMapper $mapper;

    public function __construct(?TreeMapper $mapper = null)
    {
        $this->mapper = $mapper ?? (new MapperBuilder())
            ->allowScalarValueCasting()
            ->allowNonSequentialList()
            ->allowUndefinedValues()
            ->mapper();
    }

    /**
     * @template T of object
     * @param class-string<T> $type
     * @return T
     */
    public function map(array $payload, string $type): object
    {
        return $this->mapper->map($type, $payload);
    }

    /**
     * @template T of object
     * @param class-string<T> $type
     * @return list<T>
     */
    public function mapList(array $payload, string $type): array
    {
        return $this->mapper->map('list<' . $type . '>', $payload);
    }
}
