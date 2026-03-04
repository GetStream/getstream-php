<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Configuration for activity deletion action
 */
class DeleteActivityRequestPayload extends BaseModel
{
    public function __construct(
        public ?bool $hardDelete = null, // Whether to permanently delete the activity
        public ?string $reason = null, // Reason for deletion
        public ?string $entityID = null, // ID of the activity to delete (alternative to item_id)
        public ?string $entityType = null, // Type of the entity (required for delete_activity to distinguish v2 vs v3)
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
