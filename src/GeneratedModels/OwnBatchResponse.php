<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property array $data
 */
class OwnBatchResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?array $data = null, // Map of feed ID to own fields data
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
