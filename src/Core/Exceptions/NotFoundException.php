<?php

namespace Legalesign\Core\Exceptions;

class NotFoundException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Legalesign Not Found Exception';
}
