<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class BlockUsersResponse implements JsonSerializable
{
    public function __construct(public ?string $blockedByUserID = null,
        public ?string $blockedUserID = null,
        public ?\DateTime $createdAt = null,
        public ?string $duration = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'blocked_by_user_id' => $this->blockedByUserID,
            'blocked_user_id' => $this->blockedUserID,
            'created_at' => $this->createdAt,
            'duration' => $this->duration,
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
        
        return new static(blockedByUserID: $json['blocked_by_user_id'] ?? null,
            blockedUserID: $json['blocked_user_id'] ?? null,
            createdAt: $json['created_at'] ?? null,
            duration: $json['duration'] ?? null
        );
    }
} 
