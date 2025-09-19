<?php

declare(strict_types=1);

namespace Legalesign\Document\DocumentListResponse;

use Legalesign\Core\Attributes\Api;
use Legalesign\Core\Concerns\SdkModel;
use Legalesign\Core\Contracts\BaseModel;
use Legalesign\Core\Conversion\ListOf;
use Legalesign\Document\DocumentListResponse\Object1\SignersInOrder;
use Legalesign\Document\DocumentStatusEnum;

/**
 * @phpstan-type object1_alias = array{
 *   archived?: bool,
 *   autoArchive?: bool,
 *   ccEmails?: string,
 *   created?: \DateTimeInterface,
 *   doEmail?: bool,
 *   downloadFinal?: bool,
 *   group?: string,
 *   modified?: \DateTimeInterface,
 *   name?: string,
 *   pdftext?: string,
 *   redirect?: string,
 *   resourceUri?: string,
 *   returnSignerLinks?: bool,
 *   signers?: list<list<string>>,
 *   signersInOrder?: value-of<SignersInOrder>,
 *   status?: value-of<DocumentStatusEnum>,
 *   tag?: string,
 *   tag1?: string,
 *   tag2?: string,
 *   template?: string|null,
 *   templatepdf?: string|null,
 *   text?: string|null,
 *   user?: string,
 *   uuid?: string,
 * }
 */
final class Object1 implements BaseModel
{
    /** @use SdkModel<object1_alias> */
    use SdkModel;

    #[Api(optional: true)]
    public ?bool $archived;

    #[Api('auto_archive', optional: true)]
    public ?bool $autoArchive;

    #[Api('cc_emails', optional: true)]
    public ?string $ccEmails;

    #[Api(optional: true)]
    public ?\DateTimeInterface $created;

    #[Api('do_email', optional: true)]
    public ?bool $doEmail;

    #[Api('download_final', optional: true)]
    public ?bool $downloadFinal;

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

    #[Api('resource_uri', optional: true)]
    public ?string $resourceUri;

    #[Api('return_signer_links', optional: true)]
    public ?bool $returnSignerLinks;

    /**
     * nested arrays with signer details.
     *
     * @var list<list<string>>|null $signers
     */
    #[Api(list: new ListOf('string'), optional: true)]
    public ?array $signers;

    /** @var value-of<SignersInOrder>|null $signersInOrder */
    #[Api('signers_in_order', enum: SignersInOrder::class, optional: true)]
    public ?int $signersInOrder;

    /**
     * Document status options:
     *   * 10 - Initial state, check signer status for sent/unsent
     *   * 20 - Fields completed
     *   * 30 - Signed
     *   * 40 - Removed (before signing)
     *   * 50 - Rejected
     *
     * @var value-of<DocumentStatusEnum>|null $status
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
     * @param SignersInOrder|value-of<SignersInOrder> $signersInOrder
     * @param DocumentStatusEnum|value-of<DocumentStatusEnum> $status
     */
    public static function with(
        ?bool $archived = null,
        ?bool $autoArchive = null,
        ?string $ccEmails = null,
        ?\DateTimeInterface $created = null,
        ?bool $doEmail = null,
        ?bool $downloadFinal = null,
        ?string $group = null,
        ?\DateTimeInterface $modified = null,
        ?string $name = null,
        ?string $pdftext = null,
        ?string $redirect = null,
        ?string $resourceUri = null,
        ?bool $returnSignerLinks = null,
        ?array $signers = null,
        SignersInOrder|int|null $signersInOrder = null,
        DocumentStatusEnum|int|null $status = null,
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
        null !== $autoArchive && $obj->autoArchive = $autoArchive;
        null !== $ccEmails && $obj->ccEmails = $ccEmails;
        null !== $created && $obj->created = $created;
        null !== $doEmail && $obj->doEmail = $doEmail;
        null !== $downloadFinal && $obj->downloadFinal = $downloadFinal;
        null !== $group && $obj->group = $group;
        null !== $modified && $obj->modified = $modified;
        null !== $name && $obj->name = $name;
        null !== $pdftext && $obj->pdftext = $pdftext;
        null !== $redirect && $obj->redirect = $redirect;
        null !== $resourceUri && $obj->resourceUri = $resourceUri;
        null !== $returnSignerLinks && $obj->returnSignerLinks = $returnSignerLinks;
        null !== $signers && $obj->signers = $signers;
        null !== $signersInOrder && $obj->signersInOrder = $signersInOrder instanceof SignersInOrder ? $signersInOrder->value : $signersInOrder;
        null !== $status && $obj->status = $status instanceof DocumentStatusEnum ? $status->value : $status;
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
        $obj->autoArchive = $autoArchive;

        return $obj;
    }

    public function withCcEmails(string $ccEmails): self
    {
        $obj = clone $this;
        $obj->ccEmails = $ccEmails;

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
        $obj->doEmail = $doEmail;

        return $obj;
    }

    public function withDownloadFinal(bool $downloadFinal): self
    {
        $obj = clone $this;
        $obj->downloadFinal = $downloadFinal;

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
        $obj->resourceUri = $resourceUri;

        return $obj;
    }

    public function withReturnSignerLinks(bool $returnSignerLinks): self
    {
        $obj = clone $this;
        $obj->returnSignerLinks = $returnSignerLinks;

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
     * @param SignersInOrder|value-of<SignersInOrder> $signersInOrder
     */
    public function withSignersInOrder(SignersInOrder|int $signersInOrder): self
    {
        $obj = clone $this;
        $obj->signersInOrder = $signersInOrder instanceof SignersInOrder ? $signersInOrder->value : $signersInOrder;

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
     * @param DocumentStatusEnum|value-of<DocumentStatusEnum> $status
     */
    public function withStatus(DocumentStatusEnum|int $status): self
    {
        $obj = clone $this;
        $obj->status = $status instanceof DocumentStatusEnum ? $status->value : $status;

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
