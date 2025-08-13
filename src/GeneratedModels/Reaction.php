<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class Reaction implements JsonSerializable
{
    public function __construct(public ?\DateTime $createdAt = null,
        public ?string $messageID = null,
        public ?int $score = null,
        public ?string $type = null,
        public ?\DateTime $updatedAt = null,
        public ?object $custom = null,
        public ?string $userID = null,
        public ?User $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'created_at' => $this->createdAt,
            'message_id' => $this->messageID,
            'score' => $this->score,
            'type' => $this->type,
            'updated_at' => $this->updatedAt,
            'custom' => $this->custom,
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
        
        return new static(createdAt: $json['created_at'] ?? null,
            messageID: $json['message_id'] ?? null,
            score: $json['score'] ?? null,
            type: $json['type'] ?? null,
            updatedAt: $json['updated_at'] ?? null,
            custom: $json['custom'] ?? null,
            userID: $json['user_id'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
