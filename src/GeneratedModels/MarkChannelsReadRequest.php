<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class MarkChannelsReadRequest implements JsonSerializable
{
    public function __construct(public ?string $userID = null,
        public ?array $readByChannel = null,
        public ?UserRequest $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'user_id' => $this->userID,
            'read_by_channel' => $this->readByChannel,
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
        
        return new static(userID: $json['user_id'] ?? null,
            readByChannel: $json['read_by_channel'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
