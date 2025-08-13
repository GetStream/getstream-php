<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class MessageReminder implements JsonSerializable
{
    public function __construct(public ?string $channelCid = null,
        public ?\DateTime $createdAt = null,
        public ?string $messageID = null,
        public ?string $taskID = null,
        public ?\DateTime $updatedAt = null,
        public ?string $userID = null,
        public ?\DateTime $remindAt = null,
        public ?Channel $channel = null,
        public ?Message $message = null,
        public ?User $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'channel_cid' => $this->channelCid,
            'created_at' => $this->createdAt,
            'message_id' => $this->messageID,
            'task_id' => $this->taskID,
            'updated_at' => $this->updatedAt,
            'user_id' => $this->userID,
            'remind_at' => $this->remindAt,
            'channel' => $this->channel,
            'message' => $this->message,
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
        
        return new static(channelCid: $json['channel_cid'] ?? null,
            createdAt: $json['created_at'] ?? null,
            messageID: $json['message_id'] ?? null,
            taskID: $json['task_id'] ?? null,
            updatedAt: $json['updated_at'] ?? null,
            userID: $json['user_id'] ?? null,
            remindAt: $json['remind_at'] ?? null,
            channel: $json['channel'] ?? null,
            message: $json['message'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
