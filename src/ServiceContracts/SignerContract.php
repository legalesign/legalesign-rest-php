<?php

declare(strict_types=1);

namespace Legalesign\ServiceContracts;

use Legalesign\Core\Exceptions\APIException;
use Legalesign\Core\Implementation\HasRawResponse;
use Legalesign\RequestOptions;
use Legalesign\Signer\SignerGetFieldsResponseItem;
use Legalesign\Signer\SignerGetRejectionReasonResponse;
use Legalesign\Signer\SignerGetResponse;

use const Legalesign\Core\OMIT as omit;

interface SignerContract
{
    /**
     * @api
     *
     * @return SignerGetResponse<HasRawResponse>
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
     * @return SignerGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $signerID,
        mixed $params,
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
     * @throws APIException
     */
    public function getAccessLinkRaw(
        string $signerID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @return SignerGetRejectionReasonResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function getRejectionReason(
        string $signerID,
        ?RequestOptions $requestOptions = null
    ): SignerGetRejectionReasonResponse;

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
    ): SignerGetRejectionReasonResponse;

    /**
     * @api
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
    ): mixed;

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
     * @return list<SignerGetFieldsResponseItem>
     *
     * @throws APIException
     */
    public function retrieveFieldsRaw(
        string $signerID,
        mixed $params,
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
