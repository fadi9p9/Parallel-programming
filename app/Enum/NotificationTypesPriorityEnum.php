<?php

namespace App\Enum;

enum NotificationTypesPriorityEnum: int
{
    case LOW = 1;
    case MEDIUM = 2;
    case HIGH = 3;
    case CRITICAL = 4;
}