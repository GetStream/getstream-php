<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property \DateTime $createdAt
 * @property bool $deleteConversationChannels
 * @property bool $hardDelete
 * @property bool $markMessagesDeleted
 * @property string $type
 * @property User|null $user
 */
class UserDeletedEvent extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,
        public ?bool $deleteConversationChannels = null,
        public ?bool $hardDelete = null,
        public ?bool $markMessagesDeleted = null,
        public ?string $type = null,
        public ?User $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
