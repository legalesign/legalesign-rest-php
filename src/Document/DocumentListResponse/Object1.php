<?php

declare(strict_types=1);

namespace LegalesignSDK\Document\DocumentListResponse;

use LegalesignSDK\Core\Attributes\Api;
use LegalesignSDK\Core\Concerns\SdkModel;
use LegalesignSDK\Core\Contracts\BaseModel;
use LegalesignSDK\Core\Conversion\ListOf;
use LegalesignSDK\Document\DocumentStatusEnum;

/**
 * @phpstan-type Object1Shape = array{
 *   archived?: bool|null,
 *   auto_archive?: bool|null,
 *   cc_emails?: string|null,
 *   created?: \DateTimeInterface|null,
 *   do_email?: bool|null,
 *   download_final?: bool|null,
 *   group?: string|null,
 *   modified?: \DateTimeInterface|null,
 *   name?: string|null,
 *   pdftext?: string|null,
 *   redirect?: string|null,
 *   resource_uri?: string|null,
 *   return_signer_links?: bool|null,
 *   signers?: list<list<string>>|null,
 *   signers_in_order?: null|0|1,
 *   status?: null|10|20|30|40|50,
 *   tag?: string|null,
 *   tag1?: string|null,
 *   tag2?: string|null,
 *   template?: string|null,
 *   templatepdf?: string|null,
 *   text?: string|null,
 *   user?: string|null,
 *   uuid?: string|null,
 * }
 */
final class Object1 implements BaseModel
{
    /** @use SdkModel<Object1Shape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?bool $archived;

    #[Api(optional: true)]
    public ?bool $auto_archive;

    #[Api(optional: true)]
    public ?string $cc_emails;

    #[Api(optional: true)]
    public ?\DateTimeInterface $created;

    #[Api(optional: true)]
    public ?bool $do_email;

    #[Api(optional: true)]
    public ?bool $download_final;

    #[Api(optional: true)]
    public ?string $group;

    #[Api(optional: true)]
    public ?\DateTimeInterface $modified;

    #[Api(optional: true)]
    public ?string $name;

    #[Api(optional: true)]
    public ?string $pdftext;

    #[Api(optional: true)]
    public ?string $redirect;

    #[Api(optional: true)]
    public ?string $resource_uri;

    #[Api(optional: true)]
    public ?bool $return_signer_links;

    /**
     * nested arrays with signer details.
     *
     * @var list<list<string>>|null $signers
     */
    #[Api(list: new ListOf('string'), optional: true)]
    public ?array $signers;

    /** @var 0|1|null $signers_in_order */
    #[Api(optional: true)]
    public ?int $signers_in_order;

    /**
     * Document status options:
     *   * 10 - Initial state, check signer status for sent/unsent
     *   * 20 - Fields completed
     *   * 30 - Signed
     *   * 40 - Removed (before signing)
     *   * 50 - Rejected
     *
     * @var 10|20|30|40|50|null $status
     */
    #[Api(enum: DocumentStatusEnum::class, optional: true)]
    public ?int $status;

    #[Api(optional: true)]
    public ?string $tag;

    #[Api(optional: true)]
    public ?string $tag1;

    #[Api(optional: true)]
    public ?string $tag2;

    #[Api(nullable: true, optional: true)]
    public ?string $template;

    #[Api(nullable: true, optional: true)]
    public ?string $templatepdf;

    #[Api(nullable: true, optional: true)]
    public ?string $text;

    #[Api(optional: true)]
    public ?string $user;

