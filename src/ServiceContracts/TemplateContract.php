<?php

declare(strict_types=1);

namespace Legalesign\ServiceContracts;

use Legalesign\Core\Exceptions\APIException;
use Legalesign\Core\Implementation\HasRawResponse;
use Legalesign\RequestOptions;
use Legalesign\Template\TemplateGetResponse;
use Legalesign\Template\TemplateListResponse;

use const Legalesign\Core\OMIT as omit;

interface TemplateContract
{
    /**
     * @api
     *
     * @param string $group
     * @param string $latestText text/html for template
     * @param string $title
     * @param string $user assign to a user if not api user
     *
     * @throws APIException
     */
    public function create(
        $group,
        $latestText,
        $title,
        $user = omit,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @return TemplateGetResponse<HasRawResponse>
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
     * @return TemplateGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $templateID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): TemplateGetResponse;

    /**
     * @api
     *
     * @param string $body json with any fields to update
     *
     * @throws APIException
     */
    public function update(
        string $templateID,
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
    public function updateRaw(
        string $templateID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $archive
     * @param string $group can be full resource_uri or only id
     * @param int $limit Length of dataset to return. Use with offset query to iterate through results.
     * @param int $offset Offset from start of dataset. Use with the limit query to iterate through dataset.
     *
     * @return TemplateListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $archive = omit,
        $group = omit,
        $limit = omit,
        $offset = omit,
        ?RequestOptions $requestOptions = null,
    ): TemplateListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return TemplateListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): TemplateListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function archive(
        string $templateID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function archiveRaw(
        string $templateID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
