<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ChannelBansScopeTotals extends BaseModel
{
    public function __construct(
        public ?int $channel = null,
        public ?int $futureChannel = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
