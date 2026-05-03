<?php

namespace App\Enum;

enum UserOtpsTypeEnum: int
{
    case PHONE_VERIFICATION = 1;
    case ORDER_CONFIRMATION = 2;
    case PASSWORD_RESET = 3;
    case LOGIN_VERIFICATION = 4;
}