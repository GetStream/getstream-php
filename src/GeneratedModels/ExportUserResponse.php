<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ExportUserResponse implements JsonSerializable
{
    public function __construct(public ?string $duration = null,
        public ?array $messages = null,
        public ?array $reactions = null,
        public ?UserResponse $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'duration' => $this->duration,
            'messages' => $this->messages,
            'reactions' => $this->reactions,
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
        
        return new static(duration: $json['duration'] ?? null,
            messages: $json['messages'] ?? null,
            reactions: $json['reactions'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
