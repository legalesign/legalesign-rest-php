<?php

declare(strict_types=1);

namespace LegalesignSDK\ServiceContracts;

use LegalesignSDK\Core\Exceptions\APIException;
use LegalesignSDK\RequestOptions;
use LegalesignSDK\Signer\SignerGetFieldsResponseItem;
use LegalesignSDK\Signer\SignerGetResponse;

use const LegalesignSDK\Core\OMIT as omit;

interface SignerContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $signerID,
        ?RequestOptions $requestOptions = null
    ): SignerGetResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getAccessLink(
        string $signerID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @return list<SignerGetFieldsResponseItem>
     *
     * @throws APIException
     */
    public function retrieveFields(
        string $signerID,
        ?RequestOptions $requestOptions = null
    ): array;

    /**
     * @api
     *
     * @param string $text custom message text, html will be stripped
     *
     * @throws APIException
     */
    public function sendReminder(
        string $signerID,
        $text = omit,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function sendReminderRaw(
        string $signerID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
