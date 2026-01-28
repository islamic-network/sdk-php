<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran;

use Illuminate\Http\Client\Factory;
use IslamicNetwork\AlQuran\DTO\Common\AyahListResponse;
use IslamicNetwork\AlQuran\DTO\Common\AyahResponse;
use IslamicNetwork\AlQuran\DTO\Common\EditionListResponse;
use IslamicNetwork\AlQuran\DTO\Common\StringListResponse;
use IslamicNetwork\AlQuran\DTO\Meta\MetaResponse;
use IslamicNetwork\AlQuran\DTO\Quran\QuranResponse;
use IslamicNetwork\AlQuran\DTO\Quran\QuranSegmentResponse;
use IslamicNetwork\AlQuran\DTO\Sajda\SajdaResponse;
use IslamicNetwork\AlQuran\DTO\Search\SearchResponse;
use IslamicNetwork\AlQuran\DTO\Surah\SurahEditionsResponse;
use IslamicNetwork\AlQuran\DTO\Surah\SurahListResponse;
use IslamicNetwork\AlQuran\DTO\Surah\SurahResponse;
use IslamicNetwork\AlQuran\Requests\Ayah\AyahByNumberEditionRequest;
use IslamicNetwork\AlQuran\Requests\Ayah\AyahByNumberEditionsRequest;
use IslamicNetwork\AlQuran\Requests\Ayah\AyahByNumberRequest;
use IslamicNetwork\AlQuran\Requests\Ayah\RandomAyahByEditionRequest;
use IslamicNetwork\AlQuran\Requests\Ayah\RandomAyahByEditionsRequest;
use IslamicNetwork\AlQuran\Requests\Ayah\RandomAyahRequest;
use IslamicNetwork\AlQuran\Requests\Edition\EditionFormatRequest;
use IslamicNetwork\AlQuran\Requests\Edition\EditionFormatsRequest;
use IslamicNetwork\AlQuran\Requests\Edition\EditionLanguageRequest;
use IslamicNetwork\AlQuran\Requests\Edition\EditionLanguagesRequest;
use IslamicNetwork\AlQuran\Requests\Edition\EditionListRequest;
use IslamicNetwork\AlQuran\Requests\Edition\EditionTypeRequest;
use IslamicNetwork\AlQuran\Requests\Edition\EditionTypesRequest;
use IslamicNetwork\AlQuran\Requests\Meta\MetaRequest;
use IslamicNetwork\AlQuran\Requests\Quran\QuranByEditionRequest;
use IslamicNetwork\AlQuran\Requests\Quran\QuranRequest;
use IslamicNetwork\AlQuran\Requests\Sajda\SajdaByEditionRequest;
use IslamicNetwork\AlQuran\Requests\Sajda\SajdaRequest;
use IslamicNetwork\AlQuran\Requests\Search\SearchRequest;
use IslamicNetwork\AlQuran\Requests\Search\SearchSurahLanguageRequest;
use IslamicNetwork\AlQuran\Requests\Search\SearchSurahRequest;
use IslamicNetwork\AlQuran\Requests\Sections\HizbQuarterByEditionRequest;
use IslamicNetwork\AlQuran\Requests\Sections\HizbQuarterRequest;
use IslamicNetwork\AlQuran\Requests\Sections\JuzByEditionRequest;
use IslamicNetwork\AlQuran\Requests\Sections\JuzRequest;
use IslamicNetwork\AlQuran\Requests\Sections\ManzilByEditionRequest;
use IslamicNetwork\AlQuran\Requests\Sections\ManzilRequest;
use IslamicNetwork\AlQuran\Requests\Sections\PageByEditionRequest;
use IslamicNetwork\AlQuran\Requests\Sections\PageRequest;
use IslamicNetwork\AlQuran\Requests\Sections\RukuByEditionRequest;
use IslamicNetwork\AlQuran\Requests\Sections\RukuRequest;
use IslamicNetwork\AlQuran\Requests\Surah\SurahByEditionRequest;
use IslamicNetwork\AlQuran\Requests\Surah\SurahByEditionsRequest;
use IslamicNetwork\AlQuran\Requests\Surah\SurahListRequest;
use IslamicNetwork\AlQuran\Requests\Surah\SurahRequest;
use IslamicNetwork\Http\HttpClient;
use IslamicNetwork\Support\DtoMapper;

