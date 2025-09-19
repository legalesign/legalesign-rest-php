<?php

declare(strict_types=1);

namespace Legalesign\Attachment;

use Legalesign\Core\Attributes\Api;
use Legalesign\Core\Concerns\SdkModel;
use Legalesign\Core\Contracts\BaseModel;

/**
 * @phpstan-type attachment_response = array{
 *   created?: \DateTimeInterface,
 *   description?: string,
 *   filename?: string,
 *   group?: string,
 *   resourceUri?: string,
 *   user?: string,
 *   uuid?: string,
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class AttachmentResponse implements BaseModel
{
    /** @use SdkModel<attachment_response> */
    use SdkModel;

    #[Api(optional: true)]
    public ?\DateTimeInterface $created;

    #[Api(optional: true)]
    public ?string $description;

    #[Api(optional: true)]
    public ?string $filename;

    #[Api(optional: true)]
    public ?string $group;

    #[Api('resource_uri', optional: true)]
    public ?string $resourceUri;

    /**
     * resource_uri for user.
     */
    #[Api(optional: true)]
    public ?string $user;

    /**
     * id for attachment object.
     */
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
        ?\DateTimeInterface $created = null,
        ?string $description = null,
        ?string $filename = null,
        ?string $group = null,
        ?string $resourceUri = null,
        ?string $user = null,
        ?string $uuid = null,
    ): self {
        $obj = new self;

        null !== $created && $obj->created = $created;
        null !== $description && $obj->description = $description;
        null !== $filename && $obj->filename = $filename;
        null !== $group && $obj->group = $group;
        null !== $resourceUri && $obj->resourceUri = $resourceUri;
        null !== $user && $obj->user = $user;
        null !== $uuid && $obj->uuid = $uuid;

        return $obj;
    }

    public function withCreated(\DateTimeInterface $created): self
    {
        $obj = clone $this;
        $obj->created = $created;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    public function withFilename(string $filename): self
    {
        $obj = clone $this;
        $obj->filename = $filename;

        return $obj;
    }

    public function withGroup(string $group): self
    {
        $obj = clone $this;
        $obj->group = $group;

        return $obj;
    }

    public function withResourceUri(string $resourceUri): self
    {
        $obj = clone $this;
        $obj->resourceUri = $resourceUri;

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
     * id for attachment object.
     */
    public function withUuid(string $uuid): self
    {
        $obj = clone $this;
        $obj->uuid = $uuid;

        return $obj;
    }
}
