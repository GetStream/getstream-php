<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UpdateCommentPartialRequest extends BaseModel
{
    public function __construct(
        public ?object $set = null, // Map of field names to new values. Supported fields: 'text', 'attachments', 'custom', 'mentioned_user_ids', 'status'. Use dot-notation for nested custom fields (e.g., 'custom.field_name')
        public ?array $unset = null, // List of field names to remove. Supported fields: 'custom', 'attachments', 'mentioned_user_ids', 'status'. Use dot-notation for nested custom fields (e.g., 'custom.field_name')
        public ?bool $skipPush = null, // Whether to skip push notifications
        public ?bool $skipEnrichUrl = null, // Whether to skip URL enrichment
        public ?bool $handleMentionNotifications = null, // Whether to handle mention notification changes
        /** @deprecated */
        public ?bool $copyCustomToNotification = null, // Whether to copy custom data to notification activities Deprecated: use notification_context.trigger.custom and notification_context.target.custom instead
        public ?string $userID = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
