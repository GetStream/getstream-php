<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UpsertPushProviderRequest implements JsonSerializable
{
    public function __construct(public ?PushProvider $pushProvider = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
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
        
        return new static(pushProvider: $json['push_provider'] ?? null
        );
    }
} 
