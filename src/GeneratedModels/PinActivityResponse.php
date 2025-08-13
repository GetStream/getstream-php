<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class PinActivityResponse implements JsonSerializable
{
    public function __construct(public ?\DateTime $createdAt = null,
        public ?string $duration = null,
        public ?string $feed = null,
        public ?string $userID = null,
        public ?ActivityResponse $activity = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'created_at' => $this->createdAt,
            'duration' => $this->duration,
            'feed' => $this->feed,
            'user_id' => $this->userID,
            'activity' => $this->activity,
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
            duration: $json['duration'] ?? null,
            feed: $json['feed'] ?? null,
            userID: $json['user_id'] ?? null,
            activity: $json['activity'] ?? null
        );
    }
} 
