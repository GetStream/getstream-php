<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class RunStats extends BaseModel
{
    public function __construct(
        public ?int $channelsDeleted = null,
        public ?int $messagesDeleted = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
