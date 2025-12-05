<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Block list contains restricted words
 *
 * @property bool $isLeetCheckEnabled
 * @property bool $isPluralCheckEnabled
 * @property string $name
 * @property string $type
 * @property array $words
 * @property \DateTime|null $createdAt
 * @property string|null $id
 * @property string|null $team
 * @property \DateTime|null $updatedAt
 */
class BlockListResponse extends BaseModel
{
    public function __construct(
        public ?bool $isLeetCheckEnabled = null,
        public ?bool $isPluralCheckEnabled = null,
        public ?string $name = null, // Block list name
        public ?string $type = null, // Block list type.
        public ?array $words = null, // List of words to block
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?string $id = null,
        public ?string $team = null,
        public ?\DateTime $updatedAt = null, // Date/time of the last update
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
