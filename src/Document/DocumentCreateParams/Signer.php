<?php

declare(strict_types=1);

namespace LegalesignSDK\Document\DocumentCreateParams;

use LegalesignSDK\Core\Attributes\Api;
use LegalesignSDK\Core\Concerns\SdkModel;
use LegalesignSDK\Core\Contracts\BaseModel;
use LegalesignSDK\Document\DocumentCreateParams\Signer\Reviewer;
use LegalesignSDK\Document\DocumentCreateParams\Signer\Role;

/**
 * @phpstan-type signer_alias = array{
 *   email: string,
 *   firstname: string,
 *   lastname: string,
 *   attachments?: list<string>,
 *   behalfof?: string,
 *   decideLater?: bool,
 *   expires?: \DateTimeInterface|null,
 *   message?: string,
 *   order?: int,
 *   reviewers?: list<Reviewer>,
 *   role?: value-of<Role>,
 *   sms?: string,
 *   subject?: string,
 *   timezone?: string,
 * }
 */
final class Signer implements BaseModel
{
    /** @use SdkModel<signer_alias> */
    use SdkModel;

    #[Api]
    public string $email;

    #[Api]
    public string $firstname;

    #[Api]
    public string $lastname;

    /**
     * List of attachment resource URIs.
     *
     * @var list<string>|null $attachments
     */
    #[Api(list: 'string', optional: true)]
    public ?array $attachments;

    /**
     * @deprecated
     *
     * deprecated, do not use
     */
    #[Api(optional: true)]
    public ?string $behalfof;

    /**
     * Add this you want the previous signer or approver to decide who the next person should be.  Commonly used for witnesses (see \"role\"). If you use this leave all other attributes blank. First signer cannot use this attribute.
     */
    #[Api('decide_later', optional: true)]
    public ?bool $decideLater;

    /**
     * ISO8601 formed datetime, set to TZ of sender or timezone if used.
     */
    #[Api(nullable: true, optional: true)]
    public ?\DateTimeInterface $expires;

    /**
     * Your personal message for the party, entered in the centre of the group email template. Use the name of a saved email template preceeded by a hash symbol to use that template.  If there is more than one template of the same name it will select the one last modified.
     */
    #[Api(optional: true)]
    public ?string $message;

    /**
     * @deprecated
     *
     * Zero-indexed signer ordering, deprecated. Ordering of signers/witnesses/approvers is now the natural order of your signers list.
     */
    #[Api(optional: true)]
    public ?int $order;

    /** @var list<Reviewer>|null $reviewers */
    #[Api(list: Reviewer::class, optional: true)]
    public ?array $reviewers;

    /**
     * @deprecated
     *
     * If this person is a witness use \"witness\". Required where a witness is defined in your PDF. If this person is a normal signer, use \"approver\" to switch to an approver role.  Witnesses and witnessed signers also require \"sms\" (see also \"decide_later\").
     *
     * @var value-of<Role>|null $role
     */
    #[Api(enum: Role::class, optional: true)]
    public ?string $role;

    /**
     * Use international format number to add SMS verification. Required if a witness or a witnessed signer.
     */
    #[Api(optional: true)]
    public ?string $sms;

    /**
     * Subject line for outbound email.
     */
    #[Api(optional: true)]
    public ?string $subject;

    /**
     * TZ of the signer, must be valid TZ as per timezoneenum (see User for timezoneenum details).  If blank uses tz of the sender.
     */
    #[Api(optional: true)]
    public ?string $timezone;

