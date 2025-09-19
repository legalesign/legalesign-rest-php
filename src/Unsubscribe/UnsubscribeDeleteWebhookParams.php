<?php

declare(strict_types=1);

namespace Legalesign\Unsubscribe;

use Legalesign\Core\Attributes\Api;
use Legalesign\Core\Concerns\SdkModel;
use Legalesign\Core\Concerns\SdkParams;
use Legalesign\Core\Contracts\BaseModel;
use Legalesign\Notifications\WebhookEventFilterEnum;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new UnsubscribeDeleteWebhookParams); // set properties as needed
 * $client->unsubscribe->deleteWebhook(...$params->toArray());
 * ```
 * Delete webhook.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->unsubscribe->deleteWebhook(...$params->toArray());`
 *
 * @see Legalesign\Unsubscribe->deleteWebhook
 *
 * @phpstan-type unsubscribe_delete_webhook_params = array{
 *   url: string,
 *   eventFilter?: WebhookEventFilterEnum|value-of<WebhookEventFilterEnum>,
 *   group?: int,
 * }
 */
final class UnsubscribeDeleteWebhookParams implements BaseModel
{
    /** @use SdkModel<unsubscribe_delete_webhook_params> */
    use SdkModel;
    use SdkParams;

    /**
     * URL to remove, it must match any registered callback exactly.
     */
    #[Api]
    public string $url;

    /** @var value-of<WebhookEventFilterEnum>|null $eventFilter */
    #[Api(enum: WebhookEventFilterEnum::class, optional: true)]
    public ?string $eventFilter;

    /**
     * if a group filter is applied refer to it with slug or resource_uri.
     */
    #[Api(optional: true)]
    public ?int $group;

    /**
     * `new UnsubscribeDeleteWebhookParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UnsubscribeDeleteWebhookParams::with(url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UnsubscribeDeleteWebhookParams)->withURL(...)
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
        string $url,
        WebhookEventFilterEnum|string|null $eventFilter = null,
        ?int $group = null,
    ): self {
        $obj = new self;

        $obj->url = $url;

        null !== $eventFilter && $obj->eventFilter = $eventFilter instanceof WebhookEventFilterEnum ? $eventFilter->value : $eventFilter;
        null !== $group && $obj->group = $group;

        return $obj;
    }

    /**
     * URL to remove, it must match any registered callback exactly.
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

    /**
     * if a group filter is applied refer to it with slug or resource_uri.
     */
    public function withGroup(int $group): self
    {
        $obj = clone $this;
        $obj->group = $group;

        return $obj;
    }
}
