<?php

declare(strict_types=1);

namespace LegalesignSDK\Templatepdf;

use LegalesignSDK\Core\Attributes\Api;
use LegalesignSDK\Core\Concerns\SdkModel;
use LegalesignSDK\Core\Concerns\SdkResponse;
use LegalesignSDK\Core\Contracts\BaseModel;
use LegalesignSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type TemplatePdfShape = array{
 *   created?: \DateTimeInterface|null,
 *   group?: string|null,
 *   modified?: \DateTimeInterface|null,
 *   page_count?: int|null,
 *   parties?: string|null,
 *   resource_uri?: string|null,
 *   signer_count?: int|null,
 *   title?: string|null,
 *   user?: string|null,
 *   uuid?: string|null,
 *   valid?: bool|null,
 * }
 */
final class TemplatePdf implements BaseModel, ResponseConverter
{
    /** @use SdkModel<TemplatePdfShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?\DateTimeInterface $created;

    #[Api(optional: true)]
    public ?string $group;

    #[Api(optional: true)]
    public ?\DateTimeInterface $modified;

    #[Api(optional: true)]
    public ?int $page_count;

    /**
     * JSON stringified array of document parties.
     */
    #[Api(optional: true)]
    public ?string $parties;

    #[Api(optional: true)]
    public ?string $resource_uri;

    #[Api(optional: true)]
    public ?int $signer_count;

    #[Api(optional: true)]
    public ?string $title;

    /**
     * resource_uri for user.
     */
    #[Api(optional: true)]
    public ?string $user;

    /**
     * id for pdf object.
     */
    #[Api(optional: true)]
    public ?string $uuid;

    /**
     * Is able to be sent (if fields do not validate).
     */
    #[Api(optional: true)]
    public ?bool $valid;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?\DateTimeInterface $created = null,
        ?string $group = null,
        ?\DateTimeInterface $modified = null,
        ?int $page_count = null,
        ?string $parties = null,
        ?string $resource_uri = null,
        ?int $signer_count = null,
        ?string $title = null,
        ?string $user = null,
        ?string $uuid = null,
        ?bool $valid = null,
    ): self {
        $obj = new self;

        null !== $created && $obj->created = $created;
        null !== $group && $obj->group = $group;
        null !== $modified && $obj->modified = $modified;
        null !== $page_count && $obj->page_count = $page_count;
        null !== $parties && $obj->parties = $parties;
        null !== $resource_uri && $obj->resource_uri = $resource_uri;
        null !== $signer_count && $obj->signer_count = $signer_count;
        null !== $title && $obj->title = $title;
        null !== $user && $obj->user = $user;
        null !== $uuid && $obj->uuid = $uuid;
        null !== $valid && $obj->valid = $valid;

        return $obj;
    }

    public function withCreated(\DateTimeInterface $created): self
    {
        $obj = clone $this;
        $obj->created = $created;

        return $obj;
    }

    public function withGroup(string $group): self
    {
        $obj = clone $this;
        $obj->group = $group;

        return $obj;
    }

    public function withModified(\DateTimeInterface $modified): self
    {
        $obj = clone $this;
        $obj->modified = $modified;

        return $obj;
    }

    public function withPageCount(int $pageCount): self
    {
        $obj = clone $this;
        $obj->page_count = $pageCount;

        return $obj;
    }

    /**
     * JSON stringified array of document parties.
     */
    public function withParties(string $parties): self
    {
        $obj = clone $this;
        $obj->parties = $parties;

        return $obj;
    }

    public function withResourceUri(string $resourceUri): self
    {
        $obj = clone $this;
        $obj->resource_uri = $resourceUri;

        return $obj;
    }

    public function withSignerCount(int $signerCount): self
    {
        $obj = clone $this;
        $obj->signer_count = $signerCount;

        return $obj;
    }

    public function withTitle(string $title): self
    {
        $obj = clone $this;
        $obj->title = $title;

        return $obj;
    }

    /**
     * resource_uri for user.
     */
    public function withUser(string $user): self
    {
        $obj = clone $this;
        $obj->user = $user;

        return $obj;
    }

    /**
     * id for pdf object.
     */
    public function withUuid(string $uuid): self
    {
        $obj = clone $this;
        $obj->uuid = $uuid;

        return $obj;
    }

    /**
     * Is able to be sent (if fields do not validate).
     */
    public function withValid(bool $valid): self
    {
        $obj = clone $this;
        $obj->valid = $valid;

        return $obj;
    }
}
