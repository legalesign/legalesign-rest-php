<?php

declare(strict_types=1);

namespace Legalesign\Core\Conversion\Contracts;

use Legalesign\Core\Conversion\CoerceState;
use Legalesign\Core\Conversion\DumpState;

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
