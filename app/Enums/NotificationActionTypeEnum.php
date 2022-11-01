<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static GOTO_REQUEST()
 * @method static static GOTO_PRODUCT()
 * @method static static GOTO_SIGNUP_REQUEST()
 * @method static static GOTO_AGENCY()
 * @method static static DO_NOTHING()
 */
final class NotificationActionTypeEnum extends Enum
{
    const GOTO_REQUEST = "GOTO_REQUEST";
    const GOTO_PRODUCT = "GOTO_PRODUCT";

    const GOTO_SIGNUP_REQUEST = "GOTO_SIGNUP_REQUEST";
    const GOTO_AGENCY = "GOTO_AGENCY";
    const DO_NOTHING = "DO_NOTHING";

}
