<?php

declare(strict_types=1);

namespace Legalesign\Attachment;

use Legalesign\Core\Attributes\Api;
use Legalesign\Core\Concerns\SdkModel;
use Legalesign\Core\Concerns\SdkParams;
use Legalesign\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new AttachmentUploadParams); // set properties as needed
 * $client->attachment->upload(...$params->toArray());
 * ```
 * Upload PDF attachment.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->attachment->upload(...$params->toArray());`
 *
 * @see Legalesign\Attachment->upload
 *
 * @phpstan-type attachment_upload_params = array{
 *   filename: string,
 *   group: string,
 *   pdfFile: string,
 *   description?: string,
 *   user?: string,
 * }
 */
final class AttachmentUploadParams implements BaseModel
{
    /** @use SdkModel<attachment_upload_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Simple alphanumeric name ending .pdf.
     */
    #[Api]
    public string $filename;

    /**
     * URI of the group name.
     */
    #[Api]
    public string $group;

    /**
     * Base64 encoded PDF file data, max size is a group setting, 5MB by default.
     */
    #[Api('pdf_file')]
    public string $pdfFile;

    #[Api(optional: true)]
    public ?string $description;

    /**
     * Assign to group member if not the api user.
     */
    #[Api(optional: true)]
    public ?string $user;

    /**
     * `new AttachmentUploadParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AttachmentUploadParams::with(filename: ..., group: ..., pdfFile: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AttachmentUploadParams)
     *   ->withFilename(...)
     *   ->withGroup(...)
     *   ->withPdfFile(...)
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
        string $filename,
        string $group,
        string $pdfFile,
        ?string $description = null,
        ?string $user = null,
    ): self {
        $obj = new self;

        $obj->filename = $filename;
        $obj->group = $group;
        $obj->pdfFile = $pdfFile;

        null !== $description && $obj->description = $description;
        null !== $user && $obj->user = $user;

        return $obj;
    }

    /**
     * Simple alphanumeric name ending .pdf.
     */
    public function withFilename(string $filename): self
    {
        $obj = clone $this;
        $obj->filename = $filename;

        return $obj;
    }

    /**
     * URI of the group name.
     */
    public function withGroup(string $group): self
    {
        $obj = clone $this;
        $obj->group = $group;

        return $obj;
    }

    /**
     * Base64 encoded PDF file data, max size is a group setting, 5MB by default.
     */
    public function withPdfFile(string $pdfFile): self
    {
        $obj = clone $this;
        $obj->pdfFile = $pdfFile;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    /**
     * Assign to group member if not the api user.
     */
    public function withUser(string $user): self
    {
        $obj = clone $this;
        $obj->user = $user;

        return $obj;
    }
}
