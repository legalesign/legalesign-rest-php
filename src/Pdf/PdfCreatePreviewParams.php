<?php

declare(strict_types=1);

namespace Legalesign\Pdf;

use Legalesign\Core\Attributes\Api;
use Legalesign\Core\Concerns\SdkModel;
use Legalesign\Core\Concerns\SdkParams;
use Legalesign\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new PdfCreatePreviewParams); // set properties as needed
 * $client->pdf->createPreview(...$params->toArray());
 * ```
 * text/html document as pdf preview.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->pdf->createPreview(...$params->toArray());`
 *
 * @see Legalesign\Pdf->createPreview
 *
 * @phpstan-type pdf_create_preview_params = array{
 *   group: string,
 *   isSignaturePerPage: int,
 *   signatureType: int,
 *   signeeCount: int,
 *   text: string,
 *   footer?: string,
 *   footerHeight?: int,
 *   header?: string,
 *   headerHeight?: int,
 *   pdfheader?: bool,
 *   title?: string,
 * }
 */
final class PdfCreatePreviewParams implements BaseModel
{
    /** @use SdkModel<pdf_create_preview_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $group;

    #[Api('is_signature_per_page')]
    public int $isSignaturePerPage;

    #[Api('signature_type')]
    public int $signatureType;

    /**
     * number of signers.
     */
    #[Api('signee_count')]
    public int $signeeCount;

    /**
     * raw html.
     */
    #[Api]
    public string $text;

    #[Api(optional: true)]
    public ?string $footer;

    #[Api('footer_height', optional: true)]
    public ?int $footerHeight;

    #[Api(optional: true)]
    public ?string $header;

    #[Api('header_height', optional: true)]
    public ?int $headerHeight;

    /**
     * Set to true to use group default.
     */
    #[Api(optional: true)]
    public ?bool $pdfheader;

    #[Api(optional: true)]
    public ?string $title;

    /**
     * `new PdfCreatePreviewParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PdfCreatePreviewParams::with(
     *   group: ...,
     *   isSignaturePerPage: ...,
     *   signatureType: ...,
     *   signeeCount: ...,
     *   text: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PdfCreatePreviewParams)
     *   ->withGroup(...)
     *   ->withIsSignaturePerPage(...)
     *   ->withSignatureType(...)
     *   ->withSigneeCount(...)
     *   ->withText(...)
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
        string $group,
        int $isSignaturePerPage,
        int $signatureType,
        int $signeeCount,
        string $text,
        ?string $footer = null,
        ?int $footerHeight = null,
        ?string $header = null,
        ?int $headerHeight = null,
        ?bool $pdfheader = null,
        ?string $title = null,
    ): self {
        $obj = new self;

        $obj->group = $group;
        $obj->isSignaturePerPage = $isSignaturePerPage;
        $obj->signatureType = $signatureType;
        $obj->signeeCount = $signeeCount;
        $obj->text = $text;

        null !== $footer && $obj->footer = $footer;
        null !== $footerHeight && $obj->footerHeight = $footerHeight;
        null !== $header && $obj->header = $header;
        null !== $headerHeight && $obj->headerHeight = $headerHeight;
        null !== $pdfheader && $obj->pdfheader = $pdfheader;
        null !== $title && $obj->title = $title;

        return $obj;
    }

    public function withGroup(string $group): self
    {
        $obj = clone $this;
        $obj->group = $group;

        return $obj;
    }

    public function withIsSignaturePerPage(int $isSignaturePerPage): self
    {
        $obj = clone $this;
        $obj->isSignaturePerPage = $isSignaturePerPage;

        return $obj;
    }

    public function withSignatureType(int $signatureType): self
    {
        $obj = clone $this;
        $obj->signatureType = $signatureType;

        return $obj;
    }

    /**
     * number of signers.
     */
    public function withSigneeCount(int $signeeCount): self
    {
        $obj = clone $this;
        $obj->signeeCount = $signeeCount;

        return $obj;
    }

    /**
     * raw html.
     */
    public function withText(string $text): self
    {
        $obj = clone $this;
        $obj->text = $text;

        return $obj;
    }

    public function withFooter(string $footer): self
    {
        $obj = clone $this;
        $obj->footer = $footer;

        return $obj;
    }

    public function withFooterHeight(int $footerHeight): self
    {
        $obj = clone $this;
        $obj->footerHeight = $footerHeight;

        return $obj;
    }

    public function withHeader(string $header): self
    {
        $obj = clone $this;
        $obj->header = $header;

        return $obj;
    }

    public function withHeaderHeight(int $headerHeight): self
    {
        $obj = clone $this;
        $obj->headerHeight = $headerHeight;

        return $obj;
    }

    /**
     * Set to true to use group default.
     */
    public function withPdfheader(bool $pdfheader): self
    {
        $obj = clone $this;
        $obj->pdfheader = $pdfheader;

        return $obj;
    }

    public function withTitle(string $title): self
    {
        $obj = clone $this;
        $obj->title = $title;

        return $obj;
    }
}
