<?php

declare(strict_types=1);

namespace IslamicNetwork\Http;

use Illuminate\Http\Client\Response;
use RuntimeException;

final class ApiException extends RuntimeException
{
    public function __construct(
        string $message,
        public readonly int $statusCode,
        public readonly ?ApiError $error = null,
    ) {
        parent::__construct($message, $statusCode);
    }

    public static function fromResponse(Response $response): self
    {
        $statusCode = $response->status();
        $payload = $response->json();
        $error = null;

        if (is_array($payload)) {
            try {
                $error = ApiError::fromArray($payload);
            } catch (\Throwable) {
                $error = null;
            }
        }

        $message = $error?->status ?? 'API request failed';

        return new self($message, $statusCode, $error);
    }
}
