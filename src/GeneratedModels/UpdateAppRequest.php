<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool|null $asyncUrlEnrichEnabled
 * @property bool|null $autoTranslationEnabled
 * @property string|null $beforeMessageSendHookUrl
 * @property int|null $cdnExpirationSeconds
 * @property bool|null $channelHideMembersOnly
 * @property string|null $customActionHandlerUrl
 * @property bool|null $disableAuthChecks
 * @property bool|null $disablePermissionsChecks
 * @property string|null $enforceUniqueUsernames
 * @property bool|null $feedsModerationEnabled
 * @property string|null $feedsV2Region
 * @property bool|null $guestUserCreationDisabled
 * @property bool|null $imageModerationEnabled
 * @property int|null $maxAggregatedActivitiesLength
 * @property bool|null $migratePermissionsToV2
 * @property bool|null $moderationEnabled
 * @property string|null $moderationWebhookUrl
 * @property bool|null $multiTenantEnabled
 * @property string|null $permissionVersion
 * @property int|null $remindersInterval
 * @property int|null $remindersMaxMembers
 * @property \DateTime|null $revokeTokensIssuedBefore
 * @property string|null $snsKey
 * @property string|null $snsSecret
 * @property string|null $snsTopicArn
 * @property string|null $sqsKey
 * @property string|null $sqsSecret
 * @property string|null $sqsUrl
 * @property bool|null $userResponseTimeEnabled
 * @property string|null $webhookUrl
 * @property array|null $allowedFlagReasons
 * @property array<EventHook>|null $eventHooks
 * @property array|null $imageModerationBlockLabels
 * @property array|null $imageModerationLabels
 * @property array|null $userSearchDisallowedRoles
 * @property array|null $webhookEvents
 * @property APNConfig|null $apnConfig
 * @property AsyncModerationConfiguration|null $asyncModerationConfig
 * @property DataDogInfo|null $datadogInfo
 * @property FileUploadConfig|null $fileUploadConfig
 * @property FirebaseConfig|null $firebaseConfig
 * @property array|null $grants
 * @property HuaweiConfig|null $huaweiConfig
 * @property FileUploadConfig|null $imageUploadConfig
 * @property ModerationDashboardPreferences|null $moderationDashboardPreferences
 * @property PushConfig|null $pushConfig
 * @property XiaomiConfig|null $xiaomiConfig
 */
class UpdateAppRequest extends BaseModel
{
    public function __construct(
        public ?bool $asyncUrlEnrichEnabled = null,
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
        public ?int $maxAggregatedActivitiesLength = null,
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
        /** @var array<EventHook>|null */
        #[ArrayOf(EventHook::class)]
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
        public ?XiaomiConfig $xiaomiConfig = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
