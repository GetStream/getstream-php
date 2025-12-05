<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property string $name
 */
class DeleteCommandResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?string $name = null, // Command name
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
