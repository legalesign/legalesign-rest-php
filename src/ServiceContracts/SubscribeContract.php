<?php

declare(strict_types=1);

namespace Legalesign\ServiceContracts;

use Legalesign\Core\Exceptions\APIException;
use Legalesign\Notifications\WebhookEventFilterEnum;
use Legalesign\RequestOptions;

use const Legalesign\Core\OMIT as omit;

interface SubscribeContract
{
    /**
     * @api
     *
     * @param string $notify The type of callback to receive, value must be all, signed, sent, rejected or realtime
     * @param string $url The URL where you wish to get notified
     * @param WebhookEventFilterEnum|value-of<WebhookEventFilterEnum> $eventFilter
     * @param string $group
     *
     * @throws APIException
     */
    public function createWebhook(
        $notify,
        $url,
        $eventFilter = omit,
        $group = omit,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createWebhookRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
