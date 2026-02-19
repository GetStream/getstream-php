<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class MarkActivityRequest extends BaseModel
{
    public function __construct(
        public ?UserRequest $user = null,
        public ?bool $markAllSeen = null, // Whether to mark all activities as seen
        public ?array $markRead = null, // List of activity IDs to mark as read
        public ?bool $markAllRead = null, // Whether to mark all activities as read
        public ?array $markSeen = null, // List of activity IDs to mark as seen
        public ?array $markWatched = null, // List of activity IDs to mark as watched (for stories)
        public ?string $userID = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
