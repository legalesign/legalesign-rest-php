<?php

declare(strict_types=1);

namespace Legalesign\Services;

use Legalesign\Client;
use Legalesign\Core\Exceptions\APIException;
use Legalesign\Core\Implementation\HasRawResponse;
use Legalesign\RequestOptions;
use Legalesign\ServiceContracts\UserContract;
use Legalesign\User\TimezoneEnum;
use Legalesign\User\UserCreateParams;
use Legalesign\User\UserCreateParams\Permission;
use Legalesign\User\UserGetResponse;
use Legalesign\User\UserUpdateParams;

use const Legalesign\Core\OMIT as omit;

final class UserService implements UserContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create user
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
    ): mixed {
        $params = [
            'email' => $email,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'groups' => $groups,
            'password' => $password,
            'permission' => $permission,
            'timezone' => $timezone,
        ];

        return $this->createRaw($params, $requestOptions);
    }

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
    ): mixed {
        [$parsed, $options] = UserCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'user/',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Get user
     *
     * @return UserGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $userID,
        ?RequestOptions $requestOptions = null
    ): UserGetResponse {
        $params = [];

        return $this->retrieveRaw($userID, $params, $requestOptions);
    }

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
    ): UserGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['user/%1$s/', $userID],
            options: $requestOptions,
            convert: UserGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update a user first name or last name
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
    ): mixed {
        $params = ['firstName' => $firstName, 'lastName' => $lastName];

        return $this->updateRaw($userID, $params, $requestOptions);
    }

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
    ): mixed {
        [$parsed, $options] = UserUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['user/%1$s/', $userID],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
