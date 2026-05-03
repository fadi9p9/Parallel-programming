<?php

namespace App\Enum;

enum NotificationTargetsTargetTypeEnum: int
{
    case USER = 1;
    case ROLE = 2;
    case WAREHOUSE = 3;
}