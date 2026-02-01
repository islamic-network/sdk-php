<?php

declare(strict_types=1);

namespace IslamicNetwork\Tests\Integration\Sermons;

use IslamicNetwork\Sermons\Requests\SourcesRequest;
use IslamicNetwork\Sermons\SermonsClient;
use PHPUnit\Framework\TestCase;

final class SourcesTest extends TestCase
{
    public function testSources(): void
    {
        $client = SermonsClient::create();

        $sources = $client->sources(new SourcesRequest());

        $this->assertNotEmpty($sources);
        $this->assertNotEmpty($sources[0]->handle);
    }
}
