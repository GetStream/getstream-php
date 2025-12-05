<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property string $id
 * @property string $status
 * @property ReviewQueueItemResponse|null $item
 */
class CustomCheckResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?string $id = null, // Unique identifier of the custom check
        public ?string $status = null, // Status of the custom check
        public ?ReviewQueueItemResponse $item = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
