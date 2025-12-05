<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $csvFile
 */
class BulkImageModerationRequest extends BaseModel
{
    public function __construct(
        public ?string $csvFile = null, // URL to CSV file containing image URLs to moderate
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
