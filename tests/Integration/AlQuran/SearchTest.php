<?php

declare(strict_types=1);

namespace IslamicNetwork\Tests\Integration\AlQuran;

use IslamicNetwork\AlQuran\AlQuranClient;
use IslamicNetwork\AlQuran\Requests\Search\SearchRequest;
use IslamicNetwork\AlQuran\Requests\Search\SearchSurahLanguageRequest;
use IslamicNetwork\AlQuran\Requests\Search\SearchSurahRequest;
use PHPUnit\Framework\TestCase;

final class SearchTest extends TestCase
{
    public function testSearchAllEnglish(): void
    {
        $client = AlQuranClient::create();

        $response = $client->search(new SearchRequest('Path'));

        $this->assertSame(200, $response->code);
        $this->assertSame('OK', $response->status);
        $this->assertGreaterThan(0, $response->data->count);
    }

    public function testSearchSurah(): void
    {
        $client = AlQuranClient::create();

        $response = $client->searchBySurah(new SearchSurahRequest('Path', '1'));

        $this->assertSame(200, $response->code);
        $this->assertSame('OK', $response->status);
        $this->assertGreaterThan(0, $response->data->count);
    }

    public function testSearchSurahLanguage(): void
    {
        $client = AlQuranClient::create();

        $response = $client->searchBySurahLanguage(new SearchSurahLanguageRequest('Path', '1', 'en.sahih'));

        $this->assertSame(200, $response->code);
        $this->assertSame('OK', $response->status);
        $this->assertGreaterThan(0, $response->data->count);
    }
}
