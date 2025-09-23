<?php

declare(strict_types=1);

namespace LegalesignSDK\Templatepdf\Fields\FieldListResponse\Object1;

/**
 * Must be one of the following: * signature - signature field  * initials - initials field  * text - signer field (field for signer to complete) * admin - sender field (field to complete by admin user when sending).
 */
enum ElementType: string
{
    case SIGNATURE = 'signature';

    case INITIALS = 'initials';

    case TEXT = 'text';

    case ADMIN = 'admin';
}
