<?php

declare(strict_types=1);

namespace LegalesignSDK\ServiceContracts;

use LegalesignSDK\Core\Exceptions\APIException;
use LegalesignSDK\RequestOptions;

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
}
