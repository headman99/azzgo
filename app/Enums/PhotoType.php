<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static ADS()
 * @method static static USER()
 * @method static static PUBLISHER()
 */
final class PhotoType extends Enum
{
    const ADS = 'A';
    const USER = 'U';
    const PUBLISHER = 'P';
}
