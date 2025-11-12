<?php

declare(strict_types=1);

namespace LegalesignSDK\ServiceContracts;

use LegalesignSDK\Core\Exceptions\APIException;
use LegalesignSDK\Group\GroupCreateParams;
use LegalesignSDK\Group\GroupGetResponse;
use LegalesignSDK\Group\GroupListParams;
use LegalesignSDK\Group\GroupListResponse;
use LegalesignSDK\RequestOptions;

interface GroupContract
{
    /**
     * @api
     *
     * @param array<mixed>|GroupCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|GroupCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
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
     * @param array<mixed>|GroupListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|GroupListParams $params,
        ?RequestOptions $requestOptions = null
    ): GroupListResponse;
}
