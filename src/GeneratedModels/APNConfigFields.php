<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class APNConfigFields extends BaseModel
{
    public function __construct(
        public ?bool $enabled = null,
        public ?bool $development = null,
        public ?string $authType = null,
        public ?string $notificationTemplate = null,
        public ?string $host = null,
        public ?string $bundleID = null,
        public ?string $teamID = null,
        public ?string $keyID = null,
        public ?string $authKey = null,
        public ?string $p12Cert = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
