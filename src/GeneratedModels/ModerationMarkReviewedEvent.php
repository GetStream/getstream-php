<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when a moderation item is marked as reviewed
 */
class ModerationMarkReviewedEvent extends BaseModel
{
    public function __construct(
        public ?ReviewQueueItemResponse $item = null,
        public ?MessageResponse $message = null,
        public ?string $type = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $receivedAt = null,
        public ?object $custom = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
