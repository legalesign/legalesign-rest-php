<?php

declare(strict_types=1);

namespace LegalesignSDK\Core\Conversion\Contracts;

/**
 * @internal
 */
interface ConverterSource
{
    public static function converter(): Converter;
}
