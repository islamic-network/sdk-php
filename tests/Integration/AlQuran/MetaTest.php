<?php

declare(strict_types=1);

namespace IslamicNetwork\Tests\Integration\AlQuran;

use IslamicNetwork\AlQuran\AlQuranClient;
use IslamicNetwork\AlQuran\Requests\Meta\MetaRequest;
use PHPUnit\Framework\TestCase;

final class MetaTest extends TestCase
{
    public function testMeta(): void
    {
        $client = AlQuranClient::create();

        $response = $client->meta(new MetaRequest());

        $this->assertSame(200, $response->code);
        $this->assertSame('OK', $response->status);
        $this->assertSame(6236, $response->data->ayahs->count);
        $this->assertSame(114, $response->data->surahs->count);
    }
}
