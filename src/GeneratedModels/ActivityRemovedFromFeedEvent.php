<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when an activity is removed from a feed.
 */
class ActivityRemovedFromFeedEvent extends BaseModel
{
    public function __construct(
        public ?ActivityResponse $activity = null,
        public ?string $type = null, // The type of event: "feeds.activity.removed_from_feed" in this case
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?\DateTime $receivedAt = null,
        public ?object $custom = null,
        public ?string $fid = null,
        public ?string $feedVisibility = null,
        public ?UserResponseCommonFields $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
