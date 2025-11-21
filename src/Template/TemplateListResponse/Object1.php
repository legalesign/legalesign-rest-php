<?php

declare(strict_types=1);

namespace LegalesignSDK\Template\TemplateListResponse;

use LegalesignSDK\Core\Attributes\Api;
use LegalesignSDK\Core\Concerns\SdkModel;
use LegalesignSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type Object1Shape = array{
 *   archive?: bool|null,
 *   created?: \DateTimeInterface|null,
 *   group?: string|null,
 *   has_fields?: bool|null,
 *   modified?: \DateTimeInterface|null,
 *   resource_uri?: string|null,
 *   signee_count?: int|null,
 *   title?: string|null,
 *   user?: string|null,
 *   uuid?: string|null,
 * }
 */
final class Object1 implements BaseModel
{
    /** @use SdkModel<Object1Shape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?bool $archive;

    #[Api(optional: true)]
    public ?\DateTimeInterface $created;

    #[Api(optional: true)]
    public ?string $group;

    #[Api(optional: true)]
    public ?bool $has_fields;

    #[Api(optional: true)]
    public ?\DateTimeInterface $modified;

    #[Api(optional: true)]
    public ?string $resource_uri;

    #[Api(optional: true)]
    public ?int $signee_count;

    #[Api(optional: true)]
    public ?string $title;

    #[Api(optional: true)]
    public ?string $user;

    #[Api(optional: true)]
    public ?string $uuid;

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
        ?bool $archive = null,
        ?\DateTimeInterface $created = null,
        ?string $group = null,
        ?bool $has_fields = null,
        ?\DateTimeInterface $modified = null,
        ?string $resource_uri = null,
        ?int $signee_count = null,
        ?string $title = null,
        ?string $user = null,
        ?string $uuid = null,
    ): self {
        $obj = new self;

        null !== $archive && $obj->archive = $archive;
        null !== $created && $obj->created = $created;
        null !== $group && $obj->group = $group;
        null !== $has_fields && $obj->has_fields = $has_fields;
        null !== $modified && $obj->modified = $modified;
        null !== $resource_uri && $obj->resource_uri = $resource_uri;
        null !== $signee_count && $obj->signee_count = $signee_count;
        null !== $title && $obj->title = $title;
        null !== $user && $obj->user = $user;
        null !== $uuid && $obj->uuid = $uuid;

        return $obj;
    }

    public function withArchive(bool $archive): self
    {
        $obj = clone $this;
        $obj->archive = $archive;

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

    public function withHasFields(bool $hasFields): self
    {
        $obj = clone $this;
        $obj->has_fields = $hasFields;

        return $obj;
    }

    public function withModified(\DateTimeInterface $modified): self
    {
        $obj = clone $this;
        $obj->modified = $modified;

        return $obj;
    }

    public function withResourceUri(string $resourceUri): self
    {
        $obj = clone $this;
        $obj->resource_uri = $resourceUri;

        return $obj;
    }

    public function withSigneeCount(int $signeeCount): self
    {
        $obj = clone $this;
        $obj->signee_count = $signeeCount;

        return $obj;
    }

    public function withTitle(string $title): self
    {
        $obj = clone $this;
        $obj->title = $title;

        return $obj;
    }

    public function withUser(string $user): self
    {
        $obj = clone $this;
        $obj->user = $user;

        return $obj;
    }

    public function withUuid(string $uuid): self
    {
        $obj = clone $this;
        $obj->uuid = $uuid;

        return $obj;
    }
}
