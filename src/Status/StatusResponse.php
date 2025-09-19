<?php

declare(strict_types=1);

namespace Legalesign\Status;

use Legalesign\Core\Attributes\Api;
use Legalesign\Core\Concerns\SdkModel;
use Legalesign\Core\Contracts\BaseModel;
use Legalesign\Signer\SignerStatusEnum;

/**
 * @phpstan-type status_response = array{
 *   archived?: bool,
 *   downloadFinal?: bool,
 *   resourceUri?: string,
 *   status?: value-of<SignerStatusEnum>,
 *   tag?: string,
 *   tag1?: string,
 *   tag2?: string,
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class StatusResponse implements BaseModel
{
    /** @use SdkModel<status_response> */
    use SdkModel;

    #[Api(optional: true)]
    public ?bool $archived;

    #[Api('download_final', optional: true)]
    public ?bool $downloadFinal;

    #[Api('resource_uri', optional: true)]
    public ?string $resourceUri;

    /**
     * Signer status options:
     *  * 4 - unsent
     *  * 5 - scheduled to be sent
     *  * 10 - sent
     *  * 15 - email opened
     *  * 20 - visited
     *  * 30 - fields complete
     *  * 35 - fields complete ex signature
     *  * 39 - waiting for witness to complete
     *  * 40 - signed
     *  * 50 - downloaded
     *  * 60 - rejected
     *
     * @var value-of<SignerStatusEnum>|null $status
     */
    #[Api(enum: SignerStatusEnum::class, optional: true)]
    public ?int $status;

    #[Api(optional: true)]
    public ?string $tag;

    #[Api(optional: true)]
    public ?string $tag1;

    #[Api(optional: true)]
    public ?string $tag2;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param SignerStatusEnum|value-of<SignerStatusEnum> $status
     */
    public static function with(
        ?bool $archived = null,
        ?bool $downloadFinal = null,
        ?string $resourceUri = null,
        SignerStatusEnum|int|null $status = null,
        ?string $tag = null,
        ?string $tag1 = null,
        ?string $tag2 = null,
    ): self {
        $obj = new self;

        null !== $archived && $obj->archived = $archived;
        null !== $downloadFinal && $obj->downloadFinal = $downloadFinal;
        null !== $resourceUri && $obj->resourceUri = $resourceUri;
        null !== $status && $obj->status = $status instanceof SignerStatusEnum ? $status->value : $status;
        null !== $tag && $obj->tag = $tag;
        null !== $tag1 && $obj->tag1 = $tag1;
        null !== $tag2 && $obj->tag2 = $tag2;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    public function withDownloadFinal(bool $downloadFinal): self
    {
        $obj = clone $this;
        $obj->downloadFinal = $downloadFinal;

        return $obj;
    }

    public function withResourceUri(string $resourceUri): self
    {
        $obj = clone $this;
        $obj->resourceUri = $resourceUri;

        return $obj;
    }

    /**
     * Signer status options:
     *  * 4 - unsent
     *  * 5 - scheduled to be sent
     *  * 10 - sent
     *  * 15 - email opened
     *  * 20 - visited
     *  * 30 - fields complete
     *  * 35 - fields complete ex signature
     *  * 39 - waiting for witness to complete
     *  * 40 - signed
     *  * 50 - downloaded
     *  * 60 - rejected
     *
     * @param SignerStatusEnum|value-of<SignerStatusEnum> $status
     */
    public function withStatus(SignerStatusEnum|int $status): self
    {
        $obj = clone $this;
        $obj->status = $status instanceof SignerStatusEnum ? $status->value : $status;

        return $obj;
    }

    public function withTag(string $tag): self
    {
        $obj = clone $this;
        $obj->tag = $tag;

        return $obj;
    }

    public function withTag1(string $tag1): self
    {
        $obj = clone $this;
        $obj->tag1 = $tag1;

        return $obj;
    }

    public function withTag2(string $tag2): self
    {
        $obj = clone $this;
        $obj->tag2 = $tag2;

        return $obj;
    }
}
