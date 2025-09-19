<?php

declare(strict_types=1);

namespace Legalesign\Notifications;

use Legalesign\Core\Attributes\Api;
use Legalesign\Core\Concerns\SdkModel;
use Legalesign\Core\Contracts\BaseModel;
use Legalesign\Notifications\NotificationListResponseItem\NotifyWhen;

/**
 * @phpstan-type notification_list_response_item = array{
 *   active?: bool,
 *   eventFilter?: value-of<WebhookEventFilterEnum>,
 *   groupID?: int,
 *   notifyWhen?: value-of<NotifyWhen>,
 *   url?: string,
 * }
 */
final class NotificationListResponseItem implements BaseModel
{
    /** @use SdkModel<notification_list_response_item> */
    use SdkModel;

    #[Api(optional: true)]
    public ?bool $active;

    /** @var value-of<WebhookEventFilterEnum>|null $eventFilter */
    #[Api('event_filter', enum: WebhookEventFilterEnum::class, optional: true)]
    public ?string $eventFilter;

    #[Api('group_id', optional: true)]
    public ?int $groupID;

    /**
     * 1 =  every 6 minutes, 2 =  upon signing, 3 = sent, 4 = rejected, 10 = realtime.
     *
     * @var value-of<NotifyWhen>|null $notifyWhen
     */
    #[Api('notify_when', enum: NotifyWhen::class, optional: true)]
    public ?int $notifyWhen;

    #[Api(optional: true)]
    public ?string $url;

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
     * @param NotifyWhen|value-of<NotifyWhen> $notifyWhen
     */
    public static function with(
        ?bool $active = null,
        WebhookEventFilterEnum|string|null $eventFilter = null,
        ?int $groupID = null,
        NotifyWhen|int|null $notifyWhen = null,
        ?string $url = null,
    ): self {
        $obj = new self;

        null !== $active && $obj->active = $active;
        null !== $eventFilter && $obj->eventFilter = $eventFilter instanceof WebhookEventFilterEnum ? $eventFilter->value : $eventFilter;
        null !== $groupID && $obj->groupID = $groupID;
        null !== $notifyWhen && $obj->notifyWhen = $notifyWhen instanceof NotifyWhen ? $notifyWhen->value : $notifyWhen;
        null !== $url && $obj->url = $url;

        return $obj;
    }

    public function withActive(bool $active): self
    {
        $obj = clone $this;
        $obj->active = $active;

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

    public function withGroupID(int $groupID): self
    {
        $obj = clone $this;
        $obj->groupID = $groupID;

        return $obj;
    }

    /**
     * 1 =  every 6 minutes, 2 =  upon signing, 3 = sent, 4 = rejected, 10 = realtime.
     *
     * @param NotifyWhen|value-of<NotifyWhen> $notifyWhen
     */
    public function withNotifyWhen(NotifyWhen|int $notifyWhen): self
    {
        $obj = clone $this;
        $obj->notifyWhen = $notifyWhen instanceof NotifyWhen ? $notifyWhen->value : $notifyWhen;

        return $obj;
    }

    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }
}
