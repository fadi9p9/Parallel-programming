<?php

namespace App\Enum;

enum OrderTrackingChangedByTypeEnum: int
{
    case SYSTEM = 1;
    case ADMIN = 2;
    case USER = 3;
}