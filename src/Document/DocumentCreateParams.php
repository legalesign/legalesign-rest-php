<?php

declare(strict_types=1);

namespace Legalesign\Document;

use Legalesign\Core\Attributes\Api;
use Legalesign\Core\Concerns\SdkModel;
use Legalesign\Core\Concerns\SdkParams;
use Legalesign\Core\Contracts\BaseModel;
use Legalesign\Document\DocumentCreateParams\PdfPasswordType;
use Legalesign\Document\DocumentCreateParams\Signer;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new DocumentCreateParams); // set properties as needed
 * $client->document->create(...$params->toArray());
 * ```
 * Create signing document.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->document->create(...$params->toArray());`
 *
 * @see Legalesign\Document->create
 *
 * @phpstan-type document_create_params = array{
 *   group: string,
 *   name: string,
 *   signers: list<Signer>,
 *   appendPdf?: bool,
 *   autoArchive?: bool,
 *   ccEmails?: string,
 *   convertSenderToSigner?: bool,
 *   doEmail?: bool,
 *   footer?: string,
 *   footerHeight?: int,
 *   header?: string,
 *   headerHeight?: int,
 *   pdfPassword?: string,
 *   pdfPasswordType?: PdfPasswordType|value-of<PdfPasswordType>,
 *   pdftext?: array<string, string>,
 *   redirect?: string,
 *   reminders?: string,
 *   returnSignerLinks?: bool,
 *   signatureType?: int,
 *   signersInOrder?: bool,
 *   signertext?: array<string, string>,
 *   strictFields?: bool,
 *   tag?: string,
 *   tag1?: string,
 *   tag2?: string,
 *   template?: string,
 *   templatepdf?: string,
 *   text?: string,
 *   user?: string,
 * }
 */
final class DocumentCreateParams implements BaseModel
{
    /** @use SdkModel<document_create_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $group;

    #[Api]
    public string $name;

    /** @var list<Signer> $signers */
    #[Api(list: Signer::class)]
    public array $signers;

    /**
     * Append Legalesign validation info to final PDF. If not included uses the group default.
     */
    #[Api('append_pdf', optional: true)]
    public ?bool $appendPdf;

    /**
     * Send to archive soon after signing. Keeps web app clutter free.
     */
    #[Api('auto_archive', optional: true)]
    public ?bool $autoArchive;

    /**
     * Comma delimited string of email addresses that are notified of signing or rejection.
     */
    #[Api('cc_emails', optional: true)]
    public ?string $ccEmails;

    /**
     * If any sender fields are left blank, convert them to fields for the first recipient.
     */
    #[Api('convert_sender_to_signer', optional: true)]
    public ?bool $convertSenderToSigner;

    /**
     * Use Legalesign email to send notification emails. If false suppresses all emails.
     */
    #[Api('do_email', optional: true)]
    public ?bool $doEmail;

    /**
     * Text doc only. The footer for the final pdf. Use keyword \"default\" to use group default footer.
     */
    #[Api(optional: true)]
    public ?string $footer;

    /**
     * Text based doc only. Pixel height of PDF footer, if used. 1px = 0.025cm.
     */
    #[Api('footer_height', optional: true)]
    public ?int $footerHeight;

    /**
     * Text based doc only. The header for the final pdf. Use keyword \"default\" to use group header footer.
     */
    #[Api(optional: true)]
    public ?string $header;

    /**
     * Text based doc only. Pixel height of final PDF footer, if used. 1px = 0.025cm.
     */
    #[Api('header_height', optional: true)]
    public ?int $headerHeight;

    /**
     * Set a password. Must be ascii encode-able, you must also set signature_type to 4 and choose a pdf_password_type.
     */
    #[Api('pdf_password', optional: true)]
    public ?string $pdfPassword;

    /**
     * 1 to store password, 2 for to delete from our records upon final signing.
     *
     * @var value-of<PdfPasswordType>|null $pdfPasswordType
     */
    #[Api('pdf_password_type', enum: PdfPasswordType::class, optional: true)]
    public ?int $pdfPasswordType;

