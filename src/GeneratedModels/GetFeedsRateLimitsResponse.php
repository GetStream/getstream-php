<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class GetFeedsRateLimitsResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?array $android = null,    // Rate limits for Android platform (endpoint name -> limit info) 
        public ?array $ios = null,    // Rate limits for iOS platform (endpoint name -> limit info) 
        public ?array $serverSide = null,    // Rate limits for server-side platform (endpoint name -> limit info) 
        public ?array $web = null,    // Rate limits for Web platform (endpoint name -> limit info) 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
