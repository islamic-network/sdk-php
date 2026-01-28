<?php

declare(strict_types=1);

namespace IslamicNetwork\Http;

final class ApiError
{
    public function __construct(
        public readonly int $code,
        public readonly string $status,
        public readonly string|array|null $data,
    ) {
    }

    public static function fromArray(array $payload): self
    {
        if (!array_key_exists('code', $payload) || $payload['code'] === null || !is_numeric($payload['code'])) {
            throw new \InvalidArgumentException('Missing or invalid "code" in API error payload.');
        }

        if (!array_key_exists('status', $payload) || !is_string($payload['status'])) {
            throw new \InvalidArgumentException('Missing or invalid "status" in API error payload.');
        }

        $code = (int) $payload['code'];
        $status = $payload['status'];

        $data = null;
        if (array_key_exists('data', $payload)) {
            $value = $payload['data'];
            if (is_string($value) || is_array($value) || $value === null) {
                $data = $value;
            }
        }

        return new self($code, $status, $data);
    }
}
