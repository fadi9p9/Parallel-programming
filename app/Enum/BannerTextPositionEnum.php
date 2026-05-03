<?php

namespace App\Enum;

enum BannerTextPositionEnum: int
{
    case TOP_LEFT = 1;
    case TOP_CENTER = 2;
    case TOP_RIGHT = 3;
    case CENTER_LEFT = 4;
    case CENTER = 5;
    case CENTER_RIGHT = 6;
    case BOTTOM_LEFT = 7;
    case BOTTOM_CENTER = 8;
    case BOTTOM_RIGHT = 9;
}