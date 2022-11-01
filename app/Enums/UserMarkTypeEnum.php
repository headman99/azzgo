<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class UserMarkTypeEnum extends Enum
{
    const CUSTOMER = 'CUS';
    const PUBLISHER = 'PUB';
}
