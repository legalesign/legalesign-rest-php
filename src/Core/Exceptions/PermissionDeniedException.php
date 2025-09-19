<?php

namespace Legalesign\Core\Exceptions;

class PermissionDeniedException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Legalesign Permission Denied Exception';
}
