<?php

declare(strict_types=1);

namespace IslamicNetwork\Tests\Integration\AlQuran;

use IslamicNetwork\AlQuran\AlQuranClient;
use IslamicNetwork\AlQuran\Requests\Quran\QuranByEditionRequest;
use IslamicNetwork\AlQuran\Requests\Quran\QuranRequest;
use PHPUnit\Framework\TestCase;

final class QuranTest extends TestCase
{
    public function testQuranDefaultEdition(): void
    {
        $client = AlQuranClient::create();

        $response = $client->quran(new QuranRequest());

        $this->assertSame(200, $response->code);
        $this->assertSame('OK', $response->status);
        $this->assertNotEmpty($response->data->surahs);
    }

    public function testQuranByEdition(): void
    {
        $client = AlQuranClient::create();

        $response = $client->quranByEdition(new QuranByEditionRequest('quran-uthmani-quran-academy'));

        $this->assertSame(200, $response->code);
        $this->assertSame('OK', $response->status);
        $this->assertNotEmpty($response->data->surahs);
    }
}
