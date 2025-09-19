<?php

declare(strict_types=1);

namespace Legalesign\Subscribe;

use Legalesign\Core\Attributes\Api;
use Legalesign\Core\Concerns\SdkModel;
use Legalesign\Core\Concerns\SdkParams;
use Legalesign\Core\Contracts\BaseModel;
use Legalesign\Notifications\WebhookEventFilterEnum;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new SubscribeCreateWebhookParams); // set properties as needed
 * $client->subscribe->createWebhook(...$params->toArray());
 * ```
 * Create webhook.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->subscribe->createWebhook(...$params->toArray());`
 *
 * @see Legalesign\Subscribe->createWebhook
 *
 * @phpstan-type subscribe_create_webhook_params = array{
 *   notify: string,
 *   url: string,
 *   eventFilter?: WebhookEventFilterEnum|value-of<WebhookEventFilterEnum>,
 *   group?: string,
 * }
 */
final class SubscribeCreateWebhookParams implements BaseModel
{
    /** @use SdkModel<subscribe_create_webhook_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The type of callback to receive, value must be all, signed, sent, rejected or realtime.
     */
    #[Api]
    public string $notify;

    /**
     * The URL where you wish to get notified.
     */
    #[Api]
    public string $url;

    /** @var value-of<WebhookEventFilterEnum>|null $eventFilter */
    #[Api(enum: WebhookEventFilterEnum::class, optional: true)]
    public ?string $eventFilter;

    #[Api(optional: true)]
    public ?string $group;

    /**
     * `new SubscribeCreateWebhookParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubscribeCreateWebhookParams::with(notify: ..., url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubscribeCreateWebhookParams)->withNotify(...)->withURL(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param WebhookEventFilterEnum|value-of<WebhookEventFilterEnum> $eventFilter
     */
    public static function with(
        string $notify,
        string $url,
        WebhookEventFilterEnum|string|null $eventFilter = null,
        ?string $group = null,
    ): self {
        $obj = new self;

        $obj->notify = $notify;
        $obj->url = $url;

        null !== $eventFilter && $obj->eventFilter = $eventFilter instanceof WebhookEventFilterEnum ? $eventFilter->value : $eventFilter;
        null !== $group && $obj->group = $group;

        return $obj;
    }

    /**
     * The type of callback to receive, value must be all, signed, sent, rejected or realtime.
     */
    public function withNotify(string $notify): self
    {
        $obj = clone $this;
        $obj->notify = $notify;

        return $obj;
    }

    /**
     * The URL where you wish to get notified.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }

    /**
     * @param WebhookEventFilterEnum|value-of<WebhookEventFilterEnum> $eventFilter
     */
    public function withEventFilter(
        WebhookEventFilterEnum|string $eventFilter
    ): self {
        $obj = clone $this;
        $obj->eventFilter = $eventFilter instanceof WebhookEventFilterEnum ? $eventFilter->value : $eventFilter;

        return $obj;
    }

    public function withGroup(string $group): self
    {
        $obj = clone $this;
        $obj->group = $group;

        return $obj;
    }
}
