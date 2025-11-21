<?php

declare(strict_types=1);

namespace LegalesignSDK\Signer;

use LegalesignSDK\Core\Attributes\Api;
use LegalesignSDK\Core\Concerns\SdkModel;
use LegalesignSDK\Core\Concerns\SdkParams;
use LegalesignSDK\Core\Contracts\BaseModel;

/**
 * Send signer reminder email.
 *
 * @see LegalesignSDK\Services\SignerService::sendReminder()
 *
 * @phpstan-type SignerSendReminderParamsShape = array{text?: string}
 */
final class SignerSendReminderParams implements BaseModel
{
    /** @use SdkModel<SignerSendReminderParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * custom message text, html will be stripped.
     */
    #[Api(optional: true)]
    public ?string $text;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $text = null): self
    {
        $obj = new self;

        null !== $text && $obj->text = $text;

        return $obj;
    }

    /**
     * custom message text, html will be stripped.
     */
    public function withText(string $text): self
    {
        $obj = clone $this;
        $obj->text = $text;

        return $obj;
    }
}
