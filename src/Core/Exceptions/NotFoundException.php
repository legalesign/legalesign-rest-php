<?php

namespace LegalesignSDK\Core\Exceptions;

class NotFoundException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'LegalesignSDK Not Found Exception';
}
