<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class APNConfigFields implements JsonSerializable
{
    public function __construct(public ?bool $development = null,
        public ?bool $enabled = null,
        public ?string $authKey = null,
        public ?string $authType = null,
        public ?string $bundleID = null,
        public ?string $host = null,
        public ?string $keyID = null,
        public ?string $notificationTemplate = null,
        public ?string $p12Cert = null,
        public ?string $teamID = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'development' => $this->development,
            'enabled' => $this->enabled,
            'auth_key' => $this->authKey,
            'auth_type' => $this->authType,
            'bundle_id' => $this->bundleID,
            'host' => $this->host,
            'key_id' => $this->keyID,
            'notification_template' => $this->notificationTemplate,
            'p12_cert' => $this->p12Cert,
            'team_id' => $this->teamID,
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
        
        return new static(development: $json['development'] ?? null,
            enabled: $json['enabled'] ?? null,
            authKey: $json['auth_key'] ?? null,
            authType: $json['auth_type'] ?? null,
            bundleID: $json['bundle_id'] ?? null,
            host: $json['host'] ?? null,
            keyID: $json['key_id'] ?? null,
            notificationTemplate: $json['notification_template'] ?? null,
            p12Cert: $json['p12_cert'] ?? null,
            teamID: $json['team_id'] ?? null
        );
    }
} 
