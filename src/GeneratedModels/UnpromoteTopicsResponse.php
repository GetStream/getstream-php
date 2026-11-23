<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Response after ending a promotion
 */
class UnpromoteTopicsResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
