<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryCallParticipantsRequest extends BaseModel
{
    public function __construct(
        public ?object $filterConditions = null, // Filter conditions to apply to the query
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
