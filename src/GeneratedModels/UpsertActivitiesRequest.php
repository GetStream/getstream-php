<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property array<ActivityRequest> $activities
 */
class UpsertActivitiesRequest extends BaseModel
{
    public function __construct(
        /** @var array<ActivityRequest>|null List of activities to create or update */
        #[ArrayOf(ActivityRequest::class)]
        public ?array $activities = null, // List of activities to create or update
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
