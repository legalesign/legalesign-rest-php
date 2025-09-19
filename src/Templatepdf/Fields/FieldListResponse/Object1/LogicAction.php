<?php

declare(strict_types=1);

namespace Legalesign\Templatepdf\Fields\FieldListResponse\Object1;

/**
 * offers options for more advanced forms 1 = One of a set of field (radio group), 2 = Sum a set of fields,  3 = Conditional upon another field.
 */
enum LogicAction: int
{
    case LOGIC_ACTION_1 = 1;

    case LOGIC_ACTION_2 = 2;

    case LOGIC_ACTION_3 = 3;
}
