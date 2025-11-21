<?php

declare(strict_types=1);

namespace LegalesignSDK\Services;

use LegalesignSDK\Client;
use LegalesignSDK\Core\Conversion\ListOf;
use LegalesignSDK\Core\Exceptions\APIException;
use LegalesignSDK\RequestOptions;
use LegalesignSDK\ServiceContracts\SignerContract;
use LegalesignSDK\Signer\SignerGetFieldsResponseItem;
use LegalesignSDK\Signer\SignerGetResponse;
use LegalesignSDK\Signer\SignerSendReminderParams;

final class SignerService implements SignerContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get status and details of an individual signer
     *
     * @throws APIException
     */
    public function retrieve(
        string $signerID,
        ?RequestOptions $requestOptions = null
    ): SignerGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['signer/%1$s/', $signerID],
            options: $requestOptions,
            convert: SignerGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns 1-use link for signer in Location header.
     *
     * @throws APIException
     */
    public function getAccessLink(
        string $signerID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['signer/%1$s/new-link/', $signerID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Get signer form fields
     *
     * @return list<SignerGetFieldsResponseItem>
     *
     * @throws APIException
     */
    public function retrieveFields(
        string $signerID,
        ?RequestOptions $requestOptions = null
    ): array {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['signer/%1$s/fields1/', $signerID],
            options: $requestOptions,
            convert: new ListOf(SignerGetFieldsResponseItem::class),
        );
    }

    /**
     * @api
     *
     * Send signer reminder email
     *
     * @param array{text?: string}|SignerSendReminderParams $params
     *
     * @throws APIException
     */
    public function sendReminder(
        string $signerID,
        array|SignerSendReminderParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = SignerSendReminderParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['signer/%1$s/send-reminder/', $signerID],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
