<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Represents an BaseEvent that happened in Stream Chat
 *
 * @property \DateTime $createdAt
 * @property string $type
 * @property object $custom
 * @property bool|null $automoderation
 * @property string|null $channelID
 * @property \DateTime|null $channelLastMessageAt
 * @property string|null $channelType
 * @property string|null $cid
 * @property string|null $connectionID
 * @property string|null $parentID
 * @property string|null $reason
 * @property string|null $team
 * @property string|null $threadID
 * @property string|null $userID
 * @property int|null $watcherCount
 * @property ModerationResponse|null $automoderationScores
 * @property ChannelResponse|null $channel
 * @property UserResponse|null $createdBy
 * @property OwnUserResponse|null $me
 * @property ChannelMemberResponse|null $member
 * @property MessageResponse|null $message
 * @property MessageUpdate|null $messageUpdate
 * @property PollResponseData|null $poll
 * @property PollVoteResponseData|null $pollVote
 * @property ReactionResponse|null $reaction
 * @property ThreadResponse|null $thread
 * @property UserResponse|null $user
 */
class WSEvent extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,
        public ?string $type = null,
        public ?object $custom = null,
        public ?bool $automoderation = null,
        public ?string $channelID = null,
        public ?\DateTime $channelLastMessageAt = null,
        public ?string $channelType = null,
        public ?string $cid = null,
        public ?string $connectionID = null,
        public ?string $parentID = null,
        public ?string $reason = null,
        public ?string $team = null,
        public ?string $threadID = null,
        public ?string $userID = null,
        public ?int $watcherCount = null,
        public ?ModerationResponse $automoderationScores = null,
        public ?ChannelResponse $channel = null,
        public ?UserResponse $createdBy = null,
        public ?OwnUserResponse $me = null,
        public ?ChannelMemberResponse $member = null,
        public ?MessageResponse $message = null,
        public ?MessageUpdate $messageUpdate = null,
        public ?PollResponseData $poll = null,
        public ?PollVoteResponseData $pollVote = null,
        public ?ReactionResponse $reaction = null,
        public ?ThreadResponse $thread = null,
        public ?UserResponse $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
