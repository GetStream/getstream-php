<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryFutureChannelBansResponse extends BaseModel
{
    public function __construct(
        /** @var array<FutureChannelBanResponse>|null */
        #[ArrayOf(FutureChannelBanResponse::class)]
        public ?array $bans = null, // List of found future channel bans
        public ?int $total = null, // Total number of bans matching the query filter, computed at query time and capped at 100000. Only present when include_total is set on the request; omitted when computing the total timed out
        public ?string $duration = null, // Duration of the request in milliseconds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
