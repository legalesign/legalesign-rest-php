<?php

declare(strict_types=1);

namespace LegalesignSDK\Services;

use LegalesignSDK\Client;
use LegalesignSDK\Core\Exceptions\APIException;
use LegalesignSDK\Core\Implementation\HasRawResponse;
use LegalesignSDK\RequestOptions;
use LegalesignSDK\ServiceContracts\TemplateContract;
use LegalesignSDK\Template\TemplateCreateParams;
use LegalesignSDK\Template\TemplateGetResponse;
use LegalesignSDK\Template\TemplateListParams;
use LegalesignSDK\Template\TemplateListResponse;
use LegalesignSDK\Template\TemplateUpdateParams;

use const LegalesignSDK\Core\OMIT as omit;

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
    ): mixed {
        $params = [
            'group' => $group,
            'latestText' => $latestText,
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
        [$parsed, $options] = TemplateCreateParams::parseRequest(
            $params,
            $requestOptions
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
     * @return TemplateGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $templateID,
        ?RequestOptions $requestOptions = null
    ): TemplateGetResponse {
        $params = [];

        return $this->retrieveRaw($templateID, $params, $requestOptions);
    }

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
     * @param string $body json with any fields to update
     *
     * @throws APIException
     */
    public function update(
        string $templateID,
        $body,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['body' => $body];

        return $this->updateRaw($templateID, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = TemplateUpdateParams::parseRequest(
            $params,
            $requestOptions
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
    ): TemplateListResponse {
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
     * @return TemplateListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): TemplateListResponse {
        [$parsed, $options] = TemplateListParams::parseRequest(
            $params,
            $requestOptions
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
