# Islamic Network SDK (PHP)

Typed Official PHP 8.4+ SDK for Islamic Network APIs. This repository includes the AlAdhan, AlQuran, BoycottIsraeli, Sermons, Pray, Events, People, Quotes, and Stories namespaces.

This SDK replaces the older API clients for the AlAdhan and AlQuran APIs.

Supported APIs:
- AlAdhan (prayer times, Islamic calendar, qibla, Asma Al Husna)
- AlQuran (surahs, ayahs, sections, editions, search, sajda, meta)
- BoycottIsraeli (companies, categories, search)
- Sermons (sources, languages, khutbas by year/month)
- Pray (Hijri devotional calendar: months, holy days, salaats, salawaats, adhkaars, duas, search)
- Events (Islamic calendar events, Hijri day/month calendar, people, search)
- People (the canonical person registry: biographies, per-person events and quotes, search)
- Quotes (quotes with translations, random quote, per-person quotes, search)
- Stories (teaching stories, tags, image assets, search)

## Installation

```bash
composer require islamic-network/sdk
```

## Usage

```php
use IslamicNetwork\AlAdhan\AlAdhanClient;
use IslamicNetwork\AlAdhan\Requests\PrayerTimes\DailyPrayerTimesByCoordinatesRequest;
use IslamicNetwork\AlAdhan\Requests\PrayerTimes\PrayerTimesOptions;

$client = AlAdhanClient::create();

$request = new DailyPrayerTimesByCoordinatesRequest(
    date: '01-01-2025',
    latitude: 51.5194682,
    longitude: -0.1360365,
    options: new PrayerTimesOptions(),
);

$response = $client->prayerTimes()->dailyByCoordinates($request);

echo $response->data->timings->Fajr;
```

```php
use IslamicNetwork\AlAdhan\Requests\Qibla\QiblaDirectionRequest;

$qibla = $client->qibla()->direction(new QiblaDirectionRequest(
    latitude: 19.071017570421,
    longitude: 72.838622286762,
));

echo $qibla->data->direction;
```

```php
use IslamicNetwork\AlAdhan\Requests\AsmaAlHusna\AsmaAlHusnaByNumberRequest;

$asma = $client->asmaAlHusna()->byNumber(new AsmaAlHusnaByNumberRequest([1, 2, 3]));

echo $asma->data[0]->en->meaning;
```

## Notes

- All DTOs are hydrated with CuyZ/Valinor for strict typing.
- Prayer timings use the API field names (e.g., `Fajr`, `Dhuhr`, `Firstthird`).
- Qibla compass responses are returned as binary data with a content type.
- HTTP requests are made with `illuminate/http`.

## AlQuran Usage

```php
use IslamicNetwork\AlQuran\AlQuranClient;
use IslamicNetwork\AlQuran\Requests\Ayah\AyahByNumberRequest;
use IslamicNetwork\AlQuran\Requests\Edition\EditionListRequest;

$alquran = AlQuranClient::create();

$ayah = $alquran->ayahByNumber(new AyahByNumberRequest(5));

echo $ayah->data->text;

$editions = $alquran->editions(new EditionListRequest(language: 'en', format: 'text'));

echo $editions->data[0]->identifier;
```

## BoycottIsraeli Usage

```php
use IslamicNetwork\BoycottIsraeli\BoycottIsraeliClient;
use IslamicNetwork\BoycottIsraeli\Requests\Companies\CompaniesRequest;
use IslamicNetwork\BoycottIsraeli\Requests\PaginationOptions;

$boycott = BoycottIsraeliClient::create();

$companies = $boycott->companies(new CompaniesRequest(new PaginationOptions(limit: 5)));

echo $companies->data[0]->name;
```

## Sermons Usage

```php
use IslamicNetwork\Sermons\Requests\SermonType;
use IslamicNetwork\Sermons\Requests\YearSermonsRequest;
use IslamicNetwork\Sermons\SermonsClient;

$sermons = SermonsClient::create();

$months = $sermons->yearSermons(new YearSermonsRequest('uae-awqaf', 2021, SermonType::Friday));

echo $months[0]->sermons[0]->title;
```

## Pray Usage

```php
use IslamicNetwork\Pray\PrayClient;
use IslamicNetwork\Pray\Requests\Calendar\CalendarDayRequest;
use IslamicNetwork\Pray\Requests\Calendar\CalendarTodayRequest;

$pray = PrayClient::create();

$today = $pray->calendarToday(new CalendarTodayRequest());

echo $today->data->date->hijri->year;

$ashura = $pray->calendarDay(new CalendarDayRequest(1, 10));

echo $ashura->data->name['en'];
```

## Events Usage

```php
use IslamicNetwork\Events\EventsClient;
use IslamicNetwork\Events\Requests\Calendar\CalendarMonthRequest;

$events = EventsClient::create();

$muharram = $events->calendarMonth(new CalendarMonthRequest(1));

echo $muharram->data->events[0]->title['en'];
```

## People Usage

```php
use IslamicNetwork\People\PeopleClient;
use IslamicNetwork\People\Requests\People\PersonRequest;

$people = PeopleClient::create();

$person = $people->person(new PersonRequest('husayn-ibn-ali'));

echo $person->data->name['en'];
```

## Quotes Usage

```php
use IslamicNetwork\Quotes\QuotesClient;
use IslamicNetwork\Quotes\Requests\Quotes\RandomQuoteRequest;

$quotes = QuotesClient::create();

$random = $quotes->random(new RandomQuoteRequest());

echo $random->data->original->text;
```

## Stories Usage

```php
use IslamicNetwork\Ilm\Requests\PaginationOptions;
use IslamicNetwork\Stories\Requests\Stories\StoriesRequest;
use IslamicNetwork\Stories\StoriesClient;

$stories = StoriesClient::create();

$latest = $stories->stories(new StoriesRequest(options: new PaginationOptions(limit: 5)));

echo $latest->data[0]->title['en'];
```

The Pray, Events, People, Quotes, and Stories APIs share conventions: an `{code, status, data}` envelope, a `meta` pagination sibling (`IslamicNetwork\Ilm\DTO\Meta`, driven by `IslamicNetwork\Ilm\Requests\PaginationOptions` — `?page`/`?limit`, default 50, max 200), BCP 47 language keys on names/titles (`ar-Latn` is the transliteration), and prose fields as maps of language code to `IslamicNetwork\Ilm\DTO\Prose` (`{raw, html}`). Optional fields omitted by the APIs surface as `null` (or empty arrays) on the DTOs. Story image assets are returned as `IslamicNetwork\Http\BinaryResponse` via `StoriesClient::asset()`.

## Testing

Integration tests call live API endpoints. When a 429 or timeout occurs, the client waits 1 second and retries once.

---

<p>
  <a href="https://islamic.network"><img src="assets/islamic-network.svg" alt="Islamic Network" height="40"></a>
  &nbsp;&nbsp;&nbsp;
  <a href="https://bahriya.cloud/product/containers"><img src="assets/bahriya.svg" alt="Bahriya" height="40"></a>
</p>

An [Islamic Network](https://islamic.network) project, hosted on [Bahriya's Distributed Container Platform](https://bahriya.cloud/product/containers).
