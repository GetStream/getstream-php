<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ModerationPayload extends BaseModel
{
    public function __construct(
        public ?array $texts = null,
        public ?array $images = null,
        public ?array $videos = null,
        public ?array $audios = null,
        public ?object $custom = null,
        public ?array $textOrderedKeys = null,
        public ?array $imageOrderedKeys = null,
        public ?array $textIds = null,
        public ?array $imageIds = null,
        public ?array $otherMedia = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
