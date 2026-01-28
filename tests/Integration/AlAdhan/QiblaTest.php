<?php

declare(strict_types=1);

namespace IslamicNetwork\Tests\Integration\AlAdhan;

use IslamicNetwork\AlAdhan\AlAdhanClient;
use IslamicNetwork\AlAdhan\Requests\Qibla\QiblaCompassRequest;
use IslamicNetwork\AlAdhan\Requests\Qibla\QiblaDirectionRequest;
use PHPUnit\Framework\TestCase;

final class QiblaTest extends TestCase
{
    public function testQiblaDirection(): void
    {
        $client = AlAdhanClient::create();

        $response = $client->qibla()->direction(new QiblaDirectionRequest(19.071017570421, 72.838622286762));

        $this->assertSame(200, $response->code);
        $this->assertSame('OK', $response->status);
        $this->assertGreaterThan(0, $response->data->direction);
    }

    public function testQiblaCompass(): void
    {
        $client = AlAdhanClient::create();

        $image = $client->qibla()->compass(new QiblaCompassRequest(19.071017570421, 72.838622286762));

        $this->assertNotEmpty($image->binary);
        $this->assertStringContainsString('image/png', $image->contentType);
    }
}
