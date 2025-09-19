<?php

declare(strict_types=1);

namespace Legalesign\User;

use Legalesign\Core\Attributes\Api;
use Legalesign\Core\Concerns\SdkModel;
use Legalesign\Core\Contracts\BaseModel;

/**
 * @phpstan-type user_get_response = array{
 *   dateJoined?: \DateTimeInterface,
 *   email?: string,
 *   firstName?: string,
 *   groups?: list<string>,
 *   lastLogin?: \DateTimeInterface,
 *   lastName?: string,
 *   resourceUri?: string,
 *   timezone?: value-of<TimezoneEnum>,
 *   username?: string,
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class UserGetResponse implements BaseModel
{
    /** @use SdkModel<user_get_response> */
    use SdkModel;

    #[Api('date_joined', optional: true)]
    public ?\DateTimeInterface $dateJoined;

    #[Api(optional: true)]
    public ?string $email;

    #[Api('first_name', optional: true)]
    public ?string $firstName;

    /** @var list<string>|null $groups */
    #[Api(list: 'string', optional: true)]
    public ?array $groups;

    #[Api('last_login', optional: true)]
    public ?\DateTimeInterface $lastLogin;

    #[Api('last_name', optional: true)]
    public ?string $lastName;

    #[Api('resource_uri', optional: true)]
    public ?string $resourceUri;

    /**
     * List of available timezones.
     *
     * @var value-of<TimezoneEnum>|null $timezone
     */
    #[Api(enum: TimezoneEnum::class, optional: true)]
    public ?string $timezone;

    #[Api(optional: true)]
    public ?string $username;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $groups
     * @param TimezoneEnum|value-of<TimezoneEnum> $timezone
     */
    public static function with(
        ?\DateTimeInterface $dateJoined = null,
        ?string $email = null,
        ?string $firstName = null,
        ?array $groups = null,
        ?\DateTimeInterface $lastLogin = null,
        ?string $lastName = null,
        ?string $resourceUri = null,
        TimezoneEnum|string|null $timezone = null,
        ?string $username = null,
    ): self {
        $obj = new self;

        null !== $dateJoined && $obj->dateJoined = $dateJoined;
        null !== $email && $obj->email = $email;
        null !== $firstName && $obj->firstName = $firstName;
        null !== $groups && $obj->groups = $groups;
        null !== $lastLogin && $obj->lastLogin = $lastLogin;
        null !== $lastName && $obj->lastName = $lastName;
        null !== $resourceUri && $obj->resourceUri = $resourceUri;
        null !== $timezone && $obj->timezone = $timezone instanceof TimezoneEnum ? $timezone->value : $timezone;
        null !== $username && $obj->username = $username;

        return $obj;
    }

    public function withDateJoined(\DateTimeInterface $dateJoined): self
    {
        $obj = clone $this;
        $obj->dateJoined = $dateJoined;

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

    /**
     * @param list<string> $groups
     */
    public function withGroups(array $groups): self
    {
        $obj = clone $this;
        $obj->groups = $groups;

        return $obj;
    }

    public function withLastLogin(\DateTimeInterface $lastLogin): self
    {
        $obj = clone $this;
        $obj->lastLogin = $lastLogin;

        return $obj;
    }

    public function withLastName(string $lastName): self
    {
        $obj = clone $this;
        $obj->lastName = $lastName;

        return $obj;
    }

    public function withResourceUri(string $resourceUri): self
    {
        $obj = clone $this;
        $obj->resourceUri = $resourceUri;

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

    public function withUsername(string $username): self
    {
        $obj = clone $this;
        $obj->username = $username;

        return $obj;
    }
}
