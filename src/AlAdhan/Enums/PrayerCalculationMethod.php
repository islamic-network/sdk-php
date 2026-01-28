<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\Enums;

enum PrayerCalculationMethod: int
{
    case JAFARI = 0;
    case KARACHI = 1;
    case ISNA = 2;
    case MWL = 3;
    case UMM_AL_QURA = 4;
    case EGYPT = 5;
    case METHOD_6 = 6;
    case TEHRAN = 7;
    case GULF = 8;
    case KUWAIT = 9;
    case QATAR = 10;
    case SINGAPORE = 11;
    case FRANCE = 12;
    case DIYANET = 13;
    case RUSSIA = 14;
    case MOONSIGHTING = 15;
    case DUBAI = 16;
    case MALAYSIA = 17;
    case TUNISIA = 18;
    case ALGERIA = 19;
    case INDONESIA = 20;
    case MOROCCO = 21;
    case LISBON = 22;
    case JORDAN = 23;
    case CUSTOM = 99;
}
