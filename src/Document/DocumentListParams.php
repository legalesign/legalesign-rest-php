<?php

declare(strict_types=1);

namespace Legalesign\Document;

use Legalesign\Core\Attributes\Api;
use Legalesign\Core\Concerns\SdkModel;
use Legalesign\Core\Concerns\SdkParams;
use Legalesign\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new DocumentListParams); // set properties as needed
 * $client->document->list(...$params->toArray());
 * ```
 * List (unarchived) signing documents. Use /status/ if you need high-level information.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->document->list(...$params->toArray());`
 *
 * @see Legalesign\Document->list
 *
 * @phpstan-type document_list_params = array{
 *   group: string,
 *   archived?: string,
 *   createdGt?: \DateTimeInterface,
 *   email?: string,
 *   limit?: int,
 *   modifiedGt?: \DateTimeInterface,
 *   nosigners?: string,
 *   offset?: int,
 *   status?: int,
 * }
 */
final class DocumentListParams implements BaseModel
{
    /** @use SdkModel<document_list_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter by a specific group, required.
     */
    #[Api]
    public string $group;

    /**
     * Filter on archived status, default is false.
     */
    #[Api(optional: true)]
    public ?string $archived;

    /**
     * Filter for those documents created after a certain time.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $createdGt;

    /**
     * Filter by signer email.
     */
    #[Api(optional: true)]
    public ?string $email;

    /**
     * Length of dataset to return. Use with offset query to iterate through results.
     */
    #[Api(optional: true)]
    public ?int $limit;

    /**
     * Filter for those documents modified after a certain time.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $modifiedGt;

    /**
     * Add value '1' to remove signers information for a faster query.
     */
    #[Api(optional: true)]
    public ?string $nosigners;

    /**
     * Offset from start of dataset. Use with the limit query to iterate through dataset.
     */
    #[Api(optional: true)]
    public ?int $offset;

    /**
     * Filter on document status.
     */
    #[Api(optional: true)]
    public ?int $status;

    /**
     * `new DocumentListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DocumentListParams::with(group: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DocumentListParams)->withGroup(...)
     * ```
     */
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
        string $group,
        ?string $archived = null,
        ?\DateTimeInterface $createdGt = null,
        ?string $email = null,
        ?int $limit = null,
        ?\DateTimeInterface $modifiedGt = null,
        ?string $nosigners = null,
        ?int $offset = null,
        ?int $status = null,
    ): self {
        $obj = new self;

        $obj->group = $group;

        null !== $archived && $obj->archived = $archived;
        null !== $createdGt && $obj->createdGt = $createdGt;
        null !== $email && $obj->email = $email;
        null !== $limit && $obj->limit = $limit;
        null !== $modifiedGt && $obj->modifiedGt = $modifiedGt;
        null !== $nosigners && $obj->nosigners = $nosigners;
        null !== $offset && $obj->offset = $offset;
        null !== $status && $obj->status = $status;

        return $obj;
    }

    /**
     * Filter by a specific group, required.
     */
    public function withGroup(string $group): self
    {
        $obj = clone $this;
        $obj->group = $group;

        return $obj;
    }

    /**
     * Filter on archived status, default is false.
     */
    public function withArchived(string $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    /**
     * Filter for those documents created after a certain time.
     */
    public function withCreatedGt(\DateTimeInterface $createdGt): self
    {
        $obj = clone $this;
        $obj->createdGt = $createdGt;

        return $obj;
    }

    /**
     * Filter by signer email.
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

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
     * Filter for those documents modified after a certain time.
     */
    public function withModifiedGt(\DateTimeInterface $modifiedGt): self
    {
        $obj = clone $this;
        $obj->modifiedGt = $modifiedGt;

        return $obj;
    }

    /**
     * Add value '1' to remove signers information for a faster query.
     */
    public function withNosigners(string $nosigners): self
    {
        $obj = clone $this;
        $obj->nosigners = $nosigners;

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

    /**
     * Filter on document status.
     */
    public function withStatus(int $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }
}
