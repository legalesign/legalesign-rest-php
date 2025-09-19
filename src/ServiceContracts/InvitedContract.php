<?php

declare(strict_types=1);

namespace Legalesign\ServiceContracts;

use Legalesign\Core\Exceptions\APIException;
use Legalesign\Core\Implementation\HasRawResponse;
use Legalesign\Invited\InvitedListResponse;
use Legalesign\RequestOptions;

use const Legalesign\Core\OMIT as omit;

interface InvitedContract
{
    /**
     * @api
     *
     * @param string $group filter list by a given group
     *
     * @return InvitedListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $group = omit,
        ?RequestOptions $requestOptions = null
    ): InvitedListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return InvitedListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): InvitedListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $invitedID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $invitedID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
