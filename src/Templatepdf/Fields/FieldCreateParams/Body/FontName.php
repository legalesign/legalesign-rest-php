<?php

declare(strict_types=1);

namespace Legalesign\Templatepdf\Fields\FieldCreateParams\Body;

enum FontName: string
{
    case FONT_NAME_ = '';

    case ARIAL = 'arial';

    case COURIER = 'courier';

    case HELVETICA = 'helvetica';

    case LIBERATION = 'liberation';

    case VERDANA = 'verdana';
}
