<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CallType implements JsonSerializable
{
    public function __construct(public ?int $appPK = null,
        public ?\DateTime $createdAt = null,
        public ?string $externalStorage = null,
        public ?string $name = null,
        public ?int $pK = null,
        public ?\DateTime $updatedAt = null,
        public ?NotificationSettings $notificationSettings = null,
        public ?CallSettings $settings = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'AppPK' => $this->appPK,
            'CreatedAt' => $this->createdAt,
            'ExternalStorage' => $this->externalStorage,
            'Name' => $this->name,
            'PK' => $this->pK,
            'UpdatedAt' => $this->updatedAt,
            'NotificationSettings' => $this->notificationSettings,
            'Settings' => $this->settings,
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
        
        return new static(appPK: $json['AppPK'] ?? null,
            createdAt: $json['CreatedAt'] ?? null,
            externalStorage: $json['ExternalStorage'] ?? null,
            name: $json['Name'] ?? null,
            pK: $json['PK'] ?? null,
            updatedAt: $json['UpdatedAt'] ?? null,
            notificationSettings: $json['NotificationSettings'] ?? null,
            settings: $json['Settings'] ?? null
        );
    }
} 
