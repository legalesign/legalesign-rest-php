<?php

declare(strict_types=1);

namespace Legalesign\ServiceContracts;

use Legalesign\Core\Exceptions\APIException;
use Legalesign\Core\Implementation\HasRawResponse;
use Legalesign\RequestOptions;
use Legalesign\User\TimezoneEnum;
use Legalesign\User\UserCreateParams\Permission;
use Legalesign\User\UserGetResponse;

use const Legalesign\Core\OMIT as omit;

interface UserContract
{
    /**
     * @api
     *
     * @param string $email
     * @param string $firstName
     * @param string $lastName
     * @param string $groups comma delimited list of groups to add user to, can be full group resource_uri or groupId
     * @param string $password If not set a verification email is sent. Password must be at least 8 chars, include upper and lower case, with a number and a special character
     * @param Permission|value-of<Permission> $permission set user permissions * 1 - admin * 2 - create and send docs, team user * 3 - readonly, team user * 4 - send only, team user * 5 - send only, individual user * 6 - create and send docs, invidual user
     * @param TimezoneEnum|value-of<TimezoneEnum> $timezone List of available timezones
     *
     * @throws APIException
     */
    public function create(
        $email,
        $firstName,
        $lastName,
        $groups = omit,
        $password = omit,
        $permission = omit,
        $timezone = omit,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @return UserGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $userID,
        ?RequestOptions $requestOptions = null
    ): UserGetResponse;

    /**
     * @api
     *
     * @return UserGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $userID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): UserGetResponse;

    /**
     * @api
     *
     * @param string $firstName
     * @param string $lastName
     *
     * @throws APIException
     */
    public function update(
        string $userID,
        $firstName = omit,
        $lastName = omit,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $userID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
