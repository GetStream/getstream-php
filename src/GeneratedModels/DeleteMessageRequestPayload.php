<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Configuration for message deletion action
 */
class DeleteMessageRequestPayload extends BaseModel
{
    public function __construct(
        public ?bool $hardDelete = null, // Whether to permanently delete the message
        public ?string $reason = null, // Reason for deletion
        public ?string $entityID = null, // ID of the message to delete (alternative to item_id)
        public ?string $entityType = null, // Type of the entity
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
