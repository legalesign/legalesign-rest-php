<?php

namespace Legalesign\Core\Exceptions;

class AuthenticationException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Legalesign Authentication Exception';
}
