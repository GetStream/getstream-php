<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class PushPreferences implements JsonSerializable
{
    public function __construct(public ?string $callLevel = null,
        public ?string $chatLevel = null,
        public ?\DateTime $disabledUntil = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'call_level' => $this->callLevel,
            'chat_level' => $this->chatLevel,
            'disabled_until' => $this->disabledUntil,
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
        
        return new static(callLevel: $json['call_level'] ?? null,
            chatLevel: $json['chat_level'] ?? null,
            disabledUntil: $json['disabled_until'] ?? null
        );
    }
} 
