<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class GetFeedsRateLimitsResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        /** @var array<string, LimitInfoResponse>|null */
        #[MapOf(LimitInfoResponse::class)]
        public ?array $android = null, // Rate limits for Android platform (endpoint name -> limit info)
        /** @var array<string, LimitInfoResponse>|null */
        #[MapOf(LimitInfoResponse::class)]
        public ?array $ios = null, // Rate limits for iOS platform (endpoint name -> limit info)
        /** @var array<string, LimitInfoResponse>|null */
        #[MapOf(LimitInfoResponse::class)]
        public ?array $web = null, // Rate limits for Web platform (endpoint name -> limit info)
        /** @var array<string, LimitInfoResponse>|null */
        #[MapOf(LimitInfoResponse::class)]
        public ?array $serverSide = null, // Rate limits for server-side platform (endpoint name -> limit info)
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
