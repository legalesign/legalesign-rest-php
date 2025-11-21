<?php

declare(strict_types=1);

namespace LegalesignSDK\Services;

use LegalesignSDK\Client;
use LegalesignSDK\Core\Exceptions\APIException;
use LegalesignSDK\RequestOptions;
use LegalesignSDK\ServiceContracts\TemplatepdfContract;
use LegalesignSDK\Services\Templatepdf\FieldsService;
use LegalesignSDK\Templatepdf\TemplatePdf;
use LegalesignSDK\Templatepdf\TemplatepdfCreateParams;
use LegalesignSDK\Templatepdf\TemplatepdfListParams;
use LegalesignSDK\Templatepdf\TemplatepdfListResponse;

final class TemplatepdfService implements TemplatepdfContract
{
    /**
     * @api
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
     * @param array{
     *   group: string,
     *   pdf_file: string,
     *   archive_upon_send?: bool,
     *   process_tags?: bool,
     *   title?: string,
     *   user?: string,
     * }|TemplatepdfCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|TemplatepdfCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = TemplatepdfCreateParams::parseRequest(
            $params,
            $requestOptions,
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
     * @throws APIException
     */
    public function retrieve(
        string $pdfID,
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
     * @param array{
     *   archive?: string, group?: string, limit?: int, offset?: int
     * }|TemplatepdfListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|TemplatepdfListParams $params,
        ?RequestOptions $requestOptions = null
    ): TemplatepdfListResponse {
        [$parsed, $options] = TemplatepdfListParams::parseRequest(
            $params,
            $requestOptions,
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
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['templatepdf/%1$s/edit-link/', $pdfID],
            options: $requestOptions,
            convert: 'string',
        );
    }
}
