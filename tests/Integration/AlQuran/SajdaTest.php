<?php

declare(strict_types=1);

namespace IslamicNetwork\Tests\Integration\AlQuran;

use IslamicNetwork\AlQuran\AlQuranClient;
use IslamicNetwork\AlQuran\Requests\Sajda\SajdaByEditionRequest;
use IslamicNetwork\AlQuran\Requests\Sajda\SajdaRequest;
use PHPUnit\Framework\TestCase;

final class SajdaTest extends TestCase
{
    public function testSajdaDefault(): void
    {
        $client = AlQuranClient::create();

        $response = $client->sajda(new SajdaRequest());

        $this->assertSame(200, $response->code);
        $this->assertSame('OK', $response->status);
        $this->assertNotEmpty($response->data->ayahs);
    }

    public function testSajdaByEdition(): void
    {
        $client = AlQuranClient::create();

        $response = $client->sajdaByEdition(new SajdaByEditionRequest('quran-uthmani-quran-academy'));

        $this->assertSame(200, $response->code);
        $this->assertSame('OK', $response->status);
        $this->assertNotEmpty($response->data->ayahs);
    }
}
