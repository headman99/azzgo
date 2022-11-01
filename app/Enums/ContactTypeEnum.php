<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static ADDRESS()
 * @method static static PHONE()
 * @method static static EMAIL()
 * @method static static WHATSAPP()
 * @method static static MOBILE()
 */
final class ContactTypeEnum extends Enum
{
    const ADDRESS = "ADR";
    const PHONE = "PNE";
    const EMAIL = "EMA";
    const WHATSAPP = "WAP";
    const MOBILE = "MOB";
}
