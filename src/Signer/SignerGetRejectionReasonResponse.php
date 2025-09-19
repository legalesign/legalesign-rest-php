<?php

declare(strict_types=1);

namespace Legalesign\Signer;

use Legalesign\Core\Attributes\Api;
use Legalesign\Core\Concerns\SdkModel;
use Legalesign\Core\Contracts\BaseModel;

/**
 * @phpstan-type signer_get_rejection_reason_response = array{
 *   reason?: string, status?: int
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class SignerGetRejectionReasonResponse implements BaseModel
{
    /** @use SdkModel<signer_get_rejection_reason_response> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $reason;

    #[Api(optional: true)]
    public ?int $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $reason = null, ?int $status = null): self
    {
        $obj = new self;

        null !== $reason && $obj->reason = $reason;
        null !== $status && $obj->status = $status;

        return $obj;
    }

    public function withReason(string $reason): self
    {
        $obj = clone $this;
        $obj->reason = $reason;

        return $obj;
    }

    public function withStatus(int $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }
}
