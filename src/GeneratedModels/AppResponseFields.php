<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class AppResponseFields extends BaseModel
{
    public function __construct(
        public ?bool $asyncUrlEnrichEnabled = null,
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
        public ?bool $moderationLlmConfigurabilityEnabled = null,
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
        public ?ModerationDashboardPreferences $moderationDashboardPreferences = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
