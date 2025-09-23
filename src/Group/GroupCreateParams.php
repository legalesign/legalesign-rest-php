<?php

declare(strict_types=1);

namespace LegalesignSDK\Group;

use LegalesignSDK\Core\Attributes\Api;
use LegalesignSDK\Core\Concerns\SdkModel;
use LegalesignSDK\Core\Concerns\SdkParams;
use LegalesignSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new GroupCreateParams); // set properties as needed
 * $client->group->create(...$params->toArray());
 * ```
 * Create group.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->group->create(...$params->toArray());`
 *
 * @see LegalesignSDK\Group->create
 *
 * @phpstan-type group_create_params = array{name: string, xframeAllow?: bool}
 */
final class GroupCreateParams implements BaseModel
{
    /** @use SdkModel<group_create_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $name;

    /**
     * Set to true if you want to embed your signing page.
     */
    #[Api('xframe_allow', optional: true)]
    public ?bool $xframeAllow;

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
    public static function with(string $name, ?bool $xframeAllow = null): self
    {
        $obj = new self;

        $obj->name = $name;

        null !== $xframeAllow && $obj->xframeAllow = $xframeAllow;

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
        $obj->xframeAllow = $xframeAllow;

        return $obj;
    }
}
