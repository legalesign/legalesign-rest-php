<?php

declare(strict_types=1);

namespace LegalesignSDK\Document\DocumentGetFieldsResponseItem;

enum ElementType: string
{
    case SIGNATURE = 'signature';

    case INITIALS = 'initials';

    case ADMIN = 'admin';

    case TEXT = 'text';
}
