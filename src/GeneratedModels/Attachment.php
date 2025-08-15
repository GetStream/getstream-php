<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * An attachment is a message object that represents a file uploaded by a user.
 */
class Attachment extends BaseModel
{
    public function __construct(
        public ?object $custom = null,
        public ?string $assetUrl = null,
        public ?string $authorIcon = null,
        public ?string $authorLink = null,
        public ?string $authorName = null,
        public ?string $color = null,
        public ?string $fallback = null,
        public ?string $footer = null,
        public ?string $footerIcon = null,
        public ?string $imageUrl = null,
        public ?string $ogScrapeUrl = null,
        public ?int $originalHeight = null,
        public ?int $originalWidth = null,
        public ?string $pretext = null,
        public ?string $text = null,
        public ?string $thumbUrl = null,
        public ?string $title = null,
        public ?string $titleLink = null,
        public ?string $type = null,    // Attachment type (e.g. image, video, url) 
        public ?array $actions = null,
        public ?array $fields = null,
        public ?Images $giphy = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
