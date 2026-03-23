<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class AppResponseFields extends BaseModel
{
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?string $organization = null,
        public ?string $placement = null,
        public ?PushNotificationFields $pushNotifications = null,
        public ?string $webhookUrl = null,
        public ?string $moderationWebhookUrl = null,
        /** @var array<string, ChannelConfig>|null */
        #[MapOf(ChannelConfig::class)]
        public ?array $channelConfigs = null,
        /** @var array<string, CallType>|null */
        #[MapOf(CallType::class)]
        public ?array $callTypes = null,
        public ?array $policies = null,
        public ?bool $suspended = null,
        public ?string $suspendedExplanation = null,
        public ?bool $disableAuthChecks = null,
        public ?bool $disablePermissionsChecks = null,
        public ?string $permissionVersion = null,
        public ?array $userSearchDisallowedRoles = null,
        public ?bool $multiTenantEnabled = null,
        public ?bool $allowMultiUserDevices = null,
        public ?bool $imageModerationEnabled = null,
        public ?bool $asyncUrlEnrichEnabled = null,
        public ?array $imageModerationLabels = null,
        public ?array $allowedFlagReasons = null,
        public ?bool $autoTranslationEnabled = null,
        public ?string $beforeMessageSendHookUrl = null,
        public ?string $customActionHandlerUrl = null,
        public ?string $enforceUniqueUsernames = null,
        public ?string $sqsUrl = null,
        public ?string $sqsKey = null,
        public ?string $sqsSecret = null,
        public ?string $snsTopicArn = null,
        public ?string $snsKey = null,
        public ?string $snsSecret = null,
        public ?FileUploadConfig $fileUploadConfig = null,
        public ?FileUploadConfig $imageUploadConfig = null,
        public ?\DateTime $revokeTokensIssuedBefore = null,
        public ?array $grants = null,
        public ?bool $campaignEnabled = null,
        public ?array $webhookEvents = null,
        public ?int $remindersInterval = null,
        public ?int $cdnExpirationSeconds = null,
        /** @var array<GeofenceResponse>|null */
        #[ArrayOf(GeofenceResponse::class)]
        public ?array $geofences = null,
        public ?DataDogInfo $datadogInfo = null,
        public ?bool $moderationEnabled = null,
        public ?bool $moderationMultitenantBlocklistEnabled = null,
        public ?bool $guestUserCreationDisabled = null,
        public ?ModerationDashboardPreferences $moderationDashboardPreferences = null,
        /** @var array<EventHook>|null */
        #[ArrayOf(EventHook::class)]
        public ?array $eventHooks = null,
        public ?bool $useHookV2 = null,
        public ?bool $userResponseTimeEnabled = null,
        public ?bool $moderationLlmConfigurabilityEnabled = null,
        public ?int $maxAggregatedActivitiesLength = null,
        public ?bool $moderationVideoCallModerationEnabled = null,
        public ?bool $moderationAudioCallModerationEnabled = null,
        public ?string $moderationS3ImageAccessRoleArn = null,
        public ?array $activityMetricsConfig = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
