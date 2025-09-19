<?php

declare(strict_types=1);

namespace Legalesign\ServiceContracts;

use Legalesign\Core\Exceptions\APIException;
use Legalesign\Core\Implementation\HasRawResponse;
use Legalesign\Member\MemberListResponse;
use Legalesign\Member\MemberResponse;
use Legalesign\Member\PermissionsEnum;
use Legalesign\RequestOptions;

use const Legalesign\Core\OMIT as omit;

interface MemberContract
{
    /**
     * @api
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
     * @return MemberResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $memberID,
        ?RequestOptions $requestOptions = null
    ): MemberResponse;

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
    ): MemberResponse;

    /**
     * @api
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
    ): MemberListResponse;

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
    ): MemberListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $memberID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $memberID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
