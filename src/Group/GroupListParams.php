<?php

declare(strict_types=1);

namespace LegalesignSDK\Group;

use LegalesignSDK\Core\Attributes\Api;
use LegalesignSDK\Core\Concerns\SdkModel;
use LegalesignSDK\Core\Concerns\SdkParams;
use LegalesignSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new GroupListParams); // set properties as needed
 * $client->group->list(...$params->toArray());
 * ```
 * List groups the api user belongs to.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->group->list(...$params->toArray());`
 *
 * @see LegalesignSDK\Group->list
 *
 * @phpstan-type group_list_params = array{limit?: int, offset?: int}
 */
final class GroupListParams implements BaseModel
{
    /** @use SdkModel<group_list_params> */
    use SdkModel;
    use SdkParams;

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
    public static function with(?int $limit = null, ?int $offset = null): self
    {
        $obj = new self;

        null !== $limit && $obj->limit = $limit;
        null !== $offset && $obj->offset = $offset;

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
