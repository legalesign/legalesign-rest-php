<?php

namespace Legalesign\Core\Exceptions;

class RateLimitException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Legalesign Rate Limit Exception';
}
