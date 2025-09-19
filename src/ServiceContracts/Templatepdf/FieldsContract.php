<?php

declare(strict_types=1);

namespace Legalesign\ServiceContracts\Templatepdf;

use Legalesign\Core\Exceptions\APIException;
use Legalesign\Core\Implementation\HasRawResponse;
use Legalesign\RequestOptions;
use Legalesign\Templatepdf\Fields\FieldCreateParams\Body;
use Legalesign\Templatepdf\Fields\FieldListResponse;

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
