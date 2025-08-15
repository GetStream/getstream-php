<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Contains information about flagged user or message
 */
class Flag extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,    // Date/time of creation 
        public ?string $entityID = null,    // Unique identifier of the entity being flagged 
        public ?string $entityType = null,    // Type of entity being flagged (e.g., message, user) 
        public ?\DateTime $updatedAt = null,    // Date/time of the last update 
        public ?array $result = null,    // Result of bodyguard, API calls, our own AI etc 
        public ?string $entityCreatorID = null,    // ID of the user who created the flagged entity 
        public ?bool $isStreamedContent = null,
        public ?string $moderationPayloadHash = null,
        public ?string $reason = null,    // Optional explanation for why the content is being flagged 
        public ?string $reviewQueueItemID = null,    // ID of the review queue item 
        public ?string $type = null,
        public ?array $labels = null,    // Labels from bodyguard, API calls, our own AI etc 
        public ?object $custom = null,    // Additional metadata about the flag 
        public ?ModerationPayload $moderationPayload = null,
        public ?ReviewQueueItem $reviewQueueItem = null,
        public ?User $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
