<?php

declare(strict_types=1);

namespace IslamicNetwork\Http;

use Illuminate\Http\Client\Factory;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\ConnectionException;

final class HttpClient
{
    private const int MAX_ATTEMPTS = 2;

    public function __construct(
        private readonly Factory $factory,
        private readonly string $baseUrl,
        private readonly array $defaultHeaders = [],
        private readonly array $defaultQuery = [],
        private readonly ?float $timeoutSeconds = null,
        private readonly ?string $userAgent = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function getJson(string $path, array $query = [], array $headers = []): array
    {
        $response = $this->sendWithRetry($path, $query, $headers);

        if (!$response->successful()) {
            throw ApiException::fromResponse($response);
        }

        $payload = $response->json();
        if (!is_array($payload)) {
            throw new ApiException('Expected JSON response body', $response->status());
        }

        return $payload;
    }

    public function getBinary(string $path, array $query = [], array $headers = []): BinaryResponse
    {
        $response = $this->sendWithRetry($path, $query, $headers);

        if (!$response->successful()) {
            throw ApiException::fromResponse($response);
        }

        $contentType = $response->header('Content-Type') ?? 'application/octet-stream';

        return new BinaryResponse($contentType, $response->body());
    }

    private function newRequest(array $headers): PendingRequest
    {
        $request = $this->factory->createPendingRequest()->baseUrl($this->baseUrl);

        if ($this->timeoutSeconds !== null) {
            $request = $request->timeout($this->timeoutSeconds);
        }

        if ($this->userAgent !== null) {
            $request = $request->withHeaders(['User-Agent' => $this->userAgent]);
        }

        if ($this->defaultHeaders !== []) {
            $request = $request->withHeaders($this->defaultHeaders);
        }

        if ($headers !== []) {
            $request = $request->withHeaders($headers);
        }

        return $request;
    }

    private function sendWithRetry(string $path, array $query, array $headers): \Illuminate\Http\Client\Response
    {
        $attempt = 0;

        while (true) {
            $attempt++;

            try {
                $response = $this->newRequest($headers)->get($path, $this->mergeQuery($query));
            } catch (ConnectionException $exception) {
                if ($attempt < self::MAX_ATTEMPTS) {
                    sleep(1);
                    continue;
                }

                throw $exception;
            }

            if ($response->status() === 429 && $attempt < self::MAX_ATTEMPTS) {
                sleep(1);
                continue;
            }

            return $response;
        }
    }

    private function mergeQuery(array $query): array
    {
        if ($this->defaultQuery === []) {
            return $query;
        }

        return array_merge($this->defaultQuery, $query);
    }
}
