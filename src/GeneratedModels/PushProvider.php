<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property \DateTime $createdAt
 * @property string $name
 * @property string $type
 * @property \DateTime $updatedAt
 * @property string|null $apnAuthKey
 * @property string|null $apnAuthType
 * @property bool|null $apnDevelopment
 * @property string|null $apnHost
 * @property string|null $apnKeyID
 * @property string|null $apnNotificationTemplate
 * @property string|null $apnP12Cert
 * @property string|null $apnTeamID
 * @property string|null $apnTopic
 * @property string|null $description
 * @property \DateTime|null $disabledAt
 * @property string|null $disabledReason
 * @property string|null $firebaseApnTemplate
 * @property string|null $firebaseCredentials
 * @property string|null $firebaseDataTemplate
 * @property string|null $firebaseHost
 * @property string|null $firebaseNotificationTemplate
 * @property string|null $firebaseServerKey
 * @property string|null $huaweiAppID
 * @property string|null $huaweiAppSecret
 * @property string|null $huaweiHost
 * @property string|null $xiaomiAppSecret
 * @property string|null $xiaomiPackageName
 * @property array<PushTemplate>|null $pushTemplates
 */
class PushProvider extends BaseModel
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
        public ?string $apnNotificationTemplate = null,
        public ?string $apnP12Cert = null,
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
        public ?string $huaweiHost = null,
        public ?string $xiaomiAppSecret = null,
        public ?string $xiaomiPackageName = null,
        /** @var array<PushTemplate>|null */
        #[ArrayOf(PushTemplate::class)]
        public ?array $pushTemplates = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
