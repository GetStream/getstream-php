<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ThreadResponse implements JsonSerializable
{
    public function __construct(public ?string $channelCid = null,
        public ?\DateTime $createdAt = null,
        public ?string $createdByUserID = null,
        public ?string $parentMessageID = null,
        public ?string $title = null,
        public ?\DateTime $updatedAt = null,
        public ?object $custom = null,
        public ?int $activeParticipantCount = null,
        public ?\DateTime $deletedAt = null,
        public ?\DateTime $lastMessageAt = null,
        public ?int $participantCount = null,
        public ?int $replyCount = null,
        public ?array $threadParticipants = null,
        public ?ChannelResponse $channel = null,
        public ?UserResponse $createdBy = null,
        public ?MessageResponse $parentMessage = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'channel_cid' => $this->channelCid,
            'created_at' => $this->createdAt,
            'created_by_user_id' => $this->createdByUserID,
            'parent_message_id' => $this->parentMessageID,
            'title' => $this->title,
            'updated_at' => $this->updatedAt,
            'custom' => $this->custom,
            'active_participant_count' => $this->activeParticipantCount,
            'deleted_at' => $this->deletedAt,
            'last_message_at' => $this->lastMessageAt,
            'participant_count' => $this->participantCount,
            'reply_count' => $this->replyCount,
            'thread_participants' => $this->threadParticipants,
            'channel' => $this->channel,
            'created_by' => $this->createdBy,
            'parent_message' => $this->parentMessage,
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
        
        return new static(channelCid: $json['channel_cid'] ?? null,
            createdAt: $json['created_at'] ?? null,
            createdByUserID: $json['created_by_user_id'] ?? null,
            parentMessageID: $json['parent_message_id'] ?? null,
            title: $json['title'] ?? null,
            updatedAt: $json['updated_at'] ?? null,
            custom: $json['custom'] ?? null,
            activeParticipantCount: $json['active_participant_count'] ?? null,
            deletedAt: $json['deleted_at'] ?? null,
            lastMessageAt: $json['last_message_at'] ?? null,
            participantCount: $json['participant_count'] ?? null,
            replyCount: $json['reply_count'] ?? null,
            threadParticipants: $json['thread_participants'] ?? null,
            channel: $json['channel'] ?? null,
            createdBy: $json['created_by'] ?? null,
            parentMessage: $json['parent_message'] ?? null
        );
    }
} 
