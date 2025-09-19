<?php

declare(strict_types=1);

namespace Legalesign\Document;

use Legalesign\Core\Attributes\Api;
use Legalesign\Core\Concerns\SdkModel;
use Legalesign\Core\Concerns\SdkParams;
use Legalesign\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new DocumentPreviewParams); // set properties as needed
 * $client->document->preview(...$params->toArray());
 * ```
 * Returns a redirect response (302) with link in the Location header to a one-use temporary URL you can redirect to, to see a preview of the signing page. Follow the redirect immediately since it expires after a few seconds.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->document->preview(...$params->toArray());`
 *
 * @see Legalesign\Document->preview
 *
 * @phpstan-type document_preview_params = array{
 *   group?: string, signeeCount?: int, text?: string, title?: string
 * }
 */
final class DocumentPreviewParams implements BaseModel
{
    /** @use SdkModel<document_preview_params> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?string $group;

    #[Api('signee_count', optional: true)]
    public ?int $signeeCount;

    #[Api(optional: true)]
    public ?string $text;

    #[Api(optional: true)]
    public ?string $title;

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
        ?string $group = null,
        ?int $signeeCount = null,
        ?string $text = null,
        ?string $title = null,
    ): self {
        $obj = new self;

        null !== $group && $obj->group = $group;
        null !== $signeeCount && $obj->signeeCount = $signeeCount;
        null !== $text && $obj->text = $text;
        null !== $title && $obj->title = $title;

        return $obj;
    }

    public function withGroup(string $group): self
    {
        $obj = clone $this;
        $obj->group = $group;

        return $obj;
    }

    public function withSigneeCount(int $signeeCount): self
    {
        $obj = clone $this;
        $obj->signeeCount = $signeeCount;

        return $obj;
    }

    public function withText(string $text): self
    {
        $obj = clone $this;
        $obj->text = $text;

        return $obj;
    }

    public function withTitle(string $title): self
    {
        $obj = clone $this;
        $obj->title = $title;

        return $obj;
    }
}
