<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * The unread information of a thread.
 */
class UnreadCountsThread extends BaseModel
{
    public function __construct(
        public ?int $unreadCount = null, // The number of unread replies inside the thread.
        public ?\DateTime $lastRead = null, // The date which the current user last read the thread.
        public ?string $lastReadMessageID = null, // The id of the last reply which the current user read in the thread.
        public ?string $parentMessageID = null, // The message id of the root of the thread.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
