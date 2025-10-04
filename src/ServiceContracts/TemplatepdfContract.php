<?php

declare(strict_types=1);

namespace LegalesignSDK\ServiceContracts;

use LegalesignSDK\Core\Exceptions\APIException;
use LegalesignSDK\RequestOptions;
use LegalesignSDK\Templatepdf\TemplatePdf;
use LegalesignSDK\Templatepdf\TemplatepdfListResponse;

use const LegalesignSDK\Core\OMIT as omit;

interface TemplatepdfContract
{
    /**
     * @api
     *
     * @param string $group
     * @param string $pdfFile base64 encoded PDF file data
     * @param bool $archiveUponSend archive PDF when sent
     * @param bool $processTags
     * @param string $title
     * @param string $user assign to group member if not api user
     *
     * @throws APIException
     */
    public function create(
        $group,
        $pdfFile,
        $archiveUponSend = omit,
        $processTags = omit,
        $title = omit,
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
     * @throws APIException
     */
    public function retrieve(
        string $pdfID,
        ?RequestOptions $requestOptions = null
    ): TemplatePdf;

    /**
     * @api
     *
     * @param string $archive
     * @param string $group can be full resource_uri or only id
     * @param int $limit Length of dataset to return. Use with offset query to iterate through results.
     * @param int $offset Offset from start of dataset. Use with the limit query to iterate through dataset.
     *
     * @throws APIException
     */
    public function list(
        $archive = omit,
        $group = omit,
        $limit = omit,
        $offset = omit,
        ?RequestOptions $requestOptions = null,
    ): TemplatepdfListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
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
