<?php

declare(strict_types=1);

namespace IslamicNetwork\Tests\Unit;

use IslamicNetwork\Pray\DTO\Calendar\DayDetail;
use IslamicNetwork\Support\DtoMapper;
use PHPUnit\Framework\TestCase;

/**
 * The pray API serves two day variants: the authored record, and the UNNAMED
 * variant for valid dates without a record (no id/slug/name or editorial
 * prose; date-matched events; empty devotional lists). Both must map.
 */
final class PrayDayDetailTest extends TestCase
{
    public function testUnnamedDayVariantMaps(): void
    {
        $day = (new DtoMapper())->map([
            'url' => 'https://pray.api.islamic.network/v1/calendar/3/12',
            'number' => 12,
            'month' => [
                'number' => 3,
                'name' => ['ar-Latn' => 'Rabīʿ al-Awwal', 'en' => 'Rabi al-Awwal'],
                'url' => 'https://pray.api.islamic.network/v1/calendar/3',
            ],
            'events' => [[
                'title' => ['en' => 'The birth of the Prophet Muhammad ﷺ'],
                'url' => 'https://events.api.islamic.network/v1/events/birth-of-the-prophet',
            ]],
            'salaats' => [],
            'salawaats' => [],
            'adhkaars' => [],
            'duas' => [],
        ], DayDetail::class);

        $this->assertNull($day->id);
        $this->assertNull($day->slug);
        $this->assertNull($day->name);
        $this->assertSame(12, $day->number);
        $this->assertSame(3, $day->month->number);
        $this->assertCount(1, $day->events);
        $this->assertSame([], $day->salaats);
    }

    public function testAuthoredDayRecordMaps(): void
    {
        $day = (new DtoMapper())->map([
            'id' => '6a4bacfbad958f840200f57f',
            'slug' => 'muharram-10',
            'url' => 'https://pray.api.islamic.network/v1/calendar/1/10',
            'number' => 10,
            'month' => [
                'number' => 1,
                'name' => ['ar-Latn' => 'Muḥarram', 'en' => 'Muharram'],
                'url' => 'https://pray.api.islamic.network/v1/calendar/1',
            ],
            'name' => ['ar-Latn' => 'Yawm ʿĀshūrāʾ', 'en' => 'Day of Ashura'],
            'events' => [['title' => ['en' => 'The martyrdom of Husayn ibn Ali at Karbala']]],
        ], DayDetail::class);

        $this->assertSame('muharram-10', $day->slug);
        $this->assertSame('Day of Ashura', $day->name['en']);
    }
}
