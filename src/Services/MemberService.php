<?php

declare(strict_types=1);

namespace Legalesign\Services;

use Legalesign\Client;
use Legalesign\Core\Exceptions\APIException;
use Legalesign\Core\Implementation\HasRawResponse;
use Legalesign\Member\MemberCreateParams;
use Legalesign\Member\MemberListParams;
use Legalesign\Member\MemberListResponse;
use Legalesign\Member\MemberResponse;
use Legalesign\Member\PermissionsEnum;
use Legalesign\RequestOptions;
use Legalesign\ServiceContracts\MemberContract;

use const Legalesign\Core\OMIT as omit;

final class MemberService implements MemberContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * If the email is a registered user then access to group will be immediate, otherise an invitation will be created and emailed.
     *
     * @param string $email
     * @param string $group
     * @param bool $doEmail use legalesign to send email notification to new user
     * @param PermissionsEnum|value-of<PermissionsEnum> $permission Permissions options:
     *    * 1 - administrator
     *    * 2 - team docs visible, create & send
     *    * 3 - team docs visible, send only
     *    * 4 - no team sent docs visible, send only
     *    * 5 - no team docs visible, create & send
     *    * 6 - team docs visible, read only
     *
     * @throws APIException
     */
    public function create(
        $email,
        $group,
        $doEmail = omit,
        $permission = omit,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = [
            'email' => $email,
            'group' => $group,
            'doEmail' => $doEmail,
            'permission' => $permission,
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
        [$parsed, $options] = MemberCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'member/',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Get group member
     *
     * @return MemberResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $memberID,
        ?RequestOptions $requestOptions = null
    ): MemberResponse {
        $params = [];

        return $this->retrieveRaw($memberID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return MemberResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $memberID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): MemberResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['member/%1$s/', $memberID],
            options: $requestOptions,
            convert: MemberResponse::class,
        );
    }

    /**
     * @api
     *
     * List members of groups, one user may be in one or more groups
     *
     * @param string $group filter list by a given group
     * @param int $limit Length of dataset to return. Use with offset query to iterate through results.
     * @param int $offset Offset from start of dataset. Use with the limit query to iterate through dataset.
     *
     * @return MemberListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $group = omit,
        $limit = omit,
        $offset = omit,
        ?RequestOptions $requestOptions = null,
    ): MemberListResponse {
        $params = ['group' => $group, 'limit' => $limit, 'offset' => $offset];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return MemberListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): MemberListResponse {
        [$parsed, $options] = MemberListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'member/',
            query: $parsed,
            options: $options,
            convert: MemberListResponse::class,
        );
    }

    /**
     * @api
     *
     * Remove member from group
     *
     * @throws APIException
     */
    public function delete(
        string $memberID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = [];

        return $this->deleteRaw($memberID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $memberID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['member/%1$s/', $memberID],
            options: $requestOptions,
            convert: null,
        );
    }
}
