<?php

declare(strict_types=1);

namespace Legalesign\ServiceContracts;

use Legalesign\Core\Exceptions\APIException;
use Legalesign\Notifications\NotificationListResponseItem;
use Legalesign\RequestOptions;

interface NotificationsContract
{
    /**
     * @api
     *
     * @return list<NotificationListResponseItem>
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): array;

    /**
     * @api
     *
     * @return list<NotificationListResponseItem>
     *
     * @throws APIException
     */
    public function listRaw(
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): array;
}
