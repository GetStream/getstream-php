<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $behavior
 * @property string $blocklist
 */
class BlockListOptions extends BaseModel
{
    public function __construct(
        public ?string $behavior = null, // Blocklist behavior
        public ?string $blocklist = null, // Blocklist name
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
