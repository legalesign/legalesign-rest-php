<?php

declare(strict_types=1);

namespace Legalesign\User\UserCreateParams;

/**
 * set user permissions * 1 - admin * 2 - create and send docs, team user * 3 - readonly, team user * 4 - send only, team user * 5 - send only, individual user * 6 - create and send docs, invidual user.
 */
enum Permission: string
{
    case PERMISSION_1 = '1';

    case PERMISSION_2 = '2';

    case PERMISSION_3 = '3';

    case PERMISSION_4 = '4';

    case PERMISSION_5 = '5';

    case PERMISSION_6 = '6';
}
