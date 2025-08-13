<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CallParticipantResponse implements JsonSerializable
{
    public function __construct(public ?\DateTime $joinedAt = null,
        public ?string $role = null,
        public ?string $userSessionID = null,
        public ?UserResponse $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'joined_at' => $this->joinedAt,
            'role' => $this->role,
            'user_session_id' => $this->userSessionID,
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
        
        return new static(joinedAt: $json['joined_at'] ?? null,
            role: $json['role'] ?? null,
            userSessionID: $json['user_session_id'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
