<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property object|null $filterConditions
 */
class QueryCallParticipantsRequest extends BaseModel
{
    public function __construct(
        public ?object $filterConditions = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
