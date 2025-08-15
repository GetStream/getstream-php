<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class GetOGResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?object $custom = null,
        public ?string $assetUrl = null,    // URL of detected video or audio 
        public ?string $authorIcon = null,
        public ?string $authorLink = null,    // og:site 
        public ?string $authorName = null,    // og:site_name 
        public ?string $color = null,
        public ?string $fallback = null,
        public ?string $footer = null,
        public ?string $footerIcon = null,
        public ?string $imageUrl = null,    // URL of detected image 
        public ?string $ogScrapeUrl = null,    // extracted url from the text 
        public ?int $originalHeight = null,
        public ?int $originalWidth = null,
        public ?string $pretext = null,
        public ?string $text = null,    // og:description 
        public ?string $thumbUrl = null,    // URL of detected thumb image 
        public ?string $title = null,    // og:title 
        public ?string $titleLink = null,    // og:url 
        public ?string $type = null,    // Attachment type, could be empty, image, audio or video 
        public ?array $actions = null,
        public ?array $fields = null,
        public ?Images $giphy = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
