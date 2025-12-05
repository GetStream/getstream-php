<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property array|null $grants
 */
class UpdateFeedVisibilityRequest extends BaseModel
{
    public function __construct(
        public ?array $grants = null, // Updated permission grants for each role
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
