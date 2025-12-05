<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool $allowMultiUserDevices
 * @property bool $asyncUrlEnrichEnabled
 * @property bool $autoTranslationEnabled
 * @property bool $campaignEnabled
 * @property int $cdnExpirationSeconds
 * @property string $customActionHandlerUrl
 * @property bool $disableAuthChecks
 * @property bool $disablePermissionsChecks
 * @property string $enforceUniqueUsernames
 * @property bool $guestUserCreationDisabled
 * @property int $id
 * @property bool $imageModerationEnabled
 * @property int $maxAggregatedActivitiesLength
 * @property bool $moderationBulkSubmitActionEnabled
 * @property bool $moderationEnabled
 * @property bool $moderationLlmConfigurabilityEnabled
 * @property bool $moderationMultitenantBlocklistEnabled
 * @property string $moderationWebhookUrl
 * @property bool $multiTenantEnabled
 * @property string $name
 * @property string $organization
 * @property string $permissionVersion
 * @property string $placement
 * @property int $remindersInterval
 * @property string $snsKey
 * @property string $snsSecret
 * @property string $snsTopicArn
 * @property string $sqsKey
 * @property string $sqsSecret
 * @property string $sqsUrl
 * @property bool $suspended
 * @property string $suspendedExplanation
 * @property bool $useHookV2
 * @property bool $userResponseTimeEnabled
 * @property string $webhookUrl
 * @property array<EventHook> $eventHooks
 * @property array $userSearchDisallowedRoles
 * @property array $webhookEvents
 * @property array $callTypes
 * @property array $channelConfigs
 * @property FileUploadConfig $fileUploadConfig
 * @property array $grants
 * @property FileUploadConfig $imageUploadConfig
 * @property array $policies
 * @property PushNotificationFields $pushNotifications
 * @property string|null $beforeMessageSendHookUrl
 * @property \DateTime|null $revokeTokensIssuedBefore
 * @property array|null $allowedFlagReasons
 * @property array<GeofenceResponse>|null $geofences
 * @property array|null $imageModerationLabels
 * @property DataDogInfo|null $datadogInfo
 * @property ModerationDashboardPreferences|null $moderationDashboardPreferences
 */
class AppResponseFields extends BaseModel
{
    public function __construct(
        public ?bool $allowMultiUserDevices = null,
        public ?bool $asyncUrlEnrichEnabled = null,
        public ?bool $autoTranslationEnabled = null,
        public ?bool $campaignEnabled = null,
        public ?int $cdnExpirationSeconds = null,
        public ?string $customActionHandlerUrl = null,
        public ?bool $disableAuthChecks = null,
        public ?bool $disablePermissionsChecks = null,
        public ?string $enforceUniqueUsernames = null,
        public ?bool $guestUserCreationDisabled = null,
        public ?int $id = null,
        public ?bool $imageModerationEnabled = null,
        public ?int $maxAggregatedActivitiesLength = null,
        public ?bool $moderationBulkSubmitActionEnabled = null,
        public ?bool $moderationEnabled = null,
        public ?bool $moderationLlmConfigurabilityEnabled = null,
        public ?bool $moderationMultitenantBlocklistEnabled = null,
        public ?string $moderationWebhookUrl = null,
        public ?bool $multiTenantEnabled = null,
        public ?string $name = null,
        public ?string $organization = null,
        public ?string $permissionVersion = null,
        public ?string $placement = null,
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
        /** @var array<EventHook>|null */
        #[ArrayOf(EventHook::class)]
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
        /** @var array<GeofenceResponse>|null */
        #[ArrayOf(GeofenceResponse::class)]
        public ?array $geofences = null,
        public ?array $imageModerationLabels = null,
        public ?DataDogInfo $datadogInfo = null,
        public ?ModerationDashboardPreferences $moderationDashboardPreferences = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