    #[Api(optional: true)]
    public ?string $uuid;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<list<string>> $signers
     * @param 0|1 $signers_in_order
     * @param 10|20|30|40|50 $status
     */
    public static function with(
        ?bool $archived = null,
        ?bool $auto_archive = null,
        ?string $cc_emails = null,
        ?\DateTimeInterface $created = null,
        ?bool $do_email = null,
        ?bool $download_final = null,
        ?string $group = null,
        ?\DateTimeInterface $modified = null,
        ?string $name = null,
        ?string $pdftext = null,
        ?string $redirect = null,
        ?string $resource_uri = null,
        ?bool $return_signer_links = null,
        ?array $signers = null,
        ?int $signers_in_order = null,
        ?int $status = null,
        ?string $tag = null,
        ?string $tag1 = null,
        ?string $tag2 = null,
        ?string $template = null,
        ?string $templatepdf = null,
        ?string $text = null,
        ?string $user = null,
        ?string $uuid = null,
    ): self {
        $obj = new self;

        null !== $archived && $obj->archived = $archived;
        null !== $auto_archive && $obj->auto_archive = $auto_archive;
        null !== $cc_emails && $obj->cc_emails = $cc_emails;
        null !== $created && $obj->created = $created;
        null !== $do_email && $obj->do_email = $do_email;
        null !== $download_final && $obj->download_final = $download_final;
        null !== $group && $obj->group = $group;
        null !== $modified && $obj->modified = $modified;
        null !== $name && $obj->name = $name;
        null !== $pdftext && $obj->pdftext = $pdftext;
        null !== $redirect && $obj->redirect = $redirect;
        null !== $resource_uri && $obj->resource_uri = $resource_uri;
        null !== $return_signer_links && $obj->return_signer_links = $return_signer_links;
        null !== $signers && $obj->signers = $signers;
        null !== $signers_in_order && $obj->signers_in_order = $signers_in_order;
        null !== $status && $obj->status = $status;
        null !== $tag && $obj->tag = $tag;
        null !== $tag1 && $obj->tag1 = $tag1;
        null !== $tag2 && $obj->tag2 = $tag2;
        null !== $template && $obj->template = $template;
        null !== $templatepdf && $obj->templatepdf = $templatepdf;
        null !== $text && $obj->text = $text;
        null !== $user && $obj->user = $user;
        null !== $uuid && $obj->uuid = $uuid;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    public function withAutoArchive(bool $autoArchive): self
    {
        $obj = clone $this;
        $obj->auto_archive = $autoArchive;

        return $obj;
    }

    public function withCcEmails(string $ccEmails): self
    {
        $obj = clone $this;
        $obj->cc_emails = $ccEmails;

        return $obj;
    }

    public function withCreated(\DateTimeInterface $created): self
    {
        $obj = clone $this;
        $obj->created = $created;

        return $obj;
    }

    public function withDoEmail(bool $doEmail): self
    {
        $obj = clone $this;
        $obj->do_email = $doEmail;

        return $obj;
    }

    public function withDownloadFinal(bool $downloadFinal): self
    {
        $obj = clone $this;
        $obj->download_final = $downloadFinal;

        return $obj;
    }

    public function withGroup(string $group): self
    {
        $obj = clone $this;
        $obj->group = $group;

        return $obj;
    }

    public function withModified(\DateTimeInterface $modified): self
    {
        $obj = clone $this;
        $obj->modified = $modified;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withPdftext(string $pdftext): self
    {
        $obj = clone $this;
        $obj->pdftext = $pdftext;

        return $obj;
    }

    public function withRedirect(string $redirect): self
    {
        $obj = clone $this;
        $obj->redirect = $redirect;

        return $obj;
    }

    public function withResourceUri(string $resourceUri): self
    {
        $obj = clone $this;
        $obj->resource_uri = $resourceUri;

        return $obj;
    }

    public function withReturnSignerLinks(bool $returnSignerLinks): self
    {
        $obj = clone $this;
        $obj->return_signer_links = $returnSignerLinks;

        return $obj;
    }

    /**
     * nested arrays with signer details.
     *
     * @param list<list<string>> $signers
     */
    public function withSigners(array $signers): self
    {
        $obj = clone $this;
        $obj->signers = $signers;

        return $obj;
    }

    /**
     * @param 0|1 $signersInOrder
     */
    public function withSignersInOrder(int $signersInOrder): self
    {
        $obj = clone $this;
        $obj->signers_in_order = $signersInOrder;

        return $obj;
    }

    /**
     * Document status options:
     *   * 10 - Initial state, check signer status for sent/unsent
     *   * 20 - Fields completed
     *   * 30 - Signed
     *   * 40 - Removed (before signing)
     *   * 50 - Rejected
     *
     * @param 10|20|30|40|50 $status
     */
    public function withStatus(int $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }

    public function withTag(string $tag): self
    {
        $obj = clone $this;
        $obj->tag = $tag;

        return $obj;
    }

    public function withTag1(string $tag1): self
    {
        $obj = clone $this;
        $obj->tag1 = $tag1;

        return $obj;
    }

    public function withTag2(string $tag2): self
    {
        $obj = clone $this;
        $obj->tag2 = $tag2;

        return $obj;
    }

    public function withTemplate(?string $template): self
    {
        $obj = clone $this;
        $obj->template = $template;

        return $obj;
    }

    public function withTemplatepdf(?string $templatepdf): self
    {
        $obj = clone $this;
        $obj->templatepdf = $templatepdf;

        return $obj;
    }

    public function withText(?string $text): self
    {
        $obj = clone $this;
        $obj->text = $text;

        return $obj;
    }

    public function withUser(string $user): self
    {
        $obj = clone $this;
        $obj->user = $user;

        return $obj;
    }

    public function withUuid(string $uuid): self
    {
        $obj = clone $this;
        $obj->uuid = $uuid;

        return $obj;
    }
}
