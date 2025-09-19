<?php

declare(strict_types=1);

namespace Legalesign\Services;

use Legalesign\Client;
use Legalesign\Core\Exceptions\APIException;
use Legalesign\Core\Implementation\HasRawResponse;
use Legalesign\Invited\InvitedListParams;
use Legalesign\Invited\InvitedListResponse;
use Legalesign\RequestOptions;
use Legalesign\ServiceContracts\InvitedContract;

use const Legalesign\Core\OMIT as omit;

final class InvitedService implements InvitedContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Invitations to people to join the group are listed by email
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
    ): InvitedListResponse {
        $params = ['group' => $group];

        return $this->listRaw($params, $requestOptions);
    }

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
    ): InvitedListResponse {
        [$parsed, $options] = InvitedListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'invited/',
            query: $parsed,
            options: $options,
            convert: InvitedListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete invitation
     *
     * @throws APIException
     */
    public function delete(
        string $invitedID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = [];

        return $this->deleteRaw($invitedID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $invitedID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['invited/%1$s/', $invitedID],
            options: $requestOptions,
            convert: null,
        );
    }
}
