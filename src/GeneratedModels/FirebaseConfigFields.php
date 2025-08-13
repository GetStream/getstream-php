<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class FirebaseConfigFields implements JsonSerializable
{
    public function __construct(public ?bool $enabled = null,
        public ?string $apnTemplate = null,
        public ?string $credentialsJson = null,
        public ?string $dataTemplate = null,
        public ?string $notificationTemplate = null,
        public ?string $serverKey = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'enabled' => $this->enabled,
            'apn_template' => $this->apnTemplate,
            'credentials_json' => $this->credentialsJson,
            'data_template' => $this->dataTemplate,
            'notification_template' => $this->notificationTemplate,
            'server_key' => $this->serverKey,
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
        
        return new static(enabled: $json['enabled'] ?? null,
            apnTemplate: $json['apn_template'] ?? null,
            credentialsJson: $json['credentials_json'] ?? null,
            dataTemplate: $json['data_template'] ?? null,
            notificationTemplate: $json['notification_template'] ?? null,
            serverKey: $json['server_key'] ?? null
        );
    }
} 
