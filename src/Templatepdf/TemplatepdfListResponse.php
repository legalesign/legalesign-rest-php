<?php

declare(strict_types=1);

namespace LegalesignSDK\Templatepdf;

use LegalesignSDK\Core\Attributes\Api;
use LegalesignSDK\Core\Concerns\SdkModel;
use LegalesignSDK\Core\Concerns\SdkResponse;
use LegalesignSDK\Core\Contracts\BaseModel;
use LegalesignSDK\Core\Conversion\Contracts\ResponseConverter;
use LegalesignSDK\Document\ListMeta;

/**
 * @phpstan-type templatepdf_list_response = array{
 *   meta?: ListMeta, objects?: list<TemplatePdf>
 * }
 */
final class TemplatepdfListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<templatepdf_list_response> */
    use SdkModel;

    use SdkResponse;

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
