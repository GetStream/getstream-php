<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Why publishing a scheduled activity failed.
 */
class ScheduledActivityFailureReason
{
    public const BANNED = 'banned';
    public const EXPIRED = 'expired';
    public const FEED_DELETED = 'feed_deleted';
    public const ID_CONFLICT = 'id_conflict';
    public const INTERNAL_ERROR = 'internal_error';
    public const INVALID_ACTIVITY = 'invalid_activity';
    public const MODERATION_BLOCKED = 'moderation_blocked';
    public const NO_PERMISSION = 'no_permission';
    public const USER_DELETED = 'user_deleted';
}
