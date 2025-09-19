<?php

declare(strict_types=1);

namespace Legalesign\Document\DocumentCreateParams\Signer;

/**
 * If this person is a witness use \"witness\". Required where a witness is defined in your PDF. If this person is a normal signer, use \"approver\" to switch to an approver role.  Witnesses and witnessed signers also require \"sms\" (see also \"decide_later\").
 *
 * @deprecated
 */
enum Role: string
{
    case WITNESS = 'witness';

    case APPROVER = 'approver';
}
