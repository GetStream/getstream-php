<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class AppResponseFields implements JsonSerializable
{
    public function __construct(public ?bool $asyncUrlEnrichEnabled = null,
        public ?bool $autoTranslationEnabled = null,
        public ?bool $campaignEnabled = null,
        public ?int $cdnExpirationSeconds = null,
        public ?string $customActionHandlerUrl = null,
        public ?bool $disableAuthChecks = null,
        public ?bool $disablePermissionsChecks = null,
        public ?string $enforceUniqueUsernames = null,
        public ?bool $guestUserCreationDisabled = null,
        public ?bool $imageModerationEnabled = null,
        public ?bool $moderationBulkSubmitActionEnabled = null,
        public ?bool $moderationEnabled = null,
        public ?bool $moderationMultitenantBlocklistEnabled = null,
        public ?string $moderationWebhookUrl = null,
        public ?bool $multiTenantEnabled = null,
        public ?string $name = null,
        public ?string $organization = null,
        public ?string $permissionVersion = null,
        public ?int $remindersInterval = null,
        public ?string $snsKey = null,
        public ?string $snsSecret = null,
        public ?string $snsTopicArn = null,
        public ?string $sqsKey = null,
        public ?string $sqsSecret = null,
        public ?string $sqsUrl = null,
        public ?bool $suspended = null,
        public ?string $suspendedExplanation = null,
        public ?bool $useHookV2 = null,
        public ?bool $userResponseTimeEnabled = null,
        public ?string $webhookUrl = null,
        public ?array $eventHooks = null,
        public ?array $userSearchDisallowedRoles = null,
        public ?array $webhookEvents = null,
        public ?array $callTypes = null,
        public ?array $channelConfigs = null,
        public ?FileUploadConfig $fileUploadConfig = null,
        public ?array $grants = null,
        public ?FileUploadConfig $imageUploadConfig = null,
        public ?array $policies = null,
        public ?PushNotificationFields $pushNotifications = null,
        public ?string $beforeMessageSendHookUrl = null,
        public ?\DateTime $revokeTokensIssuedBefore = null,
        public ?array $allowedFlagReasons = null,
        public ?array $geofences = null,
        public ?array $imageModerationLabels = null,
        public ?DataDogInfo $datadogInfo = null,
        public ?ModerationDashboardPreferences $moderationDashboardPreferences = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'async_url_enrich_enabled' => $this->asyncUrlEnrichEnabled,
            'auto_translation_enabled' => $this->autoTranslationEnabled,
            'campaign_enabled' => $this->campaignEnabled,
            'cdn_expiration_seconds' => $this->cdnExpirationSeconds,
            'custom_action_handler_url' => $this->customActionHandlerUrl,
            'disable_auth_checks' => $this->disableAuthChecks,
            'disable_permissions_checks' => $this->disablePermissionsChecks,
            'enforce_unique_usernames' => $this->enforceUniqueUsernames,
            'guest_user_creation_disabled' => $this->guestUserCreationDisabled,
            'image_moderation_enabled' => $this->imageModerationEnabled,
            'moderation_bulk_submit_action_enabled' => $this->moderationBulkSubmitActionEnabled,
            'moderation_enabled' => $this->moderationEnabled,
            'moderation_multitenant_blocklist_enabled' => $this->moderationMultitenantBlocklistEnabled,
            'moderation_webhook_url' => $this->moderationWebhookUrl,
            'multi_tenant_enabled' => $this->multiTenantEnabled,
            'name' => $this->name,
            'organization' => $this->organization,
            'permission_version' => $this->permissionVersion,
            'reminders_interval' => $this->remindersInterval,
            'sns_key' => $this->snsKey,
            'sns_secret' => $this->snsSecret,
            'sns_topic_arn' => $this->snsTopicArn,
            'sqs_key' => $this->sqsKey,
            'sqs_secret' => $this->sqsSecret,
            'sqs_url' => $this->sqsUrl,
            'suspended' => $this->suspended,
            'suspended_explanation' => $this->suspendedExplanation,
            'use_hook_v2' => $this->useHookV2,
            'user_response_time_enabled' => $this->userResponseTimeEnabled,
            'webhook_url' => $this->webhookUrl,
            'event_hooks' => $this->eventHooks,
            'user_search_disallowed_roles' => $this->userSearchDisallowedRoles,
            'webhook_events' => $this->webhookEvents,
            'call_types' => $this->callTypes,
            'channel_configs' => $this->channelConfigs,
            'file_upload_config' => $this->fileUploadConfig,
            'grants' => $this->grants,
            'image_upload_config' => $this->imageUploadConfig,
            'policies' => $this->policies,
            'push_notifications' => $this->pushNotifications,
            'before_message_send_hook_url' => $this->beforeMessageSendHookUrl,
            'revoke_tokens_issued_before' => $this->revokeTokensIssuedBefore,
            'allowed_flag_reasons' => $this->allowedFlagReasons,
            'geofences' => $this->geofences,
            'image_moderation_labels' => $this->imageModerationLabels,
            'datadog_info' => $this->datadogInfo,
            'moderation_dashboard_preferences' => $this->moderationDashboardPreferences,
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
            campaignEnabled: $json['campaign_enabled'] ?? null,
            cdnExpirationSeconds: $json['cdn_expiration_seconds'] ?? null,
            customActionHandlerUrl: $json['custom_action_handler_url'] ?? null,
            disableAuthChecks: $json['disable_auth_checks'] ?? null,
            disablePermissionsChecks: $json['disable_permissions_checks'] ?? null,
            enforceUniqueUsernames: $json['enforce_unique_usernames'] ?? null,
            guestUserCreationDisabled: $json['guest_user_creation_disabled'] ?? null,
            imageModerationEnabled: $json['image_moderation_enabled'] ?? null,
            moderationBulkSubmitActionEnabled: $json['moderation_bulk_submit_action_enabled'] ?? null,
            moderationEnabled: $json['moderation_enabled'] ?? null,
            moderationMultitenantBlocklistEnabled: $json['moderation_multitenant_blocklist_enabled'] ?? null,
            moderationWebhookUrl: $json['moderation_webhook_url'] ?? null,
            multiTenantEnabled: $json['multi_tenant_enabled'] ?? null,
            name: $json['name'] ?? null,
            organization: $json['organization'] ?? null,
            permissionVersion: $json['permission_version'] ?? null,
            remindersInterval: $json['reminders_interval'] ?? null,
            snsKey: $json['sns_key'] ?? null,
            snsSecret: $json['sns_secret'] ?? null,
            snsTopicArn: $json['sns_topic_arn'] ?? null,
            sqsKey: $json['sqs_key'] ?? null,
            sqsSecret: $json['sqs_secret'] ?? null,
            sqsUrl: $json['sqs_url'] ?? null,
            suspended: $json['suspended'] ?? null,
            suspendedExplanation: $json['suspended_explanation'] ?? null,
            useHookV2: $json['use_hook_v2'] ?? null,
            userResponseTimeEnabled: $json['user_response_time_enabled'] ?? null,
            webhookUrl: $json['webhook_url'] ?? null,
            eventHooks: $json['event_hooks'] ?? null,
            userSearchDisallowedRoles: $json['user_search_disallowed_roles'] ?? null,
            webhookEvents: $json['webhook_events'] ?? null,
            callTypes: $json['call_types'] ?? null,
            channelConfigs: $json['channel_configs'] ?? null,
            fileUploadConfig: $json['file_upload_config'] ?? null,
            grants: $json['grants'] ?? null,
            imageUploadConfig: $json['image_upload_config'] ?? null,
            policies: $json['policies'] ?? null,
            pushNotifications: $json['push_notifications'] ?? null,
            beforeMessageSendHookUrl: $json['before_message_send_hook_url'] ?? null,
            revokeTokensIssuedBefore: $json['revoke_tokens_issued_before'] ?? null,
            allowedFlagReasons: $json['allowed_flag_reasons'] ?? null,
            geofences: $json['geofences'] ?? null,
            imageModerationLabels: $json['image_moderation_labels'] ?? null,
            datadogInfo: $json['datadog_info'] ?? null,
            moderationDashboardPreferences: $json['moderation_dashboard_preferences'] ?? null
        );
    }
} 
