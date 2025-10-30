<?php

declare(strict_types=1);

namespace LegalesignSDK\Template;

use LegalesignSDK\Core\Attributes\Api;
use LegalesignSDK\Core\Concerns\SdkModel;
use LegalesignSDK\Core\Concerns\SdkParams;
use LegalesignSDK\Core\Contracts\BaseModel;

/**
 * Get text templates.
 *
 * @see LegalesignSDK\Template->list
 *
 * @phpstan-type TemplateListParamsShape = array{
 *   archive?: string, group?: string, limit?: int, offset?: int
 * }
 */
final class TemplateListParams implements BaseModel
{
    /** @use SdkModel<TemplateListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?string $archive;

    /**
     * can be full resource_uri or only id.
     */
    #[Api(optional: true)]
    public ?string $group;

    /**
     * Length of dataset to return. Use with offset query to iterate through results.
     */
    #[Api(optional: true)]
    public ?int $limit;

    /**
     * Offset from start of dataset. Use with the limit query to iterate through dataset.
     */
    #[Api(optional: true)]
    public ?int $offset;

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
        ?string $archive = null,
        ?string $group = null,
        ?int $limit = null,
        ?int $offset = null,
    ): self {
        $obj = new self;

        null !== $archive && $obj->archive = $archive;
        null !== $group && $obj->group = $group;
        null !== $limit && $obj->limit = $limit;
        null !== $offset && $obj->offset = $offset;

        return $obj;
    }

    public function withArchive(string $archive): self
    {
        $obj = clone $this;
        $obj->archive = $archive;

        return $obj;
    }

    /**
     * can be full resource_uri or only id.
     */
    public function withGroup(string $group): self
    {
        $obj = clone $this;
        $obj->group = $group;

        return $obj;
    }

    /**
     * Length of dataset to return. Use with offset query to iterate through results.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }

    /**
     * Offset from start of dataset. Use with the limit query to iterate through dataset.
     */
    public function withOffset(int $offset): self
    {
        $obj = clone $this;
        $obj->offset = $offset;

        return $obj;
    }
}
