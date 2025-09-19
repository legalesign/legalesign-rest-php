<?php

declare(strict_types=1);

namespace Legalesign\Attachment;

use Legalesign\Core\Attributes\Api;
use Legalesign\Core\Concerns\SdkModel;
use Legalesign\Core\Contracts\BaseModel;

/**
 * @phpstan-type list_meta = array{
 *   limit?: int,
 *   next?: string|null,
 *   offset?: int,
 *   previous?: string|null,
 *   totalCount?: int,
 * }
 */
final class ListMeta implements BaseModel
{
    /** @use SdkModel<list_meta> */
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
    #[Api('total_count', optional: true)]
    public ?int $totalCount;

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
        ?int $totalCount = null,
    ): self {
        $obj = new self;

        null !== $limit && $obj->limit = $limit;
        null !== $next && $obj->next = $next;
        null !== $offset && $obj->offset = $offset;
        null !== $previous && $obj->previous = $previous;
        null !== $totalCount && $obj->totalCount = $totalCount;

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
        $obj->totalCount = $totalCount;

        return $obj;
    }
}
