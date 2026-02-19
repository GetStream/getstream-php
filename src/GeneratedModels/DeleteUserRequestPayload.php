<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Configuration for user deletion action
 */
class DeleteUserRequestPayload extends BaseModel
{
    public function __construct(
        public ?bool $hardDelete = null, // Whether to permanently delete the user
        public ?string $reason = null, // Reason for deletion
        public ?bool $markMessagesDeleted = null, // Also delete all user messages
        public ?bool $deleteConversationChannels = null, // Also delete all user conversations
        public ?bool $deleteFeedsContent = null, // Delete flagged feeds content
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
