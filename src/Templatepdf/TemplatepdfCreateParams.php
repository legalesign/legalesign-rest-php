<?php

declare(strict_types=1);

namespace LegalesignSDK\Templatepdf;

use LegalesignSDK\Core\Attributes\Api;
use LegalesignSDK\Core\Concerns\SdkModel;
use LegalesignSDK\Core\Concerns\SdkParams;
use LegalesignSDK\Core\Contracts\BaseModel;

/**
 * Upload a PDF document you want to send to be signed.
 *
 * @see LegalesignSDK\Templatepdf->create
 *
 * @phpstan-type TemplatepdfCreateParamsShape = array{
 *   group: string,
 *   pdf_file: string,
 *   archive_upon_send?: bool,
 *   process_tags?: bool,
 *   title?: string,
 *   user?: string,
 * }
 */
final class TemplatepdfCreateParams implements BaseModel
{
    /** @use SdkModel<TemplatepdfCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $group;

    /**
     * base64 encoded PDF file data.
     */
    #[Api]
    public string $pdf_file;

    /**
     * archive PDF when sent.
     */
    #[Api(optional: true)]
    public ?bool $archive_upon_send;

    #[Api(optional: true)]
    public ?bool $process_tags;

    #[Api(optional: true)]
    public ?string $title;

    /**
     * assign to group member if not api user.
     */
    #[Api(optional: true)]
    public ?string $user;

    /**
     * `new TemplatepdfCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TemplatepdfCreateParams::with(group: ..., pdf_file: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TemplatepdfCreateParams)->withGroup(...)->withPdfFile(...)
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
        string $pdf_file,
        ?bool $archive_upon_send = null,
        ?bool $process_tags = null,
        ?string $title = null,
        ?string $user = null,
    ): self {
        $obj = new self;

        $obj->group = $group;
        $obj->pdf_file = $pdf_file;

        null !== $archive_upon_send && $obj->archive_upon_send = $archive_upon_send;
        null !== $process_tags && $obj->process_tags = $process_tags;
        null !== $title && $obj->title = $title;
        null !== $user && $obj->user = $user;

        return $obj;
    }

    public function withGroup(string $group): self
    {
        $obj = clone $this;
        $obj->group = $group;

        return $obj;
    }

    /**
     * base64 encoded PDF file data.
     */
    public function withPdfFile(string $pdfFile): self
    {
        $obj = clone $this;
        $obj->pdf_file = $pdfFile;

        return $obj;
    }

    /**
     * archive PDF when sent.
     */
    public function withArchiveUponSend(bool $archiveUponSend): self
    {
        $obj = clone $this;
        $obj->archive_upon_send = $archiveUponSend;

        return $obj;
    }

    public function withProcessTags(bool $processTags): self
    {
        $obj = clone $this;
        $obj->process_tags = $processTags;

        return $obj;
    }

    public function withTitle(string $title): self
    {
        $obj = clone $this;
        $obj->title = $title;

        return $obj;
    }

    /**
     * assign to group member if not api user.
     */
    public function withUser(string $user): self
    {
        $obj = clone $this;
        $obj->user = $user;

        return $obj;
    }
}
