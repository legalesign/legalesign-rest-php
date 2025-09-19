<?php

declare(strict_types=1);

namespace Legalesign\Services;

use Legalesign\Client;
use Legalesign\Core\Exceptions\APIException;
use Legalesign\Notifications\WebhookEventFilterEnum;
use Legalesign\RequestOptions;
use Legalesign\ServiceContracts\UnsubscribeContract;
use Legalesign\Unsubscribe\UnsubscribeDeleteWebhookParams;

use const Legalesign\Core\OMIT as omit;

final class UnsubscribeService implements UnsubscribeContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Delete webhook
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
    ): mixed {
        $params = ['url' => $url, 'eventFilter' => $eventFilter, 'group' => $group];

        return $this->deleteWebhookRaw($params, $requestOptions);
    }

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
    ): mixed {
        [$parsed, $options] = UnsubscribeDeleteWebhookParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'unsubscribe/',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
