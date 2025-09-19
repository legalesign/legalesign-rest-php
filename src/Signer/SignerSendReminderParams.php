<?php

declare(strict_types=1);

namespace Legalesign\Signer;

use Legalesign\Core\Attributes\Api;
use Legalesign\Core\Concerns\SdkModel;
use Legalesign\Core\Concerns\SdkParams;
use Legalesign\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new SignerSendReminderParams); // set properties as needed
 * $client->signer->sendReminder(...$params->toArray());
 * ```
 * Send signer reminder email.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->signer->sendReminder(...$params->toArray());`
 *
 * @see Legalesign\Signer->sendReminder
 *
 * @phpstan-type signer_send_reminder_params = array{text?: string}
 */
final class SignerSendReminderParams implements BaseModel
{
    /** @use SdkModel<signer_send_reminder_params> */
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
