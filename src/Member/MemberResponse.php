<?php

declare(strict_types=1);

namespace Legalesign\Member;

use Legalesign\Core\Attributes\Api;
use Legalesign\Core\Concerns\SdkModel;
use Legalesign\Core\Contracts\BaseModel;

/**
 * @phpstan-type member_response = array{
 *   created?: \DateTimeInterface,
 *   group?: string,
 *   modified?: \DateTimeInterface,
 *   permission?: value-of<PermissionsEnum>,
 *   resourceUri?: string,
 *   user?: string,
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class MemberResponse implements BaseModel
{
    /** @use SdkModel<member_response> */
    use SdkModel;

    #[Api(optional: true)]
    public ?\DateTimeInterface $created;

    #[Api(optional: true)]
    public ?string $group;

    #[Api(optional: true)]
    public ?\DateTimeInterface $modified;

    /**
     * Permissions options:
     *    * 1 - administrator
     *    * 2 - team docs visible, create & send
     *    * 3 - team docs visible, send only
     *    * 4 - no team sent docs visible, send only
     *    * 5 - no team docs visible, create & send
     *    * 6 - team docs visible, read only
     *
     * @var value-of<PermissionsEnum>|null $permission
     */
    #[Api(enum: PermissionsEnum::class, optional: true)]
    public ?int $permission;

    #[Api('resource_uri', optional: true)]
    public ?string $resourceUri;

    #[Api(optional: true)]
    public ?string $user;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PermissionsEnum|value-of<PermissionsEnum> $permission
     */
    public static function with(
        ?\DateTimeInterface $created = null,
        ?string $group = null,
        ?\DateTimeInterface $modified = null,
        PermissionsEnum|int|null $permission = null,
        ?string $resourceUri = null,
        ?string $user = null,
    ): self {
        $obj = new self;

        null !== $created && $obj->created = $created;
        null !== $group && $obj->group = $group;
        null !== $modified && $obj->modified = $modified;
        null !== $permission && $obj->permission = $permission instanceof PermissionsEnum ? $permission->value : $permission;
        null !== $resourceUri && $obj->resourceUri = $resourceUri;
        null !== $user && $obj->user = $user;

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

    /**
     * Permissions options:
     *    * 1 - administrator
     *    * 2 - team docs visible, create & send
     *    * 3 - team docs visible, send only
     *    * 4 - no team sent docs visible, send only
     *    * 5 - no team docs visible, create & send
     *    * 6 - team docs visible, read only
     *
     * @param PermissionsEnum|value-of<PermissionsEnum> $permission
     */
    public function withPermission(PermissionsEnum|int $permission): self
    {
        $obj = clone $this;
        $obj->permission = $permission instanceof PermissionsEnum ? $permission->value : $permission;

        return $obj;
    }

    public function withResourceUri(string $resourceUri): self
    {
        $obj = clone $this;
        $obj->resourceUri = $resourceUri;

        return $obj;
    }

    public function withUser(string $user): self
    {
        $obj = clone $this;
        $obj->user = $user;

        return $obj;
    }
}
