<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when a moderation check is completed
 *
 * @property \DateTime $createdAt
 * @property string $entityID
 * @property string $entityType
 * @property string $recommendedAction
 * @property string $reviewQueueItemID
 * @property object $custom
 * @property string $type
 * @property \DateTime|null $receivedAt
 */
class ModerationCheckCompletedEvent extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,
        public ?string $entityID = null, // The ID of entity which was moderated
        public ?string $entityType = null, // The type of the entity which was moderated
        public ?string $recommendedAction = null, // The recommended action
        public ?string $reviewQueueItemID = null, // The review queue item ID
        public ?object $custom = null,
        public ?string $type = null,
        public ?\DateTime $receivedAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
