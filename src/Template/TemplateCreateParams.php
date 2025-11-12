<?php

declare(strict_types=1);

namespace LegalesignSDK\Template;

use LegalesignSDK\Core\Attributes\Api;
use LegalesignSDK\Core\Concerns\SdkModel;
use LegalesignSDK\Core\Concerns\SdkParams;
use LegalesignSDK\Core\Contracts\BaseModel;

/**
 * Create a new html/text template. This probably isn't the method you are looking for. You can use the 'text' attribute in /document/ to create and send your HTML as a signing document in one call.
 *
 * @see LegalesignSDK\Template->create
 *
 * @phpstan-type TemplateCreateParamsShape = array{
 *   group: string, latest_text: string, title: string, user?: string
 * }
 */
final class TemplateCreateParams implements BaseModel
{
    /** @use SdkModel<TemplateCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $group;

    /**
     * text/html for template.
     */
    #[Api]
    public string $latest_text;

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
     * TemplateCreateParams::with(group: ..., latest_text: ..., title: ...)
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
        string $latest_text,
        string $title,
        ?string $user = null
    ): self {
        $obj = new self;

        $obj->group = $group;
        $obj->latest_text = $latest_text;
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
        $obj->latest_text = $latestText;

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
