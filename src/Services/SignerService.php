<?php

declare(strict_types=1);

namespace Legalesign\Services;

use Legalesign\Client;
use Legalesign\Core\Conversion\ListOf;
use Legalesign\Core\Exceptions\APIException;
use Legalesign\Core\Implementation\HasRawResponse;
use Legalesign\RequestOptions;
use Legalesign\ServiceContracts\SignerContract;
use Legalesign\Signer\SignerGetFieldsResponseItem;
use Legalesign\Signer\SignerGetRejectionReasonResponse;
use Legalesign\Signer\SignerGetResponse;
use Legalesign\Signer\SignerResetParams;
use Legalesign\Signer\SignerSendReminderParams;

use const Legalesign\Core\OMIT as omit;

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
     * @return SignerGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $signerID,
        ?RequestOptions $requestOptions = null
    ): SignerGetResponse {
        $params = [];

        return $this->retrieveRaw($signerID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return SignerGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $signerID,
        mixed $params,
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
        $params = [];

        return $this->getAccessLinkRaw($signerID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function getAccessLinkRaw(
        string $signerID,
        mixed $params,
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
     * Returns reason signer gave for rejecting a document, if given
     *
     * @return SignerGetRejectionReasonResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function getRejectionReason(
        string $signerID,
        ?RequestOptions $requestOptions = null
    ): SignerGetRejectionReasonResponse {
        $params = [];

        return $this->getRejectionReasonRaw($signerID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return SignerGetRejectionReasonResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function getRejectionReasonRaw(
        string $signerID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): SignerGetRejectionReasonResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['signer/%1$s/rejection/', $signerID],
            options: $requestOptions,
            convert: SignerGetRejectionReasonResponse::class,
        );
    }

    /**
     * @api
     *
     * Reset to an earlier signer if forwarded
     *
     * @param string $email email of signer to revert to
     * @param bool $notify Email notify current signer access is being withdrawn
     *
     * @throws APIException
     */
    public function reset(
        string $signerID,
        $email,
        $notify = omit,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = ['email' => $email, 'notify' => $notify];

        return $this->resetRaw($signerID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function resetRaw(
        string $signerID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = SignerResetParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['signer/%1$s/reset/', $signerID],
            body: (object) $parsed,
            options: $options,
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
        $params = [];

        return $this->retrieveFieldsRaw($signerID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return list<SignerGetFieldsResponseItem>
     *
     * @throws APIException
     */
    public function retrieveFieldsRaw(
        string $signerID,
        mixed $params,
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
     * @param string $text custom message text, html will be stripped
     *
     * @throws APIException
     */
    public function sendReminder(
        string $signerID,
        $text = omit,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['text' => $text];

        return $this->sendReminderRaw($signerID, $params, $requestOptions);
    }

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
    ): mixed {
        [$parsed, $options] = SignerSendReminderParams::parseRequest(
            $params,
            $requestOptions
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
