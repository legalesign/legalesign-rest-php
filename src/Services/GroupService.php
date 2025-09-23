<?php

declare(strict_types=1);

namespace LegalesignSDK\Services;

use LegalesignSDK\Client;
use LegalesignSDK\Core\Exceptions\APIException;
use LegalesignSDK\Core\Implementation\HasRawResponse;
use LegalesignSDK\Group\GroupCreateParams;
use LegalesignSDK\Group\GroupGetResponse;
use LegalesignSDK\Group\GroupListParams;
use LegalesignSDK\Group\GroupListResponse;
use LegalesignSDK\RequestOptions;
use LegalesignSDK\ServiceContracts\GroupContract;

use const LegalesignSDK\Core\OMIT as omit;

final class GroupService implements GroupContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create group
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
    ): mixed {
        $params = ['name' => $name, 'xframeAllow' => $xframeAllow];

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
        [$parsed, $options] = GroupCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'group/',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Get group
     *
     * @return GroupGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $groupID,
        ?RequestOptions $requestOptions = null
    ): GroupGetResponse {
        $params = [];

        return $this->retrieveRaw($groupID, $params, $requestOptions);
    }

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
    ): GroupGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['group/%1$s/', $groupID],
            options: $requestOptions,
            convert: GroupGetResponse::class,
        );
    }

    /**
     * @api
     *
     * List groups the api user belongs to
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
    ): GroupListResponse {
        $params = ['limit' => $limit, 'offset' => $offset];

        return $this->listRaw($params, $requestOptions);
    }

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
    ): GroupListResponse {
        [$parsed, $options] = GroupListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'group/',
            query: $parsed,
            options: $options,
            convert: GroupListResponse::class,
        );
    }
}
