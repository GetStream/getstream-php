<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string|null $text
 * @property object|null $custom
 */
class PollOptionInput extends BaseModel
{
    public function __construct(
        public ?string $text = null,
        public ?object $custom = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
