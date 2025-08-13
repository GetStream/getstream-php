<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * PinRequest is the payload for pinning a message.
 */
class PinRequest implements JsonSerializable
{
    public function __construct(public ?string $sessionID = null,
        public ?string $userID = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'session_id' => $this->sessionID,
            'user_id' => $this->userID,
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
        
        return new static(sessionID: $json['session_id'] ?? null,
            userID: $json['user_id'] ?? null
        );
    }
} 
