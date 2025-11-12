<?php

declare(strict_types=1);

namespace LegalesignSDK\ServiceContracts;

use LegalesignSDK\Core\Exceptions\APIException;
use LegalesignSDK\RequestOptions;
use LegalesignSDK\Template\TemplateCreateParams;
use LegalesignSDK\Template\TemplateGetResponse;
use LegalesignSDK\Template\TemplateListParams;
use LegalesignSDK\Template\TemplateListResponse;

interface TemplateContract
{
    /**
     * @api
     *
     * @param array<mixed>|TemplateCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|TemplateCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $templateID,
        ?RequestOptions $requestOptions = null
    ): TemplateGetResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function update(
        string $templateID,
        string $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|TemplateListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|TemplateListParams $params,
        ?RequestOptions $requestOptions = null
    ): TemplateListResponse;
}
