<?php

declare(strict_types=1);

namespace Legalesign\Services;

use Legalesign\Client;
use Legalesign\Core\Exceptions\APIException;
use Legalesign\Core\Implementation\HasRawResponse;
use Legalesign\RequestOptions;
use Legalesign\ServiceContracts\StatusContract;
use Legalesign\Status\StatusGetAllResponse;
use Legalesign\Status\StatusResponse;
use Legalesign\Status\StatusRetrieveAllParams;

use const Legalesign\Core\OMIT as omit;

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
     * @return StatusResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $docID,
        ?RequestOptions $requestOptions = null
    ): StatusResponse {
        $params = [];

        return $this->retrieveRaw($docID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return StatusResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $docID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): StatusResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['status/%1$s/', $docID],
            options: $requestOptions,
            convert: StatusResponse::class,
        );
    }

    /**
     * @api
     *
     * Shortened faster query for status of signing documents
     *
     * @param string $filter Filter on archived status, default is false
     * @param int $limit Length of dataset to return. Use with offset query to iterate through results.
     * @param int $offset Offset from start of dataset. Use with the limit query to iterate through dataset.
     *
     * @return StatusGetAllResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveAll(
        $filter = omit,
        $limit = omit,
        $offset = omit,
        ?RequestOptions $requestOptions = null,
    ): StatusGetAllResponse {
        $params = ['filter' => $filter, 'limit' => $limit, 'offset' => $offset];

        return $this->retrieveAllRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return StatusGetAllResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveAllRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): StatusGetAllResponse {
        [$parsed, $options] = StatusRetrieveAllParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'status/',
            query: $parsed,
            options: $options,
            convert: StatusGetAllResponse::class,
        );
    }
}
