<?php

declare(strict_types=1);

namespace Legalesign\Status;

use Legalesign\Core\Attributes\Api;
use Legalesign\Core\Concerns\SdkModel;
use Legalesign\Core\Concerns\SdkParams;
use Legalesign\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new StatusRetrieveAllParams); // set properties as needed
 * $client->status->retrieveAll(...$params->toArray());
 * ```
 * Shortened faster query for status of signing documents.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->status->retrieveAll(...$params->toArray());`
 *
 * @see Legalesign\Status->retrieveAll
 *
 * @phpstan-type status_retrieve_all_params = array{
 *   filter?: string, limit?: int, offset?: int
 * }
 */
final class StatusRetrieveAllParams implements BaseModel
{
    /** @use SdkModel<status_retrieve_all_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter on archived status, default is false.
     */
    #[Api(optional: true)]
    public ?string $filter;

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
        ?string $filter = null,
        ?int $limit = null,
        ?int $offset = null
    ): self {
        $obj = new self;

        null !== $filter && $obj->filter = $filter;
        null !== $limit && $obj->limit = $limit;
        null !== $offset && $obj->offset = $offset;

        return $obj;
    }

    /**
     * Filter on archived status, default is false.
     */
    public function withFilter(string $filter): self
    {
        $obj = clone $this;
        $obj->filter = $filter;

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
