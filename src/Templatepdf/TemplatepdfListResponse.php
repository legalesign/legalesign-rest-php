<?php

declare(strict_types=1);

namespace Legalesign\Templatepdf;

use Legalesign\Attachment\ListMeta;
use Legalesign\Core\Attributes\Api;
use Legalesign\Core\Concerns\SdkModel;
use Legalesign\Core\Contracts\BaseModel;

/**
 * @phpstan-type templatepdf_list_response = array{
 *   meta?: ListMeta, objects?: list<TemplatePdf>
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class TemplatepdfListResponse implements BaseModel
{
    /** @use SdkModel<templatepdf_list_response> */
    use SdkModel;

    #[Api(optional: true)]
    public ?ListMeta $meta;

    /** @var list<TemplatePdf>|null $objects */
    #[Api(list: TemplatePdf::class, optional: true)]
    public ?array $objects;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<TemplatePdf> $objects
     */
    public static function with(
        ?ListMeta $meta = null,
        ?array $objects = null
    ): self {
        $obj = new self;

        null !== $meta && $obj->meta = $meta;
        null !== $objects && $obj->objects = $objects;

        return $obj;
    }

    public function withMeta(ListMeta $meta): self
    {
        $obj = clone $this;
        $obj->meta = $meta;

        return $obj;
    }

    /**
     * @param list<TemplatePdf> $objects
     */
    public function withObjects(array $objects): self
    {
        $obj = clone $this;
        $obj->objects = $objects;

        return $obj;
    }
}
