<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property array $targetIds
 */
class DeleteSegmentTargetsRequest extends BaseModel
{
    public function __construct(
        public ?array $targetIds = null, // Target IDs
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
