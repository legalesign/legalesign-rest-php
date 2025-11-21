<?php

declare(strict_types=1);

namespace LegalesignSDK\Status;

use LegalesignSDK\Core\Attributes\Api;
use LegalesignSDK\Core\Concerns\SdkModel;
use LegalesignSDK\Core\Concerns\SdkResponse;
use LegalesignSDK\Core\Contracts\BaseModel;
use LegalesignSDK\Core\Conversion\Contracts\ResponseConverter;
use LegalesignSDK\Signer\SignerStatusEnum;

/**
 * @phpstan-type StatusGetResponseShape = array{
 *   archived?: bool|null,
 *   download_final?: bool|null,
 *   resource_uri?: string|null,
 *   status?: null|4|5|10|15|20|30|35|39|40|50|60,
 *   tag?: string|null,
 *   tag1?: string|null,
 *   tag2?: string|null,
 * }
 */
final class StatusGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<StatusGetResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?bool $archived;

    #[Api(optional: true)]
    public ?bool $download_final;

    #[Api(optional: true)]
    public ?string $resource_uri;

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
     * @var 4|5|10|15|20|30|35|39|40|50|60|null $status
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
     * @param 4|5|10|15|20|30|35|39|40|50|60 $status
     */
    public static function with(
        ?bool $archived = null,
        ?bool $download_final = null,
        ?string $resource_uri = null,
        ?int $status = null,
        ?string $tag = null,
        ?string $tag1 = null,
        ?string $tag2 = null,
    ): self {
        $obj = new self;

        null !== $archived && $obj->archived = $archived;
        null !== $download_final && $obj->download_final = $download_final;
        null !== $resource_uri && $obj->resource_uri = $resource_uri;
        null !== $status && $obj->status = $status;
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
        $obj->download_final = $downloadFinal;

        return $obj;
    }

    public function withResourceUri(string $resourceUri): self
    {
        $obj = clone $this;
        $obj->resource_uri = $resourceUri;

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
     * @param 4|5|10|15|20|30|35|39|40|50|60 $status
     */
    public function withStatus(int $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

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