    /**
     * Assign values to PDF sender fields, use field labels as keys. Requires unique fields labels. See also strict_fields.
     *
     * @var array<string, string>|null $pdftext
     */
    #[Api(map: 'string', optional: true)]
    public ?array $pdftext;

    /**
     * URL to send the signer to after signing (instead of download page).  Your URL will include query parameters with ID and state information as follows: YOUR-URL?signer=[signer_uid]&doc=[doc_id]&group=[group_id]&signer_state=[signer_status]&doc_state=[doc_status].
     */
    #[Api(optional: true)]
    public ?string $redirect;

    /**
     * Put 'default' if you wish to use the default reminder schedule in the group (go to web app to set default schedule).
     */
    #[Api(optional: true)]
    public ?string $reminders;

    /**
     * Return document links for signers in the response BODY.
     */
    #[Api('return_signer_links', optional: true)]
    public ?bool $returnSignerLinks;

    /**
     * Use 4 to get your executed PDF Certified. Recommended. Defaults to 1 (uses a sha256 hash for document integrity).
     */
    #[Api('signature_type', optional: true)]
    public ?int $signatureType;

    /**
     * Notify signers in their order sequence. If false all are notified simulataneously.
     */
    #[Api('signers_in_order', optional: true)]
    public ?bool $signersInOrder;

    /**
     * Add custom placeholders to signer fields, using labels as keys in an object (as for pdftext). Relies on unique labelling.
     *
     * @var array<string, string>|null $signertext
     */
    #[Api(map: 'string', optional: true)]
    public ?array $signertext;

    /**
     * pdftext fails silently for invalid field value, set to true to return an error.
     */
    #[Api('strict_fields', optional: true)]
    public ?bool $strictFields;

    #[Api(optional: true)]
    public ?string $tag;

    #[Api(optional: true)]
    public ?string $tag1;

    #[Api(optional: true)]
    public ?string $tag2;

    /**
     * Resource URI of text template object. This call must contain either one of the attributes text, templatepdf, template.
     */
    #[Api(optional: true)]
    public ?string $template;

    /**
     * Resource URI of templatepdf object. This API call must contain either one of the attributes text, templatepdf, template.
     */
    #[Api(optional: true)]
    public ?string $templatepdf;

    /**
     * Raw html. This API call must contain either one of the attributes text, templatepdf, template.
     */
    #[Api(optional: true)]
    public ?string $text;

    /**
     * Assign document another user in the group. Defaults to API.
     */
    #[Api(optional: true)]
    public ?string $user;

    /**
     * `new DocumentCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DocumentCreateParams::with(group: ..., name: ..., signers: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DocumentCreateParams)->withGroup(...)->withName(...)->withSigners(...)
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
     * @param list<Signer> $signers
     * @param PdfPasswordType|value-of<PdfPasswordType> $pdfPasswordType
     * @param array<string, string> $pdftext
     * @param array<string, string> $signertext
     */
    public static function with(
        string $group,
        string $name,
        array $signers,
        ?bool $appendPdf = null,
        ?bool $autoArchive = null,
        ?string $ccEmails = null,
        ?bool $convertSenderToSigner = null,
        ?bool $doEmail = null,
        ?string $footer = null,
        ?int $footerHeight = null,
        ?string $header = null,
        ?int $headerHeight = null,
        ?string $pdfPassword = null,
        PdfPasswordType|int|null $pdfPasswordType = null,
        ?array $pdftext = null,
        ?string $redirect = null,
        ?string $reminders = null,
        ?bool $returnSignerLinks = null,
        ?int $signatureType = null,
        ?bool $signersInOrder = null,
        ?array $signertext = null,
        ?bool $strictFields = null,
        ?string $tag = null,
        ?string $tag1 = null,
        ?string $tag2 = null,
        ?string $template = null,
        ?string $templatepdf = null,
        ?string $text = null,
        ?string $user = null,
    ): self {
        $obj = new self;

        $obj->group = $group;
        $obj->name = $name;
        $obj->signers = $signers;

        null !== $appendPdf && $obj->appendPdf = $appendPdf;
        null !== $autoArchive && $obj->autoArchive = $autoArchive;
        null !== $ccEmails && $obj->ccEmails = $ccEmails;
        null !== $convertSenderToSigner && $obj->convertSenderToSigner = $convertSenderToSigner;
        null !== $doEmail && $obj->doEmail = $doEmail;
        null !== $footer && $obj->footer = $footer;
        null !== $footerHeight && $obj->footerHeight = $footerHeight;
        null !== $header && $obj->header = $header;
        null !== $headerHeight && $obj->headerHeight = $headerHeight;
        null !== $pdfPassword && $obj->pdfPassword = $pdfPassword;
        null !== $pdfPasswordType && $obj->pdfPasswordType = $pdfPasswordType instanceof PdfPasswordType ? $pdfPasswordType->value : $pdfPasswordType;
        null !== $pdftext && $obj->pdftext = $pdftext;
        null !== $redirect && $obj->redirect = $redirect;
        null !== $reminders && $obj->reminders = $reminders;
        null !== $returnSignerLinks && $obj->returnSignerLinks = $returnSignerLinks;
        null !== $signatureType && $obj->signatureType = $signatureType;
        null !== $signersInOrder && $obj->signersInOrder = $signersInOrder;
        null !== $signertext && $obj->signertext = $signertext;
        null !== $strictFields && $obj->strictFields = $strictFields;
        null !== $tag && $obj->tag = $tag;
        null !== $tag1 && $obj->tag1 = $tag1;
        null !== $tag2 && $obj->tag2 = $tag2;
        null !== $template && $obj->template = $template;
        null !== $templatepdf && $obj->templatepdf = $templatepdf;
        null !== $text && $obj->text = $text;
        null !== $user && $obj->user = $user;

        return $obj;
    }

