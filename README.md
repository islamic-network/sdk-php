# Islamic Network SDK (PHP)

Typed PHP 8.4+ SDK for Islamic Network APIs. This repository includes the AlAdhan and AlQuran namespaces.

Supported APIs:
- AlAdhan (prayer times, Islamic calendar, qibla, Asma Al Husna)
- AlQuran (surahs, ayahs, sections, editions, search, sajda, meta)

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

## Testing

Integration tests call live API endpoints. When a 429 or timeout occurs, the client waits 1 second and retries once.
