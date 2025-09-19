<?php

declare(strict_types=1);

namespace Legalesign\Member;

/**
 * Permissions options:
 *    * 1 - administrator
 *    * 2 - team docs visible, create & send
 *    * 3 - team docs visible, send only
 *    * 4 - no team sent docs visible, send only
 *    * 5 - no team docs visible, create & send
 *    * 6 - team docs visible, read only
 */
enum PermissionsEnum: int
{
    case PERMISSIONS_ENUM_1 = 1;

    case PERMISSIONS_ENUM_2 = 2;

    case PERMISSIONS_ENUM_3 = 3;

    case PERMISSIONS_ENUM_4 = 4;

    case PERMISSIONS_ENUM_5 = 5;

    case PERMISSIONS_ENUM_6 = 6;
}
