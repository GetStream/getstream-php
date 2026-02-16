<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 */
class UpdateActivitiesPartialBatchRequest extends BaseModel
{
    public function __construct(
        /** @var array<UpdateActivityPartialChangeRequest>|null */
        #[ArrayOf(UpdateActivityPartialChangeRequest::class)]
        public ?array $changes = null, // List of activity changes to apply. Each change specifies an activity ID and the fields to set/unset
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
