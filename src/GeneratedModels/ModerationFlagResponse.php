<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ModerationFlagResponse extends BaseModel
{
    public function __construct(
        public ?string $type = null,
        public ?string $userID = null,
        public ?UserResponse $user = null,
        public ?string $entityType = null,
        public ?string $entityID = null,
        public ?string $entityCreatorID = null,
        public ?ModerationPayloadResponse $moderationPayload = null,
        public ?string $reason = null,
        public ?object $custom = null,
        public ?array $labels = null,
        public ?array $result = null,
        public ?string $reviewQueueItemID = null,
        public ?ReviewQueueItemResponse $reviewQueueItem = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
