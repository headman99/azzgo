<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static ACCEPTED()
 * @method static static DENIED()
 * @method static static PENDING()
 * @method static static SENDTOPUBLISHER()
 */

final class RequestStatusEnum extends Enum
{
    const ACCEPTED = 'A';
    const DENIED = 'D';
    const PENDING = 'P';
    const SENDTOPUBLISHER = 'S';
}
