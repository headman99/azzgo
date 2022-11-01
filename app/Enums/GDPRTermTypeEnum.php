<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static PUBLISHER()
 * @method static static CUSTOMER()
 */
final class GDPRTermTypeEnum extends Enum
{
    const PUBLISHER = "PUBLISHER";
    const CUSTOMER =  "CUSTOMER";
}
