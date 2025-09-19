<?php

declare(strict_types=1);

namespace Legalesign\Attachment;

use Legalesign\Core\Attributes\Api;
use Legalesign\Core\Concerns\SdkModel;
use Legalesign\Core\Concerns\SdkParams;
use Legalesign\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new AttachmentListParams); // set properties as needed
 * $client->attachment->list(...$params->toArray());
 * ```
 * List attachments in your groups.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->attachment->list(...$params->toArray());`
 *
 * @see Legalesign\Attachment->list
 *
 * @phpstan-type attachment_list_params = array{
 *   group?: string, limit?: int, offset?: int
 * }
 */
final class AttachmentListParams implements BaseModel
{
    /** @use SdkModel<attachment_list_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter by a specific group.
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
        ?string $group = null,
        ?int $limit = null,
        ?int $offset = null
    ): self {
        $obj = new self;

        null !== $group && $obj->group = $group;
        null !== $limit && $obj->limit = $limit;
        null !== $offset && $obj->offset = $offset;

        return $obj;
    }

    /**
     * Filter by a specific group.
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
