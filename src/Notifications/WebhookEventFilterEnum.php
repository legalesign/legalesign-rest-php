<?php

declare(strict_types=1);

namespace Legalesign\Notifications;

enum WebhookEventFilterEnum: string
{
    case WEBHOOK_EVENT_FILTER_ENUM_ = '';

    case DOCUMENT = 'document.*';

    case DOCUMENT_CREATED = 'document.created';

    case DOCUMENT_REJECTED = 'document.rejected';

    case DOCUMENT_FINAL_PDF_CREATED = 'document.finalPdfCreated';

    case RECIPIENT = 'recipient.*';

    case RECIPIENT_COMPLETED = 'recipient.completed';

    case RECIPIENT_REJECTED = 'recipient.rejected';

    case RECIPIENT_EMAIL_OPENED = 'recipient.emailOpened';

    case RECIPIENT_VISITING = 'recipient.visiting';

    case RECIPIENT_BOUNCED = 'recipient.bounced';
}
