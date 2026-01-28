<?php

declare(strict_types=1);

namespace IslamicNetwork\Tests\Integration\AlQuran;

use IslamicNetwork\AlQuran\AlQuranClient;
use IslamicNetwork\AlQuran\Requests\Surah\SurahByEditionRequest;
use IslamicNetwork\AlQuran\Requests\Surah\SurahByEditionsRequest;
use IslamicNetwork\AlQuran\Requests\Surah\SurahListRequest;
use IslamicNetwork\AlQuran\Requests\Surah\SurahRequest;
use PHPUnit\Framework\TestCase;

final class SurahTest extends TestCase
{
    public function testSurahList(): void
    {
        $client = AlQuranClient::create();

        $response = $client->surahList(new SurahListRequest());

        $this->assertSame(200, $response->code);
        $this->assertSame('OK', $response->status);
        $this->assertCount(114, $response->data);
    }

    public function testSurah(): void
    {
        $client = AlQuranClient::create();

        $response = $client->surah(new SurahRequest(1));

        $this->assertSame(200, $response->code);
        $this->assertSame('OK', $response->status);
        $this->assertSame(1, $response->data->number);
    }

    public function testSurahByEdition(): void
    {
        $client = AlQuranClient::create();

        $response = $client->surahByEdition(new SurahByEditionRequest(1, 'quran-uthmani-quran-academy'));

        $this->assertSame(200, $response->code);
        $this->assertSame('OK', $response->status);
        $this->assertSame('quran-uthmani-quran-academy', $response->data->edition->identifier);
    }

    public function testSurahByEditions(): void
    {
        $client = AlQuranClient::create();

        $response = $client->surahByEditions(new SurahByEditionsRequest(1, [
            'quran-uthmani-quran-academy',
            'quran-simple',
        ]));

        $this->assertSame(200, $response->code);
        $this->assertSame('OK', $response->status);
        $this->assertCount(2, $response->data);
    }
}
