<?php

namespace LegalesignSDK\Core\Exceptions;

class ConflictException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'LegalesignSDK Conflict Exception';
}
