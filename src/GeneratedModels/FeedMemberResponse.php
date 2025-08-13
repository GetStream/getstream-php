<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class FeedMemberResponse implements JsonSerializable
{
    public function __construct(public ?\DateTime $createdAt = null,
        public ?string $role = null,
        public ?string $status = null,
        public ?\DateTime $updatedAt = null,
        public ?UserResponse $user = null,
        public ?\DateTime $inviteAcceptedAt = null,
        public ?\DateTime $inviteRejectedAt = null,
        public ?object $custom = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'created_at' => $this->createdAt,
            'role' => $this->role,
            'status' => $this->status,
            'updated_at' => $this->updatedAt,
            'user' => $this->user,
            'invite_accepted_at' => $this->inviteAcceptedAt,
            'invite_rejected_at' => $this->inviteRejectedAt,
            'custom' => $this->custom,
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
            status: $json['status'] ?? null,
            updatedAt: $json['updated_at'] ?? null,
            user: $json['user'] ?? null,
            inviteAcceptedAt: $json['invite_accepted_at'] ?? null,
            inviteRejectedAt: $json['invite_rejected_at'] ?? null,
            custom: $json['custom'] ?? null
        );
    }
} 
