<?php

namespace Legalesign\Core\Exceptions;

class ConflictException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Legalesign Conflict Exception';
}
