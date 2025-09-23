<?php

declare(strict_types=1);

namespace LegalesignSDK\Core\Concerns;

use LegalesignSDK\Core\Conversion;
use LegalesignSDK\Core\Conversion\DumpState;
use LegalesignSDK\Core\Util;
use LegalesignSDK\RequestOptions;

/**
 * @internal
 */
trait SdkParams
{
    /**
     * @param array<string, mixed>|self|null           $params
     * @param array<string, mixed>|RequestOptions|null $options
     *
     * @return array{array<string, mixed>, RequestOptions}
     */
    public static function parseRequest(array|self|null $params, array|RequestOptions|null $options): array
    {
        $value = is_array($params) ? Util::array_filter_omit($params) : $params;
        $converter = self::converter();
        $state = new DumpState;
        $dumped = (array) Conversion::dump($converter, value: $value, state: $state);
        $opts = RequestOptions::parse($options); // @phpstan-ignore-line

        if (!$state->canRetry) {
            $opts->maxRetries = 0;
        }

        return [$dumped, $opts]; // @phpstan-ignore-line
    }
}
