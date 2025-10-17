<?php

declare(strict_types=1);

namespace LegalesignSDK\Signer;

/**
 * Signer status options:
 *  * 4 - unsent
 *  * 5 - scheduled to be sent
 *  * 10 - sent
 *  * 15 - email opened
 *  * 20 - visited
 *  * 30 - fields complete
 *  * 35 - fields complete ex signature
 *  * 39 - waiting for witness to complete
 *  * 40 - signed
 *  * 50 - downloaded
 *  * 60 - rejected
 */
enum SignerStatusEnum: int
{
    case _4 = 4;

    case _5 = 5;

    case _10 = 10;

    case _15 = 15;

    case _20 = 20;

    case _30 = 30;

    case _35 = 35;

    case _39 = 39;

    case _40 = 40;

    case _50 = 50;

    case _60 = 60;
}
