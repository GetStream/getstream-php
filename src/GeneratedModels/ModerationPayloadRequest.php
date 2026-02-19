<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Content payload for moderation
 */
class ModerationPayloadRequest extends BaseModel
{
    public function __construct(
        public ?array $texts = null, // Text content to moderate
        public ?array $images = null, // Image URLs to moderate (max 30)
        public ?array $videos = null, // Video URLs to moderate
        public ?object $custom = null, // Custom data for moderation
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
