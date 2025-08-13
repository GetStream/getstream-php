<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Request for creating a call type
 */
class CreateCallTypeRequest implements JsonSerializable
{
    public function __construct(public ?string $name = null,
        public ?string $externalStorage = null,
        public ?array $grants = null,
        public ?NotificationSettings $notificationSettings = null,
        public ?CallSettingsRequest $settings = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'name' => $this->name,
            'external_storage' => $this->externalStorage,
            'grants' => $this->grants,
            'notification_settings' => $this->notificationSettings,
            'settings' => $this->settings,
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
        
        return new static(name: $json['name'] ?? null,
            externalStorage: $json['external_storage'] ?? null,
            grants: $json['grants'] ?? null,
            notificationSettings: $json['notification_settings'] ?? null,
            settings: $json['settings'] ?? null
        );
    }
} 
