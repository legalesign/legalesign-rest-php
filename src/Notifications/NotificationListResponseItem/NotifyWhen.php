<?php

declare(strict_types=1);

namespace Legalesign\Notifications\NotificationListResponseItem;

/**
 * 1 =  every 6 minutes, 2 =  upon signing, 3 = sent, 4 = rejected, 10 = realtime.
 */
enum NotifyWhen: int
{
    case NOTIFY_WHEN_1 = 1;

    case NOTIFY_WHEN_2 = 2;

    case NOTIFY_WHEN_3 = 3;

    case NOTIFY_WHEN_4 = 4;

    case NOTIFY_WHEN_10 = 10;
}
