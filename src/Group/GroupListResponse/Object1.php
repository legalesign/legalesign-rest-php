<?php

declare(strict_types=1);

namespace Legalesign\Group\GroupListResponse;

use Legalesign\Core\Attributes\Api;
use Legalesign\Core\Concerns\SdkModel;
use Legalesign\Core\Contracts\BaseModel;

/**
 * @phpstan-type object1_alias = array{
 *   created?: \DateTimeInterface,
 *   isActive?: bool,
 *   modified?: \DateTimeInterface,
 *   name?: string,
 *   publicName?: string,
 *   resourceUri?: string,
 *   slug?: string,
 *   user?: string,
 *   xframeAllow?: bool,
 *   xframeAllowPdfEdit?: bool,
 * }
 */
final class Object1 implements BaseModel
{
    /** @use SdkModel<object1_alias> */
    use SdkModel;

    #[Api(optional: true)]
    public ?\DateTimeInterface $created;

    #[Api('is_active', optional: true)]
    public ?bool $isActive;

    #[Api(optional: true)]
    public ?\DateTimeInterface $modified;

    #[Api(optional: true)]
    public ?string $name;

    #[Api('public_name', optional: true)]
    public ?string $publicName;

    #[Api('resource_uri', optional: true)]
    public ?string $resourceUri;

    #[Api(optional: true)]
    public ?string $slug;

    #[Api(optional: true)]
    public ?string $user;

    #[Api('xframe_allow', optional: true)]
    public ?bool $xframeAllow;

    #[Api('xframe_allow_pdf_edit', optional: true)]
    public ?bool $xframeAllowPdfEdit;

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
        ?bool $isActive = null,
        ?\DateTimeInterface $modified = null,
        ?string $name = null,
        ?string $publicName = null,
        ?string $resourceUri = null,
        ?string $slug = null,
        ?string $user = null,
        ?bool $xframeAllow = null,
        ?bool $xframeAllowPdfEdit = null,
    ): self {
        $obj = new self;

        null !== $created && $obj->created = $created;
        null !== $isActive && $obj->isActive = $isActive;
        null !== $modified && $obj->modified = $modified;
        null !== $name && $obj->name = $name;
        null !== $publicName && $obj->publicName = $publicName;
        null !== $resourceUri && $obj->resourceUri = $resourceUri;
        null !== $slug && $obj->slug = $slug;
        null !== $user && $obj->user = $user;
        null !== $xframeAllow && $obj->xframeAllow = $xframeAllow;
        null !== $xframeAllowPdfEdit && $obj->xframeAllowPdfEdit = $xframeAllowPdfEdit;

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
        $obj->isActive = $isActive;

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
        $obj->publicName = $publicName;

        return $obj;
    }

    public function withResourceUri(string $resourceUri): self
    {
        $obj = clone $this;
        $obj->resourceUri = $resourceUri;

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
        $obj->xframeAllow = $xframeAllow;

        return $obj;
    }

    public function withXframeAllowPdfEdit(bool $xframeAllowPdfEdit): self
    {
        $obj = clone $this;
        $obj->xframeAllowPdfEdit = $xframeAllowPdfEdit;

        return $obj;
    }
}
