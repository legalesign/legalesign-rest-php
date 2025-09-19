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
 * $params = (new TemplateCreateParams); // set properties as needed
 * $client->template->create(...$params->toArray());
 * ```
 * Create a new html/text template. This probably isn't the method you are looking for. You can use the 'text' attribute in /document/ to create and send your HTML as a signing document in one call.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->template->create(...$params->toArray());`
 *
 * @see Legalesign\Template->create
 *
 * @phpstan-type template_create_params = array{
 *   group: string, latestText: string, title: string, user?: string
 * }
 */
final class TemplateCreateParams implements BaseModel
{
    /** @use SdkModel<template_create_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $group;

    /**
     * text/html for template.
     */
    #[Api('latest_text')]
    public string $latestText;

    #[Api]
    public string $title;

    /**
     * assign to a user if not api user.
     */
    #[Api(optional: true)]
    public ?string $user;

    /**
     * `new TemplateCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TemplateCreateParams::with(group: ..., latestText: ..., title: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TemplateCreateParams)->withGroup(...)->withLatestText(...)->withTitle(...)
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
        string $latestText,
        string $title,
        ?string $user = null
    ): self {
        $obj = new self;

        $obj->group = $group;
        $obj->latestText = $latestText;
        $obj->title = $title;

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
     * text/html for template.
     */
    public function withLatestText(string $latestText): self
    {
        $obj = clone $this;
        $obj->latestText = $latestText;

        return $obj;
    }

    public function withTitle(string $title): self
    {
        $obj = clone $this;
        $obj->title = $title;

        return $obj;
    }

    /**
     * assign to a user if not api user.
     */
    public function withUser(string $user): self
    {
        $obj = clone $this;
        $obj->user = $user;

        return $obj;
    }
}
