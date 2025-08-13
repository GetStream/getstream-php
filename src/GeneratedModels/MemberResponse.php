<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * MemberResponse is the payload for a member of a call.
 */
class MemberResponse implements JsonSerializable
{
    public function __construct(public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
        public ?string $userID = null,
        public ?object $custom = null,
        public ?UserResponse $user = null,
        public ?\DateTime $deletedAt = null,
        public ?string $role = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
            'user_id' => $this->userID,
            'custom' => $this->custom,
            'user' => $this->user,
            'deleted_at' => $this->deletedAt,
            'role' => $this->role,
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
            updatedAt: $json['updated_at'] ?? null,
            userID: $json['user_id'] ?? null,
            custom: $json['custom'] ?? null,
            user: $json['user'] ?? null,
            deletedAt: $json['deleted_at'] ?? null,
            role: $json['role'] ?? null
        );
    }
} 
