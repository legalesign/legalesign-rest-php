<?php

declare(strict_types=1);

namespace Legalesign\Templatepdf\Fields\FieldCreateParams\Body;

/**
 * Must be one of the following: * signature - signature field * initials - initials field  * text - signer field (field for signer to complete)  * admin - sender field (field to complete by admin user when sending, use pdftext).
 */
enum ElementType: string
{
    case SIGNATURE = 'signature';

    case INITIALS = 'initials';

    case TEXT = 'text';

    case ADMIN = 'admin';
}
