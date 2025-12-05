<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when an activity is pinned.
 *
 * @property \DateTime $createdAt
 * @property string $fid
 * @property object $custom
 * @property PinActivityResponse $pinnedActivity
 * @property string $type
 * @property string|null $feedVisibility
 * @property \DateTime|null $receivedAt
 * @property UserResponseCommonFields|null $user
 */
class ActivityPinnedEvent extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?string $fid = null, // The ID of the feed
        public ?object $custom = null,
        public ?PinActivityResponse $pinnedActivity = null,
        public ?string $type = null, // The type of event: "feeds.activity.pinned" in this case
        public ?string $feedVisibility = null,
        public ?\DateTime $receivedAt = null,
        public ?UserResponseCommonFields $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
