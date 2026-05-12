<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class DeleteFeedsBatchRequest extends BaseModel
{
    public function __construct(
        public ?array $feeds = null, // List of fully qualified feed IDs (format: group_id:feed_id) to delete
        public ?bool $hardDelete = null, // Whether to permanently delete the feeds instead of soft delete
        public ?bool $purgeUserActivities = null, // When hard-deleting, also fully delete activities authored by each feed's owner from every other feed those activities were fanned out to. Default false preserves existing fan-out. Requires 'hard_delete' to be true; the request is rejected otherwise. Feeds with no recorded owner (created_by_id is empty) are silently skipped for the purge step — owner-matching against an empty string is a safety guard, not a wildcard.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
