<?php

declare(strict_types=1);

namespace LegalesignSDK\Signer;

use LegalesignSDK\Core\Attributes\Api;
use LegalesignSDK\Core\Concerns\SdkModel;
use LegalesignSDK\Core\Concerns\SdkResponse;
use LegalesignSDK\Core\Contracts\BaseModel;
use LegalesignSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type signer_get_response = array{
 *   document?: string,
 *   email?: string,
 *   firstName?: string,
 *   hasFields?: bool,
 *   lastName?: string,
 *   order?: int,
 *   resourceUri?: string,
 *   status?: 4|5|10|15|20|30|35|39|40|50|60,
 * }
 */
final class SignerGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<signer_get_response> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?string $document;

    #[Api(optional: true)]
    public ?string $email;

    #[Api('first_name', optional: true)]
    public ?string $firstName;

    #[Api('has_fields', optional: true)]
    public ?bool $hasFields;

    #[Api('last_name', optional: true)]
    public ?string $lastName;

    #[Api(optional: true)]
    public ?int $order;

    #[Api('resource_uri', optional: true)]
    public ?string $resourceUri;

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
        ?string $firstName = null,
        ?bool $hasFields = null,
        ?string $lastName = null,
        ?int $order = null,
        ?string $resourceUri = null,
        ?int $status = null,
    ): self {
        $obj = new self;

        null !== $document && $obj->document = $document;
        null !== $email && $obj->email = $email;
        null !== $firstName && $obj->firstName = $firstName;
        null !== $hasFields && $obj->hasFields = $hasFields;
        null !== $lastName && $obj->lastName = $lastName;
        null !== $order && $obj->order = $order;
        null !== $resourceUri && $obj->resourceUri = $resourceUri;
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
        $obj->firstName = $firstName;

        return $obj;
    }

    public function withHasFields(bool $hasFields): self
    {
        $obj = clone $this;
        $obj->hasFields = $hasFields;

        return $obj;
    }

    public function withLastName(string $lastName): self
    {
        $obj = clone $this;
        $obj->lastName = $lastName;

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
        $obj->resourceUri = $resourceUri;

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
