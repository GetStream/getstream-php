<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property array<SharedLocationResponseData> $activeLiveLocations
 */
class SharedLocationsResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        /** @var array<SharedLocationResponseData>|null */
        #[ArrayOf(SharedLocationResponseData::class)]
        public ?array $activeLiveLocations = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
