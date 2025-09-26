<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * This event is sent when content is flagged for moderation
 */
class ModerationFlaggedEvent extends BaseModel
{
    public function __construct(
        public ?string $contentType = null,    // The type of content that was flagged 
        public ?\DateTime $createdAt = null,
        public ?string $objectID = null,    // The ID of the flagged content 
        public ?object $custom = null,
        public ?string $type = null,
        public ?\DateTime $receivedAt = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
