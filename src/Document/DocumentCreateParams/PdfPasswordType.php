<?php

declare(strict_types=1);

namespace Legalesign\Document\DocumentCreateParams;

/**
 * 1 to store password, 2 for to delete from our records upon final signing.
 */
enum PdfPasswordType: int
{
    case PDF_PASSWORD_TYPE_1 = 1;

    case PDF_PASSWORD_TYPE_2 = 2;
}
