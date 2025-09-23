<?php

namespace LegalesignSDK\Core\Exceptions;

class BadRequestException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'LegalesignSDK Bad Request Exception';
}
