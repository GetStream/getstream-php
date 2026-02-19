<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class SharedLocationsResponse extends BaseModel
{
    public function __construct(
        /** @var array<SharedLocationResponseData>|null */
        #[ArrayOf(SharedLocationResponseData::class)]
        public ?array $activeLiveLocations = null,
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
