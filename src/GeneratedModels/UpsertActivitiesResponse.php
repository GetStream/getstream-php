<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 */
class UpsertActivitiesResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        /** @var array<ActivityResponse>|null */
        #[ArrayOf(ActivityResponse::class)]
        public ?array $activities = null, // List of created or updated activities
        public ?int $mentionNotificationsCreated = null, // Total number of mention notification activities created for mentioned users across all activities
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
