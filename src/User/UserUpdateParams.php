<?php

declare(strict_types=1);

namespace Legalesign\User;

use Legalesign\Core\Attributes\Api;
use Legalesign\Core\Concerns\SdkModel;
use Legalesign\Core\Concerns\SdkParams;
use Legalesign\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new UserUpdateParams); // set properties as needed
 * $client->user->update(...$params->toArray());
 * ```
 * Update a user first name or last name.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->user->update(...$params->toArray());`
 *
 * @see Legalesign\User->update
 *
 * @phpstan-type user_update_params = array{firstName?: string, lastName?: string}
 */
final class UserUpdateParams implements BaseModel
{
    /** @use SdkModel<user_update_params> */
    use SdkModel;
    use SdkParams;

    #[Api('first_name', optional: true)]
    public ?string $firstName;

    #[Api('last_name', optional: true)]
    public ?string $lastName;

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
        ?string $firstName = null,
        ?string $lastName = null
    ): self {
        $obj = new self;

        null !== $firstName && $obj->firstName = $firstName;
        null !== $lastName && $obj->lastName = $lastName;

        return $obj;
    }

    public function withFirstName(string $firstName): self
    {
        $obj = clone $this;
        $obj->firstName = $firstName;

        return $obj;
    }

    public function withLastName(string $lastName): self
    {
        $obj = clone $this;
        $obj->lastName = $lastName;

        return $obj;
    }
}
