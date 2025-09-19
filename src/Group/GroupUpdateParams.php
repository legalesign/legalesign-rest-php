<?php

declare(strict_types=1);

namespace Legalesign\Group;

use Legalesign\Core\Attributes\Api;
use Legalesign\Core\Concerns\SdkModel;
use Legalesign\Core\Concerns\SdkParams;
use Legalesign\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new GroupUpdateParams); // set properties as needed
 * $client->group->update(...$params->toArray());
 * ```
 * Update group.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->group->update(...$params->toArray());`
 *
 * @see Legalesign\Group->update
 *
 * @phpstan-type group_update_params = array{publicName?: string}
 */
final class GroupUpdateParams implements BaseModel
{
    /** @use SdkModel<group_update_params> */
    use SdkModel;
    use SdkParams;

    #[Api('public_name', optional: true)]
    public ?string $publicName;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $publicName = null): self
    {
        $obj = new self;

        null !== $publicName && $obj->publicName = $publicName;

        return $obj;
    }

    public function withPublicName(string $publicName): self
    {
        $obj = clone $this;
        $obj->publicName = $publicName;

        return $obj;
    }
}
