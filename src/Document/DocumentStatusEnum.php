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
    case _10 = 10;

    case _20 = 20;

    case _30 = 30;

    case _40 = 40;

    case _50 = 50;
}
