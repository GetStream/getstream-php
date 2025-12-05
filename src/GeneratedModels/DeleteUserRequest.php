<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool|null $deleteConversationChannels
 * @property bool|null $deleteFeedsContent
 * @property bool|null $hardDelete
 * @property bool|null $markMessagesDeleted
 * @property string|null $reason
 */
class DeleteUserRequest extends BaseModel
{
    public function __construct(
        public ?bool $deleteConversationChannels = null,
        public ?bool $deleteFeedsContent = null,
        public ?bool $hardDelete = null,
        public ?bool $markMessagesDeleted = null,
        public ?string $reason = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
