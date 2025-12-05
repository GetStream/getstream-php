<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when a new moderation review queue item is created
 *
 * @property \DateTime $createdAt
 * @property object $custom
 * @property string $type
 * @property \DateTime|null $receivedAt
 * @property array<ModerationFlagResponse>|null $flags
 * @property ActionLogResponse|null $action
 * @property ReviewQueueItemResponse|null $reviewQueueItem
 */
class ReviewQueueItemNewEvent extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,
        public ?object $custom = null,
        public ?string $type = null,
        public ?\DateTime $receivedAt = null,
        /** @var array<ModerationFlagResponse>|null The flags associated with this review queue item */
        #[ArrayOf(ModerationFlagResponse::class)]
        public ?array $flags = null, // The flags associated with this review queue item
        public ?ActionLogResponse $action = null,
        public ?ReviewQueueItemResponse $reviewQueueItem = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
