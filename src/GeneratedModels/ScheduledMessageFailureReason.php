<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Why sending a scheduled message failed.
 */
class ScheduledMessageFailureReason
{
    public const BANNED = 'banned';
    public const CHANNEL_DELETED = 'channel_deleted';
    public const CHANNEL_FROZEN = 'channel_frozen';
    public const EXPIRED = 'expired';
    public const HOOK_REJECTED = 'hook_rejected';
    public const INTERNAL_ERROR = 'internal_error';
    public const INVALID_MESSAGE = 'invalid_message';
    public const MODERATION_BLOCKED = 'moderation_blocked';
    public const NO_PERMISSION = 'no_permission';
    public const PENDING_NOT_SUPPORTED = 'pending_not_supported';
    public const USER_DELETED = 'user_deleted';
}
