<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class PushNotificationFields implements JsonSerializable
{
    public function __construct(public ?bool $offlineOnly = null,
        public ?string $version = null,
        public ?APNConfigFields $apn = null,
        public ?FirebaseConfigFields $firebase = null,
        public ?HuaweiConfigFields $huawei = null,
        public ?XiaomiConfigFields $xiaomi = null,
        public ?array $providers = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'offline_only' => $this->offlineOnly,
            'version' => $this->version,
            'apn' => $this->apn,
            'firebase' => $this->firebase,
            'huawei' => $this->huawei,
            'xiaomi' => $this->xiaomi,
            'providers' => $this->providers,
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
        
        return new static(offlineOnly: $json['offline_only'] ?? null,
            version: $json['version'] ?? null,
            apn: $json['apn'] ?? null,
            firebase: $json['firebase'] ?? null,
            huawei: $json['huawei'] ?? null,
            xiaomi: $json['xiaomi'] ?? null,
            providers: $json['providers'] ?? null
        );
    }
} 
