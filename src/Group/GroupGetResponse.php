<?php

declare(strict_types=1);

namespace LegalesignSDK\Group;

use LegalesignSDK\Core\Attributes\Api;
use LegalesignSDK\Core\Concerns\SdkModel;
use LegalesignSDK\Core\Concerns\SdkResponse;
use LegalesignSDK\Core\Contracts\BaseModel;
use LegalesignSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type GroupGetResponseShape = array{
 *   created?: \DateTimeInterface|null,
 *   default_email?: string|null,
 *   default_extraemail?: string|null,
 *   footer?: string|null,
 *   footer_height?: int|null,
 *   header?: string|null,
 *   is_active?: bool|null,
 *   members?: list<string>|null,
 *   modified?: \DateTimeInterface|null,
 *   name?: string|null,
 *   pagesize?: int|null,
 *   public_name?: string|null,
 *   resource_uri?: string|null,
 *   slug?: string|null,
 *   user?: string|null,
 *   xframe_allow?: bool|null,
 *   xframe_allow_pdf_edit?: bool|null,
 * }
 */
final class GroupGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<GroupGetResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?\DateTimeInterface $created;

    #[Api(optional: true)]
    public ?string $default_email;

    #[Api(optional: true)]
    public ?string $default_extraemail;

    /**
     * html of content.
     */
    #[Api(optional: true)]
    public ?string $footer;

    #[Api(optional: true)]
    public ?int $footer_height;

    #[Api(optional: true)]
    public ?string $header;

    #[Api(optional: true)]
    public ?bool $is_active;

    /**
     * list of members uris.
     *
     * @var list<string>|null $members
     */
    #[Api(list: 'string', optional: true)]
    public ?array $members;

    #[Api(optional: true)]
    public ?\DateTimeInterface $modified;

    #[Api(optional: true)]
    public ?string $name;

    #[Api(optional: true)]
    public ?int $pagesize;

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
     *
     * @param list<string> $members
     */
    public static function with(
        ?\DateTimeInterface $created = null,
        ?string $default_email = null,
        ?string $default_extraemail = null,
        ?string $footer = null,
        ?int $footer_height = null,
        ?string $header = null,
        ?bool $is_active = null,
        ?array $members = null,
        ?\DateTimeInterface $modified = null,
        ?string $name = null,
        ?int $pagesize = null,
        ?string $public_name = null,
        ?string $resource_uri = null,
        ?string $slug = null,
        ?string $user = null,
        ?bool $xframe_allow = null,
        ?bool $xframe_allow_pdf_edit = null,
    ): self {
        $obj = new self;

        null !== $created && $obj->created = $created;
        null !== $default_email && $obj->default_email = $default_email;
        null !== $default_extraemail && $obj->default_extraemail = $default_extraemail;
        null !== $footer && $obj->footer = $footer;
        null !== $footer_height && $obj->footer_height = $footer_height;
        null !== $header && $obj->header = $header;
        null !== $is_active && $obj->is_active = $is_active;
        null !== $members && $obj->members = $members;
        null !== $modified && $obj->modified = $modified;
        null !== $name && $obj->name = $name;
        null !== $pagesize && $obj->pagesize = $pagesize;
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

    public function withDefaultEmail(string $defaultEmail): self
    {
        $obj = clone $this;
        $obj->default_email = $defaultEmail;

        return $obj;
    }

    public function withDefaultExtraemail(string $defaultExtraemail): self
    {
        $obj = clone $this;
        $obj->default_extraemail = $defaultExtraemail;

        return $obj;
    }

    /**
     * html of content.
     */
    public function withFooter(string $footer): self
    {
        $obj = clone $this;
        $obj->footer = $footer;

        return $obj;
    }

    public function withFooterHeight(int $footerHeight): self
    {
        $obj = clone $this;
        $obj->footer_height = $footerHeight;

        return $obj;
    }

    public function withHeader(string $header): self
    {
        $obj = clone $this;
        $obj->header = $header;

        return $obj;
    }

    public function withIsActive(bool $isActive): self
    {
        $obj = clone $this;
        $obj->is_active = $isActive;

        return $obj;
    }

    /**
     * list of members uris.
     *
     * @param list<string> $members
     */
    public function withMembers(array $members): self
    {
        $obj = clone $this;
        $obj->members = $members;

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

    public function withPagesize(int $pagesize): self
    {
        $obj = clone $this;
        $obj->pagesize = $pagesize;

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
