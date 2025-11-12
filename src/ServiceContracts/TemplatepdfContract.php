<?php

declare(strict_types=1);

namespace LegalesignSDK\ServiceContracts;

use LegalesignSDK\Core\Exceptions\APIException;
use LegalesignSDK\RequestOptions;
use LegalesignSDK\Templatepdf\TemplatePdf;
use LegalesignSDK\Templatepdf\TemplatepdfCreateParams;
use LegalesignSDK\Templatepdf\TemplatepdfListParams;
use LegalesignSDK\Templatepdf\TemplatepdfListResponse;

interface TemplatepdfContract
{
    /**
     * @api
     *
     * @param array<mixed>|TemplatepdfCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|TemplatepdfCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $pdfID,
        ?RequestOptions $requestOptions = null
    ): TemplatePdf;

    /**
     * @api
     *
     * @param array<mixed>|TemplatepdfListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|TemplatepdfListParams $params,
        ?RequestOptions $requestOptions = null,
    ): TemplatepdfListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getEditLink(
        string $pdfID,
        ?RequestOptions $requestOptions = null
    ): string;
}
