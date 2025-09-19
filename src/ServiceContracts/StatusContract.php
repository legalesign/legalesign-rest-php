<?php

declare(strict_types=1);

namespace Legalesign\ServiceContracts;

use Legalesign\Core\Exceptions\APIException;
use Legalesign\Core\Implementation\HasRawResponse;
use Legalesign\RequestOptions;
use Legalesign\Status\StatusGetAllResponse;
use Legalesign\Status\StatusResponse;

use const Legalesign\Core\OMIT as omit;

interface StatusContract
{
    /**
     * @api
     *
     * @return StatusResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $docID,
        ?RequestOptions $requestOptions = null
    ): StatusResponse;

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
    ): StatusResponse;

    /**
     * @api
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
    ): StatusGetAllResponse;

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
    ): StatusGetAllResponse;
}
