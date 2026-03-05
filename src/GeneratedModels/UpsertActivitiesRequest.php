<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UpsertActivitiesRequest extends BaseModel
{
    public function __construct(
        /** @var array<ActivityRequest>|null */
        #[ArrayOf(ActivityRequest::class)]
        public ?array $activities = null, // List of activities to create or update
        public ?bool $enrichOwnFields = null, // If true, enriches the activities' current_feed with own_* fields (own_follows, own_followings, own_capabilities, own_membership). Defaults to false for performance.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
