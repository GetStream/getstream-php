<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class GetOrCreateFeedGroupRequest implements JsonSerializable
{
    public function __construct(public ?string $defaultVisibility = null,
        public ?object $custom = null,
        public ?NotificationConfig $notification = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'default_visibility' => $this->defaultVisibility,
            'custom' => $this->custom,
            'notification' => $this->notification,
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
        
        return new static(defaultVisibility: $json['default_visibility'] ?? null,
            custom: $json['custom'] ?? null,
            notification: $json['notification'] ?? null
        );
    }
} 
