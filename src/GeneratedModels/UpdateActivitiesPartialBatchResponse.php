<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property array<ActivityResponse> $activities
 */
class UpdateActivitiesPartialBatchResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        /** @var array<ActivityResponse>|null List of successfully updated activities */
        #[ArrayOf(ActivityResponse::class)]
        public ?array $activities = null, // List of successfully updated activities
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
