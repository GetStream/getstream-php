<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool|null $handleMentionNotifications
 * @property string|null $userID
 * @property array|null $unset
 * @property object|null $set
 * @property UserRequest|null $user
 */
class UpdateActivityPartialRequest extends BaseModel
{
    public function __construct(
        public ?bool $handleMentionNotifications = null, // If true, creates notification activities for newly mentioned users and deletes notifications for users no longer mentioned
        public ?string $userID = null,
        public ?array $unset = null, // List of field names to remove. Supported fields: 'custom', 'location', 'expires_at', 'filter_tags', 'interest_tags', 'attachments', 'poll_id', 'mentioned_user_ids'. Use dot-notation for nested custom fields (e.g., 'custom.field_name')
        public ?object $set = null, // Map of field names to new values. Supported fields: 'text', 'attachments', 'custom', 'visibility', 'visibility_tag', 'restrict_replies' (values: 'everyone', 'people_i_follow', 'nobody'), 'location', 'expires_at', 'filter_tags', 'interest_tags', 'poll_id', 'feeds', 'mentioned_user_ids'. For custom fields, use dot-notation (e.g., 'custom.field_name')
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