final class AlQuranClient
{
    public const DEFAULT_BASE_URL = 'https://api.alquran.cloud/v1';

    public function __construct(
        private readonly HttpClient $http,
        private readonly DtoMapper $mapper,
    ) {
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

        return new self($http, new DtoMapper());
    }

    public function randomAyah(RandomAyahRequest $request): AyahResponse
    {
        return $this->mapResponse(AyahResponse::class, $request->path(), [], $request->toHeaders());
    }

    public function randomAyahByEdition(RandomAyahByEditionRequest $request): AyahResponse
    {
        return $this->mapResponse(AyahResponse::class, $request->path(), [], $request->toHeaders());
    }

    public function randomAyahByEditions(RandomAyahByEditionsRequest $request): AyahListResponse
    {
        return $this->mapResponse(AyahListResponse::class, $request->path(), [], $request->toHeaders());
    }

    public function ayahByNumber(AyahByNumberRequest $request): AyahResponse
    {
        return $this->mapResponse(AyahResponse::class, $request->path(), [], $request->toHeaders());
    }

    public function ayahByNumberEdition(AyahByNumberEditionRequest $request): AyahResponse
    {
        return $this->mapResponse(AyahResponse::class, $request->path(), [], $request->toHeaders());
    }

    public function ayahByNumberEditions(AyahByNumberEditionsRequest $request): AyahListResponse
    {
        return $this->mapResponse(AyahListResponse::class, $request->path(), [], $request->toHeaders());
    }

    public function editions(EditionListRequest $request): EditionListResponse
    {
        return $this->mapResponse(EditionListResponse::class, $request->path(), $request->toQuery(), $request->toHeaders());
    }

    public function editionTypes(EditionTypesRequest $request): StringListResponse
    {
        return $this->mapResponse(StringListResponse::class, $request->path(), [], $request->toHeaders());
    }

    public function editionsByType(EditionTypeRequest $request): EditionListResponse
    {
        return $this->mapResponse(EditionListResponse::class, $request->path(), [], $request->toHeaders());
    }

    public function editionFormats(EditionFormatsRequest $request): StringListResponse
    {
        return $this->mapResponse(StringListResponse::class, $request->path(), [], $request->toHeaders());
    }

    public function editionsByFormat(EditionFormatRequest $request): EditionListResponse
    {
        return $this->mapResponse(EditionListResponse::class, $request->path(), [], $request->toHeaders());
    }

    public function editionLanguages(EditionLanguagesRequest $request): StringListResponse
    {
        return $this->mapResponse(StringListResponse::class, $request->path(), [], $request->toHeaders());
    }

    public function editionsByLanguage(EditionLanguageRequest $request): EditionListResponse
    {
        return $this->mapResponse(EditionListResponse::class, $request->path(), [], $request->toHeaders());
    }

    public function hizbQuarter(HizbQuarterRequest $request): QuranSegmentResponse
    {
        return $this->mapResponse(QuranSegmentResponse::class, $request->path(), $request->toQuery(), $request->toHeaders());
    }

    public function hizbQuarterByEdition(HizbQuarterByEditionRequest $request): QuranSegmentResponse
    {
        return $this->mapResponse(QuranSegmentResponse::class, $request->path(), $request->toQuery(), $request->toHeaders());
    }

    public function juz(JuzRequest $request): QuranSegmentResponse
    {
        return $this->mapResponse(QuranSegmentResponse::class, $request->path(), $request->toQuery(), $request->toHeaders());
    }