    /**
     * `new Signer()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Signer::with(email: ..., firstname: ..., lastname: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Signer)->withEmail(...)->withFirstname(...)->withLastname(...)
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
     *
     * @param list<string> $attachments
     * @param list<Reviewer> $reviewers
     * @param Role|value-of<Role> $role
     */
    public static function with(
        string $email,
        string $firstname,
        string $lastname,
        ?array $attachments = null,
        ?string $behalfof = null,
        ?bool $decideLater = null,
        ?\DateTimeInterface $expires = null,
        ?string $message = null,
        ?int $order = null,
        ?array $reviewers = null,
        Role|string|null $role = null,
        ?string $sms = null,
        ?string $subject = null,
        ?string $timezone = null,
    ): self {
        $obj = new self;

        $obj->email = $email;
        $obj->firstname = $firstname;
        $obj->lastname = $lastname;

        null !== $attachments && $obj->attachments = $attachments;
        null !== $behalfof && $obj->behalfof = $behalfof;
        null !== $decideLater && $obj->decideLater = $decideLater;
        null !== $expires && $obj->expires = $expires;
        null !== $message && $obj->message = $message;
        null !== $order && $obj->order = $order;
        null !== $reviewers && $obj->reviewers = $reviewers;
        null !== $role && $obj->role = $role instanceof Role ? $role->value : $role;
        null !== $sms && $obj->sms = $sms;
        null !== $subject && $obj->subject = $subject;
        null !== $timezone && $obj->timezone = $timezone;

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

    public function withLastname(string $lastname): self
    {
        $obj = clone $this;
        $obj->lastname = $lastname;

        return $obj;
    }

    /**
     * List of attachment resource URIs.
     *
     * @param list<string> $attachments
     */
    public function withAttachments(array $attachments): self
    {
        $obj = clone $this;
        $obj->attachments = $attachments;

        return $obj;
    }

    /**
     * deprecated, do not use.
     */
    public function withBehalfof(string $behalfof): self
    {
        $obj = clone $this;
        $obj->behalfof = $behalfof;

        return $obj;
    }

    /**
     * Add this you want the previous signer or approver to decide who the next person should be.  Commonly used for witnesses (see \"role\"). If you use this leave all other attributes blank. First signer cannot use this attribute.
     */
    public function withDecideLater(bool $decideLater): self
    {
        $obj = clone $this;
        $obj->decideLater = $decideLater;

        return $obj;
    }

    /**
     * ISO8601 formed datetime, set to TZ of sender or timezone if used.
     */
    public function withExpires(?\DateTimeInterface $expires): self
    {
        $obj = clone $this;
        $obj->expires = $expires;

        return $obj;
    }

    /**
     * Your personal message for the party, entered in the centre of the group email template. Use the name of a saved email template preceeded by a hash symbol to use that template.  If there is more than one template of the same name it will select the one last modified.
     */
    public function withMessage(string $message): self
    {
        $obj = clone $this;
        $obj->message = $message;

        return $obj;
    }

    /**
     * Zero-indexed signer ordering, deprecated. Ordering of signers/witnesses/approvers is now the natural order of your signers list.
     */
    public function withOrder(int $order): self
    {
        $obj = clone $this;
        $obj->order = $order;

        return $obj;
    }

    /**
     * @param list<Reviewer> $reviewers
     */
    public function withReviewers(array $reviewers): self
    {
        $obj = clone $this;
        $obj->reviewers = $reviewers;

        return $obj;
    }

    /**
     * If this person is a witness use \"witness\". Required where a witness is defined in your PDF. If this person is a normal signer, use \"approver\" to switch to an approver role.  Witnesses and witnessed signers also require \"sms\" (see also \"decide_later\").
     *
     * @param Role|value-of<Role> $role
     */
    public function withRole(Role|string $role): self
    {
        $obj = clone $this;
        $obj->role = $role instanceof Role ? $role->value : $role;

        return $obj;
    }

    /**
     * Use international format number to add SMS verification. Required if a witness or a witnessed signer.
     */
    public function withSMS(string $sms): self
    {
        $obj = clone $this;
        $obj->sms = $sms;

        return $obj;
    }

    /**
     * Subject line for outbound email.
     */
    public function withSubject(string $subject): self
    {
        $obj = clone $this;
        $obj->subject = $subject;

        return $obj;
    }

    /**
     * TZ of the signer, must be valid TZ as per timezoneenum (see User for timezoneenum details).  If blank uses tz of the sender.
     */
    public function withTimezone(string $timezone): self
    {
        $obj = clone $this;
        $obj->timezone = $timezone;

        return $obj;
    }
}
