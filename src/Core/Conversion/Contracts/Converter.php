<?php

declare(strict_types=1);

namespace LegalesignSDK\Core\Conversion\Contracts;

use LegalesignSDK\Core\Conversion\CoerceState;
use LegalesignSDK\Core\Conversion\DumpState;

/**
 * @internal
 */
interface Converter
{
    /**
     * @internal
     */
    public function coerce(mixed $value, CoerceState $state): mixed;

    /**
     * @internal
     */
    public function dump(mixed $value, DumpState $state): mixed;
}
