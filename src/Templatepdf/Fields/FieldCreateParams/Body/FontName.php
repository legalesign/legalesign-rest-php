<?php

declare(strict_types=1);

namespace LegalesignSDK\Templatepdf\Fields\FieldCreateParams\Body;

enum FontName: string
{
    case EMPTY = '';

    case ARIAL = 'arial';

    case COURIER = 'courier';

    case HELVETICA = 'helvetica';

    case LIBERATION = 'liberation';

    case VERDANA = 'verdana';
}
