<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class NotificationMarkUnreadEvent implements JsonSerializable
{
    public function __construct(public ?string $channelID = null,
        public ?int $channelMemberCount = null,
        public ?string $channelType = null,
        public ?string $cid = null,
        public ?\DateTime $createdAt = null,
        public ?string $firstUnreadMessageID = null,
        public ?\DateTime $lastReadAt = null,
        public ?int $totalUnreadCount = null,
        public ?int $unreadChannels = null,
        public ?int $unreadCount = null,
        public ?int $unreadMessages = null,
        public ?int $unreadThreads = null,
        public ?string $type = null,
        public ?string $lastReadMessageID = null,
        public ?string $team = null,
        public ?string $threadID = null,
        public ?ChannelResponse $channel = null,
        public ?User $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'channel_id' => $this->channelID,
            'channel_member_count' => $this->channelMemberCount,
            'channel_type' => $this->channelType,
            'cid' => $this->cid,
            'created_at' => $this->createdAt,
            'first_unread_message_id' => $this->firstUnreadMessageID,
            'last_read_at' => $this->lastReadAt,
            'total_unread_count' => $this->totalUnreadCount,
            'unread_channels' => $this->unreadChannels,
            'unread_count' => $this->unreadCount,
            'unread_messages' => $this->unreadMessages,
            'unread_threads' => $this->unreadThreads,
            'type' => $this->type,
            'last_read_message_id' => $this->lastReadMessageID,
            'team' => $this->team,
            'thread_id' => $this->threadID,
            'channel' => $this->channel,
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
        
        return new static(channelID: $json['channel_id'] ?? null,
            channelMemberCount: $json['channel_member_count'] ?? null,
            channelType: $json['channel_type'] ?? null,
            cid: $json['cid'] ?? null,
            createdAt: $json['created_at'] ?? null,
            firstUnreadMessageID: $json['first_unread_message_id'] ?? null,
            lastReadAt: $json['last_read_at'] ?? null,
            totalUnreadCount: $json['total_unread_count'] ?? null,
            unreadChannels: $json['unread_channels'] ?? null,
            unreadCount: $json['unread_count'] ?? null,
            unreadMessages: $json['unread_messages'] ?? null,
            unreadThreads: $json['unread_threads'] ?? null,
            type: $json['type'] ?? null,
            lastReadMessageID: $json['last_read_message_id'] ?? null,
            team: $json['team'] ?? null,
            threadID: $json['thread_id'] ?? null,
            channel: $json['channel'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
