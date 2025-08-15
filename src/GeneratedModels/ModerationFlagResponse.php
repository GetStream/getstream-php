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
        public ?string $createdAt = null,
        public ?string $entityID = null,
        public ?string $entityType = null,
        public ?string $id = null,
        public ?string $type = null,
        public ?string $updatedAt = null,
        public ?string $entityCreatorID = null,
        public ?string $reason = null,
        public ?string $reviewQueueItemID = null,
        public ?array $labels = null,
        public ?array $result = null,
        public ?object $custom = null,
        public ?ModerationPayload $moderationPayload = null,
        public ?ReviewQueueItemResponse $reviewQueueItem = null,
        public ?UserResponse $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
