<?php

declare(strict_types=1);

namespace LegalesignSDK\ServiceContracts\Templatepdf;

use LegalesignSDK\Core\Exceptions\APIException;
use LegalesignSDK\RequestOptions;
use LegalesignSDK\Templatepdf\Fields\FieldCreateParams\Body;
use LegalesignSDK\Templatepdf\Fields\FieldListResponse;

interface FieldsContract
{
    /**
     * @api
     *
     * @param list<Body> $params
     *
     * @throws APIException
     */
    public function create(
        string $pdfID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        string $pdfID,
        ?RequestOptions $requestOptions = null
    ): FieldListResponse;
}
