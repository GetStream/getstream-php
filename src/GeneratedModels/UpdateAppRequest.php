<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UpdateAppRequest implements JsonSerializable
{
    public function __construct(public ?bool $asyncUrlEnrichEnabled = null,
        public ?bool $autoTranslationEnabled = null,
        public ?string $beforeMessageSendHookUrl = null,
        public ?int $cdnExpirationSeconds = null,
        public ?bool $channelHideMembersOnly = null,
        public ?string $customActionHandlerUrl = null,
        public ?bool $disableAuthChecks = null,
        public ?bool $disablePermissionsChecks = null,
        public ?string $enforceUniqueUsernames = null,
        public ?bool $feedsModerationEnabled = null,
        public ?string $feedsV2Region = null,
        public ?bool $guestUserCreationDisabled = null,
        public ?bool $imageModerationEnabled = null,
        public ?bool $migratePermissionsToV2 = null,
        public ?bool $moderationEnabled = null,
        public ?string $moderationWebhookUrl = null,
        public ?bool $multiTenantEnabled = null,
        public ?string $permissionVersion = null,
        public ?int $remindersInterval = null,
        public ?int $remindersMaxMembers = null,
        public ?\DateTime $revokeTokensIssuedBefore = null,
        public ?string $snsKey = null,
        public ?string $snsSecret = null,
        public ?string $snsTopicArn = null,
        public ?string $sqsKey = null,
        public ?string $sqsSecret = null,
        public ?string $sqsUrl = null,
        public ?bool $userResponseTimeEnabled = null,
        public ?string $webhookUrl = null,
        public ?array $allowedFlagReasons = null,
        public ?array $eventHooks = null,
        public ?array $imageModerationBlockLabels = null,
        public ?array $imageModerationLabels = null,
        public ?array $userSearchDisallowedRoles = null,
        public ?array $webhookEvents = null,
        public ?APNConfig $apnConfig = null,
        public ?AsyncModerationConfiguration $asyncModerationConfig = null,
        public ?DataDogInfo $datadogInfo = null,
        public ?FileUploadConfig $fileUploadConfig = null,
        public ?FirebaseConfig $firebaseConfig = null,
        public ?array $grants = null,
        public ?HuaweiConfig $huaweiConfig = null,
        public ?FileUploadConfig $imageUploadConfig = null,
        public ?ModerationDashboardPreferences $moderationDashboardPreferences = null,
        public ?PushConfig $pushConfig = null,
        public ?XiaomiConfig $xiaomiConfig = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'async_url_enrich_enabled' => $this->asyncUrlEnrichEnabled,
            'auto_translation_enabled' => $this->autoTranslationEnabled,
            'before_message_send_hook_url' => $this->beforeMessageSendHookUrl,
            'cdn_expiration_seconds' => $this->cdnExpirationSeconds,
            'channel_hide_members_only' => $this->channelHideMembersOnly,
            'custom_action_handler_url' => $this->customActionHandlerUrl,
            'disable_auth_checks' => $this->disableAuthChecks,
            'disable_permissions_checks' => $this->disablePermissionsChecks,
            'enforce_unique_usernames' => $this->enforceUniqueUsernames,
            'feeds_moderation_enabled' => $this->feedsModerationEnabled,
            'feeds_v2_region' => $this->feedsV2Region,
            'guest_user_creation_disabled' => $this->guestUserCreationDisabled,
            'image_moderation_enabled' => $this->imageModerationEnabled,
            'migrate_permissions_to_v2' => $this->migratePermissionsToV2,
            'moderation_enabled' => $this->moderationEnabled,
            'moderation_webhook_url' => $this->moderationWebhookUrl,
            'multi_tenant_enabled' => $this->multiTenantEnabled,
            'permission_version' => $this->permissionVersion,
            'reminders_interval' => $this->remindersInterval,
            'reminders_max_members' => $this->remindersMaxMembers,
            'revoke_tokens_issued_before' => $this->revokeTokensIssuedBefore,
            'sns_key' => $this->snsKey,
            'sns_secret' => $this->snsSecret,
            'sns_topic_arn' => $this->snsTopicArn,
            'sqs_key' => $this->sqsKey,
            'sqs_secret' => $this->sqsSecret,
            'sqs_url' => $this->sqsUrl,
            'user_response_time_enabled' => $this->userResponseTimeEnabled,
            'webhook_url' => $this->webhookUrl,
            'allowed_flag_reasons' => $this->allowedFlagReasons,
            'event_hooks' => $this->eventHooks,
            'image_moderation_block_labels' => $this->imageModerationBlockLabels,
            'image_moderation_labels' => $this->imageModerationLabels,
            'user_search_disallowed_roles' => $this->userSearchDisallowedRoles,
            'webhook_events' => $this->webhookEvents,
            'apn_config' => $this->apnConfig,
            'async_moderation_config' => $this->asyncModerationConfig,
            'datadog_info' => $this->datadogInfo,
            'file_upload_config' => $this->fileUploadConfig,
            'firebase_config' => $this->firebaseConfig,
            'grants' => $this->grants,
            'huawei_config' => $this->huaweiConfig,
            'image_upload_config' => $this->imageUploadConfig,
            'moderation_dashboard_preferences' => $this->moderationDashboardPreferences,
            'push_config' => $this->pushConfig,
            'xiaomi_config' => $this->xiaomiConfig,
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
        
        return new static(asyncUrlEnrichEnabled: $json['async_url_enrich_enabled'] ?? null,
            autoTranslationEnabled: $json['auto_translation_enabled'] ?? null,
            beforeMessageSendHookUrl: $json['before_message_send_hook_url'] ?? null,
            cdnExpirationSeconds: $json['cdn_expiration_seconds'] ?? null,
            channelHideMembersOnly: $json['channel_hide_members_only'] ?? null,
            customActionHandlerUrl: $json['custom_action_handler_url'] ?? null,
            disableAuthChecks: $json['disable_auth_checks'] ?? null,
            disablePermissionsChecks: $json['disable_permissions_checks'] ?? null,
            enforceUniqueUsernames: $json['enforce_unique_usernames'] ?? null,
            feedsModerationEnabled: $json['feeds_moderation_enabled'] ?? null,
            feedsV2Region: $json['feeds_v2_region'] ?? null,
            guestUserCreationDisabled: $json['guest_user_creation_disabled'] ?? null,
            imageModerationEnabled: $json['image_moderation_enabled'] ?? null,
            migratePermissionsToV2: $json['migrate_permissions_to_v2'] ?? null,
            moderationEnabled: $json['moderation_enabled'] ?? null,
            moderationWebhookUrl: $json['moderation_webhook_url'] ?? null,
            multiTenantEnabled: $json['multi_tenant_enabled'] ?? null,
            permissionVersion: $json['permission_version'] ?? null,
            remindersInterval: $json['reminders_interval'] ?? null,
            remindersMaxMembers: $json['reminders_max_members'] ?? null,
            revokeTokensIssuedBefore: $json['revoke_tokens_issued_before'] ?? null,
            snsKey: $json['sns_key'] ?? null,
            snsSecret: $json['sns_secret'] ?? null,
            snsTopicArn: $json['sns_topic_arn'] ?? null,
            sqsKey: $json['sqs_key'] ?? null,
            sqsSecret: $json['sqs_secret'] ?? null,
            sqsUrl: $json['sqs_url'] ?? null,
            userResponseTimeEnabled: $json['user_response_time_enabled'] ?? null,
            webhookUrl: $json['webhook_url'] ?? null,
            allowedFlagReasons: $json['allowed_flag_reasons'] ?? null,
            eventHooks: $json['event_hooks'] ?? null,
            imageModerationBlockLabels: $json['image_moderation_block_labels'] ?? null,
            imageModerationLabels: $json['image_moderation_labels'] ?? null,
            userSearchDisallowedRoles: $json['user_search_disallowed_roles'] ?? null,
            webhookEvents: $json['webhook_events'] ?? null,
            apnConfig: $json['apn_config'] ?? null,
            asyncModerationConfig: $json['async_moderation_config'] ?? null,
            datadogInfo: $json['datadog_info'] ?? null,
            fileUploadConfig: $json['file_upload_config'] ?? null,
            firebaseConfig: $json['firebase_config'] ?? null,
            grants: $json['grants'] ?? null,
            huaweiConfig: $json['huawei_config'] ?? null,
            imageUploadConfig: $json['image_upload_config'] ?? null,
            moderationDashboardPreferences: $json['moderation_dashboard_preferences'] ?? null,
            pushConfig: $json['push_config'] ?? null,
            xiaomiConfig: $json['xiaomi_config'] ?? null
        );
    }
} 
