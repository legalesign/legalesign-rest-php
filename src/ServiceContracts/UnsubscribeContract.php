<?php

declare(strict_types=1);

namespace Legalesign\ServiceContracts;

use Legalesign\Core\Exceptions\APIException;
use Legalesign\Notifications\WebhookEventFilterEnum;
use Legalesign\RequestOptions;

use const Legalesign\Core\OMIT as omit;

interface UnsubscribeContract
{
    /**
     * @api
     *
     * @param string $url URL to remove, it must match any registered callback exactly
     * @param WebhookEventFilterEnum|value-of<WebhookEventFilterEnum> $eventFilter
     * @param int $group if a group filter is applied refer to it with slug or resource_uri
     *
     * @throws APIException
     */
    public function deleteWebhook(
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
    public function deleteWebhookRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
