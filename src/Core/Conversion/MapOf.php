<?php

declare(strict_types=1);

namespace LegalesignSDK\Core\Conversion;

use LegalesignSDK\Core\Conversion\Concerns\ArrayOf;
use LegalesignSDK\Core\Conversion\Contracts\Converter;

/**
 * @internal
 */
final class MapOf implements Converter
{
    use ArrayOf;
}
