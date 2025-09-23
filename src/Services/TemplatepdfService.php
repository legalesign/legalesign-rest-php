<?php

declare(strict_types=1);

namespace LegalesignSDK\Services;

use LegalesignSDK\Client;
use LegalesignSDK\Core\Exceptions\APIException;
use LegalesignSDK\Core\Implementation\HasRawResponse;
use LegalesignSDK\RequestOptions;
use LegalesignSDK\ServiceContracts\TemplatepdfContract;
use LegalesignSDK\Services\Templatepdf\FieldsService;
use LegalesignSDK\Templatepdf\TemplatePdf;
use LegalesignSDK\Templatepdf\TemplatepdfCreateParams;
use LegalesignSDK\Templatepdf\TemplatepdfListParams;
use LegalesignSDK\Templatepdf\TemplatepdfListResponse;

use const LegalesignSDK\Core\OMIT as omit;

final class TemplatepdfService implements TemplatepdfContract
{
    /**
     * @@api
     */
    public FieldsService $fields;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->fields = new FieldsService($client);
    }

    /**
     * @api
     *
     * Upload a PDF document you want to send to be signed
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
    ): mixed {
        $params = [
            'group' => $group,
            'pdfFile' => $pdfFile,
            'archiveUponSend' => $archiveUponSend,
            'processTags' => $processTags,
            'title' => $title,
            'user' => $user,
        ];

        return $this->createRaw($params, $requestOptions);
    }

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
    ): mixed {
        [$parsed, $options] = TemplatepdfCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'templatepdf/',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Get PDF template
     *
     * @return TemplatePdf<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $pdfID,
        ?RequestOptions $requestOptions = null
    ): TemplatePdf {
        $params = [];

        return $this->retrieveRaw($pdfID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return TemplatePdf<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $pdfID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): TemplatePdf {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['templatepdf/%1$s/', $pdfID],
            options: $requestOptions,
            convert: TemplatePdf::class,
        );
    }

    /**
     * @api
     *
     * Get PDF templates
     *
     * @param string $archive
     * @param string $group can be full resource_uri or only id
     * @param int $limit Length of dataset to return. Use with offset query to iterate through results.
     * @param int $offset Offset from start of dataset. Use with the limit query to iterate through dataset.
     *
     * @return TemplatepdfListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $archive = omit,
        $group = omit,
        $limit = omit,
        $offset = omit,
        ?RequestOptions $requestOptions = null,
    ): TemplatepdfListResponse {
        $params = [
            'archive' => $archive,
            'group' => $group,
            'limit' => $limit,
            'offset' => $offset,
        ];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return TemplatepdfListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): TemplatepdfListResponse {
        [$parsed, $options] = TemplatepdfListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'templatepdf/',
            query: $parsed,
            options: $options,
            convert: TemplatepdfListResponse::class,
        );
    }

    /**
     * @api
     *
     * Get PDF embeddable link
     *
     * @throws APIException
     */
    public function getEditLink(
        string $pdfID,
        ?RequestOptions $requestOptions = null
    ): string {
        $params = [];

        return $this->getEditLinkRaw($pdfID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function getEditLinkRaw(
        string $pdfID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): string {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['templatepdf/%1$s/edit-link/', $pdfID],
            options: $requestOptions,
            convert: 'string',
        );
    }
}
