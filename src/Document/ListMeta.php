<?php

declare(strict_types=1);

namespace LegalesignSDK\Document;

use LegalesignSDK\Core\Attributes\Api;
use LegalesignSDK\Core\Concerns\SdkModel;
use LegalesignSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ListMetaShape = array{
 *   limit?: int|null,
 *   next?: string|null,
 *   offset?: int|null,
 *   previous?: string|null,
 *   total_count?: int|null,
 * }
 */
final class ListMeta implements BaseModel
{
    /** @use SdkModel<ListMetaShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?int $limit;

    #[Api(nullable: true, optional: true)]
    public ?string $next;

    #[Api(optional: true)]
    public ?int $offset;

    #[Api(nullable: true, optional: true)]
    public ?string $previous;

    /**
     * total number of objects.
     */
    #[Api(optional: true)]
    public ?int $total_count;

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
        ?int $limit = null,
        ?string $next = null,
        ?int $offset = null,
        ?string $previous = null,
        ?int $total_count = null,
    ): self {
        $obj = new self;

        null !== $limit && $obj->limit = $limit;
        null !== $next && $obj->next = $next;
        null !== $offset && $obj->offset = $offset;
        null !== $previous && $obj->previous = $previous;
        null !== $total_count && $obj->total_count = $total_count;

        return $obj;
    }

    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }

    public function withNext(?string $next): self
    {
        $obj = clone $this;
        $obj->next = $next;

        return $obj;
    }

    public function withOffset(int $offset): self
    {
        $obj = clone $this;
        $obj->offset = $offset;

        return $obj;
    }

    public function withPrevious(?string $previous): self
    {
        $obj = clone $this;
        $obj->previous = $previous;

        return $obj;
    }

    /**
     * total number of objects.
     */
    public function withTotalCount(int $totalCount): self
    {
        $obj = clone $this;
        $obj->total_count = $totalCount;

        return $obj;
    }
}
