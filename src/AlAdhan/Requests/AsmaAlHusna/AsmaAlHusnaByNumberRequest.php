<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\Requests\AsmaAlHusna;

use IslamicNetwork\AlAdhan\Enums\ContentEncoding;
use InvalidArgumentException;

final class AsmaAlHusnaByNumberRequest
{
    /** @var array<int, int> */
    public readonly array $numbers;

    /**
     * @param array<int, int> $numbers
     */
    public function __construct(array $numbers, public readonly ?ContentEncoding $acceptEncoding = null)
    {
        if ($numbers === []) {
            throw new InvalidArgumentException('At least one number is required.');
        }

        foreach ($numbers as $number) {
            if (!is_int($number) || $number < 1 || $number > 99) {
                throw new InvalidArgumentException('Numbers must be integers between 1 and 99.');
            }
        }

        $this->numbers = array_values($numbers);
    }

    public function path(): string
    {
        return '/asmaAlHusna/' . implode(',', $this->numbers);
    }

    /**
     * @return array<string, string>
     */
    public function toHeaders(): array
    {
        if ($this->acceptEncoding === null) {
            return [];
        }

        return ['Accept-Encoding' => $this->acceptEncoding->value];
    }
}
