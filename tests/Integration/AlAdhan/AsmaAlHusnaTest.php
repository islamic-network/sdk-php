<?php

declare(strict_types=1);

namespace IslamicNetwork\Tests\Integration\AlAdhan;

use IslamicNetwork\AlAdhan\AlAdhanClient;
use IslamicNetwork\AlAdhan\Requests\AsmaAlHusna\AsmaAlHusnaAllRequest;
use IslamicNetwork\AlAdhan\Requests\AsmaAlHusna\AsmaAlHusnaByNumberRequest;
use PHPUnit\Framework\TestCase;

final class AsmaAlHusnaTest extends TestCase
{
    public function testAsmaAlHusnaAll(): void
    {
        $client = AlAdhanClient::create();

        $response = $client->asmaAlHusna()->all(new AsmaAlHusnaAllRequest());

        $this->assertSame(200, $response->code);
        $this->assertSame('OK', $response->status);
        $this->assertGreaterThan(90, count($response->data));
    }

    public function testAsmaAlHusnaByNumber(): void
    {
        $client = AlAdhanClient::create();

        $response = $client->asmaAlHusna()->byNumber(new AsmaAlHusnaByNumberRequest([1, 2, 3]));

        $this->assertSame(200, $response->code);
        $this->assertSame('OK', $response->status);
        $this->assertSame(1, $response->data[0]->number);
    }
}
