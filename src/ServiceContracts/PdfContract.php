<?php

declare(strict_types=1);

namespace Legalesign\ServiceContracts;

use Legalesign\Core\Exceptions\APIException;
use Legalesign\RequestOptions;

use const Legalesign\Core\OMIT as omit;

interface PdfContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $docID,
        ?RequestOptions $requestOptions = null
    ): string;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $docID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): string;

    /**
     * @api
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
    ): string;

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
    ): string;
}
