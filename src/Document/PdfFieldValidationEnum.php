<?php

declare(strict_types=1);

namespace LegalesignSDK\Document;

/**
 * fields types and validations:
 *   * 1 - Email
 *   * 2 - yyyy/mm/dd
 *   * 3 - yy/mm/dd
 *   * 4 - dd/mm/yyyy
 *   * 5 - dd/mm/yy
 *   * 6 - mm/dd/yy
 *   * 7 - mm/dd/yy
 *   * 8 - yyyy.mm.dd
 *   * 9 - yy.mm.dd
 *   * 10 - dd.mm.yyyy
 *   * 11 - dd.mm.yy
 *   * 12 - mm.dd.yyyy
 *   * 13 - mm.dd.yy
 *   * 14 - yyyy-mm-dd
 *   * 15 - yy-mm-dd
 *   * 16 - dd-mm-yyyy
 *   * 17 - dd-mm-yy
 *   * 18 - mm-dd-yyyy
 *   * 19 - mm-dd-yy
 *   * 20 - Dropdown list,  use options attribute for items
 *   * 24 - Checkbox tick/cross
 *   * 25 - Checkbox tick/blank
 *   * 26 - Checkbox cross/blank
 *   * 30 - yyyy/mm/dd (automatic)
 *   * 31 - yy/mm/dd (automatic)
 *   * 32 - dd/yy/yyyy (automatic)
 *   * 33 - dd/mm/yy (automatic)
 *   * 34 - mm/dd/yyyy (automatic)
 *   * 35 - mm/dd/yy (automatic)
 *   * 36 - yyyy.mm.dd (automatic)
 *   * 37 - yy.mm.dd (automatic)
 *   * 38 - dd.mm.yyyy (automatic)
 *   * 39 - dd.mm.yy (automatic)
 *   * 40 - mm.dd.yyyy (automatic)
 *   * 41 - mm.dd.yy (automatic)
 *   * 42 - yyyy-mm-dd (automatic)
 *   * 43 - yy-mm-dd (automatic)
 *   * 44 - dd-mm-yyyy (automatic)
 *   * 45 - dd-mm-yy (automatic)
 *   * 46 - mm-dd-yyyy (automatic)
 *   * 47 - mm-dd-yy (automatic)
 *   * 48 - d mmmmm yyyy (automatic)
 *   * 50 - Whole number
 *   * 51 - Number
 *   * 52 - Currency (2 decimals)
 *   * 53 - 1 number
 *   * 54 - 2 numbers
 *   * 55 - 3 numbers
 *   * 56 - 4 numbers
 *   * 57 - 5 numbers
 *   * 58 - 6 numbers
 *   * 59 - 7 numbers
 *   * 60 - 8 numbers
 *   * 61 - 9 numbers
 *   * 62 - 10 numbers
 *   * 63 - 11 numbers
 *   * 64 - 12 numbers
 *   * 65 - 1 characters (any text)
 *   * 66 - 2 characters (any text)
 *   * 67 - 3 characters (any text)
 *   * 68 - 4 characters (any text)
 *   * 69 - 5 characters (any text)
 *   * 70 - 6 characters (any text)
 *   * 71 - 7 characters (any text)
 *   * 72 - 8 characters (any text)
 *   * 73 - secret code, add code in options
 *   * 74 - file attach, append to email to signer
 *   * 75 - file attach, append to final PDF
 *   * 76 - file attach, zip with final PDF for internal use, but not signer
 *   * 77 - force to title caps
 *   * 78 - force to uppercase
 *   * 79 - force to lowercase
 *   * 80 - mm/yy
 *   * 81 - mm/yyyy
 *   * 82 - mm.yy
 *   * 83 - mm.yyyy
 *   * 84 - mm-yy
 *   * 85 - mm-yyyy
 *   * 90 - drawn field
 *   * 91 - countries list
 *   * 92 - honorifics list
 */
enum PdfFieldValidationEnum: int
{
    case _1 = 1;

    case _2 = 2;

    case _3 = 3;

    case _4 = 4;

    case _5 = 5;

    case _6 = 6;

    case _7 = 7;

    case _8 = 8;

    case _9 = 9;

    case _10 = 10;

    case _11 = 11;

    case _12 = 12;

    case _13 = 13;

    case _14 = 14;

    case _15 = 15;

    case _16 = 16;

    case _17 = 17;

    case _18 = 18;

    case _19 = 19;

    case _20 = 20;

    case _24 = 24;

    case _25 = 25;

    case _26 = 26;

    case _30 = 30;

    case _31 = 31;

    case _32 = 32;

    case _33 = 33;

    case _34 = 34;

    case _35 = 35;

    case _36 = 36;

    case _37 = 37;

    case _38 = 38;

    case _39 = 39;

    case _40 = 40;

    case _41 = 41;

    case _42 = 42;

    case _43 = 43;

    case _44 = 44;

    case _45 = 45;

    case _46 = 46;

    case _47 = 47;

    case _48 = 48;

    case _50 = 50;

    case _51 = 51;

    case _52 = 52;

    case _53 = 53;

    case _54 = 54;

    case _55 = 55;

    case _56 = 56;

    case _57 = 57;

    case _58 = 58;

    case _59 = 59;

    case _60 = 60;

    case _61 = 61;

    case _62 = 62;

    case _63 = 63;

    case _64 = 64;

    case _65 = 65;

    case _66 = 66;

    case _67 = 67;

    case _68 = 68;

    case _69 = 69;

    case _70 = 70;

    case _71 = 71;

    case _72 = 72;

    case _73 = 73;

    case _74 = 74;

    case _75 = 75;

    case _76 = 76;

    case _77 = 77;

    case _78 = 78;

    case _79 = 79;

    case _80 = 80;

    case _81 = 81;

    case _82 = 82;

    case _83 = 83;

    case _84 = 84;

    case _85 = 85;

    case _90 = 90;

    case _91 = 91;

    case _92 = 92;
}
