<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $activityID
 * @property bool|null $handleMentionNotifications
 * @property array|null $unset
 * @property object|null $set
 */
class UpdateActivityPartialChangeRequest extends BaseModel
{
    public function __construct(
        public ?string $activityID = null, // ID of the activity to update
        public ?bool $handleMentionNotifications = null, // When true and 'mentioned_user_ids' is updated, automatically creates or deletes mention notifications for added/removed users. Only applicable for client-side requests (ignored for server-side requests)
        public ?array $unset = null, // List of field names to remove. Supported fields: 'custom', 'location', 'expires_at', 'filter_tags', 'interest_tags', 'attachments', 'poll_id', 'mentioned_user_ids'. Use dot-notation for nested custom fields (e.g., 'custom.field_name')
        public ?object $set = null, // Map of field names to new values. Supported fields: 'text', 'attachments', 'custom', 'visibility', 'visibility_tag', 'restrict_replies' (values: 'everyone', 'people_i_follow', 'nobody'), 'location', 'expires_at', 'filter_tags', 'interest_tags', 'poll_id', 'feeds', 'mentioned_user_ids'. For custom fields, use dot-notation (e.g., 'custom.field_name')
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
