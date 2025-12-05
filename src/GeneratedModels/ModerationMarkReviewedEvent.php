<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when a moderation item is marked as reviewed
 *
 * @property \DateTime $createdAt
 * @property object $custom
 * @property ReviewQueueItemResponse $item
 * @property string $type
 * @property \DateTime|null $receivedAt
 * @property MessageResponse|null $message
 */
class ModerationMarkReviewedEvent extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,
        public ?object $custom = null,
        public ?ReviewQueueItemResponse $item = null,
        public ?string $type = null,
        public ?\DateTime $receivedAt = null,
        public ?MessageResponse $message = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
