<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
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
        public ?XiaomiConfig $xiaomiConfig = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
