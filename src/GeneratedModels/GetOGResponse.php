<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class GetOGResponse extends BaseModel
{
    public function __construct(
        public ?string $type = null, // Attachment type, could be empty, image, audio or video
        public ?string $fallback = null,
        public ?string $color = null,
        public ?string $pretext = null,
        public ?string $authorName = null, // og:site_name
        public ?string $authorLink = null, // og:site
        public ?string $authorIcon = null,
        public ?string $title = null, // og:title
        public ?string $titleLink = null, // og:url
        public ?string $text = null, // og:description
        public ?string $imageUrl = null, // URL of detected image
        public ?string $thumbUrl = null, // URL of detected thumb image
        public ?string $footer = null,
        public ?string $footerIcon = null,
        /** @var array<Action>|null */
        #[ArrayOf(Action::class)]
        public ?array $actions = null,
        /** @var array<Field>|null */
        #[ArrayOf(Field::class)]
        public ?array $fields = null,
        public ?string $assetUrl = null, // URL of detected video or audio
        public ?object $custom = null,
        public ?Images $giphy = null,
        public ?string $ogScrapeUrl = null, // extracted url from the text
        public ?int $originalWidth = null,
        public ?int $originalHeight = null,
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
