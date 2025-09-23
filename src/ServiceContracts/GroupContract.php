<?php

declare(strict_types=1);

namespace LegalesignSDK\ServiceContracts;

use LegalesignSDK\Core\Exceptions\APIException;
use LegalesignSDK\Core\Implementation\HasRawResponse;
use LegalesignSDK\Group\GroupGetResponse;
use LegalesignSDK\Group\GroupListResponse;
use LegalesignSDK\RequestOptions;

use const LegalesignSDK\Core\OMIT as omit;

interface GroupContract
{
    /**
     * @api
     *
     * @param string $name
     * @param bool $xframeAllow set to true if you want to embed your signing page
     *
     * @throws APIException
     */
    public function create(
        $name,
        $xframeAllow = omit,
        ?RequestOptions $requestOptions = null
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
     * @return GroupGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $groupID,
        ?RequestOptions $requestOptions = null
    ): GroupGetResponse;

    /**
     * @api
     *
     * @return GroupGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $groupID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): GroupGetResponse;

    /**
     * @api
     *
     * @param int $limit Length of dataset to return. Use with offset query to iterate through results.
     * @param int $offset Offset from start of dataset. Use with the limit query to iterate through dataset.
     *
     * @return GroupListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $limit = omit,
        $offset = omit,
        ?RequestOptions $requestOptions = null
    ): GroupListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return GroupListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): GroupListResponse;
}
