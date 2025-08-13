<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CallMember implements JsonSerializable
{
    public function __construct(public ?\DateTime $createdAt = null,
        public ?string $role = null,
        public ?\DateTime $updatedAt = null,
        public ?string $userID = null,
        public ?object $custom = null,
        public ?\DateTime $deletedAt = null,
        public ?User $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'created_at' => $this->createdAt,
            'role' => $this->role,
            'updated_at' => $this->updatedAt,
            'user_id' => $this->userID,
            'custom' => $this->custom,
            'deleted_at' => $this->deletedAt,
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
            role: $json['role'] ?? null,
            updatedAt: $json['updated_at'] ?? null,
            userID: $json['user_id'] ?? null,
            custom: $json['custom'] ?? null,
            deletedAt: $json['deleted_at'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
