<?php

declare(strict_types=1);

namespace LegalesignSDK\Services\Templatepdf;

use LegalesignSDK\Client;
use LegalesignSDK\Core\Exceptions\APIException;
use LegalesignSDK\Core\Implementation\HasRawResponse;
use LegalesignSDK\RequestOptions;
use LegalesignSDK\ServiceContracts\Templatepdf\FieldsContract;
use LegalesignSDK\Templatepdf\Fields\FieldCreateParams;
use LegalesignSDK\Templatepdf\Fields\FieldCreateParams\Body;
use LegalesignSDK\Templatepdf\Fields\FieldListResponse;

final class FieldsService implements FieldsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Replace existing pdf fields with new ones
     *
     * @param list<Body> $body
     *
     * @throws APIException
     */
    public function create(
        string $pdfID,
        $body,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['body' => $body];

        return $this->createRaw($pdfID, $params, $requestOptions);
    }

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
    ): mixed {
        [$parsed, $options] = FieldCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['templatepdf/%1$s/fields/', $pdfID],
            body: $parsed['body'],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Get PDF template fields
     *
     * @return FieldListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        string $pdfID,
        ?RequestOptions $requestOptions = null
    ): FieldListResponse {
        $params = [];

        return $this->listRaw($pdfID, $params, $requestOptions);
    }

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
    ): FieldListResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['templatepdf/%1$s/fields/', $pdfID],
            options: $requestOptions,
            convert: FieldListResponse::class,
        );
    }
}
