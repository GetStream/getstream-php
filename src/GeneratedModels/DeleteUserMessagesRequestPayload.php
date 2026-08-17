<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Configuration for deleting all of a user's chat messages without banning them or deleting their account
 */
class DeleteUserMessagesRequestPayload extends BaseModel
{
    public function __construct(
        public ?string $channelCid = null, // Optional: scope deletion to a single channel (alternative to app-wide deletion)
        public ?string $deleteMessages = null, // Message deletion mode: soft, pruning, or hard
        public ?bool $deleteReactions = null, // Whether to also delete the user's reactions on other users' messages
        public ?string $reason = null, // Reason for the deletion
        public ?string $entityID = null, // ID of the user whose messages should be deleted (alternative to item_id)
        public ?string $entityType = null, // Type of the entity
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
