<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class APNConfig extends BaseModel
{
    public function __construct(
        public ?string $authType = null,
        public ?bool $development = null,
        public ?string $host = null,
        public ?string $bundleID = null,
        public ?bool $disabled = null,
        public ?string $authKey = null,
        public ?string $keyID = null,
        public ?string $teamID = null,
        public ?string $p12Cert = null,
        public ?string $notificationTemplate = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
