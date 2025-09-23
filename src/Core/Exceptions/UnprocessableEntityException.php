<?php

namespace LegalesignSDK\Core\Exceptions;

class UnprocessableEntityException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'LegalesignSDK Unprocessable Entity Exception';
}
