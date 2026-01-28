<?php

declare(strict_types=1);

namespace IslamicNetwork\Tests\Integration\AlQuran;

use IslamicNetwork\AlQuran\AlQuranClient;
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
use PHPUnit\Framework\TestCase;

final class SectionsTest extends TestCase
{
    public function testHizbQuarter(): void
    {
        $client = AlQuranClient::create();

        $response = $client->hizbQuarter(new HizbQuarterRequest(1));

        $this->assertSame(200, $response->code);
        $this->assertNotEmpty($response->data->ayahs);
    }

    public function testHizbQuarterByEdition(): void
    {
        $client = AlQuranClient::create();

        $response = $client->hizbQuarterByEdition(new HizbQuarterByEditionRequest(1, 'quran-uthmani-quran-academy'));

        $this->assertSame(200, $response->code);
        $this->assertNotEmpty($response->data->ayahs);
    }

    public function testJuz(): void
    {
        $client = AlQuranClient::create();

        $response = $client->juz(new JuzRequest(1));

        $this->assertSame(200, $response->code);
        $this->assertNotEmpty($response->data->ayahs);
    }

    public function testJuzByEdition(): void
    {
        $client = AlQuranClient::create();

        $response = $client->juzByEdition(new JuzByEditionRequest(1, 'quran-uthmani-quran-academy'));

        $this->assertSame(200, $response->code);
        $this->assertNotEmpty($response->data->ayahs);
    }

    public function testManzil(): void
    {
        $client = AlQuranClient::create();

        $response = $client->manzil(new ManzilRequest(1));

        $this->assertSame(200, $response->code);
        $this->assertNotEmpty($response->data->ayahs);
    }

    public function testManzilByEdition(): void
    {
        $client = AlQuranClient::create();

        $response = $client->manzilByEdition(new ManzilByEditionRequest(1, 'quran-uthmani-quran-academy'));

        $this->assertSame(200, $response->code);
        $this->assertNotEmpty($response->data->ayahs);
    }

    public function testPage(): void
    {
        $client = AlQuranClient::create();

        $response = $client->page(new PageRequest(1));

        $this->assertSame(200, $response->code);
        $this->assertNotEmpty($response->data->ayahs);
    }

    public function testPageByEdition(): void
    {
        $client = AlQuranClient::create();

        $response = $client->pageByEdition(new PageByEditionRequest(1, 'quran-uthmani-quran-academy'));

        $this->assertSame(200, $response->code);
        $this->assertNotEmpty($response->data->ayahs);
    }

    public function testRuku(): void
    {
        $client = AlQuranClient::create();

        $response = $client->ruku(new RukuRequest(1));

        $this->assertSame(200, $response->code);
        $this->assertNotEmpty($response->data->ayahs);
    }

    public function testRukuByEdition(): void
    {
        $client = AlQuranClient::create();

        $response = $client->rukuByEdition(new RukuByEditionRequest(1, 'quran-uthmani-quran-academy'));

        $this->assertSame(200, $response->code);
        $this->assertNotEmpty($response->data->ayahs);
    }
}
