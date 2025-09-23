<?php

declare(strict_types=1);

namespace LegalesignSDK\Templatepdf\Fields\FieldCreateParams\Body;

/**
 * one of the following:
 *   * 1 - left
 *   * 2 - middle
 *   * 3 - right
 */
enum Align: int
{
    case ALIGN_1 = 1;

    case ALIGN_2 = 2;

    case ALIGN_3 = 3;
}
