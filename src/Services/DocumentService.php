<?php

declare(strict_types=1);

namespace LegalesignSDK\Services;

use LegalesignSDK\Client;
use LegalesignSDK\Core\Conversion\ListOf;
use LegalesignSDK\Core\Exceptions\APIException;
use LegalesignSDK\Document\DocumentCreateParams;
use LegalesignSDK\Document\DocumentGetFieldsResponseItem;
use LegalesignSDK\Document\DocumentGetResponse;
use LegalesignSDK\Document\DocumentListParams;
use LegalesignSDK\Document\DocumentListResponse;
use LegalesignSDK\Document\DocumentNewResponse;
use LegalesignSDK\RequestOptions;
use LegalesignSDK\ServiceContracts\DocumentContract;

final class DocumentService implements DocumentContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create signing document
     *
     * @param array{
     *   group: string,
     *   name: string,
     *   signers: list<array{
     *     email: string,
     *     firstname: string,
     *     lastname: string,
     *     attachments?: list<string>,
     *     behalfof?: string,
     *     decide_later?: bool,
     *     expires?: string|\DateTimeInterface|null,
     *     message?: string,
     *     order?: int,
     *     reviewers?: list<array<mixed>>,
     *     role?: "witness"|"approver",
     *     sms?: string,
     *     subject?: string,
     *     timezone?: string,
     *   }>,
     *   append_pdf?: bool,
     *   auto_archive?: bool,
     *   cc_emails?: string,
     *   convert_sender_to_signer?: bool,
     *   do_email?: bool,
     *   footer?: string,
     *   footer_height?: int,
     *   header?: string,
     *   header_height?: int,
     *   pdf_password?: string,
     *   pdf_password_type?: 1|2,
     *   pdftext?: array<string,string>,
     *   redirect?: string,
     *   reminders?: string,
     *   return_signer_links?: bool,
     *   signature_type?: int,
     *   signers_in_order?: bool,
     *   signertext?: array<string,string>,
     *   strict_fields?: bool,
     *   tag?: string,
     *   tag1?: string,
     *   tag2?: string,
     *   template?: string,
     *   templatepdf?: string,
     *   text?: string,
     *   user?: string,
     * }|DocumentCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|DocumentCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): DocumentNewResponse {
        [$parsed, $options] = DocumentCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'document/',
            body: (object) $parsed,
            options: $options,
            convert: DocumentNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Get document
     *
     * @throws APIException
     */
    public function retrieve(
        string $docID,
        ?RequestOptions $requestOptions = null
    ): DocumentGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['document/%1$s/', $docID],
            options: $requestOptions,
            convert: DocumentGetResponse::class,
        );
    }

    /**
     * @api
     *
     * List (unarchived) signing documents. Use /status/ if you need high-level information.
     *
     * @param array{
     *   group: string,
     *   archived?: string,
     *   created_gt?: string|\DateTimeInterface,
     *   email?: string,
     *   limit?: int,
     *   modified_gt?: string|\DateTimeInterface,
     *   nosigners?: string,
     *   offset?: int,
     *   status?: int,
     * }|DocumentListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|DocumentListParams $params,
        ?RequestOptions $requestOptions = null
    ): DocumentListResponse {
        [$parsed, $options] = DocumentListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'document/',
            query: $parsed,
            options: $options,
            convert: DocumentListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete does not remove permanently but sets it with status 40 (removed)  and archives it.
     *
     * @throws APIException
     */
    public function archive(
        string $docID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['document/%1$s/', $docID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Get document fields
     *
     * @return list<DocumentGetFieldsResponseItem>
     *
     * @throws APIException
     */
    public function getFields(
        string $docID,
        ?RequestOptions $requestOptions = null
    ): array {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['document/%1$s/fields/', $docID],
            options: $requestOptions,
            convert: new ListOf(DocumentGetFieldsResponseItem::class),
        );
    }

    /**
     * @api
     *
     * Permanently deletes data and files. You must enable group automated deletion. We recommend archiveDocument.
     *
     * @throws APIException
     */
    public function permanentlyDelete(
        string $docID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['document/%1$s/delete/', $docID],
            options: $requestOptions,
            convert: null,
        );
    }
}
