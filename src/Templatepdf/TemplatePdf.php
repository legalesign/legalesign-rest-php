<?php

declare(strict_types=1);

namespace LegalesignSDK\Templatepdf;

use LegalesignSDK\Core\Attributes\Api;
use LegalesignSDK\Core\Concerns\SdkModel;
use LegalesignSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type template_pdf = array{
 *   created?: \DateTimeInterface,
 *   group?: string,
 *   modified?: \DateTimeInterface,
 *   pageCount?: int,
 *   parties?: string,
 *   resourceUri?: string,
 *   signerCount?: int,
 *   title?: string,
 *   user?: string,
 *   uuid?: string,
 *   valid?: bool,
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class TemplatePdf implements BaseModel
{
    /** @use SdkModel<template_pdf> */
    use SdkModel;

    #[Api(optional: true)]
    public ?\DateTimeInterface $created;

    #[Api(optional: true)]
    public ?string $group;

    #[Api(optional: true)]
    public ?\DateTimeInterface $modified;

    #[Api('page_count', optional: true)]
    public ?int $pageCount;

    /**
     * JSON stringified array of document parties.
     */
    #[Api(optional: true)]
    public ?string $parties;

    #[Api('resource_uri', optional: true)]
    public ?string $resourceUri;

    #[Api('signer_count', optional: true)]
    public ?int $signerCount;

    #[Api(optional: true)]
    public ?string $title;

    /**
     * resource_uri for user.
     */
    #[Api(optional: true)]
    public ?string $user;

    /**
     * id for pdf object.
     */
    #[Api(optional: true)]
    public ?string $uuid;

    /**
     * Is able to be sent (if fields do not validate).
     */
    #[Api(optional: true)]
    public ?bool $valid;

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
        ?\DateTimeInterface $created = null,
        ?string $group = null,
        ?\DateTimeInterface $modified = null,
        ?int $pageCount = null,
        ?string $parties = null,
        ?string $resourceUri = null,
        ?int $signerCount = null,
        ?string $title = null,
        ?string $user = null,
        ?string $uuid = null,
        ?bool $valid = null,
    ): self {
        $obj = new self;

        null !== $created && $obj->created = $created;
        null !== $group && $obj->group = $group;
        null !== $modified && $obj->modified = $modified;
        null !== $pageCount && $obj->pageCount = $pageCount;
        null !== $parties && $obj->parties = $parties;
        null !== $resourceUri && $obj->resourceUri = $resourceUri;
        null !== $signerCount && $obj->signerCount = $signerCount;
        null !== $title && $obj->title = $title;
        null !== $user && $obj->user = $user;
        null !== $uuid && $obj->uuid = $uuid;
        null !== $valid && $obj->valid = $valid;

        return $obj;
    }

    public function withCreated(\DateTimeInterface $created): self
    {
        $obj = clone $this;
        $obj->created = $created;

        return $obj;
    }

    public function withGroup(string $group): self
    {
        $obj = clone $this;
        $obj->group = $group;

        return $obj;
    }

    public function withModified(\DateTimeInterface $modified): self
    {
        $obj = clone $this;
        $obj->modified = $modified;

        return $obj;
    }

    public function withPageCount(int $pageCount): self
    {
        $obj = clone $this;
        $obj->pageCount = $pageCount;

        return $obj;
    }

    /**
     * JSON stringified array of document parties.
     */
    public function withParties(string $parties): self
    {
        $obj = clone $this;
        $obj->parties = $parties;

        return $obj;
    }

    public function withResourceUri(string $resourceUri): self
    {
        $obj = clone $this;
        $obj->resourceUri = $resourceUri;

        return $obj;
    }

    public function withSignerCount(int $signerCount): self
    {
        $obj = clone $this;
        $obj->signerCount = $signerCount;

        return $obj;
    }

    public function withTitle(string $title): self
    {
        $obj = clone $this;
        $obj->title = $title;

        return $obj;
    }

    /**
     * resource_uri for user.
     */
    public function withUser(string $user): self
    {
        $obj = clone $this;
        $obj->user = $user;

        return $obj;
    }

    /**
     * id for pdf object.
     */
    public function withUuid(string $uuid): self
    {
        $obj = clone $this;
        $obj->uuid = $uuid;

        return $obj;
    }

    /**
     * Is able to be sent (if fields do not validate).
     */
    public function withValid(bool $valid): self
    {
        $obj = clone $this;
        $obj->valid = $valid;

        return $obj;
    }
}
