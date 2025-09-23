<?php

declare(strict_types=1);

namespace LegalesignSDK\Document;

/**
 * Document status options:
 *   * 10 - Initial state, check signer status for sent/unsent
 *   * 20 - Fields completed
 *   * 30 - Signed
 *   * 40 - Removed (before signing)
 *   * 50 - Rejected
 */
enum DocumentStatusEnum: int
{
    case DOCUMENT_STATUS_ENUM_10 = 10;

    case DOCUMENT_STATUS_ENUM_20 = 20;

    case DOCUMENT_STATUS_ENUM_30 = 30;

    case DOCUMENT_STATUS_ENUM_40 = 40;

    case DOCUMENT_STATUS_ENUM_50 = 50;
}
