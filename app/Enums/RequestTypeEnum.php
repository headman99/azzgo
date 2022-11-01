<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static product()
 * @method static static service()
 */
final class RequestTypeEnum extends Enum
{
    const PRODUCT =  "PRD";
    const SERVICE =  "SRV";
}
