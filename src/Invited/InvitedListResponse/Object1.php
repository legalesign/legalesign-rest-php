<?php

declare(strict_types=1);

namespace Legalesign\Invited\InvitedListResponse;

use Legalesign\Core\Attributes\Api;
use Legalesign\Core\Concerns\SdkModel;
use Legalesign\Core\Contracts\BaseModel;

/**
 * @phpstan-type object1_alias = array{
 *   created?: \DateTimeInterface,
 *   email?: string,
 *   group?: string,
 *   resourceUri?: string,
 * }
 */
final class Object1 implements BaseModel
{
    /** @use SdkModel<object1_alias> */
    use SdkModel;

    #[Api(optional: true)]
    public ?\DateTimeInterface $created;

    #[Api(optional: true)]
    public ?string $email;

    #[Api(optional: true)]
    public ?string $group;

    #[Api('resource_uri', optional: true)]
    public ?string $resourceUri;

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
        ?string $email = null,
        ?string $group = null,
        ?string $resourceUri = null,
    ): self {
        $obj = new self;

        null !== $created && $obj->created = $created;
        null !== $email && $obj->email = $email;
        null !== $group && $obj->group = $group;
        null !== $resourceUri && $obj->resourceUri = $resourceUri;

        return $obj;
    }

    public function withCreated(\DateTimeInterface $created): self
    {
        $obj = clone $this;
        $obj->created = $created;

        return $obj;
    }

    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

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
}
