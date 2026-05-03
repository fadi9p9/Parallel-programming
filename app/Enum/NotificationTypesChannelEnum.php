<?php

namespace App\Enum;

enum NotificationTypesChannelEnum: int
{
    case DATABASE = 1;
    case PUSH = 2;
    case EMAIL = 3;
    case SMS = 4;
}