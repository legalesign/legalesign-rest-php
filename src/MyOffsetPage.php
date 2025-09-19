<?php

namespace Legalesign;

use Legalesign\Core\Attributes\Api;
use Legalesign\Core\Concerns\SdkModel;
use Legalesign\Core\Concerns\SdkPage;
use Legalesign\Core\Contracts\BaseModel;
use Legalesign\Core\Contracts\BasePage;
use Legalesign\Core\Conversion;
use Legalesign\Core\Conversion\Contracts\Converter;
use Legalesign\Core\Conversion\Contracts\ConverterSource;
use Legalesign\Core\Conversion\ListOf;

/**
 * @phpstan-type my_offset_page = array{objects?: list<mixed>|null, meta?: mixed}
 *
 * @template TItem
 *
 * @implements BasePage<TItem>
 */
final class MyOffsetPage implements BaseModel, BasePage
{
    /** @use SdkModel<my_offset_page> */
    use SdkModel;

    /** @use SdkPage<TItem> */
    use SdkPage;

    /** @var list<TItem>|null $objects */
    #[Api(list: 'mixed', optional: true)]
    public ?array $objects;

    #[Api(optional: true)]
    public mixed $meta;

    /**
     * @internal
     *
     * @param array{
     *   method: string,
     *   path: string,
     *   query: array<string, mixed>,
     *   headers: array<string, string|list<string>|null>,
     *   body: mixed,
     * } $request
     */
    public function __construct(
        private string|Converter|ConverterSource $convert,
        private Client $client,
        private array $request,
        private RequestOptions $options,
        mixed $data,
    ) {
        $this->initialize();

        if (!is_array($data)) {
            return;
        }

        // @phpstan-ignore-next-line
        self::__unserialize($data);

        if ($this->offsetExists('objects')) {
            $acc = Conversion::coerce(
                new ListOf($convert),
                value: $this->offsetGet('objects')
            );
            // @phpstan-ignore-next-line
            $this->offsetSet('objects', $acc);
        }
    }

    /** @return list<TItem> */
    public function getItems(): array
    {
        // @phpstan-ignore-next-line
        return $this->offsetGet('objects') ?? [];
    }

    /**
     * @internal
     *
     * @return array{
     *   array{
     *     method: string,
     *     path: string,
     *     query: array<string, mixed>,
     *     headers: array<string, string|list<string>|null>,
     *     body: mixed,
     *   },
     *   RequestOptions,
     * }|null
     */
    public function nextRequest(): ?array
    {
        $offset = $this->options->getTodoAsInt('offset') ?? 0;
        if (!$offset) {
            return null;
        }

        $currentCount = $offset + count($this->getItems());

        $nextRequest = $this->request;

        return [$nextRequest, $this->options];
    }
}
