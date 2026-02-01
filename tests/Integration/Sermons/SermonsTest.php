<?php

declare(strict_types=1);

namespace IslamicNetwork\Tests\Integration\Sermons;

use IslamicNetwork\Sermons\Requests\MonthSermonsRequest;
use IslamicNetwork\Sermons\Requests\SermonType;
use IslamicNetwork\Sermons\Requests\YearSermonsRequest;
use IslamicNetwork\Sermons\SermonsClient;
use PHPUnit\Framework\TestCase;

final class SermonsTest extends TestCase
{
    public function testYearSermons(): void
    {
        $client = SermonsClient::create();

        $months = $client->yearSermons(new YearSermonsRequest('uae-awqaf', 2021, SermonType::Friday));

        $this->assertNotEmpty($months);
        $this->assertNotEmpty($months[0]->sermons);
        $this->assertSame('friday', $months[0]->sermons[0]->type);
    }

    public function testMonthSermons(): void
    {
        $client = SermonsClient::create();

        $month = $client->monthSermons(new MonthSermonsRequest('uae-awqaf', 2021, 7, SermonType::Friday));

        $this->assertSame('07', $month->month->number);
        $this->assertNotEmpty($month->sermons);
    }
}
