<?php

namespace Legalesign\Core\Exceptions;

class InternalServerException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Legalesign Internal Server Exception';
}
