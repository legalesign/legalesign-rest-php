<?php

declare(strict_types=1);

namespace Legalesign\ServiceContracts;

use Legalesign\Attachment\AttachmentListResponse;
use Legalesign\Attachment\AttachmentResponse;
use Legalesign\Core\Exceptions\APIException;
use Legalesign\Core\Implementation\HasRawResponse;
use Legalesign\RequestOptions;

use const Legalesign\Core\OMIT as omit;

interface AttachmentContract
{
    /**
     * @api
     *
     * @return AttachmentResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $attachmentID,
        ?RequestOptions $requestOptions = null
    ): AttachmentResponse;

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
        ?RequestOptions $requestOptions = null,
    ): AttachmentResponse;

    /**
     * @api
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
    ): AttachmentListResponse;

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
    ): AttachmentListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $attachmentID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $attachmentID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
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
    ): mixed;

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
    ): mixed;
}
