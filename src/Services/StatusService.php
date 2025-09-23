<?php

declare(strict_types=1);

namespace LegalesignSDK\Services;

use LegalesignSDK\Client;
use LegalesignSDK\Core\Exceptions\APIException;
use LegalesignSDK\Core\Implementation\HasRawResponse;
use LegalesignSDK\RequestOptions;
use LegalesignSDK\ServiceContracts\StatusContract;
use LegalesignSDK\Status\StatusGetResponse;

final class StatusService implements StatusContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Faster short query for a document status
     *
     * @return StatusGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $docID,
        ?RequestOptions $requestOptions = null
    ): StatusGetResponse {
        $params = [];

        return $this->retrieveRaw($docID, $params, $requestOptions);
    }

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
    ): StatusGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['status/%1$s/', $docID],
            options: $requestOptions,
            convert: StatusGetResponse::class,
        );
    }
}
