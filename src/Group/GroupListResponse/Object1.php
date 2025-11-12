<?php

declare(strict_types=1);

namespace LegalesignSDK\Group\GroupListResponse;

use LegalesignSDK\Core\Attributes\Api;
use LegalesignSDK\Core\Concerns\SdkModel;
use LegalesignSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type Object1Shape = array{
 *   created?: \DateTimeInterface|null,
 *   is_active?: bool|null,
 *   modified?: \DateTimeInterface|null,
 *   name?: string|null,
 *   public_name?: string|null,
 *   resource_uri?: string|null,
 *   slug?: string|null,
 *   user?: string|null,
 *   xframe_allow?: bool|null,
 *   xframe_allow_pdf_edit?: bool|null,
 * }
 */
final class Object1 implements BaseModel
{
    /** @use SdkModel<Object1Shape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?\DateTimeInterface $created;

    #[Api(optional: true)]
    public ?bool $is_active;

    #[Api(optional: true)]
    public ?\DateTimeInterface $modified;

    #[Api(optional: true)]
    public ?string $name;

    #[Api(optional: true)]
    public ?string $public_name;

    #[Api(optional: true)]
    public ?string $resource_uri;

    #[Api(optional: true)]
    public ?string $slug;

    #[Api(optional: true)]
    public ?string $user;

    #[Api(optional: true)]
    public ?bool $xframe_allow;

    #[Api(optional: true)]
    public ?bool $xframe_allow_pdf_edit;

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
        ?bool $is_active = null,
        ?\DateTimeInterface $modified = null,
        ?string $name = null,
        ?string $public_name = null,
        ?string $resource_uri = null,
        ?string $slug = null,
        ?string $user = null,
        ?bool $xframe_allow = null,
        ?bool $xframe_allow_pdf_edit = null,
    ): self {
        $obj = new self;

        null !== $created && $obj->created = $created;
        null !== $is_active && $obj->is_active = $is_active;
        null !== $modified && $obj->modified = $modified;
        null !== $name && $obj->name = $name;
        null !== $public_name && $obj->public_name = $public_name;
        null !== $resource_uri && $obj->resource_uri = $resource_uri;
        null !== $slug && $obj->slug = $slug;
        null !== $user && $obj->user = $user;
        null !== $xframe_allow && $obj->xframe_allow = $xframe_allow;
        null !== $xframe_allow_pdf_edit && $obj->xframe_allow_pdf_edit = $xframe_allow_pdf_edit;

        return $obj;
    }

    public function withCreated(\DateTimeInterface $created): self
    {
        $obj = clone $this;
        $obj->created = $created;

        return $obj;
    }

    public function withIsActive(bool $isActive): self
    {
        $obj = clone $this;
        $obj->is_active = $isActive;

        return $obj;
    }

    public function withModified(\DateTimeInterface $modified): self
    {
        $obj = clone $this;
        $obj->modified = $modified;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withPublicName(string $publicName): self
    {
        $obj = clone $this;
        $obj->public_name = $publicName;

        return $obj;
    }

    public function withResourceUri(string $resourceUri): self
    {
        $obj = clone $this;
        $obj->resource_uri = $resourceUri;

        return $obj;
    }

    public function withSlug(string $slug): self
    {
        $obj = clone $this;
        $obj->slug = $slug;

        return $obj;
    }

    public function withUser(string $user): self
    {
        $obj = clone $this;
        $obj->user = $user;

        return $obj;
    }

    public function withXframeAllow(bool $xframeAllow): self
    {
        $obj = clone $this;
        $obj->xframe_allow = $xframeAllow;

        return $obj;
    }

    public function withXframeAllowPdfEdit(bool $xframeAllowPdfEdit): self
    {
        $obj = clone $this;
        $obj->xframe_allow_pdf_edit = $xframeAllowPdfEdit;

        return $obj;
    }
}
