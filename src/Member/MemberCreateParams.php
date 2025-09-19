<?php

declare(strict_types=1);

namespace Legalesign\Member;

use Legalesign\Core\Attributes\Api;
use Legalesign\Core\Concerns\SdkModel;
use Legalesign\Core\Concerns\SdkParams;
use Legalesign\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new MemberCreateParams); // set properties as needed
 * $client->member->create(...$params->toArray());
 * ```
 * If the email is a registered user then access to group will be immediate, otherise an invitation will be created and emailed.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->member->create(...$params->toArray());`
 *
 * @see Legalesign\Member->create
 *
 * @phpstan-type member_create_params = array{
 *   email: string,
 *   group: string,
 *   doEmail?: bool,
 *   permission?: PermissionsEnum|value-of<PermissionsEnum>,
 * }
 */
final class MemberCreateParams implements BaseModel
{
    /** @use SdkModel<member_create_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $email;

    #[Api]
    public string $group;

    /**
     * use legalesign to send email notification to new user.
     */
    #[Api('do_email', optional: true)]
    public ?bool $doEmail;

    /**
     * Permissions options:
     *    * 1 - administrator
     *    * 2 - team docs visible, create & send
     *    * 3 - team docs visible, send only
     *    * 4 - no team sent docs visible, send only
     *    * 5 - no team docs visible, create & send
     *    * 6 - team docs visible, read only
     *
     * @var value-of<PermissionsEnum>|null $permission
     */
    #[Api(enum: PermissionsEnum::class, optional: true)]
    public ?int $permission;

    /**
     * `new MemberCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MemberCreateParams::with(email: ..., group: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MemberCreateParams)->withEmail(...)->withGroup(...)
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
     * @param PermissionsEnum|value-of<PermissionsEnum> $permission
     */
    public static function with(
        string $email,
        string $group,
        ?bool $doEmail = null,
        PermissionsEnum|int|null $permission = null,
    ): self {
        $obj = new self;

        $obj->email = $email;
        $obj->group = $group;

        null !== $doEmail && $obj->doEmail = $doEmail;
        null !== $permission && $obj->permission = $permission instanceof PermissionsEnum ? $permission->value : $permission;

        return $obj;
    }

    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

        return $obj;
    }

    public function withGroup(string $group): self
    {
        $obj = clone $this;
        $obj->group = $group;

        return $obj;
    }

    /**
     * use legalesign to send email notification to new user.
     */
    public function withDoEmail(bool $doEmail): self
    {
        $obj = clone $this;
        $obj->doEmail = $doEmail;

        return $obj;
    }

    /**
     * Permissions options:
     *    * 1 - administrator
     *    * 2 - team docs visible, create & send
     *    * 3 - team docs visible, send only
     *    * 4 - no team sent docs visible, send only
     *    * 5 - no team docs visible, create & send
     *    * 6 - team docs visible, read only
     *
     * @param PermissionsEnum|value-of<PermissionsEnum> $permission
     */
    public function withPermission(PermissionsEnum|int $permission): self
    {
        $obj = clone $this;
        $obj->permission = $permission instanceof PermissionsEnum ? $permission->value : $permission;

        return $obj;
    }
}
