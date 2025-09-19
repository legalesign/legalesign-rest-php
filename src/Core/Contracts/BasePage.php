<?php

declare(strict_types=1);

namespace Legalesign\Core\Contracts;

use Legalesign\Client;
use Legalesign\Core\Conversion\Contracts\Converter;
use Legalesign\Core\Conversion\Contracts\ConverterSource;
use Legalesign\RequestOptions;

/**
 * @internal
 *
 * @phpstan-import-type normalized_request from \Legalesign\Core\BaseClient
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
        mixed $data,
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
