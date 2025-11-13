<?php

declare(strict_types=1);

namespace LegalesignSDK\Group;

use LegalesignSDK\Core\Attributes\Api;
use LegalesignSDK\Core\Concerns\SdkModel;
use LegalesignSDK\Core\Concerns\SdkParams;
use LegalesignSDK\Core\Contracts\BaseModel;

/**
 * Create group.
 *
 * @see LegalesignSDK\Services\GroupService::create()
 *
 * @phpstan-type GroupCreateParamsShape = array{name: string, xframe_allow?: bool}
 */
final class GroupCreateParams implements BaseModel
{
    /** @use SdkModel<GroupCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $name;

    /**
     * Set to true if you want to embed your signing page.
     */
    #[Api(optional: true)]
    public ?bool $xframe_allow;

    /**
     * `new GroupCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * GroupCreateParams::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new GroupCreateParams)->withName(...)
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
    public static function with(string $name, ?bool $xframe_allow = null): self
    {
        $obj = new self;

        $obj->name = $name;

        null !== $xframe_allow && $obj->xframe_allow = $xframe_allow;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Set to true if you want to embed your signing page.
     */
    public function withXframeAllow(bool $xframeAllow): self
    {
        $obj = clone $this;
        $obj->xframe_allow = $xframeAllow;

        return $obj;
    }
}
