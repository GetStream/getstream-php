<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Request to insert a moderation action log entry
 */
class InsertActionLogRequest extends BaseModel
{
    public function __construct(
        public ?string $entityType = null, // Type of entity the action was taken on
        public ?string $entityID = null, // ID of the entity the action was taken on
        public ?string $entityCreatorID = null, // ID of the user who created the entity
        public ?string $actionType = null, // Type of moderation action taken
        public ?object $custom = null, // Custom metadata for the action log
        public ?string $reason = null, // Reason for the action
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
