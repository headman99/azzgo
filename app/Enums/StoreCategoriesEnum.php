<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class StoreCategoriesEnum extends Enum
{
    const SHOPPING = "SHP";
    const FOOD = "FOD";
    const SERVICE = "SRV";
}
