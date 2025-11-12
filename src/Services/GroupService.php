<?php

declare(strict_types=1);

namespace LegalesignSDK\Services;

use LegalesignSDK\Client;
use LegalesignSDK\Core\Exceptions\APIException;
use LegalesignSDK\Group\GroupCreateParams;
use LegalesignSDK\Group\GroupGetResponse;
use LegalesignSDK\Group\GroupListParams;
use LegalesignSDK\Group\GroupListResponse;
use LegalesignSDK\RequestOptions;
use LegalesignSDK\ServiceContracts\GroupContract;

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
     * @param array{name: string, xframe_allow?: bool}|GroupCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|GroupCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = GroupCreateParams::parseRequest(
            $params,
            $requestOptions,
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
     * @throws APIException
     */
    public function retrieve(
        string $groupID,
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
     * @param array{limit?: int, offset?: int}|GroupListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|GroupListParams $params,
        ?RequestOptions $requestOptions = null
    ): GroupListResponse {
        [$parsed, $options] = GroupListParams::parseRequest(
            $params,
            $requestOptions,
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
