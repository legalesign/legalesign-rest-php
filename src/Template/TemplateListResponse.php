<?php

declare(strict_types=1);

namespace LegalesignSDK\Template;

use LegalesignSDK\Core\Attributes\Api;
use LegalesignSDK\Core\Concerns\SdkModel;
use LegalesignSDK\Core\Contracts\BaseModel;
use LegalesignSDK\Document\ListMeta;
use LegalesignSDK\Template\TemplateListResponse\Object1;

/**
 * @phpstan-type template_list_response = array{
 *   meta?: ListMeta, objects?: list<Object1>
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class TemplateListResponse implements BaseModel
{
    /** @use SdkModel<template_list_response> */
    use SdkModel;

    #[Api(optional: true)]
    public ?ListMeta $meta;

    /** @var list<Object1>|null $objects */
    #[Api(list: Object1::class, optional: true)]
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
     * @param list<Object1> $objects
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
     * @param list<Object1> $objects
     */
    public function withObjects(array $objects): self
    {
        $obj = clone $this;
        $obj->objects = $objects;

        return $obj;
    }
}