    public function juzByEdition(JuzByEditionRequest $request): QuranSegmentResponse
    {
        return $this->mapResponse(QuranSegmentResponse::class, $request->path(), $request->toQuery(), $request->toHeaders());
    }

    public function manzil(ManzilRequest $request): QuranSegmentResponse
    {
        return $this->mapResponse(QuranSegmentResponse::class, $request->path(), $request->toQuery(), $request->toHeaders());
    }

    public function manzilByEdition(ManzilByEditionRequest $request): QuranSegmentResponse
    {
        return $this->mapResponse(QuranSegmentResponse::class, $request->path(), $request->toQuery(), $request->toHeaders());
    }

    public function page(PageRequest $request): QuranSegmentResponse
    {
        return $this->mapResponse(QuranSegmentResponse::class, $request->path(), $request->toQuery(), $request->toHeaders());
    }

    public function pageByEdition(PageByEditionRequest $request): QuranSegmentResponse
    {
        return $this->mapResponse(QuranSegmentResponse::class, $request->path(), $request->toQuery(), $request->toHeaders());
    }

    public function ruku(RukuRequest $request): QuranSegmentResponse
    {
        return $this->mapResponse(QuranSegmentResponse::class, $request->path(), $request->toQuery(), $request->toHeaders());
    }

    public function rukuByEdition(RukuByEditionRequest $request): QuranSegmentResponse
    {
        return $this->mapResponse(QuranSegmentResponse::class, $request->path(), $request->toQuery(), $request->toHeaders());
    }

    public function meta(MetaRequest $request): MetaResponse
    {
        return $this->mapResponse(MetaResponse::class, $request->path(), [], $request->toHeaders());
    }

    public function quran(QuranRequest $request): QuranResponse
    {
        return $this->mapResponse(QuranResponse::class, $request->path(), [], $request->toHeaders());
    }

    public function quranByEdition(QuranByEditionRequest $request): QuranResponse
    {
        return $this->mapResponse(QuranResponse::class, $request->path(), [], $request->toHeaders());
    }

    public function sajda(SajdaRequest $request): SajdaResponse
    {
        return $this->mapResponse(SajdaResponse::class, $request->path(), [], $request->toHeaders());
    }

    public function sajdaByEdition(SajdaByEditionRequest $request): SajdaResponse
    {
        return $this->mapResponse(SajdaResponse::class, $request->path(), [], $request->toHeaders());
    }

    public function search(SearchRequest $request): SearchResponse
    {
        return $this->mapResponse(SearchResponse::class, $request->path(), [], $request->toHeaders());
    }

    public function searchBySurah(SearchSurahRequest $request): SearchResponse
    {
        return $this->mapResponse(SearchResponse::class, $request->path(), [], $request->toHeaders());
    }

    public function searchBySurahLanguage(SearchSurahLanguageRequest $request): SearchResponse
    {
        return $this->mapResponse(SearchResponse::class, $request->path(), [], $request->toHeaders());
    }

    public function surahList(SurahListRequest $request): SurahListResponse
    {
        return $this->mapResponse(SurahListResponse::class, $request->path(), [], $request->toHeaders());
    }

    public function surah(SurahRequest $request): SurahResponse
    {
        return $this->mapResponse(SurahResponse::class, $request->path(), $request->toQuery(), $request->toHeaders());
    }

    public function surahByEdition(SurahByEditionRequest $request): SurahResponse
    {
        return $this->mapResponse(SurahResponse::class, $request->path(), $request->toQuery(), $request->toHeaders());
    }

    public function surahByEditions(SurahByEditionsRequest $request): SurahEditionsResponse
    {
        return $this->mapResponse(SurahEditionsResponse::class, $request->path(), $request->toQuery(), $request->toHeaders());
    }

    /**
     * @template T of object
     * @param class-string<T> $type
     * @return T
     */
    private function mapResponse(string $type, string $path, array $query = [], array $headers = []): object
    {
        $payload = $this->http->getJson($path, $query, $headers);

        return $this->mapper->map($payload, $type);
    }
}
