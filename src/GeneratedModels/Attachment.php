<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * An attachment is a message object that represents a file uploaded by a user.
 */
class Attachment extends BaseModel
{
    public function __construct(
        public ?string $type = null, // Attachment type (e.g. image, video, url)
        public ?string $fallback = null,
        public ?string $color = null,
        public ?string $pretext = null,
        public ?string $authorName = null,
        public ?string $authorLink = null,
        public ?string $authorIcon = null,
        public ?string $title = null,
        public ?string $titleLink = null,
        public ?string $text = null,
        public ?string $imageUrl = null,
        public ?string $thumbUrl = null,
        public ?string $footer = null,
        public ?string $footerIcon = null,
        /** @var array<Action>|null */
        #[ArrayOf(Action::class)]
        public ?array $actions = null,
        /** @var array<Field>|null */
        #[ArrayOf(Field::class)]
        public ?array $fields = null,
        public ?string $assetUrl = null,
        public ?object $custom = null,
        public ?Images $giphy = null,
        public ?string $ogScrapeUrl = null,
        public ?int $originalWidth = null,
        public ?int $originalHeight = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
