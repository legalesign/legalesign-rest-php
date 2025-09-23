<?php

declare(strict_types=1);

namespace LegalesignSDK\ServiceContracts\Templatepdf;

use LegalesignSDK\Core\Exceptions\APIException;
use LegalesignSDK\Core\Implementation\HasRawResponse;
use LegalesignSDK\RequestOptions;
use LegalesignSDK\Templatepdf\Fields\FieldCreateParams\Body;
use LegalesignSDK\Templatepdf\Fields\FieldListResponse;

interface FieldsContract
{
    /**
     * @api
     *
     * @param list<Body> $body
     *
     * @throws APIException
     */
    public function create(
        string $pdfID,
        $body,
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
        string $pdfID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @return FieldListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        string $pdfID,
        ?RequestOptions $requestOptions = null
    ): FieldListResponse;

    /**
     * @api
     *
     * @return FieldListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        string $pdfID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): FieldListResponse;
}
