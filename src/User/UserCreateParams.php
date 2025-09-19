<?php

declare(strict_types=1);

namespace Legalesign\User;

use Legalesign\Core\Attributes\Api;
use Legalesign\Core\Concerns\SdkModel;
use Legalesign\Core\Concerns\SdkParams;
use Legalesign\Core\Contracts\BaseModel;
use Legalesign\User\UserCreateParams\Permission;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new UserCreateParams); // set properties as needed
 * $client->user->create(...$params->toArray());
 * ```
 * Create user.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->user->create(...$params->toArray());`
 *
 * @see Legalesign\User->create
 *
 * @phpstan-type user_create_params = array{
 *   email: string,
 *   firstName: string,
 *   lastName: string,
 *   groups?: string,
 *   password?: string,
 *   permission?: Permission|value-of<Permission>,
 *   timezone?: TimezoneEnum|value-of<TimezoneEnum>,
 * }
 */
final class UserCreateParams implements BaseModel
{
    /** @use SdkModel<user_create_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $email;

    #[Api('first_name')]
    public string $firstName;

    #[Api('last_name')]
    public string $lastName;

    /**
     * comma delimited list of groups to add user to, can be full group resource_uri or groupId.
     */
    #[Api(optional: true)]
    public ?string $groups;

    /**
     * If not set a verification email is sent. Password must be at least 8 chars, include upper and lower case, with a number and a special character.
     */
    #[Api(optional: true)]
    public ?string $password;

    /**
     * set user permissions * 1 - admin * 2 - create and send docs, team user * 3 - readonly, team user * 4 - send only, team user * 5 - send only, individual user * 6 - create and send docs, invidual user.
     *
     * @var value-of<Permission>|null $permission
     */
    #[Api(enum: Permission::class, optional: true)]
    public ?string $permission;

    /**
     * List of available timezones.
     *
     * @var value-of<TimezoneEnum>|null $timezone
     */
    #[Api(enum: TimezoneEnum::class, optional: true)]
    public ?string $timezone;

    /**
     * `new UserCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UserCreateParams::with(email: ..., firstName: ..., lastName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UserCreateParams)->withEmail(...)->withFirstName(...)->withLastName(...)
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
     *
     * @param Permission|value-of<Permission> $permission
     * @param TimezoneEnum|value-of<TimezoneEnum> $timezone
     */
    public static function with(
        string $email,
        string $firstName,
        string $lastName,
        ?string $groups = null,
        ?string $password = null,
        Permission|string|null $permission = null,
        TimezoneEnum|string|null $timezone = null,
    ): self {
        $obj = new self;

        $obj->email = $email;
        $obj->firstName = $firstName;
        $obj->lastName = $lastName;

        null !== $groups && $obj->groups = $groups;
        null !== $password && $obj->password = $password;
        null !== $permission && $obj->permission = $permission instanceof Permission ? $permission->value : $permission;
        null !== $timezone && $obj->timezone = $timezone instanceof TimezoneEnum ? $timezone->value : $timezone;

        return $obj;
    }

    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

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

    /**
     * comma delimited list of groups to add user to, can be full group resource_uri or groupId.
     */
    public function withGroups(string $groups): self
    {
        $obj = clone $this;
        $obj->groups = $groups;

        return $obj;
    }

    /**
     * If not set a verification email is sent. Password must be at least 8 chars, include upper and lower case, with a number and a special character.
     */
    public function withPassword(string $password): self
    {
        $obj = clone $this;
        $obj->password = $password;

        return $obj;
    }

    /**
     * set user permissions * 1 - admin * 2 - create and send docs, team user * 3 - readonly, team user * 4 - send only, team user * 5 - send only, individual user * 6 - create and send docs, invidual user.
     *
     * @param Permission|value-of<Permission> $permission
     */
    public function withPermission(Permission|string $permission): self
    {
        $obj = clone $this;
        $obj->permission = $permission instanceof Permission ? $permission->value : $permission;

        return $obj;
    }

    /**
     * List of available timezones.
     *
     * @param TimezoneEnum|value-of<TimezoneEnum> $timezone
     */
    public function withTimezone(TimezoneEnum|string $timezone): self
    {
        $obj = clone $this;
        $obj->timezone = $timezone instanceof TimezoneEnum ? $timezone->value : $timezone;

        return $obj;
    }
}
