<?php

declare(strict_types=1);

namespace LegalesignSDK\ServiceContracts;

use LegalesignSDK\Core\Exceptions\APIException;
use LegalesignSDK\RequestOptions;
use LegalesignSDK\Signer\SignerGetFieldsResponseItem;
use LegalesignSDK\Signer\SignerGetResponse;
use LegalesignSDK\Signer\SignerSendReminderParams;

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
     * @param array<mixed>|SignerSendReminderParams $params
     *
     * @throws APIException
     */
    public function sendReminder(
        string $signerID,
        array|SignerSendReminderParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
