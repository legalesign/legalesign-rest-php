<?php

declare(strict_types=1);

namespace Legalesign\Template;

use Legalesign\Core\Attributes\Api;
use Legalesign\Core\Concerns\SdkModel;
use Legalesign\Core\Concerns\SdkParams;
use Legalesign\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new TemplateUpdateParams); // set properties as needed
 * $client->template->update(...$params->toArray());
 * ```
 * Update text template.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->template->update(...$params->toArray());`
 *
 * @see Legalesign\Template->update
 *
 * @phpstan-type template_update_params = array{body: string}
 */
final class TemplateUpdateParams implements BaseModel
{
    /** @use SdkModel<template_update_params> */
    use SdkModel;
    use SdkParams;

    /**
     * json with any fields to update.
     */
    #[Api]
    public string $body;

    /**
     * `new TemplateUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TemplateUpdateParams::with(body: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TemplateUpdateParams)->withBody(...)
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
    public static function with(string $body): self
    {
        $obj = new self;

        $obj->body = $body;

        return $obj;
    }

    /**
     * json with any fields to update.
     */
    public function withBody(string $body): self
    {
        $obj = clone $this;
        $obj->body = $body;

        return $obj;
    }
}
