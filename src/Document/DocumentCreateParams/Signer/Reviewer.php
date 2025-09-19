<?php

declare(strict_types=1);

namespace Legalesign\Document\DocumentCreateParams\Signer;

use Legalesign\Core\Attributes\Api;
use Legalesign\Core\Concerns\SdkModel;
use Legalesign\Core\Contracts\BaseModel;

/**
 * Create a reviewer. A reviewer is linked to a signer and  receives emailed copies of draft and signed documents. N.B. they only receive them if their associated signer does. Therefore make sure your admin/experience settings are set to attach PDFs to your signer emails. You can set to include the signing link to a reviewer, and thereby hit the use case to send a document to a group of people where the first who signs, signs.
 *
 * @phpstan-type reviewer_alias = array{
 *   email: string, firstname?: string, includeLink?: bool, lastname?: string
 * }
 */
final class Reviewer implements BaseModel
{
    /** @use SdkModel<reviewer_alias> */
    use SdkModel;

    #[Api]
    public string $email;

    #[Api(optional: true)]
    public ?string $firstname;

    /**
     * include a link to the signing pages enabling a reviewer to signer.
     */
    #[Api('include_link', optional: true)]
    public ?bool $includeLink;

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
        ?bool $includeLink = null,
        ?string $lastname = null,
    ): self {
        $obj = new self;

        $obj->email = $email;

        null !== $firstname && $obj->firstname = $firstname;
        null !== $includeLink && $obj->includeLink = $includeLink;
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
        $obj->includeLink = $includeLink;

        return $obj;
    }

    public function withLastname(string $lastname): self
    {
        $obj = clone $this;
        $obj->lastname = $lastname;

        return $obj;
    }
}
