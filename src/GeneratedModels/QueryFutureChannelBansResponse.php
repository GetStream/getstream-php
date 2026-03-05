<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryFutureChannelBansResponse extends BaseModel
{
    public function __construct(
        /** @var array<FutureChannelBanResponse>|null */
        #[ArrayOf(FutureChannelBanResponse::class)]
        public ?array $bans = null, // List of found future channel bans
        public ?string $duration = null, // Duration of the request in milliseconds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
