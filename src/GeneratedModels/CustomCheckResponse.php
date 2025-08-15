<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CustomCheckResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?string $id = null,    // Unique identifier of the custom check 
        public ?string $status = null,    // Status of the custom check 
        public ?ReviewQueueItemResponse $item = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
