<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when a user gets deleted. The event contains information about the user that was deleted and the deletion options that were used.
 */
class UserDeletedEvent extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?string $deleteConversation = null, // The type of deletion that was used for the user's conversations. One of: hard, soft, pruning, (empty string)
        public ?bool $deleteConversationChannels = null, // Whether the user's conversation channels were deleted
        public ?string $deleteMessages = null, // The type of deletion that was used for the user's messages. One of: hard, soft, pruning, (empty string)
        public ?string $deleteUser = null, // The type of deletion that was used for the user. One of: hard, soft, pruning, (empty string)
        public ?bool $hardDelete = null, // Whether the user was hard deleted
        public ?bool $markMessagesDeleted = null, // Whether the user's messages were marked as deleted
        public ?object $custom = null,
        public ?UserResponseCommonFields $user = null,
        public ?string $type = null, // The type of event: "user.deleted" in this case
        public ?\DateTime $receivedAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
