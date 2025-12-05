<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when activities are marked as read, seen, or watched.
 *
 * @property \DateTime $createdAt
 * @property string $fid
 * @property object $custom
 * @property string $type
 * @property string|null $feedVisibility
 * @property bool|null $markAllRead
 * @property bool|null $markAllSeen
 * @property \DateTime|null $receivedAt
 * @property array|null $markRead
 * @property array|null $markSeen
 * @property array|null $markWatched
 * @property UserResponseCommonFields|null $user
 */
class ActivityMarkEvent extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?string $fid = null,
        public ?object $custom = null,
        public ?string $type = null, // The type of event: "feeds.activity.marked" in this case
        public ?string $feedVisibility = null,
        public ?bool $markAllRead = null, // Whether all activities were marked as read
        public ?bool $markAllSeen = null, // Whether all activities were marked as seen
        public ?\DateTime $receivedAt = null,
        public ?array $markRead = null, // The IDs of activities marked as read
        public ?array $markSeen = null, // The IDs of activities marked as seen
        public ?array $markWatched = null, // The IDs of activities marked as watched
        public ?UserResponseCommonFields $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
