<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Represents an BaseEvent that happened in Stream Chat
 */
class WSEvent implements JsonSerializable
{
    public function __construct(public ?\DateTime $createdAt = null,
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
        public ?ChannelMember $member = null,
        public ?MessageResponse $message = null,
        public ?MessageUpdate $messageUpdate = null,
        public ?PollResponseData $poll = null,
        public ?PollVoteResponseData $pollVote = null,
        public ?ReactionResponse $reaction = null,
        public ?ThreadResponse $thread = null,
        public ?UserResponse $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'created_at' => $this->createdAt,
            'type' => $this->type,
            'custom' => $this->custom,
            'automoderation' => $this->automoderation,
            'channel_id' => $this->channelID,
            'channel_last_message_at' => $this->channelLastMessageAt,
            'channel_type' => $this->channelType,
            'cid' => $this->cid,
            'connection_id' => $this->connectionID,
            'parent_id' => $this->parentID,
            'reason' => $this->reason,
            'team' => $this->team,
            'thread_id' => $this->threadID,
            'user_id' => $this->userID,
            'watcher_count' => $this->watcherCount,
            'automoderation_scores' => $this->automoderationScores,
            'channel' => $this->channel,
            'created_by' => $this->createdBy,
            'me' => $this->me,
            'member' => $this->member,
            'message' => $this->message,
            'message_update' => $this->messageUpdate,
            'poll' => $this->poll,
            'poll_vote' => $this->pollVote,
            'reaction' => $this->reaction,
            'thread' => $this->thread,
            'user' => $this->user,
        ], fn($v) => $v !== null);
    }

    public function toArray(): array
    {
        return $this->jsonSerialize();
    }

    /**
     * Create a new instance from JSON data.
     *
     * @param array<string, mixed>|string $json JSON data
     * @return static
     */
    public static function fromJson($json): self
    {
        if (is_string($json)) {
            $json = json_decode($json, true);
        }
        
        return new static(createdAt: $json['created_at'] ?? null,
            type: $json['type'] ?? null,
            custom: $json['custom'] ?? null,
            automoderation: $json['automoderation'] ?? null,
            channelID: $json['channel_id'] ?? null,
            channelLastMessageAt: $json['channel_last_message_at'] ?? null,
            channelType: $json['channel_type'] ?? null,
            cid: $json['cid'] ?? null,
            connectionID: $json['connection_id'] ?? null,
            parentID: $json['parent_id'] ?? null,
            reason: $json['reason'] ?? null,
            team: $json['team'] ?? null,
            threadID: $json['thread_id'] ?? null,
            userID: $json['user_id'] ?? null,
            watcherCount: $json['watcher_count'] ?? null,
            automoderationScores: $json['automoderation_scores'] ?? null,
            channel: $json['channel'] ?? null,
            createdBy: $json['created_by'] ?? null,
            me: $json['me'] ?? null,
            member: $json['member'] ?? null,
            message: $json['message'] ?? null,
            messageUpdate: $json['message_update'] ?? null,
            poll: $json['poll'] ?? null,
            pollVote: $json['poll_vote'] ?? null,
            reaction: $json['reaction'] ?? null,
            thread: $json['thread'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
