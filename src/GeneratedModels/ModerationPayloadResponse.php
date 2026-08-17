<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Content payload for moderation
 */
class ModerationPayloadResponse extends BaseModel
{
    public function __construct(
        public ?array $texts = null, // Text content to moderate
        public ?array $images = null, // Image URLs to moderate
        public ?array $videos = null, // Video URLs to moderate
        public ?array $audios = null, // Audio URLs to moderate
        public ?object $custom = null, // Custom data for moderation
        public ?array $textOrderedKeys = null, // Caller-supplied keys for texts (e.g. "title", "description"), index-aligned with texts[]
        public ?array $imageOrderedKeys = null, // Caller-supplied keys for images, index-aligned with images[]
        public ?array $textIds = null, // Caller-supplied content IDs per text key (from content_ids on /analyze)
        public ?array $imageIds = null, // Caller-supplied content IDs per image key (from content_ids on /analyze)
        public ?array $otherMedia = null, // Media URLs from attachments outside the typed image/video/audio lists (custom attachment types such as GIF pickers)
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
