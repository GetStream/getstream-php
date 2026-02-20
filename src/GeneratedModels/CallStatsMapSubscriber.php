<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class CallStatsMapSubscriber extends BaseModel
{
    public function __construct(
        public ?string $userID = null,
        public ?string $name = null,
        public ?string $userSessionID = null,
        public ?CallStatsLocation $location = null,
        public ?bool $isLive = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
