<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class FlagRequest extends BaseModel
{
    public function __construct(
        public ?string $entityID = null,    // Unique identifier of the entity being flagged 
        public ?string $entityType = null,    // Type of entity being flagged (e.g., message, user) 
        public ?string $entityCreatorID = null,    // ID of the user who created the flagged entity 
        public ?string $reason = null,    // Optional explanation for why the content is being flagged 
        public ?string $userID = null,
        public ?object $custom = null,    // Additional metadata about the flag 
        public ?ModerationPayload $moderationPayload = null,
        public ?UserRequest $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
