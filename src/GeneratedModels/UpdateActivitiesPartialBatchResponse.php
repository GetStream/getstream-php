<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UpdateActivitiesPartialBatchResponse extends BaseModel
{
    public function __construct(
        /** @var array<ActivityResponse>|null */
        #[ArrayOf(ActivityResponse::class)]
        public ?array $activities = null, // List of successfully updated activities
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
