<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class APNConfig extends BaseModel
{
    public function __construct(
        public ?string $authKey = null,
        public ?string $authType = null,
        public ?string $bundleID = null,
        public ?bool $development = null,
        public ?bool $disabled = null,
        public ?string $host = null,
        public ?string $keyID = null,
        public ?string $notificationTemplate = null,
        public ?string $p12Cert = null,
        public ?string $teamID = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
