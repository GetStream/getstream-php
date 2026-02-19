<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class GetRateLimitsResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        /** @var array<string, LimitInfoResponse>|null */
        #[MapOf(LimitInfoResponse::class)]
        public ?array $android = null, // Map of endpoint rate limits for the Android platform
        /** @var array<string, LimitInfoResponse>|null */
        #[MapOf(LimitInfoResponse::class)]
        public ?array $ios = null, // Map of endpoint rate limits for the iOS platform
        /** @var array<string, LimitInfoResponse>|null */
        #[MapOf(LimitInfoResponse::class)]
        public ?array $serverSide = null, // Map of endpoint rate limits for the server-side platform
        /** @var array<string, LimitInfoResponse>|null */
        #[MapOf(LimitInfoResponse::class)]
        public ?array $web = null, // Map of endpoint rate limits for the web platform
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
