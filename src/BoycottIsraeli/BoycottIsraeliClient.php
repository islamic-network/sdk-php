<?php

declare(strict_types=1);

namespace IslamicNetwork\BoycottIsraeli;

use Illuminate\Http\Client\Factory;
use IslamicNetwork\BoycottIsraeli\DTO\Category\CategoriesResponse;
use IslamicNetwork\BoycottIsraeli\DTO\Company\CompaniesResponse;
use IslamicNetwork\BoycottIsraeli\Requests\Categories\CategoriesRequest;
use IslamicNetwork\BoycottIsraeli\Requests\Categories\CategoryCompaniesRequest;
use IslamicNetwork\BoycottIsraeli\Requests\Companies\CompaniesRequest;
use IslamicNetwork\BoycottIsraeli\Requests\Companies\CompanyRequest;
use IslamicNetwork\BoycottIsraeli\Requests\Search\SearchRequest;
use IslamicNetwork\Http\HttpClient;
use IslamicNetwork\Support\DtoMapper;

final class BoycottIsraeliClient
{
    public const DEFAULT_BASE_URL = 'https://api.boycottisraeli.biz/v1';

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

    public function categories(CategoriesRequest $request): CategoriesResponse
    {
        return $this->mapResponse(CategoriesResponse::class, $request->path(), $request->toQuery());
    }

    public function categoryCompanies(CategoryCompaniesRequest $request): CompaniesResponse
    {
        return $this->mapResponse(CompaniesResponse::class, $request->path(), $request->toQuery());
    }

    public function companies(CompaniesRequest $request): CompaniesResponse
    {
        return $this->mapResponse(CompaniesResponse::class, $request->path(), $request->toQuery());
    }

    public function company(CompanyRequest $request): CompaniesResponse
    {
        return $this->mapResponse(CompaniesResponse::class, $request->path());
    }

    public function search(SearchRequest $request): CompaniesResponse
    {
        return $this->mapResponse(CompaniesResponse::class, $request->path(), $request->toQuery());
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
