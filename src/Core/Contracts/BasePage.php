<?php

declare(strict_types=1);

namespace LegalesignSDK\Core\Contracts;

use LegalesignSDK\Client;
use LegalesignSDK\Core\Conversion\Contracts\Converter;
use LegalesignSDK\Core\Conversion\Contracts\ConverterSource;
use LegalesignSDK\RequestOptions;
use Psr\Http\Message\ResponseInterface;

/**
 * @internal
 *
 * @phpstan-import-type normalized_request from \LegalesignSDK\Core\BaseClient
 *
 * @template Item
 *
 * @extends \IteratorAggregate<int, static>
 */
interface BasePage extends \IteratorAggregate
{
    /**
     * @internal
     *
     * @param normalized_request $request
     */
    public function __construct(
        Converter|ConverterSource|string $convert,
        Client $client,
        array $request,
        RequestOptions $options,
        ResponseInterface $response,
    );

    public function hasNextPage(): bool;

    /**
     * @return list<Item>
     */
    public function getItems(): array;

    /**
     * @return static<Item>
     */
    public function getNextPage(): static;

    /**
     * @return \Generator<Item>
     */
    public function pagingEachItem(): \Generator;
}
