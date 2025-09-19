<?php

declare(strict_types=1);

namespace Legalesign\Invited;

use Legalesign\Attachment\ListMeta;
use Legalesign\Core\Attributes\Api;
use Legalesign\Core\Concerns\SdkModel;
use Legalesign\Core\Contracts\BaseModel;
use Legalesign\Invited\InvitedListResponse\Object1;

/**
 * @phpstan-type invited_list_response = array{
 *   meta?: ListMeta, objects?: list<Object1>
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class InvitedListResponse implements BaseModel
{
    /** @use SdkModel<invited_list_response> */
    use SdkModel;

    #[Api(optional: true)]
    public ?ListMeta $meta;

    /** @var list<Object1>|null $objects */
    #[Api(list: Object1::class, optional: true)]
    public ?array $objects;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Object1> $objects
     */
    public static function with(
        ?ListMeta $meta = null,
        ?array $objects = null
    ): self {
        $obj = new self;

        null !== $meta && $obj->meta = $meta;
        null !== $objects && $obj->objects = $objects;

        return $obj;
    }

    public function withMeta(ListMeta $meta): self
    {
        $obj = clone $this;
        $obj->meta = $meta;

        return $obj;
    }

    /**
     * @param list<Object1> $objects
     */
    public function withObjects(array $objects): self
    {
        $obj = clone $this;
        $obj->objects = $objects;

        return $obj;
    }
}
