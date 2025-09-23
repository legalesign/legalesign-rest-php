<?php

namespace LegalesignSDK\Core\Exceptions;

class RateLimitException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'LegalesignSDK Rate Limit Exception';
}