    public function withGroup(string $group): self
    {
        $obj = clone $this;
        $obj->group = $group;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * @param list<Signer> $signers
     */
    public function withSigners(array $signers): self
    {
        $obj = clone $this;
        $obj->signers = $signers;

        return $obj;
    }

    /**
     * Append Legalesign validation info to final PDF. If not included uses the group default.
     */
    public function withAppendPdf(bool $appendPdf): self
    {
        $obj = clone $this;
        $obj->appendPdf = $appendPdf;

        return $obj;
    }

    /**
     * Send to archive soon after signing. Keeps web app clutter free.
     */
    public function withAutoArchive(bool $autoArchive): self
    {
        $obj = clone $this;
        $obj->autoArchive = $autoArchive;

        return $obj;
    }

    /**
     * Comma delimited string of email addresses that are notified of signing or rejection.
     */
    public function withCcEmails(string $ccEmails): self
    {
        $obj = clone $this;
        $obj->ccEmails = $ccEmails;

        return $obj;
    }

    /**
     * If any sender fields are left blank, convert them to fields for the first recipient.
     */
    public function withConvertSenderToSigner(bool $convertSenderToSigner): self
    {
        $obj = clone $this;
        $obj->convertSenderToSigner = $convertSenderToSigner;

        return $obj;
    }

    /**
     * Use Legalesign email to send notification emails. If false suppresses all emails.
     */
    public function withDoEmail(bool $doEmail): self
    {
        $obj = clone $this;
        $obj->doEmail = $doEmail;

        return $obj;
    }

    /**
     * Text doc only. The footer for the final pdf. Use keyword \"default\" to use group default footer.
     */
    public function withFooter(string $footer): self
    {
        $obj = clone $this;
        $obj->footer = $footer;

        return $obj;
    }

    /**
     * Text based doc only. Pixel height of PDF footer, if used. 1px = 0.025cm.
     */
    public function withFooterHeight(int $footerHeight): self
    {
        $obj = clone $this;
        $obj->footerHeight = $footerHeight;

        return $obj;
    }

    /**
     * Text based doc only. The header for the final pdf. Use keyword \"default\" to use group header footer.
     */
    public function withHeader(string $header): self
    {
        $obj = clone $this;
        $obj->header = $header;

        return $obj;
    }

    /**
     * Text based doc only. Pixel height of final PDF footer, if used. 1px = 0.025cm.
     */
    public function withHeaderHeight(int $headerHeight): self
    {
        $obj = clone $this;
        $obj->headerHeight = $headerHeight;

        return $obj;
    }

    /**
     * Set a password. Must be ascii encode-able, you must also set signature_type to 4 and choose a pdf_password_type.
     */
    public function withPdfPassword(string $pdfPassword): self
    {
        $obj = clone $this;
        $obj->pdfPassword = $pdfPassword;

        return $obj;
    }

    /**
     * 1 to store password, 2 for to delete from our records upon final signing.
     *
     * @param PdfPasswordType|value-of<PdfPasswordType> $pdfPasswordType
     */
    public function withPdfPasswordType(
        PdfPasswordType|int $pdfPasswordType
    ): self {
        $obj = clone $this;
        $obj->pdfPasswordType = $pdfPasswordType instanceof PdfPasswordType ? $pdfPasswordType->value : $pdfPasswordType;

        return $obj;
    }

    /**
     * Assign values to PDF sender fields, use field labels as keys. Requires unique fields labels. See also strict_fields.
     *
     * @param array<string, string> $pdftext
     */
    public function withPdftext(array $pdftext): self
    {
        $obj = clone $this;
        $obj->pdftext = $pdftext;

        return $obj;
    }

    /**
     * URL to send the signer to after signing (instead of download page).  Your URL will include query parameters with ID and state information as follows: YOUR-URL?signer=[signer_uid]&doc=[doc_id]&group=[group_id]&signer_state=[signer_status]&doc_state=[doc_status].
     */
    public function withRedirect(string $redirect): self
    {
        $obj = clone $this;
        $obj->redirect = $redirect;

        return $obj;
    }

    /**
     * Put 'default' if you wish to use the default reminder schedule in the group (go to web app to set default schedule).
     */
    public function withReminders(string $reminders): self
    {
        $obj = clone $this;
        $obj->reminders = $reminders;

        return $obj;
    }

    /**
     * Return document links for signers in the response BODY.
     */
    public function withReturnSignerLinks(bool $returnSignerLinks): self
    {
        $obj = clone $this;
        $obj->returnSignerLinks = $returnSignerLinks;

        return $obj;
    }

    /**
     * Use 4 to get your executed PDF Certified. Recommended. Defaults to 1 (uses a sha256 hash for document integrity).
     */
    public function withSignatureType(int $signatureType): self
    {
        $obj = clone $this;
        $obj->signatureType = $signatureType;

        return $obj;
    }

    /**
     * Notify signers in their order sequence. If false all are notified simulataneously.
     */
    public function withSignersInOrder(bool $signersInOrder): self
    {
        $obj = clone $this;
        $obj->signersInOrder = $signersInOrder;

        return $obj;
    }

    /**
     * Add custom placeholders to signer fields, using labels as keys in an object (as for pdftext). Relies on unique labelling.
     *
     * @param array<string, string> $signertext
     */
    public function withSignertext(array $signertext): self
    {
        $obj = clone $this;
        $obj->signertext = $signertext;

        return $obj;
    }

    /**
     * pdftext fails silently for invalid field value, set to true to return an error.
     */
    public function withStrictFields(bool $strictFields): self
    {
        $obj = clone $this;
        $obj->strictFields = $strictFields;

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

    /**
     * Resource URI of text template object. This call must contain either one of the attributes text, templatepdf, template.
     */
    public function withTemplate(string $template): self
    {
        $obj = clone $this;
        $obj->template = $template;

        return $obj;
    }

    /**
     * Resource URI of templatepdf object. This API call must contain either one of the attributes text, templatepdf, template.
     */
    public function withTemplatepdf(string $templatepdf): self
    {
        $obj = clone $this;
        $obj->templatepdf = $templatepdf;

        return $obj;
    }

    /**
     * Raw html. This API call must contain either one of the attributes text, templatepdf, template.
     */
    public function withText(string $text): self
    {
        $obj = clone $this;
        $obj->text = $text;

        return $obj;
    }

    /**
     * Assign document another user in the group. Defaults to API.
     */
    public function withUser(string $user): self
    {
        $obj = clone $this;
        $obj->user = $user;

        return $obj;
    }
}
