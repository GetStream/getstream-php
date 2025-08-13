<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class MessageFlaggedEvent implements JsonSerializable
{
    public function __construct(public ?string $cid = null,
        public ?\DateTime $createdAt = null,
        public ?string $type = null,
        public ?array $threadParticipants = null,
        public ?Flag $flag = null,
        public ?Message $message = null,
        public ?User $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'cid' => $this->cid,
            'created_at' => $this->createdAt,
            'type' => $this->type,
            'thread_participants' => $this->threadParticipants,
            'flag' => $this->flag,
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
        
        return new static(cid: $json['cid'] ?? null,
            createdAt: $json['created_at'] ?? null,
            type: $json['type'] ?? null,
            threadParticipants: $json['thread_participants'] ?? null,
            flag: $json['flag'] ?? null,
            message: $json['message'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
