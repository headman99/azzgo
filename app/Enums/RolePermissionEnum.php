<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static ROLE_ADMIN()
 * @method static static ROLE_PUBLISHER()
 * @method static static ROLE_CUSTOMER()
 *
 * @method static static PERMISSION_ADMIN()
 * @method static static PERMISSION_PUBLISHER()
 * @method static static PERMISSION_CUSTOMER()
 */
final class RolePermissionEnum extends Enum
{
    // constants for ROLE
    const ROLE_ADMIN = 'Admin';
    const ROLE_PUBLISHER = 'Publisher';
    const ROLE_CUSTOMER = 'Customer';

    // constants for PERMISSION
    const PERMISSION_ADMIN = 'Administrator role & Permission';
    const PERMISSION_PUBLISHER = 'Publisher role & permission';
    const PERMISSION_CUSTOMER = 'Customer role & permission';
}
