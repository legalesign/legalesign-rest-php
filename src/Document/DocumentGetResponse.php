<?php

declare(strict_types=1);

namespace LegalesignSDK\Document;

use LegalesignSDK\Core\Attributes\Api;
use LegalesignSDK\Core\Concerns\SdkModel;
use LegalesignSDK\Core\Concerns\SdkResponse;
use LegalesignSDK\Core\Contracts\BaseModel;
use LegalesignSDK\Core\Conversion\Contracts\ResponseConverter;
use LegalesignSDK\Core\Conversion\ListOf;

/**
 * @phpstan-type DocumentGetResponseShape = array{
 *   archived?: bool|null,
 *   auto_archive?: bool|null,
 *   cc_emails?: string|null,
 *   created?: \DateTimeInterface|null,
 *   do_email?: bool|null,
 *   download_final?: bool|null,
 *   footer?: string|null,
 *   footer_height?: int|null,
 *   group?: string|null,
 *   has_fields?: bool|null,
 *   hash_value?: string|null,
 *   header?: string|null,
 *   header_height?: int|null,
 *   modified?: \DateTimeInterface|null,
 *   name?: string|null,
 *   pdf_password?: string|null,
 *   pdf_password_type?: string|null,
 *   pdftext?: string|null,
 *   redirect?: string|null,
 *   resource_uri?: string|null,
 *   return_signer_links?: bool|null,
 *   sign_mouse?: bool|null,
 *   sign_time?: \DateTimeInterface|null,
 *   sign_type?: bool|null,
 *   sign_upload?: bool|null,
 *   signature_placement?: int|null,
 *   signature_type?: int|null,
 *   signers?: list<list<string>>|null,
 *   signers_in_order?: bool|null,
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
final class DocumentGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<DocumentGetResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?bool $archived;

    /**
     * Send document archive very soon after signing.
     */
    #[Api(optional: true)]
    public ?bool $auto_archive;

    /**
     * who will be cc'd  with sender on email notification when signed.
     */
    #[Api(optional: true)]
    public ?string $cc_emails;

    #[Api(optional: true)]
    public ?\DateTimeInterface $created;

    #[Api(optional: true)]
    public ?bool $do_email;

    /**
     * Final PDF is available to download.
     */
    #[Api(optional: true)]
    public ?bool $download_final;

    /**
     * HTML docs - text for footer if used.
     */
    #[Api(optional: true)]
    public ?string $footer;

    /**
     * HTMl docs - px height of footer if used.
     */
    #[Api(optional: true)]
    public ?int $footer_height;

    /**
     * Resource URI of group.
     */
    #[Api(optional: true)]
    public ?string $group;

    #[Api(optional: true)]
    public ?bool $has_fields;

    /**
     * SHA256 checksum of final doc, use this to validate your final PDF download.
     */
    #[Api(optional: true)]
    public ?string $hash_value;

    /**
     * HTML docs - text for header if used.
     */
    #[Api(optional: true)]
    public ?string $header;

    /**
     * HTMl docs - px height of header if used.
     */
    #[Api(optional: true)]
    public ?int $header_height;

    #[Api(optional: true)]
    public ?\DateTimeInterface $modified;

    #[Api(optional: true)]
    public ?string $name;

    /**
     * PDF password if used and if save-able.
     */
    #[Api(optional: true)]
    public ?string $pdf_password;

    /**
     * how pdf password is retained.
     */
    #[Api(optional: true)]
    public ?string $pdf_password_type;

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

    #[Api(optional: true)]
    public ?string $resource_uri;

    /**
     * ignore.
     */
    #[Api(optional: true)]
    public ?bool $return_signer_links;

    /**
     * legacy.
     */
    #[Api(optional: true)]
    public ?bool $sign_mouse;

    #[Api(optional: true)]
    public ?\DateTimeInterface $sign_time;

    /**
     * legacy.
     */
    #[Api(optional: true)]
    public ?bool $sign_type;

    /**
     * legacy.
     */
    #[Api(optional: true)]
    public ?bool $sign_upload;

    /**
     * legacy.
     */
    #[Api(optional: true)]
    public ?int $signature_placement;

    /**
     * legacy - always 4.
     */
    #[Api(optional: true)]
    public ?int $signature_type;

    /**
     * nested arrays with signer details.
     *
     * @var list<list<string>>|null $signers
     */
    #[Api(list: new ListOf('string'), optional: true)]
    public ?array $signers;

    #[Api(optional: true)]
    public ?bool $signers_in_order;

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
     * @param 10|20|30|40|50 $status
     */
    public static function with(
        ?bool $archived = null,
        ?bool $auto_archive = null,
        ?string $cc_emails = null,
        ?\DateTimeInterface $created = null,
        ?bool $do_email = null,
        ?bool $download_final = null,
        ?string $footer = null,
        ?int $footer_height = null,
        ?string $group = null,
        ?bool $has_fields = null,
        ?string $hash_value = null,
        ?string $header = null,
        ?int $header_height = null,
        ?\DateTimeInterface $modified = null,
        ?string $name = null,
        ?string $pdf_password = null,
        ?string $pdf_password_type = null,
        ?string $pdftext = null,
        ?string $redirect = null,
        ?string $resource_uri = null,
        ?bool $return_signer_links = null,
        ?bool $sign_mouse = null,
        ?\DateTimeInterface $sign_time = null,
        ?bool $sign_type = null,
        ?bool $sign_upload = null,
        ?int $signature_placement = null,
        ?int $signature_type = null,
        ?array $signers = null,
        ?bool $signers_in_order = null,
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
        null !== $footer && $obj->footer = $footer;
        null !== $footer_height && $obj->footer_height = $footer_height;
        null !== $group && $obj->group = $group;
        null !== $has_fields && $obj->has_fields = $has_fields;
        null !== $hash_value && $obj->hash_value = $hash_value;
        null !== $header && $obj->header = $header;
        null !== $header_height && $obj->header_height = $header_height;
        null !== $modified && $obj->modified = $modified;
        null !== $name && $obj->name = $name;
        null !== $pdf_password && $obj->pdf_password = $pdf_password;
        null !== $pdf_password_type && $obj->pdf_password_type = $pdf_password_type;
        null !== $pdftext && $obj->pdftext = $pdftext;
        null !== $redirect && $obj->redirect = $redirect;
        null !== $resource_uri && $obj->resource_uri = $resource_uri;
        null !== $return_signer_links && $obj->return_signer_links = $return_signer_links;
        null !== $sign_mouse && $obj->sign_mouse = $sign_mouse;
        null !== $sign_time && $obj->sign_time = $sign_time;
        null !== $sign_type && $obj->sign_type = $sign_type;
        null !== $sign_upload && $obj->sign_upload = $sign_upload;
        null !== $signature_placement && $obj->signature_placement = $signature_placement;
        null !== $signature_type && $obj->signature_type = $signature_type;
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

    /**
     * Send document archive very soon after signing.
     */
    public function withAutoArchive(bool $autoArchive): self
    {
        $obj = clone $this;
        $obj->auto_archive = $autoArchive;

        return $obj;
    }

    /**
     * who will be cc'd  with sender on email notification when signed.
     */
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

    /**
     * Final PDF is available to download.
     */
    public function withDownloadFinal(bool $downloadFinal): self
    {
        $obj = clone $this;
        $obj->download_final = $downloadFinal;

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
        $obj->footer_height = $footerHeight;

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
        $obj->has_fields = $hasFields;

        return $obj;
    }

    /**
     * SHA256 checksum of final doc, use this to validate your final PDF download.
     */
    public function withHashValue(string $hashValue): self
    {
        $obj = clone $this;
        $obj->hash_value = $hashValue;

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
        $obj->header_height = $headerHeight;

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
        $obj->pdf_password = $pdfPassword;

        return $obj;
    }

    /**
     * how pdf password is retained.
     */
    public function withPdfPasswordType(string $pdfPasswordType): self
    {
        $obj = clone $this;
        $obj->pdf_password_type = $pdfPasswordType;

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
        $obj->resource_uri = $resourceUri;

        return $obj;
    }

    /**
     * ignore.
     */
    public function withReturnSignerLinks(bool $returnSignerLinks): self
    {
        $obj = clone $this;
        $obj->return_signer_links = $returnSignerLinks;

        return $obj;
    }

    /**
     * legacy.
     */
    public function withSignMouse(bool $signMouse): self
    {
        $obj = clone $this;
        $obj->sign_mouse = $signMouse;

        return $obj;
    }

    public function withSignTime(\DateTimeInterface $signTime): self
    {
        $obj = clone $this;
        $obj->sign_time = $signTime;

        return $obj;
    }

    /**
     * legacy.
     */
    public function withSignType(bool $signType): self
    {
        $obj = clone $this;
        $obj->sign_type = $signType;

        return $obj;
    }

    /**
     * legacy.
     */
    public function withSignUpload(bool $signUpload): self
    {
        $obj = clone $this;
        $obj->sign_upload = $signUpload;

        return $obj;
    }

    /**
     * legacy.
     */
    public function withSignaturePlacement(int $signaturePlacement): self
    {
        $obj = clone $this;
        $obj->signature_placement = $signaturePlacement;

        return $obj;
    }

    /**
     * legacy - always 4.
     */
    public function withSignatureType(int $signatureType): self
    {
        $obj = clone $this;
        $obj->signature_type = $signatureType;

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
