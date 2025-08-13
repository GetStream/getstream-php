<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * CallTypeResponse is the payload for a call type.
 */
class CallTypeResponse implements JsonSerializable
{
    public function __construct(public ?\DateTime $createdAt = null,
        public ?string $name = null,
        public ?\DateTime $updatedAt = null,
        public ?array $grants = null,
        public ?NotificationSettings $notificationSettings = null,
        public ?CallSettingsResponse $settings = null,
        public ?string $externalStorage = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'created_at' => $this->createdAt,
            'name' => $this->name,
            'updated_at' => $this->updatedAt,
            'grants' => $this->grants,
            'notification_settings' => $this->notificationSettings,
            'settings' => $this->settings,
            'external_storage' => $this->externalStorage,
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
            name: $json['name'] ?? null,
            updatedAt: $json['updated_at'] ?? null,
            grants: $json['grants'] ?? null,
            notificationSettings: $json['notification_settings'] ?? null,
            settings: $json['settings'] ?? null,
            externalStorage: $json['external_storage'] ?? null
        );
    }
} 
