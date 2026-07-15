<?php

declare(strict_types=1);

namespace IslamicNetwork\Quotes;

use Illuminate\Http\Client\Factory;
use IslamicNetwork\Http\HttpClient;
use IslamicNetwork\Quotes\DTO\People\PersonQuotesResponse;
use IslamicNetwork\Quotes\DTO\Quotes\QuoteResponse;
use IslamicNetwork\Quotes\DTO\Quotes\QuotesResponse;
use IslamicNetwork\Quotes\DTO\Search\SearchResponse;
use IslamicNetwork\Quotes\Requests\People\PersonQuotesRequest;
use IslamicNetwork\Quotes\Requests\Quotes\QuoteRequest;
use IslamicNetwork\Quotes\Requests\Quotes\QuotesRequest;
use IslamicNetwork\Quotes\Requests\Quotes\RandomQuoteRequest;
use IslamicNetwork\Quotes\Requests\Search\SearchRequest;
use IslamicNetwork\Support\DtoMapper;

final class QuotesClient
{
    public const DEFAULT_BASE_URL = 'https://quotes.api.islamic.network/v1';

    public function __construct(private readonly HttpClient $http, private readonly DtoMapper $mapper)
    {
    }

    public static function create(
        ?string $baseUrl = null,
        array $defaultHeaders = [],
        array $defaultQuery = [],
        ?float $timeoutSeconds = null,
        ?string $userAgent = null,
    ): self {
        $factory = new Factory();
        $http = new HttpClient(
            $factory,
            $baseUrl ?? self::DEFAULT_BASE_URL,
            $defaultHeaders,
            $defaultQuery,
            $timeoutSeconds,
            $userAgent,
        );
        $mapper = new DtoMapper();

        return new self($http, $mapper);
    }

    public function quotes(QuotesRequest $request): QuotesResponse
    {
        return $this->mapResponse(QuotesResponse::class, $request->path(), $request->toQuery());
    }

    public function quote(QuoteRequest $request): QuoteResponse
    {
        return $this->mapResponse(QuoteResponse::class, $request->path());
    }

    public function random(RandomQuoteRequest $request): QuoteResponse
    {
        return $this->mapResponse(QuoteResponse::class, $request->path(), $request->toQuery());
    }

    public function personQuotes(PersonQuotesRequest $request): PersonQuotesResponse
    {
        return $this->mapResponse(PersonQuotesResponse::class, $request->path(), $request->toQuery());
    }

    public function search(SearchRequest $request): SearchResponse
    {
        return $this->mapResponse(SearchResponse::class, $request->path(), $request->toQuery());
    }

    /**
     * @template T of object
     * @param class-string<T> $type
     * @return T
     */
    private function mapResponse(string $type, string $path, array $query = []): object
    {
        $payload = $this->http->getJson($path, $query);

        return $this->mapper->map($payload, $type);
    }
}
