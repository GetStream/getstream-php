<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class FeedMemberRequest implements JsonSerializable
{
    public function __construct(public ?string $userID = null,
        public ?bool $invite = null,
        public ?string $membershipLevel = null,
        public ?string $role = null,
        public ?object $custom = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'user_id' => $this->userID,
            'invite' => $this->invite,
            'membership_level' => $this->membershipLevel,
            'role' => $this->role,
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
        
        return new static(userID: $json['user_id'] ?? null,
            invite: $json['invite'] ?? null,
            membershipLevel: $json['membership_level'] ?? null,
            role: $json['role'] ?? null,
            custom: $json['custom'] ?? null
        );
    }
} 
