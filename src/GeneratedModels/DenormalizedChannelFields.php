<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string|null $createdAt
 * @property string|null $createdByID
 * @property bool|null $disabled
 * @property bool|null $frozen
 * @property string|null $id
 * @property string|null $lastMessageAt
 * @property int|null $memberCount
 * @property string|null $team
 * @property string|null $type
 * @property string|null $updatedAt
 * @property object|null $custom
 */
class DenormalizedChannelFields extends BaseModel
{
    public function __construct(
        public ?string $createdAt = null,
        public ?string $createdByID = null,
        public ?bool $disabled = null,
        public ?bool $frozen = null,
        public ?string $id = null,
        public ?string $lastMessageAt = null,
        public ?int $memberCount = null,
        public ?string $team = null,
        public ?string $type = null,
        public ?string $updatedAt = null,
        public ?object $custom = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
