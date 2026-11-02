<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Status of a scheduled message.
 */
class ScheduledMessageStatus
{
    public const CANCELED = 'canceled';
    public const FAILED = 'failed';
    public const SCHEDULED = 'scheduled';
    public const SENDING = 'sending';
    public const SENT = 'sent';
}
