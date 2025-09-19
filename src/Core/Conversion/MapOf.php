<?php

declare(strict_types=1);

namespace Legalesign\Core\Conversion;

use Legalesign\Core\Conversion\Concerns\ArrayOf;
use Legalesign\Core\Conversion\Contracts\Converter;

/**
 * @internal
 */
final class MapOf implements Converter
{
    use ArrayOf;
}
