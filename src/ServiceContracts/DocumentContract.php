<?php

declare(strict_types=1);

namespace LegalesignSDK\ServiceContracts;

use LegalesignSDK\Core\Exceptions\APIException;
use LegalesignSDK\Document\DocumentCreateParams;
use LegalesignSDK\Document\DocumentGetFieldsResponseItem;
use LegalesignSDK\Document\DocumentGetResponse;
use LegalesignSDK\Document\DocumentListParams;
use LegalesignSDK\Document\DocumentListResponse;
use LegalesignSDK\Document\DocumentNewResponse;
use LegalesignSDK\RequestOptions;

interface DocumentContract
{
    /**
     * @api
     *
     * @param array<mixed>|DocumentCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|DocumentCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): DocumentNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $docID,
        ?RequestOptions $requestOptions = null
    ): DocumentGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|DocumentListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|DocumentListParams $params,
        ?RequestOptions $requestOptions = null
    ): DocumentListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function archive(
        string $docID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @return list<DocumentGetFieldsResponseItem>
     *
     * @throws APIException
     */
    public function getFields(
        string $docID,
        ?RequestOptions $requestOptions = null
    ): array;

    /**
     * @api
     *
     * @throws APIException
     */
    public function permanentlyDelete(
        string $docID,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
