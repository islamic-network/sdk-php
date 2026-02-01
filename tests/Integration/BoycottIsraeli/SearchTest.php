<?php

declare(strict_types=1);

namespace IslamicNetwork\Tests\Integration\BoycottIsraeli;

use IslamicNetwork\BoycottIsraeli\BoycottIsraeliClient;
use IslamicNetwork\BoycottIsraeli\Requests\PaginationOptions;
use IslamicNetwork\BoycottIsraeli\Requests\Search\SearchRequest;
use PHPUnit\Framework\TestCase;

final class SearchTest extends TestCase
{
    public function testSearch(): void
    {
        $client = BoycottIsraeliClient::create();

        $response = $client->search(new SearchRequest('food', new PaginationOptions(limit: 2)));

        $this->assertSame(200, $response->code);
        $this->assertSame('OK', $response->status);
        $this->assertNotEmpty($response->data);
    }
}
