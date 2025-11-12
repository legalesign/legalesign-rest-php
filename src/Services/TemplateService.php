<?php

declare(strict_types=1);

namespace LegalesignSDK\Services;

use LegalesignSDK\Client;
use LegalesignSDK\Core\Exceptions\APIException;
use LegalesignSDK\RequestOptions;
use LegalesignSDK\ServiceContracts\TemplateContract;
use LegalesignSDK\Template\TemplateCreateParams;
use LegalesignSDK\Template\TemplateGetResponse;
use LegalesignSDK\Template\TemplateListParams;
use LegalesignSDK\Template\TemplateListResponse;
use LegalesignSDK\Template\TemplateUpdateParams;

final class TemplateService implements TemplateContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new html/text template. This probably isn't the method you are looking for. You can use the 'text' attribute in /document/ to create and send your HTML as a signing document in one call.
     *
     * @param array{
     *   group: string, latest_text: string, title: string, user?: string
     * }|TemplateCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|TemplateCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = TemplateCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'template/',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Get text template
     *
     * @throws APIException
     */
    public function retrieve(
        string $templateID,
        ?RequestOptions $requestOptions = null
    ): TemplateGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['template/%1$s/', $templateID],
            options: $requestOptions,
            convert: TemplateGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update text template
     *
     * @throws APIException
     */
    public function update(
        string $templateID,
        string $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = TemplateUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['template/%1$s/', $templateID],
            body: $parsed['body'],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Get text templates
     *
     * @param array{
     *   archive?: string, group?: string, limit?: int, offset?: int
     * }|TemplateListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|TemplateListParams $params,
        ?RequestOptions $requestOptions = null
    ): TemplateListResponse {
        [$parsed, $options] = TemplateListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'template/',
            query: $parsed,
            options: $options,
            convert: TemplateListResponse::class,
        );
    }
}
