<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CreatePollOptionRequest implements JsonSerializable
{
    public function __construct(public ?string $text = null,
        public ?string $userID = null,
        public ?object $custom = null,
        public ?UserRequest $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'text' => $this->text,
            'user_id' => $this->userID,
            'Custom' => $this->custom,
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
        
        return new static(text: $json['text'] ?? null,
            userID: $json['user_id'] ?? null,
            custom: $json['Custom'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
