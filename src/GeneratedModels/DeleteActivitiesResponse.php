<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class DeleteActivitiesResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?array $deletedIds = null,    // List of activity IDs that were successfully deleted 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
