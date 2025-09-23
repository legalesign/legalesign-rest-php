<?php

namespace LegalesignSDK\Core\Exceptions;

class PermissionDeniedException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'LegalesignSDK Permission Denied Exception';
}
