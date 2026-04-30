<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UpdateActivityPartialRequest extends BaseModel
{
    public function __construct(
        public ?object $set = null, // Map of field names to new values. Supported fields: 'text', 'attachments', 'custom', 'visibility', 'visibility_tag', 'restrict_replies' (values: 'everyone', 'people_i_follow', 'nobody'), 'location', 'expires_at', 'filter_tags', 'interest_tags', 'poll_id', 'feeds', 'mentioned_user_ids', 'search_data'. For custom fields, use dot-notation (e.g., 'custom.field_name')
        public ?array $unset = null, // List of field names to remove. Supported fields: 'custom', 'visibility_tag', 'location', 'expires_at', 'filter_tags', 'interest_tags', 'attachments', 'poll_id', 'mentioned_user_ids', 'search_data'. Use dot-notation for nested custom fields (e.g., 'custom.field_name')
        public ?bool $handleMentionNotifications = null, // If true, creates notification activities for newly mentioned users and deletes notifications for users no longer mentioned
        /** @deprecated */
        public ?bool $copyCustomToNotification = null, // Whether to copy custom data to the notification activity (only applies when handle_mention_notifications creates notifications) Deprecated: use notification_context.trigger.custom and notification_context.target.custom instead
        public ?bool $runActivityProcessors = null, // If true, runs activity processors on the updated activity. Processors will only run if the activity text and/or attachments are changed. Defaults to false.
        public ?bool $enrichOwnFields = null, // If true, enriches the activity's current_feed with own_* fields (own_follows, own_followings, own_capabilities, own_membership). Defaults to false for performance.
        public ?bool $forceModeration = null, // If true, forces moderation to run for server-side requests. By default, server-side requests skip moderation. Client-side requests always run moderation regardless of this field.
        public ?string $userID = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
