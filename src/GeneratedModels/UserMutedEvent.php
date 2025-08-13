<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UserMutedEvent implements JsonSerializable
{
    public function __construct(public ?\DateTime $createdAt = null,
        public ?string $type = null,
        public ?string $targetUser = null,
        public ?array $targetUsers = null,
        public ?User $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'created_at' => $this->createdAt,
            'type' => $this->type,
            'target_user' => $this->targetUser,
            'target_users' => $this->targetUsers,
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
            targetUser: $json['target_user'] ?? null,
            targetUsers: $json['target_users'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
