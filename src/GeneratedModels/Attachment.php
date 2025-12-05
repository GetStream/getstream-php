<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * An attachment is a message object that represents a file uploaded by a user.
 *
 * @property object $custom
 * @property string|null $assetUrl
 * @property string|null $authorIcon
 * @property string|null $authorLink
 * @property string|null $authorName
 * @property string|null $color
 * @property string|null $fallback
 * @property string|null $footer
 * @property string|null $footerIcon
 * @property string|null $imageUrl
 * @property string|null $ogScrapeUrl
 * @property int|null $originalHeight
 * @property int|null $originalWidth
 * @property string|null $pretext
 * @property string|null $text
 * @property string|null $thumbUrl
 * @property string|null $title
 * @property string|null $titleLink
 * @property string|null $type
 * @property array<Action>|null $actions
 * @property array<Field>|null $fields
 * @property Images|null $giphy
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
        public ?string $type = null, // Attachment type (e.g. image, video, url)
        /** @var array<Action>|null */
        #[ArrayOf(Action::class)]
        public ?array $actions = null,
        /** @var array<Field>|null */
        #[ArrayOf(Field::class)]
        public ?array $fields = null,
        public ?Images $giphy = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
