<?php

declare(strict_types=1);

namespace Legalesign\Services;

use Legalesign\Client;
use Legalesign\Core\Exceptions\APIException;
use Legalesign\Notifications\WebhookEventFilterEnum;
use Legalesign\RequestOptions;
use Legalesign\ServiceContracts\SubscribeContract;
use Legalesign\Subscribe\SubscribeCreateWebhookParams;

use const Legalesign\Core\OMIT as omit;

final class SubscribeService implements SubscribeContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create webhook
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
    ): mixed {
        $params = [
            'notify' => $notify,
            'url' => $url,
            'eventFilter' => $eventFilter,
            'group' => $group,
        ];

        return $this->createWebhookRaw($params, $requestOptions);
    }

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
    ): mixed {
        [$parsed, $options] = SubscribeCreateWebhookParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'subscribe/',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
