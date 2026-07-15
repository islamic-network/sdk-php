<?php

declare(strict_types=1);

namespace IslamicNetwork\People;

use Illuminate\Http\Client\Factory;
use IslamicNetwork\Http\HttpClient;
use IslamicNetwork\People\DTO\People\PeopleResponse;
use IslamicNetwork\People\DTO\People\PersonEventsResponse;
use IslamicNetwork\People\DTO\People\PersonQuotesResponse;
use IslamicNetwork\People\DTO\People\PersonResponse;
use IslamicNetwork\People\DTO\Search\SearchResponse;
use IslamicNetwork\People\Requests\People\PeopleRequest;
use IslamicNetwork\People\Requests\People\PersonEventsRequest;
use IslamicNetwork\People\Requests\People\PersonQuotesRequest;
use IslamicNetwork\People\Requests\People\PersonRequest;
use IslamicNetwork\People\Requests\Search\SearchRequest;
use IslamicNetwork\Support\DtoMapper;

final class PeopleClient
{
    public const DEFAULT_BASE_URL = 'https://people.api.islamic.network/v1';

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

    public function people(PeopleRequest $request): PeopleResponse
    {
        return $this->mapResponse(PeopleResponse::class, $request->path(), $request->toQuery());
    }

    public function person(PersonRequest $request): PersonResponse
    {
        return $this->mapResponse(PersonResponse::class, $request->path());
    }

    public function personEvents(PersonEventsRequest $request): PersonEventsResponse
    {
        return $this->mapResponse(PersonEventsResponse::class, $request->path(), $request->toQuery());
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
