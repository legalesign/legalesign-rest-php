<?php

declare(strict_types=1);

namespace Legalesign\Document;

use Legalesign\Core\Attributes\Api;
use Legalesign\Core\Concerns\SdkModel;
use Legalesign\Core\Contracts\BaseModel;
use Legalesign\Core\Conversion\ListOf;

/**
 * @phpstan-type document_get_response = array{
 *   archived?: bool,
 *   autoArchive?: bool,
 *   ccEmails?: string,
 *   created?: \DateTimeInterface,
 *   doEmail?: bool,
 *   downloadFinal?: bool,
 *   footer?: string,
 *   footerHeight?: int,
 *   group?: string,
 *   hasFields?: bool,
 *   hashValue?: string,
 *   header?: string,
 *   headerHeight?: int,
 *   modified?: \DateTimeInterface,
 *   name?: string,
 *   pdfPassword?: string,
 *   pdfPasswordType?: string,
 *   pdftext?: string,
 *   redirect?: string,
 *   resourceUri?: string,
 *   returnSignerLinks?: bool,
 *   signMouse?: bool,
 *   signTime?: \DateTimeInterface,
 *   signType?: bool,
 *   signUpload?: bool,
 *   signaturePlacement?: int,
 *   signatureType?: int,
 *   signers?: list<list<string>>,
 *   signersInOrder?: bool,
 *   status?: value-of<DocumentStatusEnum>,
 *   tag?: string,
 *   tag1?: string,
 *   tag2?: string,
 *   template?: string,
 *   templatepdf?: string,
 *   text?: string,
 *   user?: string,
 *   uuid?: string,
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class DocumentGetResponse implements BaseModel
{
    /** @use SdkModel<document_get_response> */
    use SdkModel;

    #[Api(optional: true)]
    public ?bool $archived;

    /**
     * Send document archive very soon after signing.
     */
    #[Api('auto_archive', optional: true)]
    public ?bool $autoArchive;

    /**
     * who will be cc'd  with sender on email notification when signed.
     */
    #[Api('cc_emails', optional: true)]
    public ?string $ccEmails;

    #[Api(optional: true)]
    public ?\DateTimeInterface $created;

    #[Api('do_email', optional: true)]
    public ?bool $doEmail;

    /**
     * Final PDF is available to download.
     */
    #[Api('download_final', optional: true)]
    public ?bool $downloadFinal;

    /**
     * HTML docs - text for footer if used.
     */
    #[Api(optional: true)]
    public ?string $footer;

    /**
     * HTMl docs - px height of footer if used.
     */
    #[Api('footer_height', optional: true)]
    public ?int $footerHeight;

    /**
     * Resource URI of group.
     */
    #[Api(optional: true)]
    public ?string $group;

    #[Api('has_fields', optional: true)]
    public ?bool $hasFields;

    /**
     * SHA256 checksum of final doc, use this to validate your final PDF download.
     */
    #[Api('hash_value', optional: true)]
    public ?string $hashValue;

    /**
     * HTML docs - text for header if used.
     */
    #[Api(optional: true)]
    public ?string $header;

    /**
     * HTMl docs - px height of header if used.
     */
    #[Api('header_height', optional: true)]
    public ?int $headerHeight;

    #[Api(optional: true)]
    public ?\DateTimeInterface $modified;

    #[Api(optional: true)]
    public ?string $name;

    /**
     * PDF password if used and if save-able.
     */
    #[Api('pdf_password', optional: true)]
    public ?string $pdfPassword;

    /**
     * how pdf password is retained.
     */
    #[Api('pdf_password_type', optional: true)]
    public ?string $pdfPasswordType;

    /**
     * ignore this.
     */
    #[Api(optional: true)]
    public ?string $pdftext;

    /**
     * url for signer redirect after signing.
     */
    #[Api(optional: true)]
    public ?string $redirect;

    #[Api('resource_uri', optional: true)]
    public ?string $resourceUri;

    /**
     * ignore.
     */
    #[Api('return_signer_links', optional: true)]
    public ?bool $returnSignerLinks;

    /**
     * legacy.
     */
    #[Api('sign_mouse', optional: true)]
    public ?bool $signMouse;

    #[Api('sign_time', optional: true)]
    public ?\DateTimeInterface $signTime;

    /**
     * legacy.
     */
    #[Api('sign_type', optional: true)]
    public ?bool $signType;

    /**
     * legacy.
     */
    #[Api('sign_upload', optional: true)]
    public ?bool $signUpload;

    /**
     * legacy.
     */
    #[Api('signature_placement', optional: true)]
    public ?int $signaturePlacement;

    /**
     * legacy - always 4.
     */
    #[Api('signature_type', optional: true)]
    public ?int $signatureType;

    /**
     * nested arrays with signer details.
     *
     * @var list<list<string>>|null $signers
     */
    #[Api(list: new ListOf('string'), optional: true)]
    public ?array $signers;

    #[Api('signers_in_order', optional: true)]
    public ?bool $signersInOrder;

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

    /**
     * your reference.
     */
    #[Api(optional: true)]
    public ?string $tag;

    /**
     * your reference.
     */
    #[Api(optional: true)]
    public ?string $tag1;

    /**
     * your reference.
     */
    #[Api(optional: true)]
    public ?string $tag2;

    #[Api(optional: true)]
    public ?string $template;

    #[Api(optional: true)]
    public ?string $templatepdf;

    #[Api(optional: true)]
    public ?string $text;

    /**
     * Resource URI of user.
     */
    #[Api(optional: true)]
    public ?string $user;

    /**
     * Object ID alone.
     */
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
     * @param DocumentStatusEnum|value-of<DocumentStatusEnum> $status
     */
    public static function with(
        ?bool $archived = null,
        ?bool $autoArchive = null,
        ?string $ccEmails = null,
        ?\DateTimeInterface $created = null,
        ?bool $doEmail = null,
        ?bool $downloadFinal = null,
        ?string $footer = null,
        ?int $footerHeight = null,
        ?string $group = null,
        ?bool $hasFields = null,
        ?string $hashValue = null,
        ?string $header = null,
        ?int $headerHeight = null,
        ?\DateTimeInterface $modified = null,
        ?string $name = null,
        ?string $pdfPassword = null,
        ?string $pdfPasswordType = null,
        ?string $pdftext = null,
        ?string $redirect = null,
        ?string $resourceUri = null,
        ?bool $returnSignerLinks = null,
        ?bool $signMouse = null,
        ?\DateTimeInterface $signTime = null,
        ?bool $signType = null,
        ?bool $signUpload = null,
        ?int $signaturePlacement = null,
        ?int $signatureType = null,
        ?array $signers = null,
        ?bool $signersInOrder = null,
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
        null !== $footer && $obj->footer = $footer;
        null !== $footerHeight && $obj->footerHeight = $footerHeight;
        null !== $group && $obj->group = $group;
        null !== $hasFields && $obj->hasFields = $hasFields;
        null !== $hashValue && $obj->hashValue = $hashValue;
        null !== $header && $obj->header = $header;
        null !== $headerHeight && $obj->headerHeight = $headerHeight;
        null !== $modified && $obj->modified = $modified;
        null !== $name && $obj->name = $name;
        null !== $pdfPassword && $obj->pdfPassword = $pdfPassword;
        null !== $pdfPasswordType && $obj->pdfPasswordType = $pdfPasswordType;
        null !== $pdftext && $obj->pdftext = $pdftext;
        null !== $redirect && $obj->redirect = $redirect;
        null !== $resourceUri && $obj->resourceUri = $resourceUri;
        null !== $returnSignerLinks && $obj->returnSignerLinks = $returnSignerLinks;
        null !== $signMouse && $obj->signMouse = $signMouse;
        null !== $signTime && $obj->signTime = $signTime;
        null !== $signType && $obj->signType = $signType;
        null !== $signUpload && $obj->signUpload = $signUpload;
        null !== $signaturePlacement && $obj->signaturePlacement = $signaturePlacement;
        null !== $signatureType && $obj->signatureType = $signatureType;
        null !== $signers && $obj->signers = $signers;
        null !== $signersInOrder && $obj->signersInOrder = $signersInOrder;
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

    /**
     * Send document archive very soon after signing.
     */
    public function withAutoArchive(bool $autoArchive): self
    {
        $obj = clone $this;
        $obj->autoArchive = $autoArchive;

        return $obj;
    }

    /**
     * who will be cc'd  with sender on email notification when signed.
     */
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

    /**
     * Final PDF is available to download.
     */
    public function withDownloadFinal(bool $downloadFinal): self
    {
        $obj = clone $this;
        $obj->downloadFinal = $downloadFinal;

        return $obj;
    }

    /**
     * HTML docs - text for footer if used.
     */
    public function withFooter(string $footer): self
    {
        $obj = clone $this;
        $obj->footer = $footer;

        return $obj;
    }

    /**
     * HTMl docs - px height of footer if used.
     */
    public function withFooterHeight(int $footerHeight): self
    {
        $obj = clone $this;
        $obj->footerHeight = $footerHeight;

        return $obj;
    }

    /**
     * Resource URI of group.
     */
    public function withGroup(string $group): self
    {
        $obj = clone $this;
        $obj->group = $group;

        return $obj;
    }

    public function withHasFields(bool $hasFields): self
    {
        $obj = clone $this;
        $obj->hasFields = $hasFields;

        return $obj;
    }

    /**
     * SHA256 checksum of final doc, use this to validate your final PDF download.
     */
    public function withHashValue(string $hashValue): self
    {
        $obj = clone $this;
        $obj->hashValue = $hashValue;

        return $obj;
    }

    /**
     * HTML docs - text for header if used.
     */
    public function withHeader(string $header): self
    {
        $obj = clone $this;
        $obj->header = $header;

        return $obj;
    }

    /**
     * HTMl docs - px height of header if used.
     */
    public function withHeaderHeight(int $headerHeight): self
    {
        $obj = clone $this;
        $obj->headerHeight = $headerHeight;

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

    /**
     * PDF password if used and if save-able.
     */
    public function withPdfPassword(string $pdfPassword): self
    {
        $obj = clone $this;
        $obj->pdfPassword = $pdfPassword;

        return $obj;
    }

    /**
     * how pdf password is retained.
     */
    public function withPdfPasswordType(string $pdfPasswordType): self
    {
        $obj = clone $this;
        $obj->pdfPasswordType = $pdfPasswordType;

        return $obj;
    }

    /**
     * ignore this.
     */
    public function withPdftext(string $pdftext): self
    {
        $obj = clone $this;
        $obj->pdftext = $pdftext;

        return $obj;
    }

    /**
     * url for signer redirect after signing.
     */
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

    /**
     * ignore.
     */
    public function withReturnSignerLinks(bool $returnSignerLinks): self
    {
        $obj = clone $this;
        $obj->returnSignerLinks = $returnSignerLinks;

        return $obj;
    }

    /**
     * legacy.
     */
    public function withSignMouse(bool $signMouse): self
    {
        $obj = clone $this;
        $obj->signMouse = $signMouse;

        return $obj;
    }

    public function withSignTime(\DateTimeInterface $signTime): self
    {
        $obj = clone $this;
        $obj->signTime = $signTime;

        return $obj;
    }

    /**
     * legacy.
     */
    public function withSignType(bool $signType): self
    {
        $obj = clone $this;
        $obj->signType = $signType;

        return $obj;
    }

    /**
     * legacy.
     */
    public function withSignUpload(bool $signUpload): self
    {
        $obj = clone $this;
        $obj->signUpload = $signUpload;

        return $obj;
    }

    /**
     * legacy.
     */
    public function withSignaturePlacement(int $signaturePlacement): self
    {
        $obj = clone $this;
        $obj->signaturePlacement = $signaturePlacement;

        return $obj;
    }

    /**
     * legacy - always 4.
     */
    public function withSignatureType(int $signatureType): self
    {
        $obj = clone $this;
        $obj->signatureType = $signatureType;

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

    public function withSignersInOrder(bool $signersInOrder): self
    {
        $obj = clone $this;
        $obj->signersInOrder = $signersInOrder;

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

    /**
     * your reference.
     */
    public function withTag(string $tag): self
    {
        $obj = clone $this;
        $obj->tag = $tag;

        return $obj;
    }

    /**
     * your reference.
     */
    public function withTag1(string $tag1): self
    {
        $obj = clone $this;
        $obj->tag1 = $tag1;

        return $obj;
    }

    /**
     * your reference.
     */
    public function withTag2(string $tag2): self
    {
        $obj = clone $this;
        $obj->tag2 = $tag2;

        return $obj;
    }

    public function withTemplate(string $template): self
    {
        $obj = clone $this;
        $obj->template = $template;

        return $obj;
    }

    public function withTemplatepdf(string $templatepdf): self
    {
        $obj = clone $this;
        $obj->templatepdf = $templatepdf;

        return $obj;
    }

    public function withText(string $text): self
    {
        $obj = clone $this;
        $obj->text = $text;

        return $obj;
    }

    /**
     * Resource URI of user.
     */
    public function withUser(string $user): self
    {
        $obj = clone $this;
        $obj->user = $user;

        return $obj;
    }

    /**
     * Object ID alone.
     */
    public function withUuid(string $uuid): self
    {
        $obj = clone $this;
        $obj->uuid = $uuid;

        return $obj;
    }
}
