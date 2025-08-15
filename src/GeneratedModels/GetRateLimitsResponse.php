<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class GetRateLimitsResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?array $android = null,    // Map of endpoint rate limits for the Android platform 
        public ?array $ios = null,    // Map of endpoint rate limits for the iOS platform 
        public ?array $serverSide = null,    // Map of endpoint rate limits for the server-side platform 
        public ?array $web = null,    // Map of endpoint rate limits for the web platform 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
