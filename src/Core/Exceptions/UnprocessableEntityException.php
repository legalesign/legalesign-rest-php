<?php

namespace Legalesign\Core\Exceptions;

class UnprocessableEntityException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Legalesign Unprocessable Entity Exception';
}
