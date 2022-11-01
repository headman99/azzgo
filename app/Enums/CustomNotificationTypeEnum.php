<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static REQUEST_ACCEPTED()
 * @method static static REQUEST_ARRIVED()
 * @method static static REQUEST_DENIED()
 * @method static static FAVOURITE_PRODUCT()
 * @method static static NEW_PRODUCT_FOLLOW()
 * @method static static NEW_REQUEST_SIGNUP()
 * @method static static NEW_OFFER_FOLLOW()
 * @method static static NEW_FOLLOWER()
 */
final class CustomNotificationTypeEnum extends Enum
{
    const REQUEST_ACCEPTED = "REQUEST_ACCEPTED";
    const REQUEST_ARRIVED = "REQUEST_ARRIVED";
    const REQUEST_DENIED = "REQUEST_DENIED";

    const FAVOURITE_PRODUCT = "FAVOURITE_PRODUCT";
    const NEW_PRODUCT_FOLLOW = "NEW_PRODUCT_FOLLOW";
    const NEW_REQUEST_SIGNUP = "NEW_REQUEST_SIGNUP";
    const NEW_OFFER_FOLLOW = "NEW_OFFER_FOLLOW";
    const NEW_FOLLOWER = "NEW_FOLLOWER";

}
