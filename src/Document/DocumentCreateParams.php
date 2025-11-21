<?php

declare(strict_types=1);

namespace LegalesignSDK\Document;

use LegalesignSDK\Core\Attributes\Api;
use LegalesignSDK\Core\Concerns\SdkModel;
use LegalesignSDK\Core\Concerns\SdkParams;
use LegalesignSDK\Core\Contracts\BaseModel;
use LegalesignSDK\Document\DocumentCreateParams\Signer;

/**
 * Create signing document.
 *
 * @see LegalesignSDK\Services\DocumentService::create()
 *
 * @phpstan-type DocumentCreateParamsShape = array{
 *   group: string,
 *   name: string,
 *   signers: list<Signer>,
 *   append_pdf?: bool,
 *   auto_archive?: bool,
 *   cc_emails?: string,
 *   convert_sender_to_signer?: bool,
 *   do_email?: bool,
 *   footer?: string,
 *   footer_height?: int,
 *   header?: string,
 *   header_height?: int,
 *   pdf_password?: string,
 *   pdf_password_type?: 1|2,
 *   pdftext?: array<string,string>,
 *   redirect?: string,
 *   reminders?: string,
 *   return_signer_links?: bool,
 *   signature_type?: int,
 *   signers_in_order?: bool,
 *   signertext?: array<string,string>,
 *   strict_fields?: bool,
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
    /** @use SdkModel<DocumentCreateParamsShape> */
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
    #[Api(optional: true)]
    public ?bool $append_pdf;

    /**
     * Send to archive soon after signing. Keeps web app clutter free.
     */
    #[Api(optional: true)]
    public ?bool $auto_archive;

    /**
     * Comma delimited string of email addresses that are notified of signing or rejection.
     */
    #[Api(optional: true)]
    public ?string $cc_emails;

    /**
     * If any sender fields are left blank, convert them to fields for the first recipient.
     */
    #[Api(optional: true)]
    public ?bool $convert_sender_to_signer;

    /**
     * Use Legalesign email to send notification emails. If false suppresses all emails.
     */
    #[Api(optional: true)]
    public ?bool $do_email;

    /**
     * Text doc only. The footer for the final pdf. Use keyword \"default\" to use group default footer.
     */
    #[Api(optional: true)]
    public ?string $footer;

    /**
     * Text based doc only. Pixel height of PDF footer, if used. 1px = 0.025cm.
     */
    #[Api(optional: true)]
    public ?int $footer_height;

    /**
     * Text based doc only. The header for the final pdf. Use keyword \"default\" to use group header footer.
     */
    #[Api(optional: true)]
    public ?string $header;

    /**
     * Text based doc only. Pixel height of final PDF footer, if used. 1px = 0.025cm.
     */
    #[Api(optional: true)]
    public ?int $header_height;

    /**
     * Set a password. Must be ascii encode-able, you must also set signature_type to 4 and choose a pdf_password_type.
     */
    #[Api(optional: true)]
    public ?string $pdf_password;

    /**
     * 1 to store password, 2 for to delete from our records upon final signing.
     *
     * @var 1|2|null $pdf_password_type
     */
    #[Api(optional: true)]
    public ?int $pdf_password_type;

    /**
     * Assign values to PDF sender fields, use field labels as keys. Requires unique fields labels. See also strict_fields.
     *
     * @var array<string,string>|null $pdftext
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
    #[Api(optional: true)]
    public ?bool $return_signer_links;

    /**
     * Use 4 to get your executed PDF Certified. Recommended. Defaults to 1 (uses a sha256 hash for document integrity).
     */
    #[Api(optional: true)]
    public ?int $signature_type;

    /**
     * Notify signers in their order sequence. If false all are notified simulataneously.
     */
    #[Api(optional: true)]
    public ?bool $signers_in_order;

    /**
     * Add custom placeholders to signer fields, using labels as keys in an object (as for pdftext). Relies on unique labelling.
     *
     * @var array<string,string>|null $signertext
     */
    #[Api(map: 'string', optional: true)]
    public ?array $signertext;

    /**
     * pdftext fails silently for invalid field value, set to true to return an error.
     */
    #[Api(optional: true)]
    public ?bool $strict_fields;

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
     * @param 1|2 $pdf_password_type
     * @param array<string,string> $pdftext
     * @param array<string,string> $signertext
     */
    public static function with(
        string $group,
        string $name,
        array $signers,
        ?bool $append_pdf = null,
        ?bool $auto_archive = null,
        ?string $cc_emails = null,
        ?bool $convert_sender_to_signer = null,
        ?bool $do_email = null,
        ?string $footer = null,
        ?int $footer_height = null,
        ?string $header = null,
        ?int $header_height = null,
        ?string $pdf_password = null,
        ?int $pdf_password_type = null,
        ?array $pdftext = null,
        ?string $redirect = null,
        ?string $reminders = null,
        ?bool $return_signer_links = null,
        ?int $signature_type = null,
        ?bool $signers_in_order = null,
        ?array $signertext = null,
        ?bool $strict_fields = null,
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

        null !== $append_pdf && $obj->append_pdf = $append_pdf;
        null !== $auto_archive && $obj->auto_archive = $auto_archive;
        null !== $cc_emails && $obj->cc_emails = $cc_emails;
        null !== $convert_sender_to_signer && $obj->convert_sender_to_signer = $convert_sender_to_signer;
        null !== $do_email && $obj->do_email = $do_email;
        null !== $footer && $obj->footer = $footer;
        null !== $footer_height && $obj->footer_height = $footer_height;
        null !== $header && $obj->header = $header;
        null !== $header_height && $obj->header_height = $header_height;
        null !== $pdf_password && $obj->pdf_password = $pdf_password;
        null !== $pdf_password_type && $obj->pdf_password_type = $pdf_password_type;
        null !== $pdftext && $obj->pdftext = $pdftext;
        null !== $redirect && $obj->redirect = $redirect;
        null !== $reminders && $obj->reminders = $reminders;
        null !== $return_signer_links && $obj->return_signer_links = $return_signer_links;
        null !== $signature_type && $obj->signature_type = $signature_type;
        null !== $signers_in_order && $obj->signers_in_order = $signers_in_order;
        null !== $signertext && $obj->signertext = $signertext;
        null !== $strict_fields && $obj->strict_fields = $strict_fields;
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
        $obj->append_pdf = $appendPdf;

        return $obj;
    }

    /**
     * Send to archive soon after signing. Keeps web app clutter free.
     */
    public function withAutoArchive(bool $autoArchive): self
    {
        $obj = clone $this;
        $obj->auto_archive = $autoArchive;

        return $obj;
    }

    /**
     * Comma delimited string of email addresses that are notified of signing or rejection.
     */
    public function withCcEmails(string $ccEmails): self
    {
        $obj = clone $this;
        $obj->cc_emails = $ccEmails;

        return $obj;
    }

    /**
     * If any sender fields are left blank, convert them to fields for the first recipient.
     */
    public function withConvertSenderToSigner(bool $convertSenderToSigner): self
    {
        $obj = clone $this;
        $obj->convert_sender_to_signer = $convertSenderToSigner;

        return $obj;
    }

    /**
     * Use Legalesign email to send notification emails. If false suppresses all emails.
     */
    public function withDoEmail(bool $doEmail): self
    {
        $obj = clone $this;
        $obj->do_email = $doEmail;

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
        $obj->footer_height = $footerHeight;

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
        $obj->header_height = $headerHeight;

        return $obj;
    }

    /**
     * Set a password. Must be ascii encode-able, you must also set signature_type to 4 and choose a pdf_password_type.
     */
    public function withPdfPassword(string $pdfPassword): self
    {
        $obj = clone $this;
        $obj->pdf_password = $pdfPassword;

        return $obj;
    }

    /**
     * 1 to store password, 2 for to delete from our records upon final signing.
     *
     * @param 1|2 $pdfPasswordType
     */
    public function withPdfPasswordType(int $pdfPasswordType): self
    {
        $obj = clone $this;
        $obj->pdf_password_type = $pdfPasswordType;

        return $obj;
    }

    /**
     * Assign values to PDF sender fields, use field labels as keys. Requires unique fields labels. See also strict_fields.
     *
     * @param array<string,string> $pdftext
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
        $obj->return_signer_links = $returnSignerLinks;

        return $obj;
    }

    /**
     * Use 4 to get your executed PDF Certified. Recommended. Defaults to 1 (uses a sha256 hash for document integrity).
     */
    public function withSignatureType(int $signatureType): self
    {
        $obj = clone $this;
        $obj->signature_type = $signatureType;

        return $obj;
    }

    /**
     * Notify signers in their order sequence. If false all are notified simulataneously.
     */
    public function withSignersInOrder(bool $signersInOrder): self
    {
        $obj = clone $this;
        $obj->signers_in_order = $signersInOrder;

        return $obj;
    }

    /**
     * Add custom placeholders to signer fields, using labels as keys in an object (as for pdftext). Relies on unique labelling.
     *
     * @param array<string,string> $signertext
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
        $obj->strict_fields = $strictFields;

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
