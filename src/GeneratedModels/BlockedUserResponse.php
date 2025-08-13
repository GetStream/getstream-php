<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class BlockedUserResponse implements JsonSerializable
{
    public function __construct(public ?string $blockedUserID = null,
        public ?\DateTime $createdAt = null,
        public ?string $userID = null,
        public ?UserResponse $blockedUser = null,
        public ?UserResponse $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'blocked_user_id' => $this->blockedUserID,
            'created_at' => $this->createdAt,
            'user_id' => $this->userID,
            'blocked_user' => $this->blockedUser,
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
        
        return new static(blockedUserID: $json['blocked_user_id'] ?? null,
            createdAt: $json['created_at'] ?? null,
            userID: $json['user_id'] ?? null,
            blockedUser: $json['blocked_user'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
