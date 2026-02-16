<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 */
class AppealResponse extends BaseModel
{
    public function __construct(
        public ?string $appealID = null, // Unique identifier of the created Appeal item
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
