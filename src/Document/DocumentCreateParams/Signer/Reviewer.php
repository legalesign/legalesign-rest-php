<?php

declare(strict_types=1);

namespace LegalesignSDK\Document\DocumentCreateParams\Signer;

use LegalesignSDK\Core\Attributes\Api;
use LegalesignSDK\Core\Concerns\SdkModel;
use LegalesignSDK\Core\Contracts\BaseModel;

/**
 * Create a reviewer. A reviewer is linked to a signer and  receives emailed copies of draft and signed documents. N.B. they only receive them if their associated signer does. Therefore make sure your admin/experience settings are set to attach PDFs to your signer emails. You can set to include the signing link to a reviewer, and thereby hit the use case to send a document to a group of people where the first who signs, signs.
 *
 * @phpstan-type ReviewerShape = array{
 *   email: string,
 *   firstname?: string|null,
 *   include_link?: bool|null,
 *   lastname?: string|null,
 * }
 */
final class Reviewer implements BaseModel
{
    /** @use SdkModel<ReviewerShape> */
    use SdkModel;

    #[Api]
    public string $email;

    #[Api(optional: true)]
    public ?string $firstname;

    /**
     * include a link to the signing pages enabling a reviewer to signer.
     */
    #[Api(optional: true)]
    public ?bool $include_link;

    #[Api(optional: true)]
    public ?string $lastname;

    /**
     * `new Reviewer()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Reviewer::with(email: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Reviewer)->withEmail(...)
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
        string $email,
        ?string $firstname = null,
        ?bool $include_link = null,
        ?string $lastname = null,
    ): self {
        $obj = new self;

        $obj->email = $email;

        null !== $firstname && $obj->firstname = $firstname;
        null !== $include_link && $obj->include_link = $include_link;
        null !== $lastname && $obj->lastname = $lastname;

        return $obj;
    }

    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

        return $obj;
    }

    public function withFirstname(string $firstname): self
    {
        $obj = clone $this;
        $obj->firstname = $firstname;

        return $obj;
    }

    /**
     * include a link to the signing pages enabling a reviewer to signer.
     */
    public function withIncludeLink(bool $includeLink): self
    {
        $obj = clone $this;
        $obj->include_link = $includeLink;

        return $obj;
    }

    public function withLastname(string $lastname): self
    {
        $obj = clone $this;
        $obj->lastname = $lastname;

        return $obj;
    }
}
