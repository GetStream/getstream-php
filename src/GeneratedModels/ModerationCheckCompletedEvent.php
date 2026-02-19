<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when a moderation check is completed
 */
class ModerationCheckCompletedEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $receivedAt = null,
        public ?object $custom = null,
        public ?string $entityID = null, // The ID of entity which was moderated
        public ?string $entityType = null, // The type of the entity which was moderated
        public ?string $recommendedAction = null, // The recommended action
        public ?string $reviewQueueItemID = null, // The review queue item ID
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
