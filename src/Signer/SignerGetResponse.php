<?php

declare(strict_types=1);

namespace LegalesignSDK\Signer;

use LegalesignSDK\Core\Attributes\Api;
use LegalesignSDK\Core\Concerns\SdkModel;
use LegalesignSDK\Core\Concerns\SdkResponse;
use LegalesignSDK\Core\Contracts\BaseModel;
use LegalesignSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type SignerGetResponseShape = array{
 *   document?: string|null,
 *   email?: string|null,
 *   first_name?: string|null,
 *   has_fields?: bool|null,
 *   last_name?: string|null,
 *   order?: int|null,
 *   resource_uri?: string|null,
 *   status?: null|4|5|10|15|20|30|35|39|40|50|60,
 * }
 */
final class SignerGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<SignerGetResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?string $document;

    #[Api(optional: true)]
    public ?string $email;

    #[Api(optional: true)]
    public ?string $first_name;

    #[Api(optional: true)]
    public ?bool $has_fields;

    #[Api(optional: true)]
    public ?string $last_name;

    #[Api(optional: true)]
    public ?int $order;

    #[Api(optional: true)]
    public ?string $resource_uri;

    /**
     * Signer status options:
     *  * 4 - unsent
     *  * 5 - scheduled to be sent
     *  * 10 - sent
     *  * 15 - email opened
     *  * 20 - visited
     *  * 30 - fields complete
     *  * 35 - fields complete ex signature
     *  * 39 - waiting for witness to complete
     *  * 40 - signed
     *  * 50 - downloaded
     *  * 60 - rejected
     *
     * @var 4|5|10|15|20|30|35|39|40|50|60|null $status
     */
    #[Api(enum: SignerStatusEnum::class, optional: true)]
    public ?int $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param 4|5|10|15|20|30|35|39|40|50|60 $status
     */
    public static function with(
        ?string $document = null,
        ?string $email = null,
        ?string $first_name = null,
        ?bool $has_fields = null,
        ?string $last_name = null,
        ?int $order = null,
        ?string $resource_uri = null,
        ?int $status = null,
    ): self {
        $obj = new self;

        null !== $document && $obj->document = $document;
        null !== $email && $obj->email = $email;
        null !== $first_name && $obj->first_name = $first_name;
        null !== $has_fields && $obj->has_fields = $has_fields;
        null !== $last_name && $obj->last_name = $last_name;
        null !== $order && $obj->order = $order;
        null !== $resource_uri && $obj->resource_uri = $resource_uri;
        null !== $status && $obj->status = $status;

        return $obj;
    }

    public function withDocument(string $document): self
    {
        $obj = clone $this;
        $obj->document = $document;

        return $obj;
    }

    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

        return $obj;
    }

    public function withFirstName(string $firstName): self
    {
        $obj = clone $this;
        $obj->first_name = $firstName;

        return $obj;
    }

    public function withHasFields(bool $hasFields): self
    {
        $obj = clone $this;
        $obj->has_fields = $hasFields;

        return $obj;
    }

    public function withLastName(string $lastName): self
    {
        $obj = clone $this;
        $obj->last_name = $lastName;

        return $obj;
    }

    public function withOrder(int $order): self
    {
        $obj = clone $this;
        $obj->order = $order;

        return $obj;
    }

    public function withResourceUri(string $resourceUri): self
    {
        $obj = clone $this;
        $obj->resource_uri = $resourceUri;

        return $obj;
    }

    /**
     * Signer status options:
     *  * 4 - unsent
     *  * 5 - scheduled to be sent
     *  * 10 - sent
     *  * 15 - email opened
     *  * 20 - visited
     *  * 30 - fields complete
     *  * 35 - fields complete ex signature
     *  * 39 - waiting for witness to complete
     *  * 40 - signed
     *  * 50 - downloaded
     *  * 60 - rejected
     *
     * @param 4|5|10|15|20|30|35|39|40|50|60 $status
     */
    public function withStatus(int $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }
}
