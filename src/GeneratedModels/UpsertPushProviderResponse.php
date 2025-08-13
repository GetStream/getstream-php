<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Basic response information
 */
class UpsertPushProviderResponse implements JsonSerializable
{
    public function __construct(public ?string $duration = null,
        public ?PushProviderResponse $pushProvider = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'duration' => $this->duration,
            'push_provider' => $this->pushProvider,
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
            pushProvider: $json['push_provider'] ?? null
        );
    }
} 
