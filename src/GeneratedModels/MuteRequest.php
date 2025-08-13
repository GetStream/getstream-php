<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class MuteRequest implements JsonSerializable
{
    public function __construct(public ?array $targetIds = null,
        public ?int $timeout = null,
        public ?string $userID = null,
        public ?UserRequest $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'target_ids' => $this->targetIds,
            'timeout' => $this->timeout,
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
        
        return new static(targetIds: $json['target_ids'] ?? null,
            timeout: $json['timeout'] ?? null,
            userID: $json['user_id'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
