<?php

declare(strict_types=1);

namespace LegalesignSDK\ServiceContracts;

use LegalesignSDK\Core\Exceptions\APIException;
use LegalesignSDK\Core\Implementation\HasRawResponse;
use LegalesignSDK\RequestOptions;
use LegalesignSDK\Status\StatusGetResponse;

interface StatusContract
{
    /**
     * @api
     *
     * @return StatusGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $docID,
        ?RequestOptions $requestOptions = null
    ): StatusGetResponse;

    /**
     * @api
     *
     * @return StatusGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $docID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): StatusGetResponse;
}
