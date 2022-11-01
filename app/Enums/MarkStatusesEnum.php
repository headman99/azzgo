<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class MarkStatusesEnum extends Enum
{
    const ACCEPTED = 'A';
    const DENIED = 'D';
    const PENDING = 'P';
}
