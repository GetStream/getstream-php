<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Configuration for reaction deletion action
 */
class DeleteReactionRequestPayload extends BaseModel
{
    public function __construct(
        public ?bool $hardDelete = null, // Whether to permanently delete the reaction
        public ?string $reason = null, // Reason for deletion
        public ?string $entityID = null, // ID of the reaction to delete (alternative to item_id)
        public ?string $entityType = null, // Type of the entity
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
