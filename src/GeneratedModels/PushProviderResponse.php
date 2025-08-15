<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class PushProviderResponse extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,
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
        public ?string $xiaomiPackageName = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
