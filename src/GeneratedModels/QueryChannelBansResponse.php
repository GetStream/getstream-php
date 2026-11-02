<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryChannelBansResponse extends BaseModel
{
    public function __construct(
        /** @var array<ChannelBanResponse>|null */
        #[ArrayOf(ChannelBanResponse::class)]
        public ?array $bans = null, // Users banned from the channel, one entry per user, newest ban first
        public ?int $total = null, // Number of banned users, each counted once, ignoring paging. Counted per scope with a cap of 100000 each, so it can reach 200000. Only present when include_total is set on the request; omitted when counting timed out
        public ?ChannelBansScopeTotals $totalByScope = null,
        public ?string $next = null,
        public ?string $prev = null,
        public ?string $duration = null, // Duration of the request in milliseconds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
