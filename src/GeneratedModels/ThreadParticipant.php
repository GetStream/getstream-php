<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Represents a user that is participating in a thread.
 */
class ThreadParticipant implements JsonSerializable
{
    public function __construct(public ?int $appPk = null,
        public ?string $channelCid = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $lastReadAt = null,
        public ?object $custom = null,
        public ?\DateTime $lastThreadMessageAt = null,
        public ?\DateTime $leftThreadAt = null,
        public ?string $threadID = null,
        public ?string $userID = null,
        public ?UserResponse $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'app_pk' => $this->appPk,
            'channel_cid' => $this->channelCid,
            'created_at' => $this->createdAt,
            'last_read_at' => $this->lastReadAt,
            'custom' => $this->custom,
            'last_thread_message_at' => $this->lastThreadMessageAt,
            'left_thread_at' => $this->leftThreadAt,
            'thread_id' => $this->threadID,
            'user_id' => $this->userID,
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
        
        return new static(appPk: $json['app_pk'] ?? null,
            channelCid: $json['channel_cid'] ?? null,
            createdAt: $json['created_at'] ?? null,
            lastReadAt: $json['last_read_at'] ?? null,
            custom: $json['custom'] ?? null,
            lastThreadMessageAt: $json['last_thread_message_at'] ?? null,
            leftThreadAt: $json['left_thread_at'] ?? null,
            threadID: $json['thread_id'] ?? null,
            userID: $json['user_id'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
