<?php

declare(strict_types=1);

namespace IslamicNetwork\Tests\Integration\Sermons;

use IslamicNetwork\Sermons\Requests\LanguagesRequest;
use IslamicNetwork\Sermons\SermonsClient;
use PHPUnit\Framework\TestCase;

final class LanguagesTest extends TestCase
{
    public function testLanguages(): void
    {
        $client = SermonsClient::create();

        $languages = $client->languages(new LanguagesRequest());

        $this->assertNotEmpty($languages);
        $this->assertNotEmpty($languages[0]->code);
    }
}
