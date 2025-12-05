<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool $development
 * @property bool $enabled
 * @property string|null $authKey
 * @property string|null $authType
 * @property string|null $bundleID
 * @property string|null $host
 * @property string|null $keyID
 * @property string|null $notificationTemplate
 * @property string|null $p12Cert
 * @property string|null $teamID
 */
class APNConfigFields extends BaseModel
{
    public function __construct(
        public ?bool $development = null,
        public ?bool $enabled = null,
        public ?string $authKey = null,
        public ?string $authType = null,
        public ?string $bundleID = null,
        public ?string $host = null,
        public ?string $keyID = null,
        public ?string $notificationTemplate = null,
        public ?string $p12Cert = null,
        public ?string $teamID = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
