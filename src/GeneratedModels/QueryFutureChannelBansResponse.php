<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property array<FutureChannelBanResponse> $bans
 */
class QueryFutureChannelBansResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null, // Duration of the request in milliseconds
        /** @var array<FutureChannelBanResponse>|null List of found future channel bans */
        #[ArrayOf(FutureChannelBanResponse::class)]
        public ?array $bans = null, // List of found future channel bans
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
