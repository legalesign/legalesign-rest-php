<?php

declare(strict_types=1);

namespace LegalesignSDK\Group;

use LegalesignSDK\Core\Attributes\Api;
use LegalesignSDK\Core\Concerns\SdkModel;
use LegalesignSDK\Core\Concerns\SdkResponse;
use LegalesignSDK\Core\Contracts\BaseModel;
use LegalesignSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type group_get_response = array{
 *   created?: \DateTimeInterface,
 *   defaultEmail?: string,
 *   defaultExtraemail?: string,
 *   footer?: string,
 *   footerHeight?: int,
 *   header?: string,
 *   isActive?: bool,
 *   members?: list<string>,
 *   modified?: \DateTimeInterface,
 *   name?: string,
 *   pagesize?: int,
 *   publicName?: string,
 *   resourceUri?: string,
 *   slug?: string,
 *   user?: string,
 *   xframeAllow?: bool,
 *   xframeAllowPdfEdit?: bool,
 * }
 */
final class GroupGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<group_get_response> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?\DateTimeInterface $created;

    #[Api('default_email', optional: true)]
    public ?string $defaultEmail;

    #[Api('default_extraemail', optional: true)]
    public ?string $defaultExtraemail;

    /**
     * html of content.
     */
    #[Api(optional: true)]
    public ?string $footer;

    #[Api('footer_height', optional: true)]
    public ?int $footerHeight;

    #[Api(optional: true)]
    public ?string $header;

    #[Api('is_active', optional: true)]
    public ?bool $isActive;

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
     *
     * @param list<string> $members
     */
    public static function with(
        ?\DateTimeInterface $created = null,
        ?string $defaultEmail = null,
        ?string $defaultExtraemail = null,
        ?string $footer = null,
        ?int $footerHeight = null,
        ?string $header = null,
        ?bool $isActive = null,
        ?array $members = null,
        ?\DateTimeInterface $modified = null,
        ?string $name = null,
        ?int $pagesize = null,
        ?string $publicName = null,
        ?string $resourceUri = null,
        ?string $slug = null,
        ?string $user = null,
        ?bool $xframeAllow = null,
        ?bool $xframeAllowPdfEdit = null,
    ): self {
        $obj = new self;

        null !== $created && $obj->created = $created;
        null !== $defaultEmail && $obj->defaultEmail = $defaultEmail;
        null !== $defaultExtraemail && $obj->defaultExtraemail = $defaultExtraemail;
        null !== $footer && $obj->footer = $footer;
        null !== $footerHeight && $obj->footerHeight = $footerHeight;
        null !== $header && $obj->header = $header;
        null !== $isActive && $obj->isActive = $isActive;
        null !== $members && $obj->members = $members;
        null !== $modified && $obj->modified = $modified;
        null !== $name && $obj->name = $name;
        null !== $pagesize && $obj->pagesize = $pagesize;
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

    public function withDefaultEmail(string $defaultEmail): self
    {
        $obj = clone $this;
        $obj->defaultEmail = $defaultEmail;

        return $obj;
    }

    public function withDefaultExtraemail(string $defaultExtraemail): self
    {
        $obj = clone $this;
        $obj->defaultExtraemail = $defaultExtraemail;

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
        $obj->footerHeight = $footerHeight;

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
        $obj->isActive = $isActive;

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
