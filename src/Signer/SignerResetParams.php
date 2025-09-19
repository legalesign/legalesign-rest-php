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
 * $params = (new SignerResetParams); // set properties as needed
 * $client->signer->reset(...$params->toArray());
 * ```
 * Reset to an earlier signer if forwarded.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->signer->reset(...$params->toArray());`
 *
 * @see Legalesign\Signer->reset
 *
 * @phpstan-type signer_reset_params = array{email: string, notify?: bool}
 */
final class SignerResetParams implements BaseModel
{
    /** @use SdkModel<signer_reset_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Email of signer to revert to.
     */
    #[Api]
    public string $email;

    /**
     * Email notify current signer access is being withdrawn.
     */
    #[Api(optional: true)]
    public ?bool $notify;

    /**
     * `new SignerResetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SignerResetParams::with(email: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SignerResetParams)->withEmail(...)
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
     */
    public static function with(string $email, ?bool $notify = null): self
    {
        $obj = new self;

        $obj->email = $email;

        null !== $notify && $obj->notify = $notify;

        return $obj;
    }

    /**
     * Email of signer to revert to.
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

        return $obj;
    }

    /**
     * Email notify current signer access is being withdrawn.
     */
    public function withNotify(bool $notify): self
    {
        $obj = clone $this;
        $obj->notify = $notify;

        return $obj;
    }
}
