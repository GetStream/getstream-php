<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class SessionClient extends BaseModel
{
    public function __construct(
        public ?CallStatsLocation $location = null,
        public ?string $name = null,
        public ?string $version = null,
        public ?string $ip = null,
        public ?string $networkType = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
