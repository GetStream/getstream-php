<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Represents an BaseEvent that happened in Stream Chat
 */
class WSEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null,
        public ?string $connectionID = null,
        public ?string $cid = null,
        public ?string $channelID = null,
        public ?string $channelType = null,
        public ?\DateTime $channelLastMessageAt = null,
        public ?MessageResponse $message = null, // Represents any chat message
        public ?MessageUpdate $messageUpdate = null,
        public ?ReactionResponse $reaction = null,
        public ?ChannelResponse $channel = null, // Represents channel in chat
        public ?string $threadID = null,
        public ?ThreadResponse $thread = null,
        public ?ChannelMemberResponse $member = null,
        public ?PollResponseData $poll = null,
        public ?PollVoteResponseData $pollVote = null,
        public ?UserResponse $user = null, // User response object
        public ?string $userID = null,
        public ?OwnUserResponse $me = null,
        public ?int $watcherCount = null,
        public ?string $reason = null,
        public ?UserResponse $createdBy = null, // User response object
        public ?bool $automoderation = null,
        public ?ModerationResponse $automoderationScores = null,
        public ?string $parentID = null,
        public ?string $team = null,
        public ?object $custom = null,
        public ?\DateTime $createdAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
