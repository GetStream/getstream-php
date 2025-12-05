<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property ThreadResponse $thread
 */
class UpdateThreadPartialResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null, // Duration of the request in milliseconds
        public ?ThreadResponse $thread = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
