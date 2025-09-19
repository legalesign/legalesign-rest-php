<?php

namespace Legalesign\Core\Exceptions;

class BadRequestException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Legalesign Bad Request Exception';
}
