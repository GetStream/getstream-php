<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ModerationFlagResponse extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,
        public ?string $entityID = null,
        public ?string $entityType = null,
        public ?string $type = null,
        public ?\DateTime $updatedAt = null,
        public ?string $userID = null,
        public ?array $result = null,
        public ?string $entityCreatorID = null,
        public ?string $reason = null,
        public ?string $reviewQueueItemID = null,
        public ?array $labels = null,
        public ?object $custom = null,
        public ?ModerationPayload $moderationPayload = null,
        public ?ReviewQueueItemResponse $reviewQueueItem = null,
        public ?UserResponse $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
