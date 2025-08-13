<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class PushProviderResponse implements JsonSerializable
{
    public function __construct(public ?\DateTime $createdAt = null,
        public ?string $name = null,
        public ?string $type = null,
        public ?\DateTime $updatedAt = null,
        public ?string $apnAuthKey = null,
        public ?string $apnAuthType = null,
        public ?bool $apnDevelopment = null,
        public ?string $apnHost = null,
        public ?string $apnKeyID = null,
        public ?string $apnP12Cert = null,
        public ?bool $apnSandboxCertificate = null,
        public ?bool $apnSupportsRemoteNotifications = null,
        public ?bool $apnSupportsVoipNotifications = null,
        public ?string $apnTeamID = null,
        public ?string $apnTopic = null,
        public ?string $description = null,
        public ?\DateTime $disabledAt = null,
        public ?string $disabledReason = null,
        public ?string $firebaseApnTemplate = null,
        public ?string $firebaseCredentials = null,
        public ?string $firebaseDataTemplate = null,
        public ?string $firebaseHost = null,
        public ?string $firebaseNotificationTemplate = null,
        public ?string $firebaseServerKey = null,
        public ?string $huaweiAppID = null,
        public ?string $huaweiAppSecret = null,
        public ?string $xiaomiAppSecret = null,
        public ?string $xiaomiPackageName = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'created_at' => $this->createdAt,
            'name' => $this->name,
            'type' => $this->type,
            'updated_at' => $this->updatedAt,
            'apn_auth_key' => $this->apnAuthKey,
            'apn_auth_type' => $this->apnAuthType,
            'apn_development' => $this->apnDevelopment,
            'apn_host' => $this->apnHost,
            'apn_key_id' => $this->apnKeyID,
            'apn_p12_cert' => $this->apnP12Cert,
            'apn_sandbox_certificate' => $this->apnSandboxCertificate,
            'apn_supports_remote_notifications' => $this->apnSupportsRemoteNotifications,
            'apn_supports_voip_notifications' => $this->apnSupportsVoipNotifications,
            'apn_team_id' => $this->apnTeamID,
            'apn_topic' => $this->apnTopic,
            'description' => $this->description,
            'disabled_at' => $this->disabledAt,
            'disabled_reason' => $this->disabledReason,
            'firebase_apn_template' => $this->firebaseApnTemplate,
            'firebase_credentials' => $this->firebaseCredentials,
            'firebase_data_template' => $this->firebaseDataTemplate,
            'firebase_host' => $this->firebaseHost,
            'firebase_notification_template' => $this->firebaseNotificationTemplate,
            'firebase_server_key' => $this->firebaseServerKey,
            'huawei_app_id' => $this->huaweiAppID,
            'huawei_app_secret' => $this->huaweiAppSecret,
            'xiaomi_app_secret' => $this->xiaomiAppSecret,
            'xiaomi_package_name' => $this->xiaomiPackageName,
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
            type: $json['type'] ?? null,
            updatedAt: $json['updated_at'] ?? null,
            apnAuthKey: $json['apn_auth_key'] ?? null,
            apnAuthType: $json['apn_auth_type'] ?? null,
            apnDevelopment: $json['apn_development'] ?? null,
            apnHost: $json['apn_host'] ?? null,
            apnKeyID: $json['apn_key_id'] ?? null,
            apnP12Cert: $json['apn_p12_cert'] ?? null,
            apnSandboxCertificate: $json['apn_sandbox_certificate'] ?? null,
            apnSupportsRemoteNotifications: $json['apn_supports_remote_notifications'] ?? null,
            apnSupportsVoipNotifications: $json['apn_supports_voip_notifications'] ?? null,
            apnTeamID: $json['apn_team_id'] ?? null,
            apnTopic: $json['apn_topic'] ?? null,
            description: $json['description'] ?? null,
            disabledAt: $json['disabled_at'] ?? null,
            disabledReason: $json['disabled_reason'] ?? null,
            firebaseApnTemplate: $json['firebase_apn_template'] ?? null,
            firebaseCredentials: $json['firebase_credentials'] ?? null,
            firebaseDataTemplate: $json['firebase_data_template'] ?? null,
            firebaseHost: $json['firebase_host'] ?? null,
            firebaseNotificationTemplate: $json['firebase_notification_template'] ?? null,
            firebaseServerKey: $json['firebase_server_key'] ?? null,
            huaweiAppID: $json['huawei_app_id'] ?? null,
            huaweiAppSecret: $json['huawei_app_secret'] ?? null,
            xiaomiAppSecret: $json['xiaomi_app_secret'] ?? null,
            xiaomiPackageName: $json['xiaomi_package_name'] ?? null
        );
    }
} 
