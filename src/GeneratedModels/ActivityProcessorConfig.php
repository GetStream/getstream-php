<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $type
 */
class ActivityProcessorConfig extends BaseModel
{
    public function __construct(
        public ?string $type = null, // Type of activity processor (required)
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
