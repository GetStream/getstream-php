<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class SDKUsageReport extends BaseModel
{
    public function __construct(
        /** @var array<string, PerSDKUsageReport>|null */
        #[MapOf(PerSDKUsageReport::class)]
        public ?array $perSdkUsage = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
