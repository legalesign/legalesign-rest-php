<?php

declare(strict_types=1);

namespace Legalesign\Invited;

use Legalesign\Core\Attributes\Api;
use Legalesign\Core\Concerns\SdkModel;
use Legalesign\Core\Concerns\SdkParams;
use Legalesign\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new InvitedListParams); // set properties as needed
 * $client->invited->list(...$params->toArray());
 * ```
 * Invitations to people to join the group are listed by email.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->invited->list(...$params->toArray());`
 *
 * @see Legalesign\Invited->list
 *
 * @phpstan-type invited_list_params = array{group?: string}
 */
final class InvitedListParams implements BaseModel
{
    /** @use SdkModel<invited_list_params> */
    use SdkModel;
    use SdkParams;

    /**
     * filter list by a given group.
     */
    #[Api(optional: true)]
    public ?string $group;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $group = null): self
    {
        $obj = new self;

        null !== $group && $obj->group = $group;

        return $obj;
    }

    /**
     * filter list by a given group.
     */
    public function withGroup(string $group): self
    {
        $obj = clone $this;
        $obj->group = $group;

        return $obj;
    }
}
