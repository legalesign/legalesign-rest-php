<?php

declare(strict_types=1);

namespace Legalesign\Services;

use Legalesign\Attachment\AttachmentListParams;
use Legalesign\Attachment\AttachmentListResponse;
use Legalesign\Attachment\AttachmentResponse;
use Legalesign\Attachment\AttachmentUploadParams;
use Legalesign\Client;
use Legalesign\Core\Exceptions\APIException;
use Legalesign\Core\Implementation\HasRawResponse;
use Legalesign\RequestOptions;
use Legalesign\ServiceContracts\AttachmentContract;

use const Legalesign\Core\OMIT as omit;

final class AttachmentService implements AttachmentContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get attachment
     *
     * @return AttachmentResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $attachmentID,
        ?RequestOptions $requestOptions = null
    ): AttachmentResponse {
        $params = [];

        return $this->retrieveRaw($attachmentID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return AttachmentResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $attachmentID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): AttachmentResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['attachment/%1$s/', $attachmentID],
            options: $requestOptions,
            convert: AttachmentResponse::class,
        );
    }

    /**
     * @api
     *
     * List attachments in your groups
     *
     * @param string $group Filter by a specific group
     * @param int $limit Length of dataset to return. Use with offset query to iterate through results.
     * @param int $offset Offset from start of dataset. Use with the limit query to iterate through dataset.
     *
     * @return AttachmentListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $group = omit,
        $limit = omit,
        $offset = omit,
        ?RequestOptions $requestOptions = null,
    ): AttachmentListResponse {
        $params = ['group' => $group, 'limit' => $limit, 'offset' => $offset];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return AttachmentListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): AttachmentListResponse {
        [$parsed, $options] = AttachmentListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'attachment/',
            query: $parsed,
            options: $options,
            convert: AttachmentListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete attachment
     *
     * @throws APIException
     */
    public function delete(
        string $attachmentID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = [];

        return $this->deleteRaw($attachmentID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $attachmentID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['attachment/%1$s/', $attachmentID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Upload PDF attachment
     *
     * @param string $filename Simple alphanumeric name ending .pdf
     * @param string $group URI of the group name
     * @param string $pdfFile Base64 encoded PDF file data, max size is a group setting, 5MB by default
     * @param string $description
     * @param string $user Assign to group member if not the api user
     *
     * @throws APIException
     */
    public function upload(
        $filename,
        $group,
        $pdfFile,
        $description = omit,
        $user = omit,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = [
            'filename' => $filename,
            'group' => $group,
            'pdfFile' => $pdfFile,
            'description' => $description,
            'user' => $user,
        ];

        return $this->uploadRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function uploadRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = AttachmentUploadParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'attachment/',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
