<?php

declare(strict_types=1);

namespace Legalesign\Services;

use Legalesign\Client;
use Legalesign\Core\Conversion\ListOf;
use Legalesign\Core\Exceptions\APIException;
use Legalesign\Core\Implementation\HasRawResponse;
use Legalesign\Document\DocumentCreateParams;
use Legalesign\Document\DocumentCreateParams\PdfPasswordType;
use Legalesign\Document\DocumentCreateParams\Signer;
use Legalesign\Document\DocumentGetFieldsResponseItem;
use Legalesign\Document\DocumentGetResponse;
use Legalesign\Document\DocumentListParams;
use Legalesign\Document\DocumentListResponse;
use Legalesign\Document\DocumentNewResponse;
use Legalesign\Document\DocumentPreviewParams;
use Legalesign\RequestOptions;
use Legalesign\ServiceContracts\DocumentContract;

use const Legalesign\Core\OMIT as omit;

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
     * @param string $group
     * @param string $name
     * @param list<Signer> $signers
     * @param bool $appendPdf Append Legalesign validation info to final PDF. If not included uses the group default.
     * @param bool $autoArchive Send to archive soon after signing. Keeps web app clutter free
     * @param string $ccEmails comma delimited string of email addresses that are notified of signing or rejection
     * @param bool $convertSenderToSigner if any sender fields are left blank, convert them to fields for the first recipient
     * @param bool $doEmail Use Legalesign email to send notification emails. If false suppresses all emails.
     * @param string $footer Text doc only. The footer for the final pdf. Use keyword \"default\" to use group default footer.
     * @param int $footerHeight Text based doc only. Pixel height of PDF footer, if used. 1px = 0.025cm
     * @param string $header Text based doc only. The header for the final pdf. Use keyword \"default\" to use group header footer.
     * @param int $headerHeight Text based doc only. Pixel height of final PDF footer, if used. 1px = 0.025cm
     * @param string $pdfPassword Set a password. Must be ascii encode-able, you must also set signature_type to 4 and choose a pdf_password_type.
     * @param PdfPasswordType|value-of<PdfPasswordType> $pdfPasswordType 1 to store password, 2 for to delete from our records upon final signing
     * @param array<string,
     * string,> $pdftext Assign values to PDF sender fields, use field labels as keys. Requires unique fields labels. See also strict_fields.
     * @param string $redirect URL to send the signer to after signing (instead of download page).  Your URL will include query parameters with ID and state information as follows: YOUR-URL?signer=[signer_uid]&doc=[doc_id]&group=[group_id]&signer_state=[signer_status]&doc_state=[doc_status]
     * @param string $reminders Put 'default' if you wish to use the default reminder schedule in the group (go to web app to set default schedule)
     * @param bool $returnSignerLinks return document links for signers in the response BODY
     * @param int $signatureType Use 4 to get your executed PDF Certified. Recommended. Defaults to 1 (uses a sha256 hash for document integrity).
     * @param bool $signersInOrder Notify signers in their order sequence. If false all are notified simulataneously.
     * @param array<string,
     * string,> $signertext Add custom placeholders to signer fields, using labels as keys in an object (as for pdftext). Relies on unique labelling.
     * @param bool $strictFields pdftext fails silently for invalid field value, set to true to return an error
     * @param string $tag
     * @param string $tag1
     * @param string $tag2
     * @param string $template Resource URI of text template object. This call must contain either one of the attributes text, templatepdf, template.
     * @param string $templatepdf Resource URI of templatepdf object. This API call must contain either one of the attributes text, templatepdf, template.
     * @param string $text Raw html. This API call must contain either one of the attributes text, templatepdf, template.
     * @param string $user Assign document another user in the group. Defaults to API
     *
     * @return DocumentNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $group,
        $name,
        $signers,
        $appendPdf = omit,
        $autoArchive = omit,
        $ccEmails = omit,
        $convertSenderToSigner = omit,
        $doEmail = omit,
        $footer = omit,
        $footerHeight = omit,
        $header = omit,
        $headerHeight = omit,
        $pdfPassword = omit,
        $pdfPasswordType = omit,
        $pdftext = omit,
        $redirect = omit,
        $reminders = omit,
        $returnSignerLinks = omit,
        $signatureType = omit,
        $signersInOrder = omit,
        $signertext = omit,
        $strictFields = omit,
        $tag = omit,
        $tag1 = omit,
        $tag2 = omit,
        $template = omit,
        $templatepdf = omit,
        $text = omit,
        $user = omit,
        ?RequestOptions $requestOptions = null,
    ): DocumentNewResponse {
        $params = [
            'group' => $group,
            'name' => $name,
            'signers' => $signers,
            'appendPdf' => $appendPdf,
            'autoArchive' => $autoArchive,
            'ccEmails' => $ccEmails,
            'convertSenderToSigner' => $convertSenderToSigner,
            'doEmail' => $doEmail,
            'footer' => $footer,
            'footerHeight' => $footerHeight,
            'header' => $header,
            'headerHeight' => $headerHeight,
            'pdfPassword' => $pdfPassword,
            'pdfPasswordType' => $pdfPasswordType,
            'pdftext' => $pdftext,
            'redirect' => $redirect,
            'reminders' => $reminders,
            'returnSignerLinks' => $returnSignerLinks,
            'signatureType' => $signatureType,
            'signersInOrder' => $signersInOrder,
            'signertext' => $signertext,
            'strictFields' => $strictFields,
            'tag' => $tag,
            'tag1' => $tag1,
            'tag2' => $tag2,
            'template' => $template,
            'templatepdf' => $templatepdf,
            'text' => $text,
            'user' => $user,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return DocumentNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): DocumentNewResponse {
        [$parsed, $options] = DocumentCreateParams::parseRequest(
            $params,
            $requestOptions
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
     * @return DocumentGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $docID,
        ?RequestOptions $requestOptions = null
    ): DocumentGetResponse {
        $params = [];

        return $this->retrieveRaw($docID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return DocumentGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $docID,
        mixed $params,
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
     * @param string $group filter by a specific group, required
     * @param string $archived Filter on archived status, default is false
     * @param \DateTimeInterface $createdGt Filter for those documents created after a certain time
     * @param string $email Filter by signer email
     * @param int $limit Length of dataset to return. Use with offset query to iterate through results.
     * @param \DateTimeInterface $modifiedGt Filter for those documents modified after a certain time
     * @param string $nosigners Add value '1' to remove signers information for a faster query
     * @param int $offset Offset from start of dataset. Use with the limit query to iterate through dataset.
     * @param int $status Filter on document status
     *
     * @return DocumentListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $group,
        $archived = omit,
        $createdGt = omit,
        $email = omit,
        $limit = omit,
        $modifiedGt = omit,
        $nosigners = omit,
        $offset = omit,
        $status = omit,
        ?RequestOptions $requestOptions = null,
    ): DocumentListResponse {
        $params = [
            'group' => $group,
            'archived' => $archived,
            'createdGt' => $createdGt,
            'email' => $email,
            'limit' => $limit,
            'modifiedGt' => $modifiedGt,
            'nosigners' => $nosigners,
            'offset' => $offset,
            'status' => $status,
        ];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return DocumentListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): DocumentListResponse {
        [$parsed, $options] = DocumentListParams::parseRequest(
            $params,
            $requestOptions
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
        $params = [];

        return $this->archiveRaw($docID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function archiveRaw(
        string $docID,
        mixed $params,
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
     * Permanently deletes data and files. You must enable group automated deletion. We recommend archiveDocument.
     *
     * @throws APIException
     */
    public function deletePermanently(
        string $docID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = [];

        return $this->deletePermanentlyRaw($docID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function deletePermanentlyRaw(
        string $docID,
        mixed $params,
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

    /**
     * @api
     *
     * Download pdf of audit log
     *
     * @throws APIException
     */
    public function downloadAuditLog(
        string $docID,
        ?RequestOptions $requestOptions = null
    ): string {
        $params = [];

        return $this->downloadAuditLogRaw($docID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function downloadAuditLogRaw(
        string $docID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): string {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['document/%1$s/auditlog/', $docID],
            headers: ['Accept' => 'application/pdf'],
            options: $requestOptions,
            convert: 'string',
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
        $params = [];

        return $this->getFieldsRaw($docID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return list<DocumentGetFieldsResponseItem>
     *
     * @throws APIException
     */
    public function getFieldsRaw(
        string $docID,
        mixed $params,
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
     * Returns a redirect response (302) with link in the Location header to a one-use temporary URL you can redirect to, to see a preview of the signing page. Follow the redirect immediately since it expires after a few seconds.
     *
     * @param string $group
     * @param int $signeeCount
     * @param string $text
     * @param string $title
     *
     * @throws APIException
     */
    public function preview(
        $group = omit,
        $signeeCount = omit,
        $text = omit,
        $title = omit,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = [
            'group' => $group,
            'signeeCount' => $signeeCount,
            'text' => $text,
            'title' => $title,
        ];

        return $this->previewRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function previewRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = DocumentPreviewParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'document/preview/',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
