<?php

declare(strict_types=1);

namespace Legalesign\Services;

use Legalesign\Client;
use Legalesign\Core\Conversion\ListOf;
use Legalesign\Core\Exceptions\APIException;
use Legalesign\Notifications\NotificationListResponseItem;
use Legalesign\RequestOptions;
use Legalesign\ServiceContracts\NotificationsContract;

final class NotificationsService implements NotificationsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Callbacks sent to URL of your choice
     *
     * @return list<NotificationListResponseItem>
     *
     * @throws APIException
     */
    public function list(?RequestOptions $requestOptions = null): array
    {
        $params = [];

        return $this->listRaw($params, $requestOptions);
    }

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
    ): array {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'notifications/',
            options: $requestOptions,
            convert: new ListOf(NotificationListResponseItem::class),
        );
    }
}
