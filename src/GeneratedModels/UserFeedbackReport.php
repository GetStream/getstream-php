<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int $unreportedCount
 * @property array $countByRating
 */
class UserFeedbackReport extends BaseModel
{
    public function __construct(
        public ?int $unreportedCount = null,
        public ?array $countByRating = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
