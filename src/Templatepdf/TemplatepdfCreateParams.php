<?php

declare(strict_types=1);

namespace Legalesign\Templatepdf;

use Legalesign\Core\Attributes\Api;
use Legalesign\Core\Concerns\SdkModel;
use Legalesign\Core\Concerns\SdkParams;
use Legalesign\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new TemplatepdfCreateParams); // set properties as needed
 * $client->templatepdf->create(...$params->toArray());
 * ```
 * Upload a PDF document you want to send to be signed.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->templatepdf->create(...$params->toArray());`
 *
 * @see Legalesign\Templatepdf->create
 *
 * @phpstan-type templatepdf_create_params = array{
 *   group: string,
 *   pdfFile: string,
 *   archiveUponSend?: bool,
 *   processTags?: bool,
 *   title?: string,
 *   user?: string,
 * }
 */
final class TemplatepdfCreateParams implements BaseModel
{
    /** @use SdkModel<templatepdf_create_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $group;

    /**
     * base64 encoded PDF file data.
     */
    #[Api('pdf_file')]
    public string $pdfFile;

    /**
     * archive PDF when sent.
     */
    #[Api('archive_upon_send', optional: true)]
    public ?bool $archiveUponSend;

    #[Api('process_tags', optional: true)]
    public ?bool $processTags;

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
     * TemplatepdfCreateParams::with(group: ..., pdfFile: ...)
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
        string $pdfFile,
        ?bool $archiveUponSend = null,
        ?bool $processTags = null,
        ?string $title = null,
        ?string $user = null,
    ): self {
        $obj = new self;

        $obj->group = $group;
        $obj->pdfFile = $pdfFile;

        null !== $archiveUponSend && $obj->archiveUponSend = $archiveUponSend;
        null !== $processTags && $obj->processTags = $processTags;
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
        $obj->pdfFile = $pdfFile;

        return $obj;
    }

    /**
     * archive PDF when sent.
     */
    public function withArchiveUponSend(bool $archiveUponSend): self
    {
        $obj = clone $this;
        $obj->archiveUponSend = $archiveUponSend;

        return $obj;
    }

    public function withProcessTags(bool $processTags): self
    {
        $obj = clone $this;
        $obj->processTags = $processTags;

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
