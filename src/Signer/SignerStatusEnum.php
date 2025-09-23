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
    case SIGNER_STATUS_ENUM_4 = 4;

    case SIGNER_STATUS_ENUM_5 = 5;

    case SIGNER_STATUS_ENUM_10 = 10;

    case SIGNER_STATUS_ENUM_15 = 15;

    case SIGNER_STATUS_ENUM_20 = 20;

    case SIGNER_STATUS_ENUM_30 = 30;

    case SIGNER_STATUS_ENUM_35 = 35;

    case SIGNER_STATUS_ENUM_39 = 39;

    case SIGNER_STATUS_ENUM_40 = 40;

    case SIGNER_STATUS_ENUM_50 = 50;

    case SIGNER_STATUS_ENUM_60 = 60;
}
