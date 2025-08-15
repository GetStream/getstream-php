<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UpsertActivitiesResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?array $activities = null,    // List of created or updated activities 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
