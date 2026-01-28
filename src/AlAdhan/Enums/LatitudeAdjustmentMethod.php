<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\Enums;

enum LatitudeAdjustmentMethod: int
{
    case MIDDLE_OF_THE_NIGHT = 1;
    case ONE_SEVENTH = 2;
    case ANGLE_BASED = 3;
}
