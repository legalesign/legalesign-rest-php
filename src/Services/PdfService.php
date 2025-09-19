<?php

declare(strict_types=1);

namespace Legalesign\Services;

use Legalesign\Client;
use Legalesign\Core\Exceptions\APIException;
use Legalesign\Pdf\PdfCreatePreviewParams;
use Legalesign\RequestOptions;
use Legalesign\ServiceContracts\PdfContract;

use const Legalesign\Core\OMIT as omit;

final class PdfService implements PdfContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get the PDF for a signing document
     *
     * @throws APIException
     */
    public function retrieve(
        string $docID,
        ?RequestOptions $requestOptions = null
    ): string {
        $params = [];

        return $this->retrieveRaw($docID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $docID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): string {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['pdf/%1$s/', $docID],
            headers: ['Accept' => 'application/pdf'],
            options: $requestOptions,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * text/html document as pdf preview
     *
     * @param string $group
     * @param int $isSignaturePerPage
     * @param int $signatureType
     * @param int $signeeCount number of signers
     * @param string $text raw html
     * @param string $footer
     * @param int $footerHeight
     * @param string $header
     * @param int $headerHeight
     * @param bool $pdfheader Set to true to use group default
     * @param string $title
     *
     * @throws APIException
     */
    public function createPreview(
        $group,
        $isSignaturePerPage,
        $signatureType,
        $signeeCount,
        $text,
        $footer = omit,
        $footerHeight = omit,
        $header = omit,
        $headerHeight = omit,
        $pdfheader = omit,
        $title = omit,
        ?RequestOptions $requestOptions = null,
    ): string {
        $params = [
            'group' => $group,
            'isSignaturePerPage' => $isSignaturePerPage,
            'signatureType' => $signatureType,
            'signeeCount' => $signeeCount,
            'text' => $text,
            'footer' => $footer,
            'footerHeight' => $footerHeight,
            'header' => $header,
            'headerHeight' => $headerHeight,
            'pdfheader' => $pdfheader,
            'title' => $title,
        ];

        return $this->createPreviewRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createPreviewRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): string {
        [$parsed, $options] = PdfCreatePreviewParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'pdf/preview/',
            headers: ['Accept' => 'application/pdf'],
            body: (object) $parsed,
            options: $options,
            convert: 'string',
        );
    }
}
