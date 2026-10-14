<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when a poll is deleted.
 */
class PollDeletedEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null, // The type of event: "poll.deleted" in this case
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?\DateTime $receivedAt = null,
        public ?object $custom = null,
        public ?string $cid = null, // The CID of the channel containing the poll
        public ?string $messageID = null, // The ID of the message containing the poll
        public ?string $activityID = null,
        public ?PollResponseData $poll = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
