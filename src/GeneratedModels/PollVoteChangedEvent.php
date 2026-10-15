<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when a vote on a poll is changed.
 */
class PollVoteChangedEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null, // The type of event: "poll.vote_changed" in this case
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?\DateTime $receivedAt = null,
        public ?object $custom = null,
        public ?string $cid = null, // The CID of the channel containing the poll
        public ?string $messageID = null, // The ID of the message containing the poll
        public ?string $activityID = null,
        public ?PollResponseData $poll = null,
        public ?PollVoteResponseData $pollVote = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
