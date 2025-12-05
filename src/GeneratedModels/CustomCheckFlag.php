<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $type
 * @property string|null $reason
 * @property array|null $labels
 * @property object|null $custom
 */
class CustomCheckFlag extends BaseModel
{
    public function __construct(
        public ?string $type = null, // Type of check (custom_check_text, custom_check_image, custom_check_video)
        public ?string $reason = null, // Optional explanation for the flag
        public ?array $labels = null, // Labels from various moderation sources
        public ?object $custom = null, // Additional metadata for the flag
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
