<?php

declare(strict_types=1);

namespace IslamicNetwork\Tests\Integration\AlQuran;

use IslamicNetwork\AlQuran\AlQuranClient;
use IslamicNetwork\AlQuran\Requests\Ayah\AyahByNumberEditionRequest;
use IslamicNetwork\AlQuran\Requests\Ayah\AyahByNumberEditionsRequest;
use IslamicNetwork\AlQuran\Requests\Ayah\AyahByNumberRequest;
use IslamicNetwork\AlQuran\Requests\Ayah\RandomAyahByEditionRequest;
use IslamicNetwork\AlQuran\Requests\Ayah\RandomAyahByEditionsRequest;
use IslamicNetwork\AlQuran\Requests\Ayah\RandomAyahRequest;
use PHPUnit\Framework\TestCase;

final class AyahTest extends TestCase
{
    public function testRandomAyah(): void
    {
        $client = AlQuranClient::create();

        $response = $client->randomAyah(new RandomAyahRequest());

        $this->assertSame(200, $response->code);
        $this->assertSame('OK', $response->status);
        $this->assertGreaterThan(0, $response->data->number);
    }

    public function testRandomAyahByEdition(): void
    {
        $client = AlQuranClient::create();

        $response = $client->randomAyahByEdition(new RandomAyahByEditionRequest('quran-uthmani-quran-academy'));

        $this->assertSame(200, $response->code);
        $this->assertSame('OK', $response->status);
        $this->assertSame('quran-uthmani-quran-academy', $response->data->edition?->identifier);
    }

    public function testRandomAyahByEditions(): void
    {
        $client = AlQuranClient::create();

        $response = $client->randomAyahByEditions(new RandomAyahByEditionsRequest([
            'quran-uthmani-quran-academy',
            'quran-simple',
        ]));

        $this->assertSame(200, $response->code);
        $this->assertSame('OK', $response->status);
        $this->assertCount(2, $response->data);
    }

    public function testAyahByNumber(): void
    {
        $client = AlQuranClient::create();

        $response = $client->ayahByNumber(new AyahByNumberRequest(5));

        $this->assertSame(200, $response->code);
        $this->assertSame('OK', $response->status);
        $this->assertSame(5, $response->data->number);
    }

    public function testAyahByNumberEdition(): void
    {
        $client = AlQuranClient::create();

        $response = $client->ayahByNumberEdition(new AyahByNumberEditionRequest(5, 'quran-uthmani-quran-academy'));

        $this->assertSame(200, $response->code);
        $this->assertSame('OK', $response->status);
        $this->assertSame('quran-uthmani-quran-academy', $response->data->edition?->identifier);
    }

    public function testAyahByNumberEditions(): void
    {
        $client = AlQuranClient::create();

        $response = $client->ayahByNumberEditions(new AyahByNumberEditionsRequest(5, [
            'quran-uthmani-quran-academy',
            'quran-simple',
        ]));

        $this->assertSame(200, $response->code);
        $this->assertSame('OK', $response->status);
        $this->assertCount(2, $response->data);
    }
}
