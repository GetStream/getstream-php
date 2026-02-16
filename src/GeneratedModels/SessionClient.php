<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 */
class SessionClient extends BaseModel
{
    public function __construct(
        public ?string $ip = null,
        public ?string $name = null,
        public ?string $networkType = null,
        public ?string $version = null,
        public ?CallStatsLocation $location = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
