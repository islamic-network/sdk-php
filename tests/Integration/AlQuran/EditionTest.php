<?php

declare(strict_types=1);

namespace IslamicNetwork\Tests\Integration\AlQuran;

use IslamicNetwork\AlQuran\AlQuranClient;
use IslamicNetwork\AlQuran\Requests\Edition\EditionFormatRequest;
use IslamicNetwork\AlQuran\Requests\Edition\EditionFormatsRequest;
use IslamicNetwork\AlQuran\Requests\Edition\EditionLanguageRequest;
use IslamicNetwork\AlQuran\Requests\Edition\EditionLanguagesRequest;
use IslamicNetwork\AlQuran\Requests\Edition\EditionListRequest;
use IslamicNetwork\AlQuran\Requests\Edition\EditionTypeRequest;
use IslamicNetwork\AlQuran\Requests\Edition\EditionTypesRequest;
use PHPUnit\Framework\TestCase;

final class EditionTest extends TestCase
{
    public function testEditionList(): void
    {
        $client = AlQuranClient::create();

        $response = $client->editions(new EditionListRequest(language: 'en', format: 'text'));

        $this->assertSame(200, $response->code);
        $this->assertSame('OK', $response->status);
        $this->assertNotEmpty($response->data);
    }

    public function testEditionTypes(): void
    {
        $client = AlQuranClient::create();

        $response = $client->editionTypes(new EditionTypesRequest());

        $this->assertSame(200, $response->code);
        $this->assertContains('quran', $response->data);
    }

    public function testEditionsByType(): void
    {
        $client = AlQuranClient::create();

        $response = $client->editionsByType(new EditionTypeRequest('quran'));

        $this->assertSame(200, $response->code);
        $this->assertNotEmpty($response->data);
    }

    public function testEditionFormats(): void
    {
        $client = AlQuranClient::create();

        $response = $client->editionFormats(new EditionFormatsRequest());

        $this->assertSame(200, $response->code);
        $this->assertContains('text', $response->data);
    }

    public function testEditionsByFormat(): void
    {
        $client = AlQuranClient::create();

        $response = $client->editionsByFormat(new EditionFormatRequest('text'));

        $this->assertSame(200, $response->code);
        $this->assertNotEmpty($response->data);
    }

    public function testEditionLanguages(): void
    {
        $client = AlQuranClient::create();

        $response = $client->editionLanguages(new EditionLanguagesRequest());

        $this->assertSame(200, $response->code);
        $this->assertContains('en', $response->data);
    }

    public function testEditionsByLanguage(): void
    {
        $client = AlQuranClient::create();

        $response = $client->editionsByLanguage(new EditionLanguageRequest('en'));

        $this->assertSame(200, $response->code);
        $this->assertNotEmpty($response->data);
    }
}
