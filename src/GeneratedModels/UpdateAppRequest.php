<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UpdateAppRequest extends BaseModel
{
    public function __construct(
        public ?bool $disableAuthChecks = null,
        public ?bool $disablePermissionsChecks = null,
        public ?APNConfig $apnConfig = null,
        public ?FirebaseConfig $firebaseConfig = null,
        public ?HuaweiConfig $huaweiConfig = null,
        public ?XiaomiConfig $xiaomiConfig = null,
        public ?PushConfig $pushConfig = null,
        public ?string $webhookUrl = null,
        public ?bool $moderationEnabled = null,
        public ?bool $moderationAnalyticsEnabled = null,
        public ?string $moderationWebhookUrl = null,
        public ?string $permissionVersion = null,
        public ?array $userSearchDisallowedRoles = null,
        public ?bool $multiTenantEnabled = null,
        public ?array $imageModerationLabels = null,
        public ?array $imageModerationBlockLabels = null,
        public ?bool $imageModerationEnabled = null,
        public ?array $allowedFlagReasons = null,
        public ?bool $autoTranslationEnabled = null,
        public ?bool $asyncUrlEnrichEnabled = null,
        public ?string $beforeMessageSendHookUrl = null,
        public ?string $customActionHandlerUrl = null,
        public ?string $enforceUniqueUsernames = null,
        public ?string $sqsUrl = null,
        public ?string $sqsKey = null,
        public ?string $sqsSecret = null,
        public ?string $snsTopicArn = null,
        public ?string $snsKey = null,
        public ?string $snsSecret = null,
        public ?FileUploadConfig $imageUploadConfig = null,
        public ?FileUploadConfig $fileUploadConfig = null,
        public ?\DateTime $revokeTokensIssuedBefore = null,
        public ?array $webhookEvents = null,
        public ?bool $channelHideMembersOnly = null,
        public ?array $grants = null,
        public ?bool $migratePermissionsToV2 = null,
        public ?int $remindersInterval = null,
        public ?int $remindersMaxMembers = null,
        public ?int $cdnExpirationSeconds = null,
        public ?AsyncModerationConfiguration $asyncModerationConfig = null,
        public ?DataDogInfo $datadogInfo = null,
        public ?string $feedsV2Region = null,
        public ?bool $feedsModerationEnabled = null,
        public ?bool $guestUserCreationDisabled = null,
        public ?ModerationDashboardPreferences $moderationDashboardPreferences = null,
        /** @var array<EventHook>|null */
        #[ArrayOf(EventHook::class)]
        public ?array $eventHooks = null,
        public ?bool $userResponseTimeEnabled = null,
        public ?int $maxAggregatedActivitiesLength = null,
        public ?string $moderationS3ImageAccessRoleArn = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
