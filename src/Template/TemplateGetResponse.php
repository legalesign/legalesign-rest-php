<?php

declare(strict_types=1);

namespace LegalesignSDK\Template;

use LegalesignSDK\Core\Attributes\Api;
use LegalesignSDK\Core\Concerns\SdkModel;
use LegalesignSDK\Core\Concerns\SdkResponse;
use LegalesignSDK\Core\Contracts\BaseModel;
use LegalesignSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type template_get_response = array{
 *   archive?: bool,
 *   created?: \DateTimeInterface,
 *   group?: string,
 *   hasFields?: bool,
 *   latestText?: string,
 *   modified?: \DateTimeInterface,
 *   resourceUri?: string,
 *   signeeCount?: int,
 *   title?: string,
 *   user?: string,
 *   uuid?: string,
 * }
 */
final class TemplateGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<template_get_response> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?bool $archive;

    #[Api(optional: true)]
    public ?\DateTimeInterface $created;

    #[Api(optional: true)]
    public ?string $group;

    #[Api('has_fields', optional: true)]
    public ?bool $hasFields;

    #[Api('latest_text', optional: true)]
    public ?string $latestText;

    #[Api(optional: true)]
    public ?\DateTimeInterface $modified;

    #[Api('resource_uri', optional: true)]
    public ?string $resourceUri;

    #[Api('signee_count', optional: true)]
    public ?int $signeeCount;

    #[Api(optional: true)]
    public ?string $title;

    #[Api(optional: true)]
    public ?string $user;

    #[Api(optional: true)]
    public ?string $uuid;

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
        ?bool $archive = null,
        ?\DateTimeInterface $created = null,
        ?string $group = null,
        ?bool $hasFields = null,
        ?string $latestText = null,
        ?\DateTimeInterface $modified = null,
        ?string $resourceUri = null,
        ?int $signeeCount = null,
        ?string $title = null,
        ?string $user = null,
        ?string $uuid = null,
    ): self {
        $obj = new self;

        null !== $archive && $obj->archive = $archive;
        null !== $created && $obj->created = $created;
        null !== $group && $obj->group = $group;
        null !== $hasFields && $obj->hasFields = $hasFields;
        null !== $latestText && $obj->latestText = $latestText;
        null !== $modified && $obj->modified = $modified;
        null !== $resourceUri && $obj->resourceUri = $resourceUri;
        null !== $signeeCount && $obj->signeeCount = $signeeCount;
        null !== $title && $obj->title = $title;
        null !== $user && $obj->user = $user;
        null !== $uuid && $obj->uuid = $uuid;

        return $obj;
    }

    public function withArchive(bool $archive): self
    {
        $obj = clone $this;
        $obj->archive = $archive;

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

    public function withHasFields(bool $hasFields): self
    {
        $obj = clone $this;
        $obj->hasFields = $hasFields;

        return $obj;
    }

    public function withLatestText(string $latestText): self
    {
        $obj = clone $this;
        $obj->latestText = $latestText;

        return $obj;
    }

    public function withModified(\DateTimeInterface $modified): self
    {
        $obj = clone $this;
        $obj->modified = $modified;

        return $obj;
    }

    public function withResourceUri(string $resourceUri): self
    {
        $obj = clone $this;
        $obj->resourceUri = $resourceUri;

        return $obj;
    }

    public function withSigneeCount(int $signeeCount): self
    {
        $obj = clone $this;
        $obj->signeeCount = $signeeCount;

        return $obj;
    }

    public function withTitle(string $title): self
    {
        $obj = clone $this;
        $obj->title = $title;

        return $obj;
    }

    public function withUser(string $user): self
    {
        $obj = clone $this;
        $obj->user = $user;

        return $obj;
    }

    public function withUuid(string $uuid): self
    {
        $obj = clone $this;
        $obj->uuid = $uuid;

        return $obj;
    }
}
